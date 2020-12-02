<?php
include ('banco.php');
include('assets/php/apoio.php');
//Acompanha os erros de validação
$pdo = Banco::conectar();
$sql_dest = 'SELECT id, nome FROM destinatario ORDER BY id DESC';

// Processar so quando tenha uma chamada post
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nomeErro = null;
    $etiquetaErro = null;
    
    if (!empty($_POST)) {
        $validacao = True;
        $novoUsuario = False;
        if (!empty($_POST['id_destinatario'])) {
            $id_destinatario = $_POST['id_destinatario'];
        } else {
            $nomeErro = 'Por favor digite o destinatario!';
            $validacao = False;
        }


        if (!empty($_POST['codigo'])) {
            $codigo = limpa($_POST['codigo']);
        } else {
            $codigoErro = 'Por favor digite o codigo!';
            $validacao = False;
        }
    }

    if ($validacao) {
        
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO rastreio (id_destinatario, codigo) VALUES(?,?)";
        $q = $pdo->prepare($sql);
        $q->execute(array($id_destinatario, $codigo));        
        header("Location: rastreio_lista.php");
    }
}
Banco::desconectar();
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <script type="text/javascript" src="assets/js/jquery.js"></script>
    <script type="text/javascript" src="assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.maskedinput-1.1.1.js"></script>
    <script type="text/javascript" src="assets/js/jquery.meio.mask.js"></script>
    <script type="text/javascript">
        jQuery(function($){
   $("#celular").mask("(99) 99999-9999");
});
  
(function($){
  $(function(){
    $('input:text').setMask();    
  }   
);        
})(jQuery); 
    </script>
    <title>Adicionar Destinatario</title>
</head>

<body>
<div class="container">
    <div clas="span10 offset1">
        <div class="card">
            <div class="card-header">
                <h3 class="well"> Adicionar Etiqueta </h3>
            </div>
            <div class="card-body">
                <form class="form-horizontal" action="rastreio_create.php" method="post">

                    <div class="control-group  <?php echo !empty($nomeErro) ? 'error ' : ''; ?>">
                        <label class="control-label">Destinatario</label>
                        <div class="controls">
                            
                            <select name="id_destinatario">
                            <?php foreach($pdo->query($sql_dest)as $row) { ?>
                                <option value="<?=$row['id']?>"><?=$row['nome']?></option>
                            <?php } ?>
                            </select>

                        </div>
                    </div>

                    <div class="control-group <?php echo !empty($celularErro) ? 'error ' : ''; ?>">
                        <label class="control-label">Codigo</label>
                        <div class="controls">
                            <input size="35" class="form-control" name="codigo" type="text" placeholder="Codigo" maxlength="13"
                                   value="<?php echo !empty($codigo) ? $codigo : ''; ?>">
                            <?php if (!empty($codigoErro)): ?>
                                <span class="text-danger"><?php echo $codigoErro; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="form-actions">
                        <br/>
                        <button type="submit" class="btn btn-success">Adicionar</button>
                        <a href="rastreio_lista.php" type="btn" class="btn btn-default">Voltar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="assets/js/bootstrap.min.js"></script>
</body>

</html>

