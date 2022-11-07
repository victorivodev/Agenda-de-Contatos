<?php
    include_once("header.php");
?>

<div class="container" id="view-contact-container">
    <?php include_once("backbtn.html"); ?>
    <h1 id="main-title"><?= $contacts["nome"] ?></h1>
    <p class="bold">Telefone:</p>
    <p><?= $contacts["fone"] ?></p>
    <p class="bold">Observações:</p>
    <p><?= $contacts["observations"] ?></p>
</div>

<?php
    include_once("footer.php");
?>