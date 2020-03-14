<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/header', TEMPLATE_INCLUDEPATH)) : (include template('public/header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/comhead', TEMPLATE_INCLUDEPATH)) : (include template('public/comhead', TEMPLATE_INCLUDEPATH));?>
<link rel="stylesheet" type="text/css" href="../addons/zh_cjdianc/template/public/ygcss.css">
<style type="text/css">
    .yg5_key>div{float: left;line-height: 34px;}
    .store_td1{height: 45px;}
    .store_list_img{width: 60px;height: 60px;}
    .yg5_tabel{border-color: #e5e5e5;outline: 1px solid #e5e5e5;}
    .yg5_tr2>td{padding: 10px 15px;border: 1px solid #e5e5e5;}
    .yg5_tr1>th{
        border: 1px solid #e5e5e5;
        padding-left: 15px;
        background-color: #FAFAFA;
        font-weight: bold;
    }
    .yg5_btn{background-color: #EEEEEE;color: #333;border: 1px solid #E4E4E4;border-radius: 6px;width: 100px;height: 34px;}
	.navback{display:none}
	.yg_back {margin-left: 150px;}
</style>
<ul class="nav nav-tabs">
    <span class="ygxian"></span>
    <div class="ygdangq">当前位置:</div>    
    <li><a href="<?php  echo $this->createWebUrl2('voucher')?>">充值活动管理</a></li>
    <li class="active"><a href="<?php  echo $this->createWebUrl2('addvoucher')?>">添加/编辑套餐</a></li>
</ul>
<div class="main">
    <form action="" method="post" class="form-horizontal form" enctype="multipart/form-data">
        <!--<input type="hidden" name="parentid" value="<?php  echo $parent['id'];?>" />-->
        <div class="panel panel-default ygdefault">
            <div class="panel-heading wyheader">
                添加/编辑套餐
            </div>
            <div class="panel-body">
                <form class="form-horizontal" action="" method="POST">



  <div class="form-group">

    <label for="inputEmail3" class="col-sm-2 control-label">套餐名称</label>

    <div class="col-sm-10">

      <input type="text"  name="czname" value="<?php  echo $list['czname'];?>" class="form-control" id="inputEmail3" placeholder="请填写套餐名称">

    </div>

  </div>
  
  <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">套餐开关</label>
                    <div class="col-sm-9">
                        <span class="radio-inline">
                            <input id="mored" type="radio" name="state" value="1" <?php  if($list['state']==1) { ?>checked<?php  } ?> />
                            <label for="mored">开启</label>              
                        </span>
                        <span class="radio-inline">
                            <input id="moredan" type="radio" name="state" value="0" <?php  if($list['state']==0) { ?>checked<?php  } ?> /> 
                            <label for="moredan">关闭</label>
                        </span>
                    </div>
      </div>
	  
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">活动充值金额</label>
    <div class="col-sm-5">
      <div class="input-group">
          <input type="text" onkeyup="value=value.replace(/[^\d.]/g,'')"  name="czjenum" value="<?php  echo $list['czjenum'];?>" class="form-control" id="inputEmail3" placeholder="请填写充值金额">
          <span class="input-group-addon">元</span>
      </div>
	  <div class="help-block">*最低不得低于<?php  echo $hdsz['zd_czjenum'];?>元</div>
    </div>
  </div>

<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">优惠券名称</label>
    <div class="col-sm-10">
      <input type="text"  name="name" value="<?php  echo $coupon['name'];?>" class="form-control" id="inputEmail3" placeholder="请填写优惠券名称">
    </div>
  </div>
   <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">优惠条件金额</label>
    <div class="col-sm-5">
      <div class="input-group">
          <input type="text" onkeyup="value=value.replace(/[^\d.]/g,'')"  name="full" value="<?php  echo $list['full'];?>" class="form-control" id="inputEmail3" placeholder="请填写优惠条件金额">
          <span class="input-group-addon">元</span>
      </div>
	  <div class="help-block">*最低不得低于<?php  echo $hdsz['yhq_full'];?>元</div>
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">优惠金额</label>
    <div class="col-sm-5">
      <div class="input-group">
        <input type="text" onkeyup="value=value.replace(/[^\d.]/g,'')"  name="reduce" value="<?php  echo $list['reduce'];?>" class="form-control" id="inputEmail3" placeholder="请填写优惠金额">
        <span class="input-group-addon">元</span>
      </div>
	  <div class="help-block">*最低不得低于<?php  echo $hdsz['yhq_reduce'];?>元</div>
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">优惠券佣金</label>
    <div class="col-sm-5">
      <div class="input-group">
        <input type="text" onkeyup="value=value.replace(/[^\d.]/g,'')"  name="commission" value="<?php  echo $coupon['commission'];?>" class="form-control" id="inputEmail3" placeholder="请填写优惠劵佣金金额">
        <span class="input-group-addon">元</span>
      </div>
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">赠送优惠券数量</label>
    <div class="col-sm-10">
      <input type="number"  name="yhqnum" value="<?php  echo $list['yhqnum'];?>" class="form-control" id="inputEmail3" placeholder="请填写赠送优惠券数量">
	   <div class="help-block">*最低不得低于<?php  echo $hdsz['zd_yhqnum'];?>张</div>
    </div>
	
  </div>
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">优惠券时间</label>
    <div class="col-sm-10">
    <?php  echo tpl_form_field_dateranges('time',array('start' =>$coupon['start_time'], 'end' =>$coupon['end_time']));?> 
    </div>
  </div>
  <div class="form-group">

    <label for="inputEmail3" class="col-sm-2 control-label">使用说明</label>

    <div class="col-sm-10">

      <input type="text"  name="instruction" value="<?php  echo $coupon['instruction'];?>" class="form-control" id="inputEmail3" placeholder="请填写使用说明">

    </div>

  </div>
  <div class="form-group">

    <label for="inputEmail3" class="col-sm-2 control-label">充值说明</label>

    <div class="col-sm-10">

      <input type="text"  name="des" value="<?php  echo $list['des'];?>" class="form-control" id="inputEmail3" placeholder="请填写充值说明">

    </div>

  </div>
   <div class="form-group">
      <label for="inputEmail3" class="col-sm-2 control-label">设置使用范围</label>
      <div class="col-sm-10">
        <select class="form-control" name="type"> 
          <?php  if($coupon['type']==1) { ?>  
            <option value="1" selected="selected">仅限外卖使用</option>  
            <option value="2">仅限店内使用</option>
            <option value="3">两者都可使用</option>
          <?php  } else if($coupon['type']==2) { ?>
            <option value="1" >仅限外卖使用</option>    
            <option value="2" selected="selected">仅限店内使用</option>
            <option value="3">两者都可使用</option>
          <?php  } else if($coupon['type']==3) { ?>
            <option value="1" >仅限外卖使用</option>  
            <option value="2">仅限店内使用</option>
            <option value="3" selected="selected">两者都可使用</option>
          <?php  } else { ?>
            <option value="1" >仅限外卖使用</option>
            <option value="2">仅限店内使用</option>
            <option value="3">两者都可使用</option>
          <?php  } ?>
        </select>
      </div>
    </div>
     </div>

   <input type="hidden" name="id" value="<?php  echo $list['id'];?>"/>
   <input type="hidden" name="coupon_id" value="<?php  echo $coupon['id'];?>"/>
  <input type="hidden" name="token" value="<?php  echo $_W['token'];?>"/>

  <div class="form-group" style="margin-top: 20px;">
      <input type="submit" name="submit" value="提交" class="btn col-lg-3" style="color: white;background-color: #44ABF7;"/>
  </div>
</form>

</div>
<script type="text/javascript">
    $(function(){
        $("#frame-4").show();
        $("#yframe-4").addClass("wyactive");
    })
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>