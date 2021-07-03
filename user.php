<head>
    <meta charset="UTF-8">
    <title>ユーザー登録</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
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
            </div>
        </nav>
    </header>

    
    <form method="POST" action="user_register.php">
        <div class="jumbotron">
            <fieldset>
                <legend>ユーザー登録
                </legend>
                <label>氏名：<input type="text" name="name"></label><br>
                <label>ログインID：<input type="text" name="lid"></label><br>
                <label>パスワード：<input type="text" name="lpw"></label><br>
                <label>有料会員：<input type="radio" name="paid_flg" value="0">有料会員になる
                <input type="radio" name="paid_flg" value="1">また今度</label><br>
                <input type="submit" value="送信">
            </fieldset>
        </div>
    </form>
</body>

</html>
