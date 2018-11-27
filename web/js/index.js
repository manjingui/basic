$("[name=sendcode]").eq(0)[0].b = true;

$("[name=phonenumber]").click(function () {
    $('.mjgerror').remove();
    $('.mjgerrorlogin').remove();
});

$("[name=code]").click(function () {
    $('.mjgerror').remove();
    $('.mjgerrorlogin').remove();
});
$("[name=sendcode]").click(function () {

    if (!validate()) {
        return false;
    }
    if ($("[name=sendcode]").eq(0)[0].b == true) {
        let phone = '';
        phone = $('#phone').val();
        console.log(phone);
        $.ajax({
            url: `index.php?r=user/sendcode&phone=${phone}`,
            dataType: 'json',
            method: 'GET',
            success: function (data) {
                console.log(JSON.stringify(data));
            },
            error: function (xhr) {
                alert('error:' + JSON.stringify(xhr));
            }
        });

        setTimer();
    }
});


$("[name=login]").click(function () {

    if (!validatelogin()) {
        return false;
    }
    let phone = '';
    phone = $('#phone').val();
    let code = '';
    code = $('#code').val();
    console.log(phone);
    console.log(code);
    $.ajax({
        url: `index.php?r=site/login&phone=${phone}&code=${code}`,
        dataType: 'json',
        method: 'GET',
        success: function (data) {
            console.log(JSON.stringify(data));
            window.location.href="index.php?r=site/index";
        },
        error: function (xhr) {
            alert('error:' + JSON.stringify(xhr));
        }
    });

});

function setTimer() {
    $("[name=sendcode]").eq(0)[0].b = false;
    var time = 60;
    console.log("ddd");
    var timers = setInterval(function () {
        time--;
        console.log("ddd");
        if (time <= 0) {
            time = 0;
            console.log("ddd");
            $("[name=sendcode]").val('获取验证码');
            clearInterval(timers);
            $("[name=sendcode]").eq(0)[0].b = true;
            return false;
        }
        $("[name=sendcode]").val(time + '秒后重新获取');
    }, 1000)
}


function validate() {
    $('.mjgerror').remove();
    $('.mjgerrorlogin').remove();
    var phoneReg = /^(0|86|17951)?(13[0-9]|15[012356789]|17[0-9]|18[0-9]|14[57])[0-9]{8}$/;

    if ($('[name=phonenumber]').val() == '') {
        $('[name=phonenumber]').after(errMsg('手机号码不能为空'));
        return false;
    }
    if (!phoneReg.test($('[name=phonenumber]').val())) {
        $('[name=phonenumber]').after(errMsg('请输入正确手机号码'));
        return false;
    }
    return true;
}


function validatelogin() {
    $('.mjgerror').remove();
    $('.mjgerrorlogin').remove();
    var phoneReg = /^(0|86|17951)?(13[0-9]|15[012356789]|17[0-9]|18[0-9]|14[57])[0-9]{8}$/;

    if ($('[name=phonenumber]').val() == '') {
        $('[name=phonenumber]').after(errMsg('手机号码不能为空'));
        return false;
    }
    if (!phoneReg.test($('[name=phonenumber]').val())) {
        $('[name=phonenumber]').after(errMsg('请输入正确手机号码'));
        return false;
    }

    if ($('[name=code]').val() == '') {
        $('[name=code]').after(errMsglogin('验证码不能为空'));
        return false;
    }

    return true;
}

//错误信息显示
function errMsg(html) {
    var str = '<div class="mjgerror">*' + html + '</div>';
    return str;
}
function errMsglogin(html) {
    var str = '<div class="mjgerrorlogin">*' + html + '</div>';
    return str;
}