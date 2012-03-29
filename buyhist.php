<?php
require_once("classes/session.php");
require_once("classes/nav.php");

login_check();
?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>購買履歴 | Ubi-lab PaymentSystem AdminTerminal</title>

        <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="css/main.css" rel="stylesheet" type="text/css">
        <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
        <script type="text/javascript" src="js/bootstrap-dropdown.js"></script>
    </head>
    <body>
<?php showNav(3); ?>
        <div class="container">
            <div class="page-header">
                <h1>購買履歴<small>購買履歴の閲覧・集計</small></h1>
            </div>
        </div>
    </body>
</html>