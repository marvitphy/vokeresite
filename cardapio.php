<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=9">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/framework7-icons@3.0.1/css/framework7-icons.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        body {
            background-color: #fbe601;
            overflow-x: hidden;
        }

        .produtos {
            background-color: #121212;
            color: white;
            padding: 5px 5px 5px 30px;
            border-radius: 30px;
        }

        .produtos-detalhes {
            display: none;
            background-color: rgba(0, 0, 0, 0.85);
            padding: 20px;
            margin-bottom: 10px;
            color: white;
            border-radius: 10px;
            padding-left: 15px;
            padding-top: 4px;
            padding-bottom: 4px;
        }

        .prods {
            white-space: nowrap;
            width: 85%;
            overflow: auto;
            font-size: 14px;
        }

        .produto-select {
            background-color: #ff0045;
        }

        .especs-body {
            /* position: absolute; */
            display: none;
            width: 100%;
            height: 100%;
            background-color: black;
            color: white;
            padding: 15px;
            border-radius: 15px;

        }

        .opcoes {
            background: #fce803;
            width: 100%;
            height: 2000px;
            top: 0;
            position: absolute;
            margin-bottom: 500px;
            margin-top: 20px;

        }


        .nome-produto {
            width: 85%;
            overflow: auto;
            font-size: 5vw;

        }

        .confirmar-btn {
            position: fixed;
            bottom: 0;
            padding-top: 8px;
            padding-bottom: 5px;
            box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.85);
            background: #fce803;
            text-align: center;
            width: 100%;
        }

        .topo-nome {
            z-index: 1000;
            position: fixed;
            top: 0;
            background-color: #121212;
            width: 100%;
            text-align: center;
            color: white;
            padding-top: 10px;
            padding-bottom: 10px;
        }

        .op-op {
            margin-top: 28px;
        }

        .selecionado {
            border: 1px solid blue;
        }

        .empresa-logo {
            margin: 0 auto;
            height: 40vw;
            width: 40vw;
            border-radius: 100%;
            border: 5px solid rgba(0, 0, 0, 0.7);
            margin-bottom: 10px;
        }

        .empresa-data {
            display: flex;
            margin-bottom: 20px;
        }

        .empresa_row {
            flex-direction: row;

        }

        .item {
            flex: 1;
            margin: 5px;
            text-align: center;
            font-size: 5vw;
            background-color: #121212;
            border-radius: 50px;
        }

        @media screen and (max-width: 600px) {
            .nome-produto {

                width: 85%;
                overflow: auto;
                font-size: 4.5vw;


            }
        }

        @media screen and (min-width: 600px) {
            #app {
                width: 50%;
            }
        }
    </style>
</head>

<body>
    <div id="app">
        <div class="topo-nome"><i class="back-h ml-2 f7-icons float-left">chevron_left</i><span class="nome-em mr-4"></span></div>
        <div class="container-fluid w-100" style="margin-top: 60px">

            <div class="mt-2 titles ">

                <div class="empresa_infos">

                </div>
                <div class="empresa-data">

                </div>
                <hr class="bg-dark">
                <span class="escolha mb" style="font-weight: bold;">Escolha os produtos<br><br></span>
            </div>
        </div>

        <?php if (isset($_GET['prod'])) { ?>
            <div class="opcoes">
                <div class="topo-nome"><i class="back-h ml-2 f7-icons float-left">chevron_left</i><span class="nome-prod"></span></div>
                <div class="op-op"></div>
            </div>
            <br><br><br><br><br><br>

            <div class="confirmar-btn">
                <span class="text-white btn" style="border-radius: 20px; margin-bottom: 5px; background-color: #ff0037;">Confirmar Escolhas</span>
            </div>
        <?php } ?>
    </div>
    <script>
        $(document).ready(function() {


            $('.back-h').on('click', function() {
                window.history.back();
            })

            $.ajax({
                url: "https://api.euvokere.com.br/api/v1/empresas/" + <?php echo $_GET['id']; ?>,
                method: 'GET',
                dataType: 'json',
                success: function(response_empresa) {


                    const response_empresa_2 = response_empresa.data
                    var em_aberta = response_empresa.data.aberta
                    var em_aberta_element
                    Object.keys(response_empresa_2.horarios).forEach((chave, key) => {
                        console.log(response_empresa_2.horarios[chave].dia)
                        console.log(response_empresa_2.horarios[chave].t1_ini)
                        console.log(response_empresa_2.horarios[chave].t1_fim)
                    })
                    $('.nome-em').text(response_empresa_2.nome)
                    if (em_aberta == 1) {
                        em_aberta_element = '<span class="item text-success"><i class="f7-icons " style="font-size: 5vw;">lock_open_fill</i> Aberta</span>'

                    } else {
                        em_aberta_element = '<span class="item text-danger"><i class="f7-icons " style="font-size: 5vw;">lock_fill</i> Fechada</span>'
                    }

                    $('.empresa-data').append(em_aberta_element + '<span class="item text-white"><i class="f7-icons " style="font-size: 5vw;">clock</i> Horários</span>')
                    $('.empresa_infos').append(`<div class="empresa-logo" style="background-repeat: no-repeat; background-size: cover; background-position: center; background-image: url(${response_empresa_2.logo})"></div>`)
                    if (em_aberta == 1) {
                

            
                $.ajax({
    
                    url: "https://api.euvokere.com.br/api/v1/produtos/empresa/" + <?php echo $_GET['id']; ?> + "/groupedLl",
                    dataType: 'json',
                    success: function(response) {
    
                        const data = response.data
    
                        Object.keys(data).forEach((titulo, key) => {
                            $('.titles').append(`<div id="${key}"class="title">
            <h4 class="produtos"><span class="nome-produto">${titulo}</span> <i class="f7-icons float-right">chevron_down_circle_fill</i></h3></div>`)
                            $(`#${key}`).click(function() {
    
                                $(".produtos-detalhes-" + key).slideToggle('fast');
                                if ($(this).find(".f7-icons").text() == 'chevron_down_circle_fill') {
                                    $(this).find(".f7-icons").text('chevron_up_circle_fill')
                                } else {
                                    $(this).find(".f7-icons").text('chevron_down_circle_fill')
                                }
                                $(this).children('.produtos').toggleClass('produto-select');
                            });
                            data[titulo].map(item => {
                                var temp_3 = ''
                                var descricao = ''
                                if (Object.keys(item.especificacoes).length > 0) {
                                    temp_3 = 'list_dash'
                                } else {
                                    temp_3 = 'plus_circle_fill'
                                }
                                if (item.descricao != null) {
                                    descricao = item.descricao
                                } else {
                                    descricao = 'Sem descrição'
                                }
    
                                $(`#${key}`).after(`<div class="produtos-detalhes produtos-detalhes-${key}"><div class="row"><div class="col-sm"><div class="prods prods-${key}" style="transform: translateY(10px)">${item.nome} <br>${descricao}<br><span style="color: yellow">R$${item.preco.toFixed(2).replace(".",",")} </span></div></div><div class="col-sm"><i class="icone i-${key} f7-icons float-right" style="transform: translateY(-100%)">` + temp_3 + `</i><span style="opacity: 0%" class="len">${Object.keys(item.especificacoes).length }</span></div> </div></div>`)
    
    
                                var id = item.id
                                var espec = item.especificacoes
    
    
                                espec = Object.keys(espec).forEach((temp, keys) => {
    
                                    var temp_espec = espec[temp].id
    
    
                                    $(".produtos-detalhes-" + key).append(`<div class="especs-body especs especs-${id}"><div class="especs e-${espec[temp].id}">${espec[temp].nome}</div></div>`)
                                    $('.i-' + key).click(function() {
                                        var url = window.location.href;
    
                                        window.location.href = url + '&prod=' + item.id
    
                                    })
                                    var op = espec[temp].opcoes
                                    op = Object.keys(op).forEach((temp_2, keys) => {
                                        var ativo_op = op[temp_2].ativo
                                        if (ativo_op != 1) {
    
                                        } else {
                                            $(`.e-${op[temp_2].especificacoes_id}`).append('<br>' + op[temp_2].nome + '<br>')
                                        }
    
    
                                    })
                                })
                            })
                        })
    
    
                    }
                });
    
                <?php if (isset($_GET['prod'])) { ?>
    
                    $.ajax({
                        url: "https://api.euvokere.com.br/api/v1/produtos/empresa/" + <?php echo $_GET['id']; ?> + "/groupedLl",
                        dataType: 'json',
                        beforeSend: function() {
                            $('.op-op').html('<div class="spinner-border ml-5 mr-auto" style="text-align: center; margin-top: 20px; " role="status"><span style="text-align: center; margin-top: 20px; " class="align-middle sr-only">Loading...</span></div>')
                        },
                        success: function(response2) {
                            $('.spinner-border').hide()
                            const data = response2.data
                            var prod = parseInt(<?php echo $_GET['prod']; ?>)
                            Object.keys(data).forEach((titulo, key) => {
                                //console.log(data[titulo])
    
                                var prod_detalhes = data[titulo].filter(function(hero) {
    
                                    return hero.id == prod
                                })
    
                                prod_detalhes.map(item => {
    
                                    $('.nome-prod').text(item.nome.trim())
                                })
    
    
    
                                var especs_temp = Object.values(prod_detalhes)
    
                                console.log(especs_temp)
                                especs_temp.map(item_2 => {
    
                                    console.log(item_2.especificacoes)
                                    var especs = item_2.especificacoes
                                    console.log('=-=-=-=-=- AQUI =-=-=-=-=-=')
                                    for (var j = 0; j < Object.keys(especs).length; j++) {
                                        var listaa = [especs[j].nome]
    
                                        listaa.push(especs[j].nome)
    
                                        var es_nome = especs[j].nome
                                        var es_id = especs[j].id
    
                                        $('.op-op').append('<div style="background: #121212" class="title-espec mb-1 pt-2 pb-2 pl-2 text-white">' + especs[j].nome + '<br>' + '<span class="text-warning"> Escolha de ' + especs[j].min_itens + ' a ' + especs[j].max_itens + ' opções </span>' + '</div> ' + '<span class="list">' + especs[j].nome +' </span><span class="li lista' + especs[j].id + '">' + especs[j].nome + ':{ </span>')
                                        var opcoes_values = Object.values(especs[j].opcoes);
                                        console.log(opcoes_values)
                                        for (var k = 0; k < Object.keys(opcoes_values).length; k++) {
    
                                            var valor_op
                                            if (especs[j].opcoes[k].valor > 0) {
                                                valor_op = 'R$ ' + especs[j].opcoes[k].valor.toFixed(2).replace(".", ",")
                                            } else {
                                                valor_op = ''
                                            }
                                            $('.op-op').append('<div class="ops pt-3 pb-4 pl-3" style="border-bottom: 1px solid black"><span class="op-name">' + especs[j].opcoes[k].nome + `</span><input type="hidden" class="span-id" value="${especs[j].id}"> <span class="icon"><i class="icone ic-${especs[j].id} f7-icons float-right" style="margin-right: 15px;">plus_circle</i></span> <span class="float-right mr-2" >${valor_op}</span></div>`)
    
                                            var iconesub = `<i class="icone ics-${especs[j].id} f7-icons float-right" style="margin-right: 15px;">plus_circle_fill</i>`
                                    
                                            var lista = []
                                            $('.ic-' + especs[j].id).on('click', function() {
                                                var op = $(this).closest('.ops').find('.op-name').text();
                                                $(this).closest('.icon').append(iconesub)
                                              
                                              
    
                                                var span_id = $(this).closest('.ops').find('.span-id').val();
                                                $(this).closest('.ops').find('.op-name').css('color', '#ff0037');
                                                $(this).closest('.ops').find('.op-name').toggleClass('select');
                                                $(this).closest('.opcoes').find('.lista'+span_id).append(op + ' ')
                                                lista.push(span_id, op)
                                                console.log($('.lista'+span_id).text().split(","))
    
                                                $(this).closest('.opcoes').find();
                                                $(this).remove()
                                                
                                                console.log(JSON.parse(JSON.stringify($('.li').text().split(" "))))
                                            })
                                            
                                            $('.ics-' + especs[j].id).on('click', function(){
                                                console.log('sasdf')
                                            })
                                            if (lista.length == especs[j].max_itens) {
                                                $('.ic-' + especs[j].id).remove()
                                            }
                                        }
    
                                    }
    
    
                                    var especs_2 = Object.keys(especs).forEach((temp_3, keys) => {
    
                                    })
    
    
    
    
                                })
    
    
    
    
                            })
                        }
                    });
    
    
    
    
    
                <?php } ?>
            }else{
                    $('.titles').append('<span style="font-weight: bold">Cardápio indisponível <br> Empresa Fechada</span>')
                    $('.escolha').remove()
                }
                }
            })
           
        });
    </script>
</body>

</html>