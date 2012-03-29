<?php
require_once("classes/session.php");
require_once("classes/nav.php");

login_check();
?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>Ubi-lab PaymentSystem AdminTerminal</title>

        <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="css/main.css" rel="stylesheet" type="text/css">
        <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
        <script type="text/javascript" src="js/bootstrap-dropdown.js"></script>
    </head>
    <body>
<?php showNav(0); ?>
        <div class="container">

<header>
    <h1>AdminTerminal</h1>
    <p class="lead">Web admin tools for Ubi-lab POS System</p>
</header>
<section id="daily">
    <div class="page-header">
        <h1>日常業務 <small>普段使う機能</small></h1>
    </div>
    <div class="row-fluid">
        <div class="span6">
            <div class="well well-center">
                <p><a class="btn btn-large btn-success" href="charge.php"><i class="icon-repeat icon-white"></i> 入金処理</a></p>
                <p>ユーザアカウントにお金をチャージします</p>
            </div>
        </div>
        <div class="span6">
            <div class="well well-center">
                <p><a class="btn btn-large btn-primary" href="arrive.php"><i class="icon-download-alt icon-white"></i> 入荷処理</a></p>
                <p>商品の入荷処理をします</p>
            </div>
        </div>
    </div>
</section>

        </div>
    </body>
</html>
