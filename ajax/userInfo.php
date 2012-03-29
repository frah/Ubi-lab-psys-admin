<?php
require_once("../classes/dao.php");
require_once("../classes/logging.php");

$logger = new Logger($_SERVER['PHP_SELF']);

$comp = false;
$mes = "Failed to load user info.";

if (!isset($_POST['id'])) {
    $mes = "No ID input.";
} else {
    $id = (int)$_POST['id'];
    try {
        $dao = new DAO();
        $st = $dao->prepare("SELECT * FROM uses WHERE id=?");
        $st->execute(array($id));
        $ret = $st->fetch(PDO::FETCH_ASSOC);
        if ($ret !== false) {
            $comp = true;
        } else {
            $comp = false;
            $mes = "Specified user ID is not used.";
        }
    } catch (PDOException $e) {
        $logger->log($e);
        $comp = false;
        $mes = "Failed to connect to database.";
    }
    $dao = null;
}

header( 'Content-Type: application/json; charset=utf-8' );
if ($comp) {
    echo json_encode(array(
        'comp' => $comp,
        'id' => $id,
        'IDm' => $ret['IDm'],
        'name' => $ret['name'],
        'nick' => $ret['nick'],
        'mail' => $ret['mail'],
        'twitter' => $ret['twitter'],
        'skin' => $ret['skin']
    ));
} else {
    echo json_encode(array(
        'comp' => $comp,
        'error_mes' => $mes
    ));
}
?>
