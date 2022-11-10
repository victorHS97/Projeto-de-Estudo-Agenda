<?php

session_start();



include_once ("conection.php");
include_once ("url.php");

$data = $_POST;

//CRIAR CONTATO
if(!empty($data)){

    if($data["type"] === 'create'){

    
        $name = $data['name'];
        $telefone = $data['phone'];
        $description = $data['description'];
    
        $query = "INSERT INTO contacts (name,number,description) VALUES (:name, :number, :description)";
    
        $stmt = $conn->prepare($query);
    
        $stmt->bindParam("name", $name);
        $stmt->bindParam("number", $telefone);
        $stmt->bindParam("description", $description);
    
        try {
    
            $stmt->execute();
            $_SESSION["msg"] = "Contato criado com sucesso!";
        
        }  catch(PDOException $e){
            //erro na conexão
        $error = $e->getMessage();
        echo "error: " . $error;
        }
    }
        // REDIRECIONA PARA A HOME
        header("location:". $BASE_URL . "../index.php");

        //SELÇÃO DE DAdOS
    }

    else {
        if(!empty($_GET)){
          $id = $_GET["id"];
        }

        //RETORNA APENAS UM CONTATO
        if(!empty($id)){
            $query = "SELECT * FROM contacts WHERE id = :id";
        
            $stmt = $conn->prepare($query);
        
            $stmt->bindParam(":id",$id);
        
            $stmt->execute();
        
            $contact = $stmt->fetch();
        } else {
        // RETORNA TODOS OS CONTATOS
        $query = "SELECT * FROM contacts";
        
        $stmt = $conn->prepare($query);
        
        $stmt->execute();
        
        $contacts = $stmt->fetchAll(); 
    }
    
    }







