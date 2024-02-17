<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "Inventario";

// Criar a conexão
$connection = new mysqli($servername, $username, $password, $database);

$patrimonio = "";
$descricao = "";
$setor = "";
$ticketProtocolo = "";
$entrada = "";
$saida = "";
$nome = "";


$mensagemErro = "";
$mensagemSucesso = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $patrimonio = $_POST["patrimonio"];
    $descricao = $_POST["descricao"];
    $setor = $_POST["setor"];
    $ticketProtocolo = $_POST["ticketProtocolo"];
    $entrada = $_POST["entrada"];
    $saida = $_POST["saida"];
    $nome = $_POST["nome"];


    do {
        if (empty($patrimônio) || empty($descrição) || empty($setor) || empty($ticketProtocolo) || empty($entrada) || empty($saida) || empty($nome)) {
            $mensagemErro = "Os campos estão vazios!";
            break;
        }

        //Adicionando novo fornecedor ao banco de dados

        $sql = "INSERT INTO Maquina (patrimonio, descricao, setor, ticketProtocolo, entrada, saida, nome) 
                VALUES ('$patrimonio', '$descricao', '$setor', '$ticketProtocolo', '$entrada', '$saida', '$nome')";

        $result = $connection->query($sql);

        if (!$result) {
            $mensagemErro = "Consulta inválida: " . $connection->error;
            break;
        }

        $patrimonio = "";
        $descricao = "";
        $setor = "";
        $ticketProtocolo = "";
        $entrada = "";
        $saida = "";
        $nome = "";

        $mensagemSucesso = "Máquina cadastrada com sucesso!";

        header("location: /fornecedores/index.php");
        exit;

    } while (false);
}
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PCP</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container my-5">
        <h2>Novo Inventário </h2>
        <br>

        <?php
        if (!empty($mensagemErro)) {
            echo "
           <div class='alert alert-warning alert-dismissible fade show' role='alert'>
             <strong>$mensagemErro</strong>
             <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='close'></button>
           </div>
           ";
        }
        ?>

        <form method="post">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Patrimônio</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="patrimonio" value="<?php echo $patrimonio; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Descrição</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="descricao" value="<?php echo $descricao; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Setor</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="setor" value="<?php echo $setor; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Ticket/Protocolo</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="ticketProtocolo" value="<?php echo $ticketProtocolo; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Entrada</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="entrada" value="<?php echo $entrada; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Saída</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="saida" value="<?php echo $saida; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Nome</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="nome" value="<?php echo $nome; ?>">
                </div>
            </div>

            <?php
            if (!empty($mensagemSucesso)) {
                echo "
                  <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                  <strong>$mensagemSucesso</strong>
                  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='close'></button>
                  </div>                
                  ";
            }
            ?>

            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="http://localhost:81/fornecedores/index.php" role="button">Cancelar</a>
                 </div>
            </div>
        </form>
    </div>
</body>

</html>