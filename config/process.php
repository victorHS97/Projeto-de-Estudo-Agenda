<?php

session_start();

$contacts = [];

include_once ("conection.php");
include_once ("url.php");


//RETORNA APENAS UM CONTATO

if(!empty($_GET)){
    $id = $_GET["id"];

}

if(!empty($id)){

    $query = "SELECT * FROM contacts WHERE id = :id";

    $stmt = $conn->prepare($query);

    $stmt->bindParam(":id",$id);

    $stmt->execute();

    $contact = $stmt->fetch();
}


// RETORNA TODOS OS CONTATOS
$query = "SELECT * FROM contacts";

$stmt = $conn->prepare($query);

$stmt->execute();

$contacts = $stmt->fetchAll(); 

