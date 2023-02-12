<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lesson Sample Site</title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="{{ asset('/js/app.js') }}"></script>
    <script src="{{ asset('/js/main.js') }}"></script>

</head>

<body id="contact">
    <div id="wrapper">
        <div class="overlay-inner overlay-event"></div>
        <!-- ヘッダー -->
        @include('header')
        <!-- メイン -->
        <div id="contact-box">
            <main>
                <h2>お問い合わせ</h2>
                <form action="{{ url('complete') }}" method="post">
                    @csrf
                    <p>下記の内容をご確認の上送信ボタンを押してください</p>
                    <p>内容を訂正する場合は戻るを押してください。</p>
                    <dl id="comfirm_dl">
                        <dt>氏名</dt>
                        <dd>{{ $inputs['name_tmp'] }}</dd>
                        <dt>フリガナ</dt>
                        <dd>{{ $inputs['kana_tmp'] }}</dd>
                        <dt>電話番号</dt>
                        <dd>{{ $inputs['tel_tmp'] }}</dd>
                        <dt>メールアドレス</dt>
                        <dd>{{ $inputs['email_tmp'] }}</dd>
                        <dt>お問い合わせ内容</dt>
                        <dd id="wrap">{{ $inputs['message_tmp'] }}</dd>
                    </dl>
                    <input type="hidden" name="name" value="{{ $inputs['name_tmp'] }}">
                    <input type="hidden" name="kana" value="{{ $inputs['kana_tmp'] }}">
                    <input type="hidden" name="tel" value="{{ $inputs['tel_tmp'] }}">
                    <input type="hidden" name="email" value="{{ $inputs['email_tmp'] }}">
                    <input type="hidden" name="body" value="{{ $inputs['message_tmp'] }}">
                    <div id="button_flex">
                        <button type="submit" class="btn_up" name="action" value="complete">送信</button>
                        <button type="button" id="btn_back" name="action" value="back" onclick=history.back()>戻る</button>
                    </div>
                </form>
            </main>
        </div>
        <!-- フッター -->
        @include('footer')
    </div>
</body>