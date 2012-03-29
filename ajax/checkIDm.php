<?php
require_once("../classes/dao.php");
require_once("../classes/logging.php");

$logger = new Logger($_SERVER['PHP_SELF']);

$comp = false;
$mes = "This IDm is already used.";

if (!isset($_POST['IDm'])) {
    $mes = "No IDm input.";
} else {
    try {
        $dao = new DAO();
        $st = $dao->prepare("SELECT COUNT(*) FROM users WHERE IDm=?");
        $st->execute(array($_POST['IDm']));
        if ($st->fetchColumn() === '0') {
            $comp = true;
            $mes = "";
        }
    } catch (PDOException $e) {
        $logger->log($e);
    }
}

header( 'Content-Type: application/json; charset=utf-8' );
echo json_encode(array('comp' => $comp, 'error_mes' => $mes));
?>
