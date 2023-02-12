<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lesson Sample Site</title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="{{ asset('/js/app.js') }}"></script>
</head>

<body id="contact">
    <div id="wrapper">
        <div class="overlay-inner overlay-event"></div>
        <!-- ヘッダー -->
        @include('header')
        <!-- メイン -->
        <div id="contact-box">
            <main>
                <h2>お問い合わせ内容の編集</h2>
                <form action="{{ route('update') }}" method="POST">

                    @csrf
                    <section>
                        <h3>下記の項目を修正の上更新ボタンを押してください</h3>
                        <span>
                            <div class="required_mark"> *</div>は必須項目となります。
                        </span>
                        <dl id="contact_dl">
                            <dt>
                                <label for="name">氏名<div class="required_mark">*</div>
                                    <div class="error_check" style="color: #f00; padding-left: 10px;">
                                        @error('name_tmp')
                                        <p class="errtext">{{ $errors->first('name_tmp') }}</p>
                                        @enderror
                                    </div>
                                </label>
                            </dt>
                            <dd>
                                <input type="text" name="name_tmp" id="name" value="{{ old('name_tmp', $players->name) }}" placeholder="山田太郎">
                            </dd>
                            <dt>
                                <label for="kana">フリガナ<div class="required_mark">*</div>
                                    <div class="error_check" style="color: #f00; padding-left: 10px;">
                                        @error('kana_tmp')
                                        <p class="errtext">{{ $errors->first('kana_tmp') }}</p>
                                        @enderror
                                    </div>
                                </label>
                            </dt>
                            <dd>
                                <input type="text" name="kana_tmp" id="kana" value="{{ old('kana_tmp', $players->kana) }}" placeholder="山田太郎">
                            </dd>
                            <dt>
                                <label for="tel">電話番号
                                    <div class="error_check" style="color: #f00; padding-left: 10px;">
                                        @error('tel_tmp')
                                        <p class="errtext">{{ $errors->first('tel_tmp') }}</p>
                                        @enderror
                                    </div>
                                </label>
                            </dt>
                            <dd>
                                <input type="text" name="tel_tmp" id="tel" value="{{ old('tel_tmp', $players->tel) }}" placeholder="山田太郎">
                            </dd>
                            <dt>
                                <label for="email">メールアドレス<div class="required_mark">*</div>
                                    <div class="error_check" style="color: #f00; padding-left: 10px;">
                                        @error('email_tmp')
                                        <p class="errtext">{{ $errors->first('email_tmp') }}</p>
                                        @enderror
                                    </div>
                                </label>
                            </dt>
                            <dd>
                                <input type="text" name="email_tmp" id="email" value="{{ old('email_tmp', $players->email) }}" placeholder="test@test.co.jp">
                            </dd>
                        </dl>
                    </section>
                    <section id="content_info">
                        <h3>お問い合わせ内容をご記入ください<div class="required_mark">*</div>
                            <div class="error_check" style="color: #f00; padding-left: 10px;">
                                @error('message_tmp')
                                <p class="errtext">{{ $errors->first('message_tmp') }}</p>
                                @enderror
                            </div>
                        </h3>
                        <textarea name="message_tmp" id="body">{{ old('message_tmp', $players->body) }}</textarea>
                    </section>
                    <!-- <button class="js_error btn_up" type="submit">更新</button> -->
                    <input id="submit" class="js_error btn_up" type="submit" name="send" value="更 新">
                    <input type="hidden" name="id" value="{{ $players->id }}">
                </form>
            </main>
        </div>
        <!-- フッター -->
        @include('footer')
    </div>
</body>

</html>