<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/header', TEMPLATE_INCLUDEPATH)) : (include template('public/header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/comhead', TEMPLATE_INCLUDEPATH)) : (include template('public/comhead', TEMPLATE_INCLUDEPATH));?>
<style>
   .navback{width: 0}
    .main{margin: 16px 0px 30px 45px;}
    .nav_box{
        left: 150px;
        top: 48px;
        bottom: 0;
        color: #333;
        border-right: 1px solid #efefef;
        text-align: center;
        position: fixed;
        background: #fff;
        z-index: 99;   
        padding:0;     
    }
    .left_nav{
        padding-top: 20px
    }
    .left_nav li{
        line-height: 45px;
    }
    .left_nav li.active{
        color: #00aeff;
        background: #edf6ff
    }
    .left_nav li:hover{
        background: #edf6ff;
    }
    .left_nav li:hover a{
        color: #00aeff;
    }
</style>
<link rel="stylesheet" type="text/css" href="../addons/zh_cjdianc/template/public/ygcss.css">
<div class="nav_box col-md-1">
    <ul class="left_nav">
    <!--     <span class="ygxian"></span>
        <div class="ygdangq">当前位置:</div>  -->   
      <li><a href="<?php  echo $this->createWebUrl2('dlincoupons')?>">优惠券列表</a></li>
      <li class="active"><a href="<?php  echo $this->createWebUrl2('dlinaddcoupons')?>">添加/编辑优惠券</a></li>
    </ul>
</div>

<!-- <ul class="nav nav-tabs">
    <span class="ygxian"></span>
    <div class="ygdangq">当前位置:</div>
    <li><a href="<?php  echo $this->createWebUrl2('dlincoupons')?>">优惠券管理</a></li>
    <li class="active"><a href="<?php  echo $this->createWebUrl2('dlinaddcoupons')?>">添加/编辑优惠券</a></li>
</ul> -->
<div class="main">
    <form action="" method="post" class="form-horizontal form" enctype="multipart/form-data">
        <div class="panel panel-default ygdefault">
            <div class="panel-heading wyheader">
                添加/编辑优惠券
            </div>
        <div class="panel-body">
                <form class="form-horizontal" action="" method="POST">
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">优惠券名称</label>
    <div class="col-sm-10">
      <input type="text"  name="name" value="<?php  echo $list['name'];?>" class="form-control" id="inputEmail3" placeholder="请填写优惠券名称">
    </div>
  </div>
  <div class="form-group">
      <label for="inputEmail3" class="col-sm-2 control-label">优惠券类型</label>
      <div class="col-sm-10">
        <select class="form-control djyy" name="category"> 
          <?php  if($list['category']==1) { ?>  
            <option value="1" selected="selected">普通券</option>  
            <option value="2">异业券</option>
          <?php  } else if($list['category']==2) { ?>
            <option value="1" >普通券</option>    
            <option value="2" selected="selected">异业券</option>
			<?php  } else { ?>
            <option value="1" >普通券</option>
            <option value="2">异业券</option>
          <?php  } ?>
        </select>
      </div>
    </div>
	            <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">是否设置领取数量
                        <span class="timeygbox"></span>
                    </label>
                    <div class="col-sm-9">
                        <label class="radio-inline">
                            <input type="radio" id="emailwye3" name="is_lqs" value="2" <?php  if($list['is_lqs']==2) { ?>checked<?php  } ?> />
                            <label for="emailwye3">是</label>
                        </label>
                        <label class="radio-inline">
                            <input type="radio" id="emailwye4" name="is_lqs" value="1" <?php  if($list['is_lqs']==1) { ?>checked<?php  } ?> />
                            <label for="emailwye4">否</label>	
                        </label>
						<label class="radio-inline">
						<input type="number"  name="dc_num" value="<?php  echo $list['dc_num'];?>" class="form-control" id="inputEmail3" placeholder="请填写领取数量">
						</label>
						<div class="help-block">* 设置为是则用户领取使用后可以继续领取设置的数量，为否则只能领取一次且使用一次</div>
                    </div>
                </div>
				
	<div class="form-group djshow" style="display:none">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">是否为独家异业券
                        <span class="timeygbox"></span>
                    </label>
                    <div class="col-sm-9">
                        <label class="radio-inline">
                            <input type="radio" id="emailwye1" name="is_dj" value="1" <?php  if($list['is_dj']==1) { ?>checked<?php  } ?> />
                            <label for="emailwye1">是</label>
                        </label>
                        <label class="radio-inline">
                            <input type="radio" id="emailwye2" name="is_dj" value="0" <?php  if($list['is_dj']==0) { ?>checked<?php  } ?> />
                            <label for="emailwye2">否</label>
                        </label>
                    </div>

     </div>
   <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">优惠条件金额</label>
    <div class="col-sm-5">
      <div class="input-group">
          <input type="text" onkeyup="value=value.replace(/[^\d.]/g,'')"  name="full" value="<?php  echo $list['full'];?>" class="form-control" id="inputEmail3" placeholder="请填写优惠条件金额">
          <span class="input-group-addon">元</span>
      </div>
	  <div class="help-block">* 例：满100减30元；则优惠条件金额填写100元，优惠金额填写30元</div>
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">优惠金额</label>
    <div class="col-sm-5">
      <div class="input-group">
        <input type="text" onkeyup="value=value.replace(/[^\d.]/g,'')"  name="reduce" value="<?php  echo $list['reduce'];?>" class="form-control" id="inputEmail3" placeholder="请填写优惠金额">
        <span class="input-group-addon">元</span>
      </div>
	  <div class="help-block">* 例：满100减30元；则优惠条件金额填写100元，优惠金额填写30元</div>
    </div>
  </div>
  
  <div class="form-group">
      <label for="inputEmail3" class="col-sm-2 control-label">优惠券佣金类型</label>
      <div class="col-sm-10">
        <select class="form-control commissiontype" name="commissiontype"> 
          <?php  if($list['commission']>0) { ?>  
            <option value="1" selected="selected">固定佣金</option>  
            <option value="2">提点佣金</option>
          <?php  } else if($list['commission_td']>0) { ?>
            <option value="1" >固定佣金</option>    
            <option value="2" selected="selected">提点佣金</option>
			<?php  } else { ?>
            <option value="1">固定佣金</option>
            <option value="2">提点佣金</option>
          <?php  } ?>
        </select>
      </div>
    </div>
	
  <div class="form-group commission">
    <label for="inputEmail3" class="col-sm-2 control-label">优惠券固定佣金</label>
    <div class="col-sm-5">
      <div class="input-group">
        <input type="text" onkeyup="value=value.replace(/[^\d.]/g,'')"  name="commission" value="<?php  echo $list['commission'];?>" class="form-control ss1" id="inputEmail3" placeholder="请填写优惠劵佣金金额">
        <span class="input-group-addon">元</span>
      </div>
	  <div class="help-block">* 异业券固定佣金不得为0元</div>
    </div>
  </div>
  
  <div class="form-group commission_td" style="display:none">
    <label for="inputEmail3" class="col-sm-2 control-label">优惠券提点佣金比</label>
    <div class="col-sm-5">
      <div class="input-group">
        <input type="text" onkeyup="value=value.replace(/[^\d.]/g,'')"  name="commission_td" value="<?php  echo $list['commission_td'];?>" class="form-control ss2" id="inputEmail3" placeholder="请填写优惠劵提点佣金比">
        <span class="input-group-addon">%</span>
      </div>
	  <div class="help-block">* 异业券佣金提点比不得低于1%</div>
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">优惠券数量</label>
    <div class="col-sm-10">
      <input type="number"  name="number" value="<?php  echo $list['number'];?>" class="form-control" id="inputEmail3" placeholder="请填写优惠券数量">
    </div>
  </div>
  <?php  if($list['id']) { ?>
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">优惠券剩余数量</label>
    <div class="col-sm-10">
      <input type="number"  name="stock" value="<?php  echo $list['stock'];?>" class="form-control" id="inputEmail3" placeholder="请填写优惠券剩余数量">
    </div>
  </div>
  <?php  } ?>
  <div class="form-group lqshow" style="display:none">
    <label for="inputEmail3" class="col-sm-2 control-label">异业券单次领取数量</label>
    <div class="col-sm-10">
      <input type="number"  name="lq_num" value="<?php  echo $list['lq_num'];?>" class="form-control" id="inputEmail3" placeholder="请填写单次领取数量">
	  <span class="help-block">* 异业券类型填写(-1 为无限制)，普通券请勿填写</span>
    </div>
  </div>
<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">优惠券时间</label>
    <div class="col-sm-10">
    <?php  echo tpl_form_field_dateranges('time',array('start' =>$list['start_time'], 'end' =>$list['end_time']));?> 
    </div>
  </div>

    <div class="form-group">
      <label for="inputEmail3" class="col-sm-2 control-label">设置使用范围</label>
      <div class="col-sm-10">
        <select class="form-control" name="type"> 
          <?php  if($list['type']==1) { ?>  
            <option value="1" selected="selected">仅限外卖使用</option>  
            <option value="2">仅限店内使用</option>
            <option value="3">两者都可使用</option>
          <?php  } else if($list['type']==2) { ?>
            <option value="1" >仅限外卖使用</option>    
            <option value="2" selected="selected">仅限店内使用</option>
            <option value="3">两者都可使用</option>
          <?php  } else if($list['type']==3) { ?>
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
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">使用说明</label>
    <div class="col-sm-10">
      <input type="text"  name="instruction" value="<?php  echo $list['instruction'];?>" class="form-control" id="inputEmail3" placeholder="请填写使用说明">
    </div>
  </div>
   <input type="hidden" name="id" value="<?php  echo $list['id'];?>"/>
  <input type="hidden" name="token" value="<?php  echo $_W['token'];?>"/>
  <div class="form-group" style="margin-top: 20px;">
      <input type="submit" name="submit" value="提交" class="btn col-lg-3" style="color: white;background-color: #44ABF7;"/>
  </div>
</form>
</div>
<script type="text/javascript">
    $(function(){
		$(document).ready(function(){
		 var da = $(".commissiontype option:selected").val();
		 var das = $(".djyy option:selected").val();
		 if(da==2){
		 $(".commission_td").show();
		 $(".commission").hide();
		 $(".ss1").val(0);
		 }else{
		 $(".commission").show();
		 $(".commission_td").hide();
		 $(".ss2").val(0);
		 }
		 
		 if(das==2){
		 $(".lqshow").show();
		 $(".djshow").show();
		 }else{
		 $(".lqshow").hide();
		 $(".djshow").hide();
		 }
		})
	 
     $('.commissiontype').change(function () {
	 var da = $(".commissiontype option:selected").val();
	 if(da==2){
	 $(".commission_td").show();
	 $(".commission").hide();
	 $(".ss1").val(0);
	 }else{
	 $(".commission").show();
	 $(".commission_td").hide();
	 $(".ss2").val(0);
	 }
	 })
	 
	 $('.djyy').change(function () {
	 var das = $(".djyy option:selected").val();
	 if(das==2){
	 $(".lqshow").show();
	 $(".djshow").show();
	 }else{
	 $(".lqshow").hide();
	 $(".djshow").hide();
	 }
	 })
		
    })
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>