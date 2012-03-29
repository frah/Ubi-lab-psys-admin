<?php
require_once("classes/session.php");

session_end();
header("Location: /", 302);
?>
