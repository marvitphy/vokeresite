<?php


include('config.php');

$p = $_GET['cidade'];
if ($p == '') {
  header('location: index.php');
}

$sql = mysqli_query($conn, "SELECT * FROM restaurantes WHERE cidade = '$p' order by nome ");
$qtd = mysqli_num_rows($sql);


$value = $_GET['cidade'];

setcookie("CookieTeste", $value);
setcookie("CookieTeste", $value, time() + 3600);



?>


<!DOCTYPE html>
<html lang="pt">

<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>BizPage Bootstrap Template</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
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


  <link href="assets/css/style.css" rel="stylesheet">
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

    .card {
      transition: 0.4s;
    }

    .card:hover {

      box-shadow: 1px 4px 25px gray;

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
      overflow: auto;
      white-space: nowrap;
      scrollbar-width: thin;
      margin-top: 10px;
      margin-bottom: 20px;
      width: 100%;
    }

    div.scrollmenu a {
      display: inline-block;
      font-weight: 500;
      color: white;
      background-color: gray;
      border-radius: 30px;
      text-align: center;
      padding-left: 14px;
      padding-right: 14px;
      padding-top: 5px;
      padding-bottom: 5px;
      text-decoration: none;
    }

    div.scrollmenu a:hover {
      background-color: black;
    }

    .card_empresa{
      background-color:rgb(32, 32, 32);
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

      .card-columns {
        -webkit-column-count: 2;
        -moz-column-count: 2;
        column-count: 2;

      }

      .pesquisa {
        width: 100%;
        left: 0;
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
      max-width: 350px;
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
      overflow: auto;
    }
  </style>

</head>

<body>


  <script>
    $(document).ready(function() {
      $('.mobile-nav').css({
        'height': '350px',
        'margin-top': '30px',
      });

      $('.mobile-nav-toggle').css({
        'margin-top': '25px',
      });
      $('.pesquisa').on('click', function() {
        $('.container-cidades').slideDown('slow');
        $('.mobile-nav-toggle').hide();

      });
      $('.close-cidades').click(function() {
        $('.container-cidades').slideUp('slow');
        $('.mobile-nav-toggle').show('slow');
      });
    });
  </script>
  <header id="header" class="fixed-top bg-dark" style="z-index: 60">
    <div class="container-fluid">

      <div class="row justify-content-center">
        <div class="col-xl-11 d-flex align-items-center">

          <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" width="70px" alt="" class="img-fluid"></a>

          <nav class="nav-menu d-none d-lg-block ">
            <ul class="text-warning">
              <li class="active"><a href="index.php" class="text-warning ">Início</a></li>
              <li><a href="" class="">Baixar o App</a></li>
              <li><a href="#services" class="">Seja um entregador</a></li>
              <li><a href="" class="">Sobre</a></li>
              <li><a href="#team" class="">Ajuda</a></li>
              <li><a href="#team" style="border-radius: 20px; padding: 6px 18px 6px 18px" class="btn-warning  text-white text-dark">Criar Conta</a></li>
              <li><a href="#team" style="border-radius: 20px; padding: 6px 18px 6px 18px" class="btn-warning  text-white text-dark">Entrar</a></li>

            </ul>
          </nav><!-- .nav-menu -->
        </div>
      </div>

    </div>
  </header><!-- End Header -->
  <main id="main" style="margin-top: 130px; ">
    <h3 class=" pl-3 pb-3 border-secondary border-bottom">Estabelecimentos em: <small class="text-dark rounded p-2 bg-warning sm"><?php echo $_GET["cidade"]; ?></small>
      <div class="spinner-border d-none" role="status">
        <span class="sr-only">Loading...</span>
      </div>
    </h3>
    <div class="scrollmenu pl-3 cat">
      <a href="" class="a">Açaí</a>
      <a href="" class="a">Açougue</a>
      <a href="" class="a">Bebidas</a>
      <a href="" class="a">Pizza</a>
      <a href="" class="a">Confeitarias</a>
      <a href="" class="a">Comida Brasileira</a>
      <a href="" class="a">Gelados</a>
      <a href="" class="a">Hambúrguer</a>
      <a href=" " class="a">Japonesa</a>
      <a href="" class="a">Lanches</a>
      <a href="" class="a">Mais...</a>
    </div>

    <div class="cidade">
      <div class="container-fluid">
        <div id="em" class="row flex-row">


        </div>
      </div>

    </div>
  </main>


  <!-- <div id="preloader"></div> -->


</body>


<script>
  $(document).ready(function() {

    $.ajax({
      url: "https://api.euvokere.com.br/api/v1/empresas/destaquesLl",
      dataType: '',
      success: function(response) {
        console.log(response)
        for(var i = 0; i < response.data.length ; i++){
          var nome = response.data[i].nome.trim()
          var logo = response.data[i].logo
          var descricao = response.data[i].descricao
          var id = response.data[i].id
          if(descricao == null){
            descricao = '';
          }

          
          $('#em').append('<div class="col-lg-3 card-empresa"><div class="card card-block"><div class="card-header" style="height: 250px;  background-position: center; background-size: cover;background-image: url(' + logo + ')"></div> <div class="card-body"> <h5 class="card-title" style="font-weight: 500; color: black">' + nome +'</h5><p class="card-text">'+ descricao+ '</p><p class="card-text"><a href="cardapio.php?id='+id+'&nome='+nome.toLowerCase()+'" class="text-white ml-2 btn btn-success " style="padding: 1px 10px 1px 10px; border-radius: 30px">Acessar Cardápio</a></p></div></div></div>');
          

        }
        
        

      }
    });

    function buscar(categoria, cidade) {
      $.ajax({
        type: 'POST',
        dataType: 'html',
        url: 'filtro.php',
        beforeSend: function() {
          $('.spinner-border').removeClass('d-none');

        },
        data: {
          categoria: categoria,
          cidade: cidade
        },
        success: function(msg) {

          $('.cidade').show('slow')
          $('.cidade').html(msg);
          $('.spinner-border').addClass('d-none');
        }
      });
    }

    $('.a').on('click', function() {
      $('.a').css('background-color', 'gray');
      $(this).css('background-color', 'black')
      var categoria = $(this).text();
      console.log(categoria)
      var cidade = '<?php echo $_GET['cidade']; ?>';
      buscar(categoria, cidade);

    });



  })
</script>


</html>