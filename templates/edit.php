<?php
    include_once("header.php");
?>

    <div class="container">
    <?php include_once("backbtn.html"); ?>
        <h1 id="main-title">Editar Contato</h1>
        <form id="edit-form" action="<?= $BASE_URL ?>../config/process.php" method="POST">
            <input type="hidden" name="type" value="edit">
            <input type="hidden" name="id" value="<?=$contacts["id"]?>">
            <div class="form-control">
                <label for="nome">Nome do Contato:</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o nome" value="<?=$contacts["nome"]?>"required>
            </div>
            <div class="form-group">
                <label for="fone">Nome do Contato:</label>
                <input type="text" class="form-control" id="fone" name="fone" placeholder="Digite o telefone"  value="<?=$contacts["fone"]?>" required>
            </div>
            <div class="form-group">
                <label for="observations">Observações:</label>
                <textarea type="text-area" class="form-control" id="observations" name="observations" rows="3"  value="<?=$contacts["observations"]?>"></textarea> 
            </div>
            <button type="submit" class="btn btn-primary">Atualizar</button>
        </form>
    </div>

<?php
    include_once("footer.php");
?>