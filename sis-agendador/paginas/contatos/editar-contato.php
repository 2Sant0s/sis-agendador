<?php
// recuperando id do usuário
$idContato = $_GET["idContato"];

$sql = "SELECT * FROM tbcontatos WHERE idContato = {$idContato}";
$rs = mysqli_query($conexao, $sql) or die("Erro ao recuperar os dados do registro" . mysqli_error($conexao));
$dados = mysqli_fetch_assoc($rs);
?>

<header>
    <h3 class="mt-3"><i class="bi bi-pen"></i> Editar Contato</h3>
</header>
<div class="row">
<div class="col-6">
    <!-- diminuir input do ID -->
    <form class="needs-validation" action="index.php?menuop=atualizar-contato" method="post" novalidate>
        <div class="mb-3">
            <label for="idContato">ID</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-key"></i></span>
                <input class="form-control" type="text" name="idContato" id="idContato" value="<?=$dados["idContato"] ?>"readonly>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label" for="nomeContato">Nome</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-person-video2"></i></span>
                <input class="form-control" type="text" name="nomeContato" id="nomeContato" value="<?=$dados["nomeContato"] ?>" required>
                <div class="valid-feedback"></div>
                <div class="invalid-feedback">Campo Obrigatório!</div>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label" for="emailContato">Email</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                <input class="form-control" type="email" name="emailContato" id="emailContato" value="<?=$dados["emailContato"] ?>" required>
                <div class="valid-feedback"></div>
                <div class="invalid-feedback">Campo Obrigatório!</div>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label" for="telefoneContato">Telefone</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-telephone-fill"></i></span>
                <input class="form-control" type="number" name="telefoneContato" id="telefoneContato" value="<?=$dados["telefoneContato"] ?>" required>
                <div class="valid-feedback"> </div>
                <div class="invalid-feedback">Campo Obrigatório!</div>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label" for="enderecoContato">Endereço</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-mailbox2"></i></span>
                <input class="form-control" type="text" name="enderecoContato" id="enderecoContato" value="<?=$dados["enderecoContato"] ?>" required>
                <div class="valid-feedback"></div>
                <div class="invalid-feedback">Campo Obrigatório!</div>
            </div>
        </div>
        <!-- copiar x -->
                <div class="row">
                    <div class="mb-3">
                        <label class="form-label" for="sexoContato">Sexo</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-gender-ambiguous"></i></span>
                            <select class="form-control" name="sexoContato" id="sexoContato" required>
                                <option <?php echo ($dados['sexoContato'] == '')? 'selected':  '' ?> value="">Selecione o gênero</option>
                                <option <?php echo ($dados['sexoContato'] == 'M')? 'selected': '' ?>value="M">Masculino</option>
                                <option <?php echo ($dados['sexoContato'] == 'F')? 'selected': '' ?> value="F">Feminino</option>
                                <option value="O">Outros</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3 ">
                        <label class="form-label" for="dataNasciContato">Data Nascimento</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-calendar-check"></i></span>
                            <input class="form-control" type="date" name="dataNasciContato" id="dataNasciContato" value="<?=$dados["dataNasciContato"] ?>" required>
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback">Campo Obrigatório!</div>
                        </div>
                    </div>
                    </div>
        <div>
            <input class="btn btn-warning" type="submit" value="Atualizar" name="btnAtualizar">
        </div>
    </form>
</div>
<div class="col-6">
    <?php

    if($dados["nomeFotoContato"] == "" || !file_exists('./paginas/contatos/fotos-contatos/'. $dados["nomeFotoContato"])) {
        $nomeFotoContato = "SemFoto.jpg";
    } else {
        $nomeFotoContato = $dados["nomeFotoContato"];
    }

    ?>
    <div class="mb-3">
        <img class="img-fluid img-thumbnail" width="400" src="./paginas/contatos/fotos-contatos/<?=$nomeFotoContato?>" alt="Foto do Contato">
    </div>
    <button class="btn btn-info" id="btn-editar-foto">
        <i class="bi bi-camera-fill"></i> Editar Foto
    </button>
    <div id="editar-foto">
    <form id="form-upload-foto" class="mb-3" action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="idContato" value="<?=$idContato?>">
                    <label class="form-label" for="arquivo">Selecione um arquivo de imagem da foto</label>
                    <div class="input-group">
                        <input class="form-control" type="file" name="arquivo" id="arquivo">
                        <input id="btn-enviar-foto" class="btn btn-secondary" type="submit" value="Enviar">
                    </div>
            </form>
            <div id="mensagem" class="mb alert alert-success">
                Mensagem aqui.
            </div>
            <div id="preloader"class="progress">
                <div id="barra" class="progress-bar bg-danger" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
    </div>
               
</div>
</div>
