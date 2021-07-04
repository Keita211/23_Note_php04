<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>データ登録</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                
            <div class="navbar-header"><a class="navbar-brand" href="welcome.html">TOPページ</a></div>
                <div id="data" class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>             
            </div>
        </nav>
    </header>

    
    <form method="POST" action="insert.php">
        <div class="jumbotron">
            <fieldset>
                <legend>映画メモ</legend>
                <label>映画名：<input type="text" name="name"></label><br>
                <label>日付：<input type="date" name="date"></label><br>
                <label>URL：<input type="text" name="url"></label><br>
                <label>点数：<input type="number" name="score" max="5", min="1"></label><br>
                <label>公開範囲：<input type="radio" name="open_flg"  value="0">有料会員のみ</label>
                <label><input type="radio" name="open_flg" value ="1">全会員</label><br>
                <label>感想：<br><textarea name="content" rows="4" cols="40"></textarea></label><br>
                <input type="submit" value="送信">
            </fieldset>
        </div>
    </form>
</body>

</html>

