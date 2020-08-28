$(document).ready(function() {


    $.ajax({
        url: "https://api.euvokere.com.br/api/v1/produtos/empresa/" + <?php echo $_GET['id']; ?> + "/groupedLl",
        dataType: 'json',
        success: function(response) {

            const data = response.data
            Object.keys(data).forEach((titulo, key) => {
                
                console.log(data[titulo])
                $('.titles').append(`<div id="${key}"class="title">
<h4 class="produtos">${titulo} <i class="f7-icons float-right">chevron_down_circle_fill</i></h3></div>`)
                $(`#${key}`).click( function() {
                    
                    $(".produtos-detalhes-"+key).slideToggle('fast');
                    if($(this).find(".f7-icons").text() == 'chevron_down_circle_fill'){                         
                        $(this).find(".f7-icons").text('chevron_up_circle_fill') 
                    }else{               
                        $(this).find(".f7-icons").text('chevron_down_circle_fill')
                    }
                    $(this).children('.produtos').toggleClass('produto-select');
                });
                data[titulo].map(item => {
                    var temp_3 = ''
                    if(Object.keys(item.especificacoes).length > 0 ){
                        temp_3 = 'list_dash'
                    }else{
                        temp_3 = 'plus_circle_fill'
                    }

                    $(`#${key}`).after(`<div class="produtos-detalhes produtos-detalhes-${key}"><div class="row"><div class="col-sm"><div class="prods" style="transform: translateY(10px)">${item.nome}<br> <span style="color: yellow">R$${item.preco.toFixed(2).replace(".",",")} </span></div></div><div class="col-sm"><span style="opacity: 0%" class="len">${Object.keys(item.especificacoes).length }</span><i class="icone f7-icons float-right" style="transform: translateY(-60%)">` + temp_3 + `</i></div> </div></div>`)
                    

                    

                    /* var espec = item.especificacoes
                    espec = Object.keys(espec).forEach((temp, keys) => {
                        $(`#${key}`).append('<br>' + espec[temp].nome + '<br>')
                        var op = espec[temp].opcoes
                        op = Object.keys(op).forEach((temp_2, keys) => {
                            var ativo_op = op[temp_2].ativo
                            if(ativo_op != 1){

                            }else{
                                $(`#${key}`).append('<br>' + op[temp_2].nome + '<br>')
                            }
                            

                        })
                    }) */

                })
            })


        }
    });


});