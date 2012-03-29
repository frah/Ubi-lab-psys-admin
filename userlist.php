<?php
require_once("classes/session.php");
require_once("classes/nav.php");

login_check();
?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>ユーザ管理 | Ubi-lab PaymentSystem AdminTerminal</title>

        <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="css/main.css" rel="stylesheet" type="text/css">
        <style type="text/css">
            .page-header {
                overflow: hidden;
            }
            .page-header div {
                float: right;
            }
            .search-query {
                float: left;
            }
            h1.span6 {
                margin-left: 0px;
            }
            tbody > tr {
                cursor: pointer;
            }
        </style>
        <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
        <script type="text/javascript" src="js/bootstrap-dropdown.js"></script>
        <script type="text/javascript" src="js/bootstrap-modal.js"></script>
        <script type="text/javascript" src="js/bootstrap-transition.js"></script>
        <script type="text/javascript">
            $(function(){
                $("tr").click(function(evt){
                    var id = evt.target.parentNode.firstChild.nextSibling.innerHTML;
                    var elems = evt.target.parentNode.getElementsByTagName("td");
                    $.ajax({
                        type: "POST",
                        url: "/ajax/userInfo.php",
                        dataType: "json",
                        data: {
                            'id': elems[0].innerHTML
                        },
                        success: function(json) {
                            if (json.comp) {
                                $("#userInfoModal :input[name=#]").val(elems[0].innerHTML);
                                $("#userInfoModal :input[name=IDm]").val(elems[1].innerHTML);
                                $("#userInfoModal :input[name=name]").val(elems[2].innerHTML);
                                $("#userInfoModal :input[name=nick]").val(json.nick);
                                $("#userInfoModal :input[name=mail]").val(elems[3].innerHTML);
                                $("#userInfoModal :input[name=twitter]").val(json.twitter);
                                $("#userInfoModal :input[name=skin]").val(json.skin);
                                $("#userInfoModal").modal();
                            } else {
                                alert(json.error_mes);
                            }
                        },
                        error: function(req, err, th) {
                            console.log(req);
                            console.log(err);
                            console.log(th);
                            alert("Failed to load user info.");
                        }
                    });
                });
            });
        </script>
    </head>
    <body>
<?php showNav(1); ?>
        <div class="container">
            <div class="page-header">
                <h1 class="span6">ユーザ管理<small>ユーザアカウントの編集・削除</small></h1>
                <div class="span3">
                    <div class="control-group" style="margin-bottom: 0px;">
                        <div class="controls">
                            <div class="form-search-wimg">
                                <i class="icon-search"></i> <input type="search" class="span3 search-query" placeholder="Search" name="search">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="span2" style="text-align:center">
                    <a class="btn btn-primary" href="adduser.php"><i class="icon-plus icon-white"></i> 追加</a>
                </div>
            </div>
            <div class="row">
                <div class="span12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>IDm</th>
                                <th>氏名</th>
                                <th>メール</th>
                                <th>タイプ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>0</td>
                                <td>0022446688aaccee</td>
                                <td>大野 淳司</td>
                                <td>atsushi-o</td>
                                <td>学生</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>0123456789abcdef</td>
                                <td>先端 太郎</td>
                                <td>taro-s</td>
                                <td>学生</td>
                            </tr>
                        </tbody>
                    </table>

                    <div id="userInfoModal" class="modal hide fade">
                        <div class="modal-header">
                            <a class="close" data-dismiss="modal">&times;</a>
                            <h3>ユーザ詳細・編集</h3>
                        </div>
                        <div class="modal-body">
                            <div class="row-fluid">
                                <div class="span12">
                                    <form class="form-horizontal">
                                        <fieldset>
                                            <div class="control-group">
                                                <label class="control-label">#</label>
                                                <div class="controls docs-input-sizes">
                                                    <input class="span3 disabled" type="text" name="#" placeholder="User ID" value="" disabled>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">IDm</label>
                                                <div class="controls docs-input-sizes">
                                                    <input class="span3 disabled" type="text" name="IDm" maxlength="16" placeholder="FeliCa IDm" disabled>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">氏名 <span class="required">*</span></label>
                                                <div class="controls docs-input-sizes">
                                                    <input class="span3" type="text" name="name" placeholder="氏名">
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">表示名 <span class="required">*</span></label>
                                                <div class="controls docs-input-sizes">
                                                    <input class="span3" type="text" name="nick" placeholder="表示名">
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">メールアドレス <span class="required">*</span></label>
                                                <div class="controls">
                                                    <div class="input-append">
                                                        <input class="span2" type="text" name="mail" placeholder="Mandara account"><span class="add-on">@is.naist.jp</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">ユーザタイプ</label>
                                                <div class="controls docs-input-sizes">
                                                    <select class="span3" name="type">
                                                        <option value="0">学生</option>
                                                        <option value="1">先生</option>
                                                        <option value="2">管理者</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Twitter</label>
                                                <div class="controls">
                                                    <div class="input-prepend">
                                                        <span class="add-on">@</span><input class="span2" type="text" name="twitter" placeholder="Twitter account">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">スキン</label>
                                                <div class="controls">
                                                    <input class="span3" type="text" name="skin" placeholder="default.xml">
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label" for="optionsCheckboxList">投稿設定</label>
                                                <div class="controls">
                                                    <label class="checkbox">
                                                        <input type="checkbox" name="postOption1" value="postOption1">
                                                        購入時にTwitterへ投稿する
                                                    </label>
                                                    <label class="checkbox">
                                                        <input type="checkbox" name="postOption2" value="postOption2">
                                                        購入時にレシートを登録メールアドレス宛に送信する
                                                    </label>
                                                    <label class="checkbox">
                                                        <input type="checkbox" name="postOption3" value="postOption3">
                                                        日報の配信を希望する
                                                    </label>
                                                    <label class="checkbox">
                                                        <input type="checkbox" name="postOption4" value="postOption4">
                                                        月報の配信を希望する
                                                    </label>
                                                </div>
                                            </div>
                                            <p class="help-block"><span class="required">*</span> は必須入力項目</p>
                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="#" class="btn" data-dismiss="modal" >閉じる</a>
                            <a href="#" class="btn btn-primary">変更を保存</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
