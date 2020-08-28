<?php header('Content-Type: text/html; charset=utf-8'); ?>
<?php

include('config.php');

$p = $_POST['categoria'];
$c = $_POST['cidade'];

$sql = mysqli_query($conn, "SELECT * FROM restaurantes WHERE categoria LIKE '%$p%' and cidade = '$c'");
$qtd = mysqli_num_rows($sql);
?>

<?php

if ($qtd > 0) {
?>

  <div class="container-fluid">
    <div class="row flex-row ">

      <?php while ($dados = mysqli_fetch_array($sql)) { ?>

        <?php if ($dados['status'] == 0) { ?>
          <div class="col-lg-3 card-empresa">
            <div class="card card-block">
              <div class="card-header" style="height: 250px; background-size: cover;background-image: url(<?php echo $dados['img']; ?>)"></div>
              <div class="card-body">
                <h5 class="card-title" style="font-weight: 500; color: black"><?php echo $dados['nome']; ?></h5>
                <p class="card-text"><?php echo $dados['descricao']; ?></p>
                <p class="card-text"><small class="btn btn-danger cat-name" style="padding: 1px 10px 1px 10px; border-radius: 30px"><?php echo $dados['categoria']; ?>&nbsp;</small><small class="ml-2 btn btn-success " style="padding: 1px 10px 1px 10px; border-radius: 30px">Acessar Cardápio</small></p>
              </div>
            </div>
          </div>
        <?php } else { ?>

          <div class="col-lg-3" style="opacity: 60%">
            <div class="card card-block">
              <div class="card-header" style="height: 250px; background-size: cover;background-image: url(<?php echo $dados['img']; ?>)"></div>
              <div class="card-body dados">
                <h5 class="card-title" style="font-weight: 500; color: black"><?php echo $dados['nome']; ?></h5>
                <p class="card-text"><?php echo $dados['descricao']; ?></p>
                <p class="card-text"><small class="btn btn-danger cat-name" style="padding: 1px 10px 1px 10px; border-radius: 30px"><?php echo $dados['categoria']; ?>&nbsp;</small><small class="ml-2 btn btn-dark " style=" padding: 1px 10px 1px 10px; border-radius: 30px">Fechado</small></p>
              </div>
            </div>
          </div>

      <?php }
      } ?>

    </div>
  </div>
<?php } else { ?>

  <div style="width: 100%; height: 100%; text-align: center;">

    <span class="btn btn-sm w-50 mr-auto ml-0 mr-auto justify-content-center btn-danger">Nenhum Resultado</span>

  </div>


<?php } ?>





<script>
  $(document).ready(function() {
    $('.btn-nome').on('click', function() {
      window.location.href = 'cidade.php?cidade=' + $(this).text();
    });
  })
</script>