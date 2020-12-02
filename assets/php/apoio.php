<?php
function converteDataHoraBancoView($p_paramento) {
 	   $data_hora_view = '';
	   if(!empty($p_paramento)){
 	   $dia = substr($p_paramento, 8,2);   
	   $mes = substr($p_paramento, 5,2);   
	   $ano = substr($p_paramento, 0,4);   	   
	   $hora = substr($p_paramento, 11,5);  	   
	   $data_hora_view.=$dia;
	   $data_hora_view.="/";
	   $data_hora_view.=$mes;
	   $data_hora_view.="/";
	   $data_hora_view.=$ano;	   
	   $data_hora_view.=" <b>&agrave;s</b> ";	   
	   $data_hora_view.=$hora;  	   
	   $data_hora_view.=" <b>Hs</b>";
	   return ($data_hora_view);
	}
}

function mascara_telefone($p_telefone){
 if(strlen($p_telefone) == 10 ){
	   $a = substr($p_telefone, 0,2);   
	   $b = substr($p_telefone, 2,4);   
	   $c = substr($p_telefone, 6,4);   
	   
	   $telefone_mascarado  = "(";
	   $telefone_mascarado .= $a;
	   $telefone_mascarado .= ") ";
	   $telefone_mascarado .= $b;
	   $telefone_mascarado .= "-";
	   $telefone_mascarado .= $c;
	   return ($telefone_mascarado);	 
 }

 if(strlen($p_telefone) == 11){
	   $a = substr($p_telefone, 0,2);   
	   $b = substr($p_telefone, 2,5);   
	   $c = substr($p_telefone, 7,4);   
	   
	   $telefone_mascarado  = "(";
	   $telefone_mascarado .= $a;
	   $telefone_mascarado .= ") ";
	   $telefone_mascarado .= $b;
	   $telefone_mascarado .= "-";
	   $telefone_mascarado .= $c;
	   return ($telefone_mascarado);	 
 }  
}

function limpa($p_paramento){
	$p_paramento = str_replace(" ","",$p_paramento);
	$p_paramento = str_replace("(","",$p_paramento);
	$p_paramento = str_replace(")","",$p_paramento);
	$p_paramento = str_replace("-","",$p_paramento);
	return $p_paramento;
} 

?>