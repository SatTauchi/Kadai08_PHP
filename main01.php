<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>おさかなハぅマっチ？</title>
  <script src="js/jquery-2.1.3.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js" type="text/javascript"></script>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="icon" href="img/Logo2.webp" type="image/x-icon">
</head>

<body>

<div id="header">
    <img id="logo" src="img/Logo2.webp" alt="">
    <h1>おさかなハぅマっチ？</h1>
</div>

<main>
    <div class="input-area">
        <div id="input-area01">
            <form action="insert.php" method="post" enctype="multipart/form-data">
                <input id="date" type="date" name="date" required> 
                <select id="fish" name="fish" required>
                    <option value="" disabled selected style="display: none;">おさかな</option>
                    <option>ハマチ</option>
                    <option>マグロ</option>
                    <option>サバ</option>  
                    <option>アジ</option>
                </select>
                <select id="place" name="place" required>
                    <option value="" disabled selected style="display: none;">産地</option>
                    <option>北海道</option>
                    <option>江戸前</option>
                    <option>九州</option>
                </select>
                <input id="price" type="number" placeholder="金額を入力（円/kg）" name="price" required>
                <textarea id="remarks" placeholder="Remarks" name="remarks"></textarea>
                
                <div class="input_file">
                    <div class="preview">
                        <input accept="image/*" id="imgFile" type="file" name="imgFile">
                    </div>
                </div>
                <div class="button-area">
                    <button type="submit" value="送信">データ保存</button>
                    <button id="data" type="button" onclick="location.href='select.php'">データ一覧</button>
                    <button id="data" type="button" onclick="location.href='select02.php'">価格グラフ</button>
                </div>
                
            </form>
        </div>
    </div>
</main>

<footer>
    © 2024 Satoru Tauchi
</footer>

<!-- 以下にjs -->
<script src="js/fish_price_checker01.js"></script>
<script type="module" src="js/fish_price_checker01.js"></script>

</body>
</html>
