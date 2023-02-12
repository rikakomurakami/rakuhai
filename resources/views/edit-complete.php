<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lesson Sample Site</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/reset.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="main.js" type="text/javascript"></script>

</head>

<body id="contact" class="complete">
    <div id="wrapper">
        <div class="overlay-inner overlay-event"></div>
        <!-- ヘッダー -->
        <?php
        include('./header.php');
        ?>
        <!-- メイン -->
        <div id="contact-box">
            <main>
                <h2>お問い合わせ</h2>
                <div id="complete_info">
                    <p>変更しました。</p>

                    <span><a href="./contact.php">入力フォームへ戻る</a></span>
                </div>
            </main>
        </div>
        <!-- フッター -->
        <?php
        include('./footer.php');
        session_destroy();
        ?>
    </div>
</body>