<?php
require_once("../classes/session.php");

session_start();
session_end();
init_session();

header( 'Content-Type: application/json; charset=utf-8' );
$comp = false;
$mes = "";
if (!isset($_POST['mail']) || !isset($_POST['password'])) {
    $mes = "Mail address or password field is empty.";
}
if ($_POST['mail'] === "" || $_POST['password'] === "") {
    $mes = "Mail address or password field is empty.";
} else {
    $comp = true;
    $mes = "Incorrect login or password.";
}

echo json_encode(array('comp' => $comp, 'error_mes' => $mes));
?>
