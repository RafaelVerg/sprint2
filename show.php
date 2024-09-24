<?php
  include_once("templates/header.php");
?>
  <div class="container" id="view-contact-container"> 
    <?php include_once("templates/backbtn.html"); ?>
    <h1 id="main-title"><?= $animal["Nome"] ?></h1>
    <p class="bold">Tipo:</p>
    <p class="form-control"><?= $animal["Tipo"] ?></p>
    <p class="bold">Observações:</p>
    <textarea type="text" class="form-control" id="observacoes" name="observacoes" rows="3"><?= $animal['Observacoes'] ?></textarea>
  </div>
<?php
  include_once("templates/footer.php");
?>
