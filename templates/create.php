<?php
    include_once("header.php");
?>

    <div class="container">
    <?php include_once("backbtn.html"); ?>
        <h1 id="main-title">Adicionar Contato</h1>
        <form id="create-form" action="<?= $BASE_URL ?>../config/process.php" method="POST">
            <input type="hidden" name="type" value="create">
            <div class="form-group">
                <label for="name">Nome do Contato:</label>
                <input type="text" class="form-control" id="name" name="nome" placeholder="Digite o nome" required>
            </div>
            <div class="form-group">
                <label for="fone">Nome do Contato:</label>
                <input type="text" class="form-control" id="fone" name="fone" placeholder="Digite o telefone" required>
            </div>
            <div class="form-group">
                <label for="observations">Observações:</label>
                <textarea type="text-area" class="form-control" id="observations" name="observations" rows="3"></textarea> 
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar Contato</button>
        </form>
    </div>

<?php
    include_once("footer.php");
?>