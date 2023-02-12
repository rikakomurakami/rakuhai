<?php
session_start();

// ログイン画面のバリデーション
if (!empty($_POST['login'])) {
    $err = [];
    // メールアドレス
    $email = filter_input(INPUT_POST, 'email');
    $pattern = "<^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:.[a-zA-Z0-9-]+)*$>";
    if (empty($email)) {
        $err['email'] = "メールアドレスを入力してください。";
    } elseif (!preg_match($pattern, $email)) {
        $err['email'] = "不正な形式のメールアドレスです。";
    }

    $password = filter_input(INPUT_POST, 'password');
    //正規表現
    if (!preg_match("/\A[a-z\d]{8,100}+\z/i", $password)) {
        $err['pass'] = "パスワードは英数字8文字以上、100文字以下にしてください。";
    }

    //エラーがあった場合は
    if(count($err) > 0) {
        $_SESSION = $err;
    }
    // エラーないなら選手一覧画面へ
    $_SESSION["login"] = "ログイン済み";
    $a = $player->Login($email, $password);

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン画面</title>
</head>

<body>
    <h2>ログイン画面</h2>
    <?php if (!empty($_SESSION['msg'])) {
        echo $_SESSION['msg'];
    } ?>
    <form action="" method="POST">

        <p>
            <label for="email">メールアドレス：</label>

            <input type="text" name="email">
            <?php if (!empty($err['email'])) {
                echo $err['email'];
            } ?>
        </p>
        <p>
            <label for="password">パスワード：</label>

            <input type="text" name="password">
            <?php if (!empty($err['pass'])) {
                echo $err['pass'];
            } ?>
        </p>
        <p>
            <input type="submit" name="login" value="ログイン">
        </p>
    </form>
</body>

</html>