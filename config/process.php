<?php

include_once "(conection.php)";
include_once "(url.php)";

$query = "SELECT * FROM contacts";

$stmt = $conn->prepare($query);

$stmt->execute();

$contacts = $stmt->fetchAll(); 

