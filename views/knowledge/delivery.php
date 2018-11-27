<link rel="stylesheet" type="text/css" href="css/form-home.css">

<script type="text/javascript" src="js/up.js"></script>
<section class="aui-content">
    <!--    <div style="height:20px;"></div>-->


    <div class="aui-content-up">
        <form action="" name="form1" method="post">


            <div class="aui-form-group clear">
                <label class="aui-label-control">
                    图片<em>*</em>

                </label>
                <div class="aui-form-input">
                    <div class="aui-content-img-box aui-content-full">
                        <div class="aui-photo aui-up-img clear">
                            <section class="aui-file-up fl">
                                <img src="images/up.png" class="add-img">
                                <input type="file" onblur="checkfile();" name="file" id="file" class="file" value=""
                                       accept="image/jpg,image/jpeg,image/png,image/bmp" multiple/>
                            </section>
                        </div>
                    </div>
                </div>
            </div>


            <div class="aui-form-group clear">
                <label class="aui-label-control">
                    内容<em>*</em>
                </label>
                <div class="aui-form-input">
                    <textarea class="aui-form-control"  onblur="checktitle();" name="summary" id="4" minlength="5" maxlength="50"></textarea>
                </div>
            </div>


        </form>
    </div>


    <div class="re_regist_other">
        <a class="btn_regist" type="button" name="publish_quanzi">发布</a>
    </div>

</section>

<div class="aui-mask aui-works-mask">
    <div class="aui-mask-content">
        <p class="aui-delete-text">确定要删除图片？</p>
        <p class="aui-check-text">
            <span class="aui-delete aui-accept-ok">确定</span>
            <span class="aui-accept-no">取消</span>
        </p>
    </div>
</div>

<script type="text/javascript">
    $("[name=publish_quanzi]").click(function () {
        $('.mjgerror').remove();
        if (!checktitle()) {
            return false;
        }


        if (!checkfile()) {
            return false;
        }


        let summary = '';
        summary = $('[name=summary]').val();
        console.log(summary);

        var formData = new FormData();
        formData.append('file', $('#id')[0].files[0]);  //添加图片信息的参数
        formData.append('summary', summary);  //添加其他参数

        $.ajax({
            url: `index.php?r=quanzi/publish`,
            type: 'POST',
            cache: false, //上传文件不需要缓存
            data: formData,
            processData: false, // 告诉jQuery不要去处理发送的数据
            contentType: false, // 告诉jQuery不要去设置Content-Type请求头

            success: function (data) {
                console.log( JSON.stringify(data));
            },
            error: function (xhr) {
                alert('error:' + JSON.stringify(xhr));
            }
        });


    });


    function checktitle() {
        $('.mjgerror').remove();

        if ($('[name=summary]').val() == '') {
            $('[name=summary]').after(errMsg('内容不能为空'));
            return false;
        }
        return true;
    }

    function checkfile() {
        $('.mjgerror').remove();

        if ($('[name=file]').val() == '') {
            $('[name=file]').after(errMsg('图片不能为空'));
            return false;
        }
        return true;
    }


    function errMsg(html) {
        var str = '<div class="mjgerror">*' + html + '</div>';
        return str;
    }

</script>