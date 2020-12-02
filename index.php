<?php
include ('banco.php');
include('assets/php/apoio.php');
$pdo = Banco::conectar();
$sql = 'SELECT * FROM destinatario ORDER BY nome';
                       
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <title>CRUD de Destinatario</title>
</head>

<body>
        <div class="container">
          
            <div class="card-header">
                <h3 class="well">CRUD de Destinatario</h3>
            </div>
            <div class="row">
                <p>
                    <a href="destinatario_create.php" class="btn btn-success">Novo Destinatario</a>
                    &nbsp;&nbsp;&nbsp;
                    <a href="rastreio_lista.php" class="btn btn-info">Lista de Rastreio</a>

                </p>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Celular</th>
                            <th scope="col">Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach($pdo->query($sql)as $row)
                        {
                            echo '<tr>';
			                      echo '<th scope="row">'. $row['id'] . '</th>';
                            echo '<td>'. $row['nome'] . '</td>';
                            echo '<td>'. mascara_telefone($row['celular']) . '</td>';
                            echo '<td width=250>';
                            echo '<a class="btn btn-warning" href="destinatario_update.php?id='.$row['id'].'">Editar</a>';
                            echo ' ';
                            echo '<a class="btn btn-danger" href="destinatario_delete.php?id='.$row['id'].'">Excluir</a>';
                            echo '</td>';
                            echo '</tr>';
                        }
                        Banco::desconectar();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="assets/js/bootstrap.min.js"></script>
</body>

</html>
