<?php
function showNav($i) {
echo <<<'_EOT_'
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="main.php">AdminTerminal</a>
                    <div class="nav-collapse">
                        <ul class="nav">
_EOT_;
echo "\n";
if ($i === 0)
echo '                            <li class="active">';
else
echo '                            <li>';
echo "\n";
echo <<<'_EOT_'
                                <a href="main.php"><i class="icon-home icon-white"></i> Home</a>
                            </li>
_EOT_;
echo "\n";
if ($i === 1)
echo '                            <li class="dropdown active">';
else
echo '                            <li class="dropdown">';
echo "\n";
echo <<<'_EOT_'
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-user icon-white"></i> ユーザ <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="charge.php">入金</a></li>
                                    <li><a href="userlist.php">ユーザ管理</a></li>
                                    <li><a href="adduser.php">新規ユーザ登録</a></li>
                                </ul>
                            </li>
_EOT_;
echo "\n";
if ($i === 2)
echo '                            <li class="dropdown active">';
else
echo '                            <li class="dropdown">';
echo "\n";
echo <<<'_EOT_'
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-tags icon-white"></i> 商品 <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="arrive.php">入荷</a></li>
                                    <li><a href="itemlist.php">商品管理</a></li>
                                    <li><a href="additem.php">商品追加</a></li>
                                </ul>
                            </li>
_EOT_;
echo "\n";
if ($i === 3)
echo '                            <li class="dropdown active">';
else
echo '                            <li class="dropdown">';
echo "\n";
echo <<<'_EOT_'
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-file icon-white"></i> データ <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="buyhist.php">購買履歴</a></li>
                                    <li><a href="fundhist.php">出納管理</a></li>
                                </ul>
                            </li>
_EOT_;
echo "\n";
if ($i === 4)
echo '                            <li class="active">';
else
echo '                            <li>';
echo "\n";
echo <<<'_EOT_'
                                <a href="#"><i class="icon-question-sign icon-white"></i> その他</a>
                            </li>
                        </ul>
                        <ul class="nav pull-right">
                            <li>
                                <a href="logout.php"><i class="icon-off icon-white"></i> ログアウト</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
_EOT_;
echo "\n";
}
?>
