<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lesson Sample Site</title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="{{ asset('/js/app.js') }}"></script>
    <script src="{{ asset('/js/app.js') }}"></script>
</head>

<body>
    <div id="wrapper">
        <div class="overlay-inner overlay-event"></div>
        <!-- ヘッダー -->
        @include('header')
        <!-- メイン -->
        <main>
            <div class="login"></div>
        </main>
        <!-- フッター -->
        @include('footer')
    </div>
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>