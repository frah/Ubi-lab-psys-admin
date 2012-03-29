<?php
require_once("classes/session.php");
require_once("classes/nav.php");

login_check();
?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>商品追加 | Ubi-lab PaymentSystem AdminTerminal</title>

        <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="css/main.css" rel="stylesheet" type="text/css">
        <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
        <script type="text/javascript" src="js/bootstrap-dropdown.js"></script>
    </head>
    <body>
<?php showNav(2); ?>
        <div class="container">
            <div class="page-header">
                <h1>商品追加<small>新商品を登録します</small></h1>
            </div>
        </div>
    </body>
</html>