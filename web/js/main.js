$(".bannermjg-b").click(function (event) {
    event.preventDefault();//使a自带的方法失效，即无法调整到href中的URL(http://www.baidu.com)
    $.ajax({
        type: "POST",
        url: "index.php?r=site/logout",
        contentType: "application/json",
        dataType: "json",
        success: function (result) {
            window.location.href = 'index.php?r=site/index';
        },
    });
});