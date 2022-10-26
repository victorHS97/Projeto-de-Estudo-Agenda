<?php
include_once('templates/header.php')
?>
 <div class="container" id="view-contact-container">
    <?php include_once ("templates/backbtn.html")?>
    <h1 id="main-title"><?= $contact['name']?></h1>
    <p class="bold">Telefone:</p>
    <p></p> <?= $contact['number']?></p>
    <p class="bold">Descrição:</p>
    <p><?= $contact['description']?></p>
 </div>
<?php
include_once('templates/footer.php')
?>