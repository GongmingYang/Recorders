<!DOCTYPE html>
<meta charset="UTF-8">
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <link href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!--    <link href="../../../public/css/login.css" rel="stylesheet" type="text/css" />-->
    <script src="../../../public/js/jsencrypt.js"></script>

    <script type="text/javascript" src="../../../public/js/sha2.js"></script>
    <script type="text/javascript" src="../../../public/js/aes.js"></script>
    <script type="text/javascript" src="../../../public/js/pkc.js"></script>

    <script type="text/javascript"  src="../../../public/js/jquery-1.12.3.min.js"></script>
    <script type="text/javascript" src="../../../public/js/qrcodejs/qrcode.js"></script>

</head>
<div  id='num'>
    <p></p>
</div>
<body>

<script type="text/javascript">
    function guanxiu_table(gt){
        // g_table name,sum_time,times
        var ret="<div class=\"container\"> <div class=\"row\"> <div class=\"col-xs-8 col-sm-8\">\n" +
            "    <table class='table table-hover table-bordered table-condensed'>\n" +
            "        <caption>观修修量表</caption>\n" +
            "        <thead>\n" +
            "        <colgroup>\n" +
            "            <col width='33%'></col>\n" +
            "            <col width='33%'></col>\n" +
            "            <col width='33%'></col>\n" +
            "            <col width='7%'></col>\n" +
            "        </colgroup>\n" +
            "        <tr><th>所修名及总修量</th>\n" +
            "            <th>所修坐次</th>\n" +
            "            <th>所修时间</th>\n" +
            "            <th>操作</th>\n" +
            "        </tr>\n" +
            "        </thead>";
        for(var t in gt){
            var cur_count = gt[t]['count'];
            var cur_sum_time = gt[t]['sum_time'];
            var count_id = gt[t]['uid']+'_'+gt[t]['type_id']+'_'+gt[t]['period_id'];

            // <tr><td>修量A</td>
            ret = ret + "<tr><td>" + gt[t]['typename'] +"</td>";

            // <td><span id='span1' class="badge" style='width:40%'>50000</span><input type='number' id='g000s' value='12' style='width:60%'></td>
            ret = ret + "<td><span id=\'";
            ret = ret + count_id + "_gc";
            ret = ret + "\' class=\'badge\' style=\'width:20%\'>";
            ret = ret + cur_count;
            ret = ret + "</span><input type=\'number\' id=\'";
            ret = ret + count_id + "_gtc";
            ret = ret + "\' value=\'1\' style=\'width:80%\'></td>"; // default is 1

            //     <td><span id='g.000.s' class="badge" style='width:40%'>num2</span><input type='number' id='g.000.t' value='240' style='width:60%'></td>
            ret = ret + "<td><span id=\'";
            ret = ret + count_id +"_gs";
            ret = ret + "' class=\'badge\' style=\'width:20%\'>";
            ret = ret + cur_sum_time;
            ret = ret + "</span><input type=\'number\' id=\'";
            ret = ret + count_id+"_gts";
            ret = ret +"\' value=\'30\' s=\'width:80%\'></td>";

            // <td><button uid='0' tid='0' pid='0' style='width:100%' class="btn btn-primary btn-xs pkc_gx_add">累加</button></td></tr>
            ret = ret + "<td><button id=\'";
            ret = ret + count_id+"_g_add" + "\' uid=\'"+gt[t]['uid']+"\' tid=\'"+gt[t]['type_id']+"\' pid=\'"+gt[t]['period_id'];
            ret = ret + "\' style=\'width:100%\' class=\'pkc_gx_add btn btn-primary btn-xs\'>累加</button></td></tr>";
        }
        ret = ret +"</table></div></div></div>";
        // ret = '<p>Here you are</p>';
        jQuery('#num').append($("<div id='guanxiu'></div>"));
        jQuery('#guanxiu').append(ret);
        return 0;
    }
    function niansong_table(gt){
        // s_table name,sum_time,times
        // <input type="text" id='s.id_number.n' value='' readonly>
        // <input type="number" id='s.id_number.s' value='' >
        var ret="<div class=\"container\"> <div class=\"row\"> <div class=\"col-xs-8 col-sm-8\">\n" +
            "    <table class='table table-hover table-bordered table-condensed'>\n" +
            "        <caption>念诵总量</caption>\n" +
            "        <thead>\n" +
            "        <colgroup>\n" +
            "            <col width='40%'></col>\n" +
            "            <col width='50%'></col>\n" +
            "            <col width='10%'></col>\n" +
            "        </colgroup>\n" +
            "        <tr><th>念诵</th>\n" +
            "            <th>总数量</th>\n" +
            "            <th>操作</th>\n" +
            "        </tr>\n" +
            "        </thead>";
        for(var t in gt){

            // <td><label id='g.000.n'></label>修量A</td>
            //     <td><span class="badge" style='width:40%'>500000</span><input type='number' id='g.000.s' value='12' style='width:60%'></td>
            //     <td><button type="g.000.t" style='width:100%' class="btn btn-primary btn-xs">累加</button></td>
            var cur_count = gt[t]['count'];
            var cur_sum_time = gt[t]['sum_time'];
            var count_id = gt[t]['uid']+'_'+gt[t]['type_id']+'_'+gt[t]['period_id'];

            ret = ret + "<tr><td>";
            ret = ret + gt[t]['typename'] +"</td>";
            ret = ret + "<td><span id=\'"+count_id + "_nc" + "\' class=\"badge\" style='width:30%'>";
            ret = ret + cur_count;
            ret = ret + "</span><input type='number' id='";
            ret = ret + count_id + "_ntc";
            ret = ret + "\' value='108' style='width:70%'></td>";
            ret = ret + "<td><button id='";
            ret = ret + count_id + "_nbc" + "\' uid=\'"+gt[t]['uid']+"\' tid=\'"+gt[t]['type_id']+"\' pid=\'"+gt[t]['period_id'];
            ret = ret + "\' style='width:100%\' class=\'pkc_n_add btn btn-primary btn-xs\'>累加</button></td></tr>";
        }
        ret = ret +"</table>";
        // ret = '<p>Here you are</p>';
        // $("<input type='text' id='niansong'>");
        jQuery('#num').append($("<div id='niansong'>"));
        jQuery('#niansong').append(ret);
    }
    function class_table(gt){
        var ret = "<div class=\"container\"> <div class=\"row\"> <div class=\"col-xs-8 col-sm-8\">\n" +
            "    <table class='table table-hover table-bordered table-condensed'>\n" +
            "        <caption>课程表</caption>\n" +
            "        <thead>\n" +
            "        <colgroup>\n" +
            "            <col width='60%'></col>\n" +
            "            <col width='20%'></col>\n" +
            "            <col width='20%'></col>\n" +
            "        </colgroup>\n" +
            "        <tr><th>课程</th>\n" +
            "            <th>视频学习</th>\n" +
            "            <th>法本阅读</th>\n" +
            "        </tr>\n" +
            "        </thead>";

        for(var t in gt){
            var cur_count = gt[t]['count'];
            var cur_sum_time = gt[t]['sum_time'];
            var count_id = gt[t]['uid']+'_'+gt[t]['type_id']+'_'+gt[t]['period_id'];
            ret = ret + "<tr><td>";
            ret = ret + gt[t]['typename'];


            ret = ret + "</td><td><div class=\'switch \' data-animated='true'><input type='checkbox' class='pkc_c_ck' id=\'";
            ret = ret + count_id+"_cv' xx='cv'" + " uid=\'"+gt[t]['uid']+"\' tid=\'"+gt[t]['type_id']+"\' pid=\'"+gt[t]['period_id']+ "\' ";
            // ret = ret + "</td><td><div id=\'";
            // ret = ret + count_id+"_cv' xx='cv'" + "\' uid=\'"+gt[t]['uid']+"\' tid=\'"+gt[t]['type_id']+"\' pid=\'"+gt[t]['period_id'];
            // ret = ret + "\' class=\'switch pkc_c_ck\' data-animated=\'true\'><input type=\'checkbox\'";
            if(gt[t]['listen_count']>0){
                ret = ret + " checked";
            }
            ret = ret + " /></div></td>";

            ret = ret + "</td><td><div class=\'switch \' data-animated='true'><input type='checkbox' class='pkc_c_ck' id=\'";
            ret = ret + count_id+"_cr' xx='cr'" + " uid=\'"+gt[t]['uid']+"\' tid=\'"+gt[t]['type_id']+"\' pid=\'"+gt[t]['period_id']+ "\' ";

            if(gt[t]['read_count']>0){
                ret = ret + " checked";
            }
            ret = ret + " /></div></td>";
            // <tr>
            //     <td>课程A</td>
            //     <td><div class="switch" data-animated="true">
            //         <input type="checkbox" class='c_video'/>
            //         </div></td>
            //     <td><div class="switch" data-animated="true">
            //         <input type="checkbox" class='c_text'/>
            //         </div></td>
        }
        ret = ret +"</table></div></div></div>";
        // ret = '<p>Here you are</p>';
        jQuery('#num').append($("<div id='myclass'></div>"));
        jQuery('#myclass').append(ret);
        return 0;
    }

    var g_table = [
    <?php foreach ($g_table as $row) { ?>
    {
        "uid": "<?= $row['uid'] ?>",
        "type_id": "<?= $row['type_id'] ?>",
        "period_id": "<?= $row['period_id'] ?>",
        "count": "<?= $row['count'] ?>",
        "sum_time": "<?= $row['sum_time'] ?>",
        "typename": "<?= $row['typename'] ?>",
    },
    <?php } ?>
    ];
    guanxiu_table(g_table);

    var c_table = [
    <?php foreach ($c_table as $row) { ?>
    {
        "uid": "<?= $row['uid'] ?>",
        "type_id": "<?= $row['type_id'] ?>",
        "period_id": "<?= $row['period_id'] ?>",
        "listen_count": "<?= $row['listen_count'] ?>",
        "read_count": "<?= $row['read_count'] ?>",
        "typename": "<?= $row['typename'] ?>",
    },
    <?php } ?>
    ];
    class_table(c_table);

    var n_table = [
    <?php foreach ($n_table as $row) { ?>
    {
        "uid": "<?= $row['uid'] ?>",
        "type_id": "<?= $row['type_id'] ?>",
        "period_id": "<?= $row['period_id'] ?>",
        "count": "<?= $row['count'] ?>",
        "typename": "<?= $row['typename'] ?>",
    },
    <?php } ?>
    ];
    niansong_table(n_table);
</script>


<script type="text/javascript">
    //add guangxiu
    jQuery('.pkc_gx_add').on('click',function(){
        var mydata = {};
        var url = 'http://www.howdypay.com/user/guanxiu';
        mydata['uid']=$(this).attr('uid');
        mydata['type_id']=$(this).attr('tid');
        mydata['period_id']=$(this).attr('pid');
        var count_id = mydata['uid']+'_'+mydata['type_id']+'_'+mydata['period_id'];
        mydata['count']=$('#'+count_id+'_gtc').val();
        mydata['sum_time']=$('#'+count_id+'_gts').val();
        //send post
        pkcajax(url,mydata,function (data){
            // alert('h');
            //update the result of $(this); uid/tid/pid
            jQuery('#'+count_id+'_gc').html(data['count']);
            jQuery('#'+count_id+'_gs').html(data['sum_time']);
        });
    });

    //add class
    jQuery('.pkc_c_ck').on('click',function(){
        var mydata = {};
        var url = 'http://www.howdypay.com/user/class';
        mydata['uid']=$(this).attr('uid');
        mydata['type_id']=$(this).attr('tid');
        mydata['period_id']=$(this).attr('pid');
        var count_id = mydata['uid']+'_'+mydata['type_id']+'_'+mydata['period_id'];
        if($(this).attr('xx')=='cv') {
            if($(this).prop("checked")) mydata['listen_count'] = 1;
            else mydata['listen_count'] = 0;
        }else if ($(this).attr('xx')=='cr') {
            if($(this).prop("checked")) mydata['read_count'] = 1;
            else  mydata['read_count'] = 0;
        }
        //send post
        pkcajax(url,mydata,function (data){

        });
    });

    //add niansong
    jQuery('.pkc_n_add').on('click',function(){
        var mydata = {};
        var url = 'http://www.howdypay.com/user/niansong';
        mydata['uid']=$(this).attr('uid');
        mydata['type_id']=$(this).attr('tid');
        mydata['period_id']=$(this).attr('pid');
        var count_id = mydata['uid']+'_'+mydata['type_id']+'_'+mydata['period_id'];
        mydata['count']=$('#'+count_id+'_ntc').val();

        //send post
        pkcajax(url,mydata,function (data){
            //update the result of $(this); uid/tid/pid
            jQuery('#'+count_id+'_nc').html(data['count']);
        });
    });

</script>
</body>

</html>