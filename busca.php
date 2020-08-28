<?php header('Content-Type: text/html; charset=utf-8'); ?>
<?php

include('config.php');

$p = $_POST['palavra'];

$sql = mysqli_query($conn, "SELECT * FROM cidades WHERE nome LIKE '%$p%'");
$qtd = mysqli_num_rows($sql);
?>

<?php

if ($qtd > 0) {
?>


  <div class="list-group">
    <button style="font-weight: 500" type="button" class="list-group-item list-group-item-action text-dark bg-warning">
      Cidades
    </button>
    <?php while ($dados = mysqli_fetch_array($sql)) { ?>

      <div class="list-group-item list-group-item-action cidade-button" style="transition: 0.3s; cursor: pointer"><i class="fas fa-city"></i> <span class="btn-nome"><?php echo $dados['nome']; ?></span></div>

    <?php } ?>
  </div>


  <!-- 
<table class="table">
  <thead>
    <tr>
      <th scope="col">Cidades</th>
    </tr>
  </thead>
  <tbody>
  <?php while ($dados = mysqli_fetch_array($sql)) { ?>

    <tr>
      <td><?php echo $dados['nome']; ?></td>
    </tr>

    <?php } ?>
  </tbody>
</table>
  -->

<?php } else { ?>


  <span class="btn btn-block btn-danger">Nenhum Resultado</span>

<?php } ?>





<script>
  $(document).ready(function() {
    $('.cidade-button').on('click', function() {

      window.location.href = 'cidade.php?cidade=' + $(this).text().trim();
    });
  })
</script>