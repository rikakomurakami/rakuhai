$(function () {
    // ハンバーガーボタン
    $('.btnHamburger').on('click', function () {
        $('#sp-nav').toggleClass('is-active');
    });
    $('nav ul li a').on('click', function () {
        $('#sp-nav').removeClass('is-active');
    });


    // ヘッダーがトップに来たら固定
    var $offset = jQuery('header').offset();
    jQuery(window).scroll(function () {
        if (jQuery(window).scrollTop() > $offset.top) {
            jQuery('header').addClass('fixedWidget');
        } else {
            jQuery('header').removeClass('fixedWidget');
        }
    });

    //オーバーレイを取り付けたり外したり
    $('.overlay-event').click(function () {
        $('.overlay-inner').toggleClass('is-active-black');
    });
});


//ログイン画面のオーバーレイ
document.addEventListener('DOMContentLoaded', function () {
    const overlay = document.getElementById('overlay');
    function overlayToggle() {
        overlay.classList.toggle('overlay-on');
    }
    const clickArea = document.getElementsByClassName('overlay-event');
    for (let i = 0; i < clickArea.length; i++) {
        clickArea[i].addEventListener('click', overlayToggle, false);
    }
    function stopEvent(event) {
        event.stopPropagation();
    }
}, false);


// スムーススクロール
$('a[href^="#"]').click(function () {
    var adjust = 0;
    var speed = 600;
    var href = $(this).attr("href");
    var target = $(href == "#" || href == "" ? 'html' : href);
    var position = target.offset().top + adjust;
    $('body,html').animate({ scrollTop: position }, speed, 'swing');
    return false;
});


// バリデーション
$(function () {
    $('.js_error').on('click', function () {

        $email_reg = /^[A-Za-z0-9]{1}[A-Za-z0-9_.-]*@{1}[A-Za-z0-9_.-]{1,}.[A-Za-z0-9]{1,}$/;
        $tel_reg = /^0\d{9,10}$/;
        var alerts = [];

        //氏名
        if ($('#name').val() === '') {
            alerts.push('名前を入力してください。');
        }
        if ($("#name").val().length > 10) {
            alerts.push('\n' + '名前は10文字以内で入力してください。');
        }
        if ($('#kana').val() === '') {
            alerts.push('\n' + 'フリガナを入力してください。');
        }
        if ($('#kana').val().length > 10) {
            alerts.push('\n' + 'フリガナは10文字以内で入力してください。');
        }
        if (!($('#tel').val() == '')) {
            if (!($tel_reg.test($('#tel').val()))) {
                alerts.push('\n' + '数字を入力してください。');
            }
        }
        if ($('#email').val() === '') {
            alerts.push('\n' + 'メールアドレスを入力してください');
        }
        if (!($('#email').val() === '')) {
            if (!$email_reg.test($('#email').val())) {
                alerts.push('\n' + "メールアドレスの形式が不正です。");
            }
        }
        if ($('#body').val() === '') {
            alerts.push('\n' + '内容を入力してください。');
        }
        if (alerts.length > 0) {
            alert(alerts);
        }
    });
});

//テーブルの削除ボタンのアラート
$(function () {
    $('.deleteBtn_alert').on('click', function () {

        if (!confirm('本当に削除しますか？')) {
            /* キャンセルの時の処理 */
            return false;
        } else {
            /*　OKの時の処理 */
            $('.deleteBtn_ok').toggleClass('is-active-Btn');
            location.href = 'contact.php';
        }
    });
});

