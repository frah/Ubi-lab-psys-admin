<?php
require_once("classes/session.php");
require_once("classes/nav.php");

login_check();
?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>新規ユーザ追加 | Ubi-lab PaymentSystem AdminTerminal</title>

        <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="css/main.css" rel="stylesheet" type="text/css">
        <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
        <script type="text/javascript" src="js/bootstrap-dropdown.js"></script>
        <script type="text/javascript">
            $(function(){
                $(":text[name=IDm]").blur(function(){
                    $.ajax({
                        type: "POST",
                        url: "/ajax/checkIDm.php",
                        dataType: "json",
                        data: {
                            IDm: $(":text[name=IDm]").val()
                        },
                        beforeSend: function() {

                        },
                        success: function(json) {
                            var d = $("div.control-group:has(:text[name=IDm])");
                            var s = $(".btn-primary:submit");
                            $("#idmerr").remove();
                            if (json.comp) {
                                d.removeClass("success error");
                                d.addClass("success");
                                s.removeAttr("disabled");
                                s.removeClass("disabled");
                            } else {
                                var er = $("<span class=\"help-inline\" id=\"idmerr\">"+json.error_mes+"</span>");
                                d.removeClass("success error");
                                d.addClass("error");
                                s.attr("disabled", "disabled");
                                s.addClass("disabled");
                                $(":text[name=IDm]").after(er);
                            }
                        },
                        error: function(req, err, th) {
                            console.log("error occored");
                            console.log(req);
                            console.log(err);
                            console.log(th);
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
                <h1>新規ユーザ登録 <small>IDmは別プログラムにて確認</small></h1>
            </div>
            <div class="row">
                <div class="span8 offset2">
                    <form class="form-horizontal">
                        <fieldset>
                            <legend>登録ユーザ情報</legend>
                            <div class="control-group">
                                <label class="control-label">IDm <span class="required">*</span></label>
                                <div class="controls docs-input-sizes">
                                    <input class="span3" type="text" name="IDm" maxlength="16" placeholder="FeliCa IDm">
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
                            <div class="form-actions">
                                <button type="submit" class="btn btn-primary disabled" disabled>追加</button>
                                <button class="btn">キャンセル</button>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
