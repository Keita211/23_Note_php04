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
                <div id="data" class="navbar-header"><a class="navbar-brand" href="select.php">画像一覧</a></div>             
            </div>
        </nav>
    </header>

    
    <form >
        <div class="jumbotron">
            <fieldset>
                <legend id="title">映画メモ</legend>
                <label>映画名：<input type="text" id="name"></label><br>
                <label>日付：<input type="date" id="date"></label><br>
                <label>URL：<input type="text" id="url"></label><br>
                <label>点数：<input type="number" id="score" max="5", min="1"></label><br>
                <label>公開範囲: </label>
                <select name="open_flg" id="open_flg">
                    <option value="0">有料会員のみ</option>
                    <option value="1">全会員</option>
                </select><br>
                <!-- <label>公開範囲：<input type="radio" id="open_flg"  value="0">有料会員のみ</label>
                <label><input type="radio" id="open_flg2" value ="1">全会員</label><br> -->
                <label>感想：<br><textarea id="content" rows="4" cols="40"></textarea></label><br>
            </fieldset>
        </div>
    </form>
    <button id = "btn">登録</button>
    <div><a href="fileupload.html">画像登録へ進む</a> </div>

<!--Ajax-->

<script>

$("#btn").on("click", function(){
    $.ajax({
        type: "post",
        url: "insert.php",
        data:{
            name:$("#name").val(),
            date:$("#date").val(), 
            url:$("#url").val(), 
            score:$("#score").val(), 
            open_flg:$("#open_flg").val(), 
            content:$("#content").val(), 
        },
        datatype:"html",
        success:function(data){
            if(data=="false"){
                alert("エラー");
            }else{
            $("#name").val(""),
            $("#date").val(""), 
            $("#url").val(""), 
            $("#score").val(""), 
            $("#open_flg").val(""), 
            $("#content").val(""),     
            $("#title").append("登録成功！！");
            
        }
    }
    })
});


</script>

</body>

</html>

