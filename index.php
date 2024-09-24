<?php
  include_once("templates/header.php");
?>
  <div class="container">
    <?php if(isset($printMsg) && $printMsg != ''): ?>
      <p id="msg"><?= $printMsg ?></p>
    <?php endif; ?>
    <h1 id="main-title">Ficha de cadastro</h1>
    <?php if(count($animais) > 0): ?>
      <table class="table" id="contacts-table">
        <thead>
          <tr style="background-color: #4AB8CC;">
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Tipo</th>
            <th scope="col">Observação</th>
            <th scope="col">Controle</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($animais as $animal): ?>
            <tr>
              <td scope="row" class="col-id"><?= $animal["CodAnimal"] ?></td>
              <td scope="row"><?= $animal["Nome"] ?></td>
              <td scope="row"><?= $animal["Tipo"] ?></td>
              <td scope="row"><?= $animal["Observacoes"] ?></td>
              <td class="actions">
                <a href="<?= $BASE_URL ?>show.php?id=<?= $animal["CodAnimal"] ?>"><i class="fas fa-eye check-icon"></i></a>
                <a href="<?= $BASE_URL ?>edit.php?id=<?= $animal["CodAnimal"] ?>"><i class="far fa-edit edit-icon"></i></a>
                <form class="delete-form" action="<?= $BASE_URL ?>/config/process.php" method="POST">
                  <input type="hidden" name="type" value="delete">
                  <input type="hidden" name="id" value="<?= $animal["CodAnimal"] ?>">
                  <button type="submit" class="delete-btn"><i class="fas fa-times delete-icon"></i></button>
                </form>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    <?php else: ?>  
      <p id="empty-list-text">Ainda não há contatos na sua agenda, <a href="<?= $BASE_URL ?>create.php">clique aqui para adicionar</a>.</p>
    <?php endif; ?>
  </div>
<?php
  include_once("templates/footer.php");
?>
