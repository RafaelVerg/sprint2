<?php
  include_once("templates/header.php");
?>
  <div class="container">
    <?php include_once("templates/backbtn.html"); ?>
    <h1 id="main-title">Criar contato</h1>
    <form id="create-form" action="<?= $BASE_URL ?>config/process.php" method="POST">
      <input type="hidden" name="type" value="create">
      <div class="form-group">
        <label for="nome">Nome do bicho:</label>
        <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o nome do bicho" required>
      </div>
      <div class="form-group">
        <label for="tipo">Tipo do bicho:</label>
        <input type="text" class="form-control" id="tipo" name="tipo" placeholder="Digite o tipo do bicho..." required>
      </div>
      <div class="form-group">
        <label for="observacoes">Observações:</label>
        <textarea type="text" class="form-control" id="observacoes" name="observacoes" placeholder="Insira as observações" rows="3"></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
  </div>
<?php
  include_once("templates/footer.php");
?>
