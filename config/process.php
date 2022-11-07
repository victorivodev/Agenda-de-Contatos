<?php

    session_start();

    include_once("connection.php");
    include_once("url.php");

    $data = $_POST;

    //Modificações no banco
    if(!empty($data)) {

        //Criar contato
         if($data["type"] === "create"){
            
            $nome = $data["nome"];
            $fone = $data["fone"];
            $observations = $data["observations"];

            $query = "INSERT INTO contacts (nome, fone, observations) VALUES (:nome, :fone, :observations)";

            $stmt = $conn->prepare($query);

            $stmt->bindParam(":nome", $nome);
            $stmt->bindParam(":fone", $fone);
            $stmt->bindParam(":observations", $observations);

            try {

               $stmt->execute();
               $_SESSION["msg"] = "Contato criado com sucesso";
        
            } catch (PDOException $e) {
                //erro na conexão
                $error = $e->getMessage();
                echo "Erro: $error";
            }

        }   else if($data["type"] === "edit"){
            $nome = $data["nome"];
            $fone = $data["fone"];
            $observations = $data["observations"];
            $id = $data["id"];

            $query = "UPDATE contacts
            SET nome = :nome, fone = :fone, observations = :observations
            WHERE id = :id";

            $stmt = $conn->prepare($query);

            $stmt->bindParam(":nome", $nome);
            $stmt->bindParam(":fone", $fone);
            $stmt->bindParam(":observations", $observations);
            $stmt->bindParam(":id", $id);

            try {

                $stmt->execute();
                $_SESSION["msg"] = "Contato atualizado com sucesso!";
         
             } catch (PDOException $e) {
                 //erro na conexão
                 $error = $e->getMessage();
                 echo "Erro: $error";
             }
        } else if ($data["type"] === "delete") {

            $id = $data["id"];

            $query = "DELETE FROM contacts WHERE id = :id";

            $stmt = $conn->prepare($query);

            $stmt->bindParam(":id", $id);

            try {

                $stmt->execute();
                $_SESSION["msg"] = "Contato removido com sucesso!";
         
             } catch (PDOException $e) {
                 //erro na conexão
                 $error = $e->getMessage();
                 echo "Erro: $error";
             }
        }
     

    //Redirect home
    header("Location:" . $BASE_URL . "../templates/index.php");

    //Seleção de dados
     } else {

        $id;

        if(!empty($_GET)){
            $id = $_GET["id"];
        }
    
        // Retorna o dado de um contato
        if(!empty($id)) {
            $query = "SELECT * FROM contacts WHERE id= :id";
    
            $stmt = $conn->prepare($query);
    
            $stmt->bindParam(":id", $id);
    
            $stmt->execute();
    
            $contacts = $stmt->fetch();
        } else {
        
    
    
        // Retorna o dado todos os contatos
    
        $contacts = [];
    
        $query = "SELECT * FROM contacts";
    
        $stmt = $conn->prepare($query);
    
        $stmt->execute();
    
        $contacts = $stmt->fetchAll();
        }
    }
    
    //Fechar conexão

    $conn = null;

   