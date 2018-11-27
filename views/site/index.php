<!--<link rel="stylesheet" href="css/banner.css" type="text/css" media="screen">-->
<link rel="stylesheet" href="css/list.css" type="text/css" media="screen">
<link rel="stylesheet" type="text/css" href="css/form-home.css">
<!--<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>-->

<!--<script type="text/javascript" src="js/jquery.1.8.3.js"></script>-->


<script type="text/javascript" src="js/js-extend.js"></script>
<script type="text/javascript" src="js/pager.js"></script>

<div class="servicemjg">


    <div class="aui-form-group-other clear">
        <div class="aui-label-control-other">
            <label style="float:left;margin-left: 10px;">
                活动类型
            </label>
            <div class="aui-form-input">
                <select name="activity_type" onchange="changeselect()" class="aui-form-control-two-other">
                    <option value="8">所有</option>
                    <option value="0">周边促销</option>
                    <option value="11">房屋出租</option>

                    <option value="9">失物招领</option>
                    <option value="10">出售闲置</option>
                    <option value="1">广场舞</option>
                    <option value="2">爬山</option>
                    <option value="3">下棋</option>
                    <option value="4">摄影</option>
                    <option value="5">旅游</option>
                    <option value="6">太极</option>
                    <option value="7">其他</option>

                </select>
            </div>
        </div>

        <div class="aui-label-control-other">
            <label style="float:left;margin-left: 10px;">
                活动小区
            </label>
            <div class="aui-form-input">
                <select name="activity_zone" onchange="changeselect()" class="aui-form-control-two-other">
                    <option value="8">所有</option>
                    <option value="0">润星家园</option>
                    <option value="1">美丽新世界</option>
                    <option value="2">其他</option>
                </select>
            </div>
        </div>
    </div>


    <div class="expertbox">

        <div class="it_expert3">
            <div id="hot_ranks2">
                <ul class="current" style="display: block;">
                    <li class="latestlist">

                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div  style="border: 1px solid #b3cef9;font-size:15px; margin-bottom: 5px;" id="pager"></div>

</div>




<script type="text/javascript">

    window.onload = function ()//用window的onload事件，窗体加载完毕的时候
    {
        page();
    };

    function changeselect() {
        page();
        // let activity_type = '';
        // activity_type = $('[name=activity_type]').val();
        // console.log(activity_type);
        //
        //
        // let activity_zone = '';
        // activity_zone = $('[name=activity_zone]').val();
        // console.log(activity_zone);
        //
        // $.ajax({
        //     url: `index.php?r=activity/latest&type=${activity_type}&zone=${activity_zone}`,
        //     dataType: 'json',
        //     method: 'GET',
        //     success: function (data) {
        //
        //         var str = "";
        //         for (var i = 0, It = data.length; i < It; i++) {//循环
        //             str += '<div class="it_expertxt"><p><a href="index.php?r=activity/query&id=' + data[i].id + '">' + data[i].activity_time + '</p></div>';
        //         }
        //         console.log(str);
        //         $(".latestlist").empty().append(str)//遍历在界面上
        //
        //     },
        //     error: function (xhr) {
        //         alert('error:' + JSON.stringify(xhr));
        //     }
        // });

    }


    function page() {


        let activity_type = '';
        activity_type = $('[name=activity_type]').val();



        let activity_zone = '';
        activity_zone = $('[name=activity_zone]').val();


        $("#pager").sjAjaxPager({
            url: `index.php?r=activity/latest`,
            pageSize: 5,
            searchParam: {
                 type: activity_type,
                 zone: activity_zone
            },
            beforeSend: function () {
            },
            success: function (data) {

                var items = data['items'];
                var str = "";
                for (var i = 0, It = items.length; i < It; i++) {//循环
                    var temp1 = '<p>活动类型：' + items[i].activity_type +'</p>';
                    var temp2 ='<p>活动小区：' + items[i].activity_zone +'</p>';
                    var temp3 ='<p>活动地点：' + items[i].activity_place +'</p>';
                    var temp4 ='<p>活动时间：' + items[i].activity_st_time + '至' + items[i].activity_et_time + '</p>';
                    var temp5 ='<p>活动发起人：' + items[i].activity_founder +'</p>';
                    var temp6 ='<p>发起人联系方式：' + '<a href="tel:' + items[i].activity_phone + '">' +items[i].activity_phone + '</a>' +'</p>';
                    var temp7 ='<p>活动内容：' + items[i].activity_summary +'</p>';
                    str += '<div class="it_expertxt">' + temp1 + temp2 + temp3 + temp4 + temp5 + temp6 + temp7 + '</div>';
                }

                $(".latestlist").empty().append(str)//遍历在界面上

                // /*
                // *返回的数据根据自己需要处理
                // */
                // var tableStr = "<tr><td>Id</td><td>姓名</td><td>年龄</td></tr>";
                // $.each(data.items, function (i, v) {
                //     tableStr += "<tr><td>" + v.Id + "</td><td>" + v.Name + "</td><td>" + v.Age + "</td></tr>";
                // });
                // $('#dataTable').html(tableStr);
            },
            complete: function () {
            }
        });
    }


</script>




