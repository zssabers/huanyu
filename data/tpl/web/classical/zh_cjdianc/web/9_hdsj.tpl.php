<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/header', TEMPLATE_INCLUDEPATH)) : (include template('public/header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/comhead', TEMPLATE_INCLUDEPATH)) : (include template('public/comhead', TEMPLATE_INCLUDEPATH));?>
<link rel="stylesheet" type="text/css" href="../addons/zh_cjdianc/template/public/ygcsslist.css">
<style type="text/css">
    .yg5_key>div{float: left;line-height: 34px;}
    .store_td1{height: 45px;}
    .store_list_img{width: 40px;height: 40px;}
    .yg5_tabel{border-color: #e5e5e5;outline: 1px solid #e5e5e5;text-align: center;}
    .yg5_tr2>td{padding: 10px;border: 1px solid #e5e5e5;}
    .yg5_tr1>td{

        border: 1px solid #e5e5e5;
        background-color: #FAFAFA;

        font-weight: bold;

    }
    .yg5_btn{background-color: #EEEEEE;color: #333;border: 1px solid #E4E4E4;border-radius: 6px;width: 100px;height: 34px;}
    .check_img{width: 45px;height: 45px;}
    .main{font-size: 12px;}
    .ygrow{margin-top: 20px;}
        .ordersucess{background-color: #44ABF7;color: white;}
    .ordersucess:hover{background-color: #44ABF7;color: white;}
        .reset_box{background: #fff;padding: 20px;overflow: hidden;margin-top: 20px}
    .reset_tip{font-size: 14px;}
    .reset_tip b{font-size: 26px;margin:0 5px 0 40px;color: #FFB025}
    .reset_tip span{font-size: 16px;font-weight: normal;color: #FFB025}
    .reset_tip a{color: #2589ff;background: #fff;border-color: #2589ff;margin-top: -15px;margin-left: 20px}
    .reset_tip a:hover{color: #fff;background: #2589ff}
    .reset_detail{margin-top: 20px}
    .reset_detail ul li{margin-top: 10px}
    .reset_detail ul li a{color: #2589ff}
    /*#frame-13{display: block;visibility: visible;}*/
</style>
<ul class="nav nav-tabs">
    <span class="ygxian"></span>
    <div class="ygdangq">当前位置:</div>    
    <li class="active"><a href="">活动商家</a></li>
</ul>
<div class="main">

    <div class="panel panel-default">

        <div class="panel-heading">

          活动商家列表

        </div>

        <div class="panel-body" style="padding: 0px 15px;">

          <div class="row">

            <table class="yg5_tabel col-md-12">

              <tr class="yg5_tr1">

                <td class="store_td1">商家logo</td>
                <td>商家名称</td>
                <td>商家地址</td>
                <td>商家联系方式</td>  
                <td>商家类型</td>
                </tr>
                <?php  if(is_array($list)) { foreach($list as $key => $item) { ?>
                <tr class="yg5_tr2">
                        <td ><img class="store_list_img" src="<?php  echo $item['logo'];?>"/></td>
                         <td ><?php  echo $item['name'];?></td>
                        <td><?php  echo $item['address'];?></td>
                        <td><?php  echo $item['tel'];?></td>
                        <td><?php  echo $item['type_name'];?></td>
                  </td>

                </tr>

                <?php  } } ?>
                <?php  if(empty($list)) { ?>
                <tr class="yg5_tr2">
                  <td colspan="5">
                    暂无商家参加
                  </td>
                </tr> 
                <?php  } ?>        



              </table>

            </div>

        </div>

    </div>

</div>

<div class="text-right we7-margin-top">
<?php  echo $pager;?>
</div>

<script type="text/javascript">
    $(function(){
        // $("#frame-13").addClass("in");
        $("#frame-13").show();
        $("#yframe-13").addClass("wyactive");
    })
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>