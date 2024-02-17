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
        <h2>Inventário das Máquinas</h2>
        <br>
                <a class="btn btn-primary" href="/fornecedores/create.php" role="button">Novo Inventário</a>
                <br>
                <br>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Patrimônio</th>
                            <th>Descrição</th>
                            <th>Setor</th>
                            <th>Ticket-Protocolo</th>
                            <th>Entrada</th>
                            <th>Saída</th>
                            <th>Nome</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $database = "Inventario";

                        // Criar a conexão
                        $connection = new mysqli($servername, $username, $password, $database);

                        // Verifique a conexão
                        if ($connection->connect_error) {
                            die("Conexão Falhou! #" . $connection->connect_error);
                        }

                        //Leia todas as linhas da tabela do banco de dados
                        $sql = "SELECT * FROM Maquinas";
                        $result = $connection->query($sql);

                        if (!$result) {
                            die("Query Inválida:" . $connection->error);
                        }

                        // Leia data de cada linha
                        while($row = $result->fetch_assoc()) {
                            echo "
                            <tr>
                                <td>{$row['Patrimonio']}</td>
                                <td>{$row['Descricao']}</td>
                                <td>{$row['Setor']}</td>
                                <td>{$row['Ticket_Protocolo']}</td>
                                <td>{$row['Entrada']}</td>
                                <td>{$row['Saida']}</td>
                                <td>{$row['Nome']}</td>
                                <td>
                                    <a class='btn btn-primary' href='/fornecedores/edit.php?id={$row['ID']}'>Editar</a>
                                    <a class='btn btn-primary btn-danger' href='/fornecedores/delete.php?id={$row['ID']}'>Deletar</a>
                                </td>
                            </tr>
                            ";                                
                        }
                        ?>
                    </tbody>
                </table>
    </div>
</body>

</html>