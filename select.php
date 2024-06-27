<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>おさかなハぅマっチ？</title>
    <link rel="stylesheet" href="css/style01.css">
    <link rel="icon" href="img/Logo2.webp" type="image/x-icon">
</head>
<body>
    <div id="header">
        <img id="logo" src="img/Logo2.webp" alt="">
        <h1>おさかなハぅマっチ？</h1>
    </div>
    <main>
        <div id="button02">
            <select id="fish-select">
                <option value="">魚を選択して下さい</option>
                <option value="all">全データ表示</option>
                <option value="ハマチ">ハマチ</option>
                <option value="マグロ">マグロ</option>
                <option value="サバ">サバ</option>
                <option value="アジ">アジ</option>
            </select>
            <button id="fetch-data">データを見る</button>
            <button id="back" onclick="location.href='main01.php'">戻る</button>
        </div>
        <div id="list" class="grid-container">
            <!-- データがここに表示される -->
        </div>
    </main>
    <footer>
        © 2024 Satoru Tauchi
    </footer>

    <script src="js/jquery-2.1.3.min.js"></script>
    <script>
        document.getElementById('fetch-data').addEventListener('click', function() {
            const selectedFish = document.getElementById('fish-select').value;
            if (selectedFish !== "") {
                $.ajax({
                    url: 'fetch_data.php',
                    type: 'GET',
                    data: { fish: selectedFish === "all" ? "" : selectedFish },
                    dataType: 'json',
                    success: function(data) {
                        if (data.error) {
                            alert(data.error);
                        } else {
                            let output = '';
                            data.forEach(function(item) {
                                output += `<div class="item" data-id="${item.id}">
                                              <img src="uploads/${item.photo}" alt="${item.fish}">
                                              <p>日付：${item.date} <br> 魚：${item.fish} <br> 産地：${item.place} <br> 金額：${item.price} 円/kg<br>備考：${item.remarks}</p>
                                              <div id="delete_field">
                                                <button class="delete" type="button">削除</button>
                                              </div>
                                           </div>`;
                            });
                            document.getElementById('list').innerHTML = output;
                            addDeleteEventListeners();
                        }
                    },
                    error: function() {
                        alert('データの取得に失敗しました。');
                    }
                });
            } else {
                alert('魚を選択してください');
            }
        });

        function addDeleteEventListeners() {
            document.querySelectorAll('.delete').forEach(function(button) {
                button.addEventListener('click', function() {
                    const itemDiv = this.closest('.item');
                    const id = itemDiv.getAttribute('data-id');

                    if (confirm('データベースから削除しますか？')) {
                        $.ajax({
                            url: 'delete_data.php',
                            type: 'POST',
                            data: { id: id },
                            dataType: 'json',
                            success: function(response) {
                                if (response.error) {
                                    alert(response.error);
                                } else {
                                    itemDiv.remove();
                                }
                            },
                            error: function() {
                                alert('データの削除に失敗しました。');
                            }
                        });
                    }
                });
            });
        }
    </script>
</body>
</html>