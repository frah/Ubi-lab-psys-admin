<?php
header( 'Content-Type: application/json; charset=utf-8' );
$comp = false;
$mes = "This IDm is already used.";
echo json_encode(array('comp' => $comp, 'error_mes' => $mes));
?>
