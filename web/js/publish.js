$("[name=activity_publish]").click(function () {

    if(!checkplace()){
        return false;
    }



    if(!checkst()){
        return false;
    }
    if(!checket()){
        return false;
    }
    if(!checkfounder()){
        return false;
    }
    if(!validatephone()){
        return false;
    }
    if(!checksummary()){
        return false;
    }


    let activity_type = '';
    activity_type = $('[name=activity_type]').val();
    console.log(activity_type);

    let activity_place = '';
    activity_place = $('[name=activity_place]').val();
    console.log(activity_place);


    let activity_zone = '';
    activity_zone = $('[name=activity_zone]').val();
    console.log(activity_zone);


    let activity_st_time = '';
    activity_st_time = $('[name=activity_st_time]').val();
    console.log(activity_st_time);


    let activity_et_time = '';
    activity_et_time = $('[name=activity_et_time]').val();
    console.log(activity_et_time);


    let activity_founder = '';
    activity_founder = $('[name=activity_founder]').val();
    console.log(activity_founder);

    let activity_phone = '';
    activity_phone = $('[name=activity_phone]').val();
    console.log(activity_phone);

    let activity_summary = '';
    activity_summary = $('[name=activity_summary]').val();
    console.log(activity_summary);

    $.ajax({
        url: `index.php?r=activity/publish`,
        dataType: 'json',
        method: 'POST',
        data:{'activity_type':activity_type,'activity_place':activity_place,'activity_zone':activity_zone,'activity_st_time':activity_st_time,'activity_et_time':activity_et_time,'activity_founder':activity_founder,'activity_phone':activity_phone,'activity_summary':activity_summary},
        success: function (data) {
            var errcode = data['errorno'];
            if(errcode == 1){
                window.location.href="index.php?r=site/login";
            }
            if(errcode == 0) {
                alert('发布成功,审核中');
                window.location.href = 'index.php?r=site/index';
            }
        },
        error: function (xhr) {
            alert('error:' + JSON.stringify(xhr));
        }
    });
    // Response.Write("<script>alert('发布成功');window.location.href='index.php?r=site/index';</script>");

});


function validatephone() {
    $('.mjgerror').remove();
    console.log($('[name=activity_phone]').val());
    var phoneReg = /^(0|86|17951)?(13[0-9]|15[012356789]|17[0-9]|18[0-9]|14[57])[0-9]{8}$/;

    if ($('[name=activity_phone]').val() == '') {
        $('[name=activity_phone]').after(errMsg('手机号码不能为空'));
        return false;
    }
    if (!phoneReg.test($('[name=activity_phone]').val())) {
        console.log($('[name=activity_phone]').val());
        $('[name=activity_phone]').after(errMsg('请输入正确手机号码'));
        return false;
    }
    return true;
}


function checkplace() {
    $('.mjgerror').remove();

    if ($('[name=activity_place]').val() == '') {
        $('[name=activity_place]').after(errMsg('活动地点不能为空'));
        return false;
    }
    return true;
}

function checket() {
    $('.mjgerror').remove();

    if ($('[name=activity_et_time]').val() == '') {
        $('[name=activity_et_time]').after(errMsg('活动结束时间不能为空'));
        return false;
    }
    return true;
}

function checkst() {
    $('.mjgerror').remove();

    if ($('[name=activity_st_time]').val() == '') {
        $('[name=activity_st_time]').after(errMsg('活动开始时间不能为空'));
        return false;
    }
    return true;
}

function checkfounder() {
    $('.mjgerror').remove();

    if ($('[name=activity_founder]').val() == '') {
        $('[name=activity_founder]').after(errMsg('活动联系人不能为空'));
        return false;
    }
    return true;
}

function checksummary() {
    $('.mjgerror').remove();

    if ($('[name=activity_summary]').val() == '') {
        $('[name=activity_summary]').after(errMsg('活动内容不能为空'));
        return false;
    }
    return true;
}

function errMsg(html) {
    var str = '<div class="mjgerror">*' + html + '</div>';
    return str;
}
