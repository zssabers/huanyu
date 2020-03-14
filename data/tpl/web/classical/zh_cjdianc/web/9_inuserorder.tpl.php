<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/header', TEMPLATE_INCLUDEPATH)) : (include template('public/header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/comhead', TEMPLATE_INCLUDEPATH)) : (include template('public/comhead', TEMPLATE_INCLUDEPATH));?>
<link rel="stylesheet" type="text/css" href="../addons/zh_cjdianc/template/public/ygcsslist.css">
<style type="text/css">
    .yg5_key>div{float: left;line-height: 34px;}
    .store_td1{height: 45px;}
    .store_list_img{width: 40px;height: 40px;}
    .yg5_tabel{border-color: #e5e5e5;outline: 1px solid #e5e5e5;font-size: 12px;}
    .yg5_tr2>td{padding: 10px 15px;border: 1px solid #e5e5e5;text-align: center;}
    .yg5_tr1>th{
        border: 1px solid #e5e5e5;
        padding-left: 15px;
        background-color: #FAFAFA;
        font-weight: bold;
        text-align: center;
    }
    .yg5_btn{background-color: #EEEEEE;color: #333;border: 1px solid #E4E4E4;border-radius: 6px;width: 100px;height: 34px;}
    .store_inp{margin-left: 5px;}
    .ygshanchu{color: white;background-color: #44ABF7;}
    .accout_inp{width: 100%;height: 35px;border: 1px solid #cccccc;font-size: 14px;color: #333;}
/*    .navback{display: none;}*/
/*    .yg_back{margin-left: 170px;}*/
</style>
<ul class="nav nav-tabs">
    <span class="ygxian"></span>
    <div class="ygdangq">当前位置:</div>    
    <li <?php  if($type=='wm') { ?> class="active" <?php  } ?>><a href="<?php  echo $this->createWebUrl('inuserorder',array('type'=>wm,'user_id'=>$_GPC['user_id']));?>">外卖订单</a></li>
    <li <?php  if($type=='dn') { ?> class="active" <?php  } ?>><a href="<?php  echo $this->createWebUrl('inuserorder',array('type'=>dn,'user_id'=>$_GPC['user_id']));?>">店内订单</a></li>
    <li <?php  if($type=='yy') { ?> class="active" <?php  } ?>><a href="<?php  echo $this->createWebUrl('inuserorder',array('type'=>yy,'user_id'=>$_GPC['user_id']));?>">预约订单</a></li>
    <li <?php  if($type=='dm') { ?> class="active" <?php  } ?>><a href="<?php  echo $this->createWebUrl('inuserorder',array('type'=>dm,'user_id'=>$_GPC['user_id']));?>">当面付订单</a></li>


</ul>
<div class="main">
<div class="panel panel-default">
        <div class="panel-body">
        <form action="" method="get" class="col-md-4">
                   <input type="hidden" name="c" value="site" />
                   <input type="hidden" name="a" value="entry" />
                   <input type="hidden" name="m" value="zh_cjdianc" />
                   <input type="hidden" name="do" value="inuserorder" />
            <div class="input-group" style="width: 100px">
                <?php  echo tpl_form_field_daterange('time',$_GPC['time'],true);?>
                <span class="input-group-btn">
                    <input type="submit" class="btn btn-default" name="submit2" value="查找"/>
                </span>
            </div><!-- /input-group -->
            <input type="hidden" name="user_id" value="<?php  echo $_GPC['user_id'];?>"/>
            <input type="hidden" name="token" value="<?php  echo $_W['token'];?>"/>
        </form>
               </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            会员订单列表(总订单数:<?php  echo $number;?>)
        </div>
        <div class="panel-body" style="padding: 0px 15px;">
            <div class="row">
                <table class="yg5_tabel col-md-12" id="test_table">
                    <tr class="yg5_tr1">
                        <th class="store_td1 col-md-1" >金额</th>
                        <th class="col-md-2">支付方式</th>
                        <th class="col-md-2">商家名称</th>
                        <th class="col-md-1">下单时间</th>  
                    </tr>
                      <?php  if(is_array($list)) { foreach($list as $row) { ?>
                    <tr class="yg5_tr2">
                        <?php  $store=pdo_get('cjdc_store',array('id'=>$row['store_id']))?>
                        <td ><?php  echo $row['money'];?></td>
                        <td ><?php  if($row['pay_type']==1) { ?>微信支付<?php  } else if($row['pay_type']==2) { ?>余额支付<?php  } else if($row['pay_type']==3) { ?>积分支付<?php  } else if($row['pay_type']==4) { ?>货到付款<?php  } else if($row['pay_type']==5) { ?>餐后付款<?php  } ?></td>
                        <td ><?php  echo $store['name'];?></td>
                        <td ><?php  echo $row['time'];?></td>
                        
                    </tr>
                    <?php  } } ?>
                      <?php  if(empty($list)) { ?>
                    <tr class="yg5_tr2">
                        <td colspan="9">
                          暂无记录
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


<!-- <?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?> -->
<script type="text/javascript">
    $(function(){
        $("#frame-5").addClass("in");
        $("#frame-5").show();
        $("#yframe-5").addClass("wyactive");
        
    })
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
