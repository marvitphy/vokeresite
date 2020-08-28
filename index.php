<?php

if (isset($_POST['enviar'])) {
    $nomeR = $_POST['nomeR'];
    $nomeE = $_POST['nomeE'];
    $cidade = $_POST['cidade'];
    $endereco = $_POST['endereco'];
    $cep = $_POST['cep'];
    $contato = $_POST['contato'];
    $delivery = $_POST['delivery'];
    $to = 'comercial@euvokere.com.br';
    $sub = 'Quero ser um parceiro Vokerê!';
    $headers = "Content-Type: text/html; charset=ISO-8859-1\r\n";
    $message = '<html><body>';
    $message .= '<b>Nome:</b> ' . $nomeR . '<br><b>Nome da empresa:</b> ' . $nomeE . '<br><b>Cidade:</b> ' . $cidade . '<br><b>Endereço:</b> ' . $endereco . '<br><b>Cep:</b> ' . $cep . '<br><b>Contato:</b> ' . $contato . '<br><b>Empresa tem delivery?</b> ' . $delivery;
    $message .= '</body></html>';

    if (mail($to, $sub, $message, $headers)) {
        echo '<script>alert("Enviado com sucesso! Agradecemos! 😊")</script>';
    } else {
        echo '<script>alert("Houve algum erro, verifique as informações. ")</script>';
    }
}

?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Vokerê</title>
    <meta content="O que você quiser, Onde você estiver" name="descriptison">
    <meta content="Delivery" name="keywords">
    <meta name="robots" content="index" />
    <meta name="google" content="notranslate" />
    <link rel="icon" href="assets/img/l.png" />

    <!-- Favicons -->

    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/vendor/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/2aebc9aa31.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <link href="assets/css/style.css?rnd=26" rel="stylesheet">
    <style>
        .pesquisa::placeholder {

            color: black;
            opacity: 1;
            cursor: pointer;

        }

        .psq-cidade::placeholder {

            color: black;
            opacity: 1;
            cursor: pointer;

        }

        .psq-cidade {
            width: 350px;
        }


        .pesquisa {
            cursor: pointer;
            border-radius: 40px;
            width: 450px;
            text-align: left;
            padding-bottom: 15px;
            padding-top: 15px;
            padding-left: 20px;
            color: black;
            font-weight: 500;
        }


        div.scrollmenu {
            background-color: rgb(214, 16, 75);
            overflow: auto;
            white-space: nowrap;
            scrollbar-width: thin;
        }

        div.scrollmenu a {
            display: inline-block;
            color: white;
            text-align: center;
            padding: 14px;
            text-decoration: none;
        }

        div.scrollmenu a:hover {
            background-color: rgb(119, 1, 36);
        }

        .container-cidades {
            width: 550px;
            height: 450px;
            background-color: white;
            position: fixed;
            z-index: 2000;
            top: 20%;
            left: 50%;
            margin-left: -280px;
            box-shadow: 1px 2px 60px rgb(32, 32, 32);
            padding: 5px 30px 10px 30px;
            text-align: center;
            border-radius: 15px;
            display: none;
        }

        @media (max-width: 600px) {
            .btn-user{
                display: initial;
            }
            .base{
                text-align: center;
            }
            .container-cidades {
                border-radius: 0px;
                width: 100%;
                height: 100%;
                top: 0;
                left: 0;
                bottom: 0;
                right: 0;
                margin-left: 0;
            }

            .pesquisa{
                width: 100%;
                left: 0;
            }
            .baixar-app{
                display: none;
            }
            

            .psq-cidade {
                width: 100%;
            }

            .display-5 {
                font-size: 28px;
            }


        }



        .scroll {
            overflow-x: scroll;
            overflow-y: hidden;
            white-space: nowrap;

        }

        .scroll-card {
            display: inline-block;

        }

        .card-body {

            min-width: 230px;
            margin-right: 5px;
        }

        .empresas {
            width: 100%;
            height: 100%;
            background-color: white;
            position: fixed;
            z-index: 100;
            top: 0;
            box-shadow: 1px 2px 60px rgb(32, 32, 32);
            padding: 5px 30px 10px 30px;
            padding-top: 100px;
            touch-action: pan-x;

        }

        .cidade-button: {}

        .cidade-button:hover {
            font-size: 20px;
        }

        .empresa-div {
            padding-top: 30px;
            padding-bottom: 100px;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            position: fixed;
            overflow: auto;
            z-index: 1500;
            top: 90px;
            color: white;
            display: none;

        }

        .baixar{
            transform: scale(1);
            animation: pulse 2s infinite;
        }

        .baixar-app{
            cursor: pointer;
            border-radius: 40px;
            width: 450px;
            text-align: left;
            padding-bottom: 15px;
            padding-top: 15px;
            padding-left: 20px;
            color: black;
            font-weight: 500;
        }
        .btn-user{
            display: none;
        }
        .wpp{
            transition: 0.5s;
        }
        .wpp:hover{
            transform: scale(1.5);
        }
        @keyframes pulse {
            0% {
                transform: scale(0.95);
                box-shadow: 0 0 0 0 rgba(238, 238, 0, 1)
            }

            70% {
                transform: scale(1);
                box-shadow: 0 0 0 10px rgba(0, 0, 0, 0);
            }

            100% {
                transform: scale(0.95);
                box-shadow: 0 0 0 0 rgba(0, 0, 0, 0);
            }
        }
    </style>

</head>

<body>


    <div class="empresa-div">
        <div class="container">
            <form action="" method="post">
                <h2>Quero ser um parceiro <span style=" background: #fbff00; color: black; border-radius: 20px; padding: 0px 15px 1px 15px"><img src="assets/img/logo2.png" width="75px" alt=""></span> <span class="float-right parceria-fechar">X</span></h2>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="first">Nome do responsável:</label>
                            <input type="text" class="form-control" placeholder="Digite o seu nome" name="nomeR" id="first">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="last">Nome da empresa:</label>
                            <input type="text" class="form-control" placeholder="Digite o nome da empresa" name="nomeE" id="last">
                        </div>
                    </div>
                    <!--  col-md-6   -->
                </div>


                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="company">Cidade</label>
                            <input type="text" name="cidade" class="form-control" placeholder="Infome-nos a cidade" id="company">
                        </div>


                    </div>
                    <!--  col-md-6   -->

                    <div class="col-md-6">

                        <div class="form-group">
                            <label for="phone">Endereço completo da <b>empresa</b>:</label>
                            <input type="tel" name="endereco" class="form-control" id="" placeholder="Ex.: Avenida x, Bairro x">
                        </div>
                    </div>
                    <!--  col-md-6   -->
                </div>
                <!--  row   -->


                <div class="row">
                    <div class="col-md-6">

                        <div class="form-group">
                            <label for="email">Cep:</label>
                            <input type="number" name="cep" class="form-control" id="email" placeholder="Digite o seu CEP - XXXXXXXX">
                        </div>
                    </div>
                    <!--  col-md-6   -->

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="url">Telefone:</label>
                            <input type="tel" name="contato" class="form-control" id="url" placeholder="Número do whatsapp">
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="url">Sua empresa já possui algum serviço de Delivery?</label>

                            <select id="inputState" required class="form-control" name="delivery" placeholder="Selecione">
                                <optgroup label="Selecione">
                                    <option>Não</option>
                                    <option>Sim</option>
                                </optgroup>
                            </select>
                        </div>

                    </div>
                    <!--  col-md-6   -->
                </div>
                <!--  row   -->

                <button type="submit" name="enviar" style=" background: #fbff00;" class="btn">Enviar</button> <small>Logo mais nossa equipe entrará em contato com você. ;)</small>
            </form>
        </div>
    </div>


    <div class="all">
    <a href="https://api.whatsapp.com/send?phone=5599991045490&text=Preciso%20de%20ajuda!"><div style="right: 0; bottom: 0;  transform: translate(-20px, -30px); position: fixed; z-index: 1500; text-align: center;">
        <span class="wpp" style="font-weight: bold; box-shadow: inset 0 0 1em gray, 0 0 1em gray; background: #25d366; border: 1.5px solid white; color: white; padding: 3px 8px 3px 8px; border-radius: 20px;">Suporte Técnico</span> <br>
        <img  class="wpp mt-2" height="55px" src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6b/WhatsApp.svg/765px-WhatsApp.svg.png" >
        </div></a>



        <!-- ======= Header ======= -->
        <header id="header" class="fixed-top header-transparent" style="z-index: 60">
            <div class="container-fluid">

                <div class="row justify-content-center">
                    <div class="col-xl-11 d-flex align-items-center">

                        <a href="index.php" class="logo mr-auto"><img src="assets/img/logo.png" width="90px" alt="" class="img-fluid"></a>

                        <nav class="nav-menu d-none d-lg-block ">
                            <ul class="text-warning">
                                <li class="active"><a href="index.php" style="color: #fbff00;" class="text">Início</a></li>
                                <li><a href="https://appurl.io/y0_7FDR4j" class="">Baixar o App</a></li>
                                <li><a style="cursor: pointer" class="parceria">Seja um parceiro</a></li>
                                <li><a href="https://api.whatsapp.com/send?phone=5599991045490&text=Quero%20Ser%20Entregador!" class="">Seja um entregador</a></li>
                                <li><a href="#about" class="">Sobre</a></li>
                                <li><a href="#team" style="background: #fbff00; border-radius: 20px; padding: 6px 18px 6px 18px" class="btn  text-white text-dark">Criar Conta</a></li>
                                <li><a href="#team" style="background: #fbff00; border-radius: 20px; padding: 6px 18px 6px 18px" class="btn  text-white text-dark">Entrar</a></li>
                                

                            </ul>
                        </nav><!-- .nav-menu -->
                    </div>
                </div>

            </div>
        </header>

        <div class="container-cidades">
            <span class="mt-5">Em desenvolvimento, aguarde!</span>
            <!--<span style="float: right; margin-top: 10px; font-weight: bold; font-size: 14px; margin-right: -10px; box-shadow: 2px 1px 15px rgba(0,0,0,0.3) " class=" close-cidades btn btn-danger rounded-circle">X</span> <br>
            <img src="assets/img/logo2.png" width="100px" alt="" style="margin-top: 1px">
           <input type="text" class="psq-cidade" style="border: 1.2px solid black; outline: none; border-radius: 30px; padding-left: 15px" placeholder="Pesquisar Cidade">
          <div class="text-muted last mt-0"> 
           End Header
            <?php if (isset($_COOKIE["CookieTeste"])) {
                echo 'Última pesquisa: ';
                echo $_COOKIE["CookieTeste"];
            } else {
            } ?>
        </div>
         <div class="resultado">
        </div> -->
    </div>



    <script>
        $(document).ready(function() {
            if ($(window).width() < 600) {
                $('.empresa-div').css('background', 'black');
            }
            $('.parceria').on('click', function() {
                $(window).scrollTop(0);
                $('.empresa-div').slideDown('slow');
                $('.calls').css('opacity', '0');
                $('body').css('overflow', 'hidden');
                $('.empresa-div').css('overflow-y', 'auto');
            })
            $('.parceria-fechar').on('click', function() {
                $('.empresa-div').slideUp('fast');
                $('body').css('overflow', 'auto');
                $('.calls').css('opacity', 'initial');
            })
            if ($('.last').text() == '') {
                $(this).hide();
            }
            $('.mobile-nav').css({
                'height': '350px',
                'margin-top': '30px',
            });

            $('.mobile-nav-toggle').css({
                'margin-top': '25px',
            });
            $('.pesquisa, .scrollmenu').on('click', function() {
                $('.container-cidades').slideDown('slow');
                $('.mobile-nav-toggle').hide();

            });
            $('.close-cidades').click(function() {
                $('.container-cidades').slideUp('slow');
                $('.mobile-nav-toggle').show('slow');
            });

        });
    </script>

    <!-- ======= Intro Section ======= -->
    <section id="intro" class="">
        <div class="intro-container">
            <div id="introCarousel" class="carousel slide carousel-fade" data-ride="carousel">

                <ol class="carousel-indicators"></ol>

                <div class="carousel-inner" role="listbox">

                    <div class="carousel-item active" style="background-color: yellow; background-image: url(assets/img/intro-carousel/1.png)">
                        <div class="carousel-container calls">
                            <div class="container " style="margin-bottom: 100px">
                                <h1 class=" display-5 text-white font-weight-bold text-shadow">
                                    O que você quiser <br> Onde Você estiver!
                                </h1>
                                <h3 class="mt-2 btn btn-light pesquisa">
                                    <i class="fas fa-search"></i> Escolha sua Cidade </h3> <br>

                                    <a href="https://appurl.io/y0_7FDR4j"><h3 style="font-size: 22px; text-align: center;" class="mt-3 btn btn-light baixar-app baixar">
                                    <a href="https://appurl.io/y0_7FDR4j" style="font-size: 22px; text-align: center; margin-right: 14px;" class="text-dark">Baixar o App</a> </h3></a>
                                <br>
                                <a href="https://appurl.io/y0_7FDR4j" style=" background: #fbff00; " class="btn-get-started mr-2 baixar  scrollto animate__animated animate__fadeInUp"><img width="150px" src="assets/img/gp.png" alt="Minha Figura"></a>
                                <a href="https://appurl.io/y0_7FDR4j" style=" background: #fbff00; " class="btn-get-started baixar scrollto animate__animated animate__fadeInUp"><img width="150px" src="assets/img/as.png" alt="Minha Figura"></a>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>

    <main id="main">
        <div class="scrollmenu pl-5">
            <a href="#home">Açaí</a>
            <a href="#news">Açougue</a>
            <a href="#contact">Bebidas</a>
            <a href="#about">Café</a>
            <a href="#support">Confeitarias</a>
            <a href="#blog">Cozinha Brasileira</a>
            <a href="#tools">Gelados</a>
            <a href="#base">Hambúrguer</a>
            <a href="#custom">Japonesa</a>
            <a href="#more">Lanches</a>
            <a href="#more">Mais...</a>
        </div>
        <section id="featured-services">
            <div class="container">
                <div class="row">

                    <div class="col-lg-4 box">
                        <i class="fas fa-mobile " style=" color: #fbff00; "></i>
                        <h4 class="title"><a href="">Peça</a></h4>
                        <p class="description">Escolha a empresa que quiser e peça rapidamente.</p>
                    </div>

                    <div class="border-left col-lg-4 box ">
                        <i class="ion-ios-stopwatch-outline" style=" color: #fbff00; "></i>
                        <h4 class="title"><a href="">Aguarde</a></h4>
                        <p class="description">Rapidamente seu pedido será aceito e você poderá acompanhar tudo pelo app.</p>
                    </div>

                    <div class="border-left col-lg-4 box">
                        <i class="ion-ios-heart-outline" style=" color: #fbff00; "></i>
                        <h4 class="title"><a href="">Receba</a></h4>
                        <p class="description">Receba no conforto da sua casa o seu pedido e aproveite o dia.</p>
                    </div>

                </div>
            </div>
        </section>
        <section id="about">
            <div class="container" data-aos="fade-up">

                <header style="text-align: center">
                    <h3 style="font-weight: bold;">Sobre nós</h3>
                    <p style="margin-bottom: 40px">Somos um aplicativo de delivery desenvolvido com propósito de facilitar a vida
                        de todos(as).</p>
                </header>

                <div class="row about-cols">
                    <div class="col-md-4 " data-aos="fade-up" data-aos-delay="100">
                        <div class="about-col">
                            <div class="img">
                                <img src="https://images.pexels.com/photos/3183183/pexels-photo-3183183.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="" class="img-fluid">
                                <div class="icon" style="background-color: yellow;"><i class="ion-ios-speedometer-outline text-dark"></i></div>
                            </div>
                            <h2 class="title"><a href="#">Nossa Missão</a></h2>
                            <p>
                                Desde o início nossa missão tem sido possibilitar e viabilizar o uso da tecnologia como um meio de transformação.
                            </p>
                        </div>
                    </div>

                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="about-col">
                            <div class="img">
                                <img src="https://images.pexels.com/photos/212286/pexels-photo-212286.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="" class="img-fluid">
                                <div class="icon" style="background-color: yellow;"><i class="ion-ios-list-outline text-dark"></i></div>
                            </div>
                            <h2 class="title"><a href="#">Nosso Plano</a></h2>
                            <p>
                                Quebrar barreiras e desbravar com garra cada etapa de desenvolvimento da empresa alcançando sempre um grau a mais de excelência.
                            </p>
                        </div>
                    </div>

                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                        <div class="about-col">
                            <div class="img">
                                <img src="https://images.pexels.com/photos/374016/pexels-photo-374016.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="" class="img-fluid">
                                <div class="icon" style="background-color: yellow;"><i class="ion-ios-eye-outline text-dark"></i></div>
                            </div>
                            <h2 class="title"><a href="#">Nossa Visão</a></h2>
                            <p>
                                Viver num mundo onde a inovação seja sempre a palavra chave a guiar cada decisão e momento das nossas vidas.
                            </p>
                        </div>
                    </div>

                </div>

            </div>
        </section>
        <section id="services">
            <div class="container" data-aos="fade-up">

                <header class="" style="text-align: center; margin-bottom: 70px">
                    <h3 class="font-weight-bold" style="color: black">Operamos com inteligência</h3>
                </header>

                <div class="row">
                    <div class="col-lg-4 col-md-6 box" data-aos="fade-up" data-aos-delay="400">
                        <div class="icon"><i style="color: black;" class="ion-ios-people-outline"></i></div>
                        <h4 class="title"><a href="" style=>Equipe</a></h4>
                        <p class="description">Contamos com uma equipe altamente capacitada para exercer com excelência cada função.</p>
                    </div>
                    <div class="col-lg-4 col-md-6 box" data-aos="fade-up" data-aos-delay="200">
                        <div class="icon"><i style="color: black;" class="ion-ios-speedometer-outline"></i></div>
                        <h4 class="title"><a href="">Desempenho</a></h4>
                        <p class="description">Fazemos uma análise e levantamento diário do desempenho exercido por cada membro da equipe o que nos possibilita evoluir.</p>
                    </div>
                    <div class="col-lg-4 col-md-6 box" data-aos="fade-up" data-aos-delay="100">
                        <div class="icon"><i style="color: black;" class="ion-ios-analytics-outline"></i></div>
                        <h4 class="title"><a href="">Resultados</a></h4>
                        <p class="description">Sabemos o que entregamos e a cada encerramento de período vemos que cada vez mais nossos resultados tem sido espetaculares</p>
                    </div>





                </div>

            </div>
        </section>

        <!-- Vendor JS Files -->
        <script src="assets/vendor/jquery/jquery.min.js"></script>
        <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
        <script src="assets/vendor/php-email-form/validate.js"></script>
        <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
        <script src="assets/vendor/counterup/counterup.min.js"></script>
        <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
        <script src="assets/vendor/venobox/venobox.min.js"></script>
        <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
        <script src="assets/vendor/aos/aos.js"></script>

        <script src="assets/js/main.js"></script>

</body>


<script>
    $(document).ready(function() {



        function buscar(palavra) {
            $.ajax({
                type: 'POST',
                dataType: 'html',
                url: 'busca.php',
                beforeSend: function() {
                    $('.texto').html('Carregando...');
                    $('.texto').html('');
                },
                data: {
                    palavra: palavra
                },
                success: function(msg) {
                    $('.resultado').html(msg);
                }
            });
        }

        function email(palavra) {
            $.ajax({
                type: 'POST',
                dataType: 'html',
                url: 'email.php',
                beforeSend: function() {
                    $('.sub').html('Carregando...');
                    $('.sub').html('');
                },
                data: {
                    palavra: palavra
                },
                success: function(msg) {
                    $('.resultado').html(msg);
                }
            });
        }

        $('.psq-cidade').on('input', function() {
            $('.last').hide();
            if ($('.psq-cidade').val() == '') {

            } else {
                buscar($('.psq-cidade').val())
            }

        });

    })
</script>
<section id="call-to-action" class="wow fadeIn" data-aos="fade-up">
    <div class="container text-center text-dark">
        <h3 class="" style="color: black">Seja um parceiro Vokerê!</h3>
        <p class="" style="color: black">Impulsione as vendas do seu negócio, entre pro nosso catálogo. </p>
        <a class="pt-1 pr-4 btn-lg pb-1 pl-4 btn-dark text-white parceria" style="font-size: 25px; border-radius: 20px" href="#">Quero ser um parceiro</a>
    </div>
</section>

<footer id="footer" data-aos="fade-up">
    <div class="footer-top">
        <div class="container">
            <div class="row base">

                <div class="col-lg-3 col-md-6 footer-info">
                    <a href="index.php" class="logo mr-auto"><img src="assets/img/logo.png" width="200px" alt="" class="img-fluid"></a>
                    <p>O que você quiser, <br>Onde Você estiver.</p>
                </div>


                <div class="col-lg-3 col-md-6 footer-contact">
                    <span style="font-size: 22px">Contate-nos</span>
                    <p>
                        <strong>Contato:</strong> 3541-9309<br>
                    </p>

                    <div class="social-links">
                        <a href="https://www.facebook.com/vokereofc" class="facebook"><i class="fa fa-facebook"></i></a>
                        <a href="https://www.instagram.com/vokereofc/" class="instagram"><i class="fa fa-instagram"></i></a>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <div class="container">
        <div class="copyright">
            &copy; Copyright <strong>Vokerê</strong>. Todos os direitos reservados
</div>
        <div class="credits">
            
            <a href="" class="text-warning">Alcance</a>
        </div>
    </div>
</footer>
</div>

</html>