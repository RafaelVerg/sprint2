<?php

  session_start();

  include_once("connection.php");
  include_once("url.php");

  $data = $_POST;

  // MODIFICAÇÕES NO BANCO
  if(!empty($data)) {

    // Criar contato
    if($data["type"] === "create") {

      $nome = $data["nome"];
      $tipo = $data["tipo"];
      $observacoes = $data["observacoes"];

      $query = "INSERT INTO Animal (nome, tipo, observacoes) VALUES (:nome, :tipo, :observacoes)";

      $stmt = $conn->prepare($query);

      $stmt->bindParam(":nome", $nome);
      $stmt->bindParam(":tipo", $tipo);
      $stmt->bindParam(":observacoes", $observacoes);

      try {

        $stmt->execute();
        $_SESSION["msg"] = "Contato criado com sucesso!";
    
      } catch(PDOException $e) {
        // erro na conexão
        $error = $e->getMessage();
        echo "Erro: $error";
      }

    } else if($data["type"] === "edit") {

      $nome = $data["nome"];
      $tipo = $data["tipo"];
      $observacoes = $data["observacoes"];
      $id = $data["id"];

      $query = "UPDATE animal 
                SET Nome = :nome, Tipo = :tipo, Observacoes = :observacoes 
                WHERE CodAnimal = :id";

      $stmt = $conn->prepare($query);

      $stmt->bindParam(":nome", $nome);
      $stmt->bindParam(":tipo", $tipo);
      $stmt->bindParam(":observacoes", $observacoes);
      $stmt->bindParam(":id", $id);

      try {

        $stmt->execute();
        $_SESSION["msg"] = "Contato atualizado com sucesso!";
    
      } catch(PDOException $e) {
        // erro na conexão
        $error = $e->getMessage();
        echo "Erro: $error";
      }

    } else if($data["type"] === "delete") {

      $id = $data["id"];

      $query = "DELETE FROM Animal WHERE CodAnimal = :id";

      $stmt = $conn->prepare($query);

      $stmt->bindParam(":id", $id);
      
      try {

        $stmt->execute();
        $_SESSION["msg"] = "Contato removido com sucesso!";
    
      } catch(PDOException $e) {
        // erro na conexão
        $error = $e->getMessage();
        echo "Erro: $error";
      }

    }

    // Redirect HOME
    header("Location:" . $BASE_URL . "../index.php");

  // SELEÇÃO DE DADOS
  } else {
    
    $id;

    if(!empty($_GET)) {
      $id = $_GET["id"];
    }

    // Retorna o dado de um contato
    if(!empty($id)) {

      $query = "SELECT * FROM Animal WHERE CodAnimal = :id";

      $stmt = $conn->prepare($query);

      $stmt->bindParam(":id", $id);

      $stmt->execute();

      $animal = $stmt->fetch();

    } else {

      // Retorna todos os contatos
      $animais = [];

      $query = "SELECT * FROM Animal";

      $stmt = $conn->prepare($query);

      $stmt->execute();
      
      $animais = $stmt->fetchAll();

    }

  }

  // FECHAR CONEXÃO
  $conn = null;