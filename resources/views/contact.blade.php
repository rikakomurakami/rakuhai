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
                <h2>お問い合わせ</h2>
                <form action="{{ url('confirm') }}" method="post">
                    @csrf
                    <section>
                        <h3>下記の項目をご記入の上送信ボタンを押してください</h3>
                        <span>送信頂いた件につきましては、当社より折り返しご連絡を差し上げます。</span>
                        <span>なお、ご連絡までに、お時間を頂く場合もございますので予めご了承ください。</span>
                        <span>
                            <div class="required_mark"> *</div>は必須項目となります。
                        </span>
                        <dl id="contact_dl">
                            <dt>
                                <label for="name">氏名<div class="required_mark">*</div>
                                    @error('name_tmp')
                                    <p class="errtext">{{ $errors->first('name_tmp') }}</p>
                                    @enderror
                                </label>
                            </dt>
                            <dd>
                                <input type="text" name="name_tmp" id="name" placeholder="山田太郎" value="{{ old('name_tmp', session('inputs.name_tmp')) }}">
                            </dd>
                            <dt>
                                <label for="kana">フリガナ<div class="required_mark">*</div>
                                    @error('kana_tmp')
                                    <p class="errtext">{{ $errors->first('kana_tmp') }}</p>
                                    @enderror
                                </label>
                            </dt>
                            <dd>
                                <input type="text" name="kana_tmp" id="kana" placeholder="ヤマダタロウ" value="{{ old('kana_tmp', session('inputs.kana_tmp')) }}">
                            </dd>
                            <dt>
                                <label for="tel">電話番号
                                    @error('tel_tmp')
                                    <p class="errtext">{{ $errors->first('tel_tmp') }}</p>
                                    @enderror
                                </label>
                            </dt>
                            <dd>
                                <input type="text" name="tel_tmp" id="tel" placeholder="09012345678" value="{{ old('tel_tmp', session('inputs.tel_tmp')) }}">
                            </dd>
                            <dt>
                                <label for="email">メールアドレス<div class="required_mark">*</div>
                                    @error('email_tmp')
                                    <p class="errtext">{{ $errors->first('email_tmp') }}</p>
                                    @enderror

                                </label>
                            </dt>
                            <dd>
                                <input type="email" name="email_tmp" id="email" placeholder="test@test.co.jp" value="{{ old('email_tmp', session('inputs.email_tmp')) }}">
                            </dd>
                        </dl>
                    </section>
                    <section id="content_info">
                        <h3>お問い合わせ内容をご記入ください<div class="required_mark">*</div>
                            @error('message_tmp')
                            <p class="errtext">{{ $errors->first('message_tmp') }}</p>
                            @enderror
                        </h3>
                        <textarea name="message_tmp" id="body">{{ old('message_tmp', session('inputs.message_tmp')) }}</textarea>
                    </section>
                    <input class="js_error btn_up" id="submit" type="submit" name="send" value="送 信">
                </form>
            </main>
        </div>
        <table>
            <tr>
                <th>氏名</th>
                <th>フリガナ</th>
                <th>電話番号</th>
                <th>メールアドレス</th>
                <th>お問い合わせ内容</th>
                <th>編集</th>
                <th>削除</th>
                <th></th>
                <th></th>
            </tr>

            @foreach($players as $player)
            <tr class="column">
                <td>{{ $player->id }}</td>
                <td>{{ $player->name }}</td>
                <td>{{ $player->kana }}</td>
                <td>{{ $player->tel }}</td>
                <td>{{ $player->email }}</td>
                <td>{{ $player->body }}</td>
                <td>{{ $player->created_at }}</td>
                <td>
                    <form action="{{ route('edit', ['id' => $player->id]) }}" method="post">
                        @csrf
                        <input type="submit" value="編集">
                    </form>
                </td>
                <td>
                    <form action="{{ url('delete', ['id' => $player->id]) }}" method="post" onsubmit="return confirm('削除しますか？')">
                        @csrf
                        <input type="submit" value="削除">
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
        <!-- フッター -->
        @include('footer')
    </div>
    </div>
</body>

</html>