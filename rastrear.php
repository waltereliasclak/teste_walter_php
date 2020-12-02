<?php
$codigo = $_GET['codigo'];
$post = array('Objetos' => $codigo);

// iniciar CURL
$ch = curl_init();
// informar URL e outras funções ao CURL
curl_setopt($ch, CURLOPT_URL, "https://www2.correios.com.br/sistemas/rastreamento/resultado_semcontent.cfm");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch,CURLOPT_POSTFIELDS, http_build_query($post));
// Acessar a URL e retornar a saída
$output = curl_exec($ch);
// liberar
curl_close($ch);
// Imprimir a saída
$resultado = explode('<td class="sroLbEvent">',$output);
$resultado2 = explode('<div id="sroDtEvent">',$output);
$total = count($resultado);

$localizacao = utf8_encode(strip_tags($resultado[$total-2]));

include ('banco.php');
$pdo = Banco::conectar();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "UPDATE rastreio  set localizacao = ?, data_consulta = ? WHERE id = ?";
$q = $pdo->prepare($sql);

$data_consulta = date("Y-m-d H:i:s");
$q->execute(array($localizacao, $data_consulta, $_REQUEST['id']));
Banco::desconectar();
header( "Location: rastreio_lista.php" );
?>