<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/header', TEMPLATE_INCLUDEPATH)) : (include template('public/header', TEMPLATE_INCLUDEPATH));?>

<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/comhead', TEMPLATE_INCLUDEPATH)) : (include template('public/comhead', TEMPLATE_INCLUDEPATH));?>

<link rel="stylesheet" type="text/css" href="../addons/zh_cjdianc/template/public/ygcss.css">

<ul class="nav nav-tabs">

    <span class="ygxian"></span>

    <div class="ygdangq">当前位置:</div>    

    <li><a href="<?php  echo $this->createWebUrl2('dlpsmoney')?>">配送费管理</a></li>

    <li class="active"><a href="javascript:void(0);">添加/编辑配送费</a></li>

</ul>

<div class="main">

    <form action="" method="post" class="form-horizontal form" enctype="multipart/form-data">

        <!--<input type="hidden" name="parentid" value="<?php  echo $parent['id'];?>" />-->

        <div class="panel panel-default ygdefault">

            <div class="panel-heading wyheader">

                添加/编辑配送费&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="red">(例如:配送距离起始值填0,配送距离结束值填5,价格填4,代表0-5公里范围内配送费4元钱)</font>

            </div>

            <div class="panel-body">

                <form class="form-horizontal" action="" method="POST">

<div class="form-group">

    <label for="inputEmail3" class="col-sm-2 control-label">配送距离起始值</label>

    <div class="col-sm-5">

      <div class="input-group">

          <input type="number"  name="start" value="<?php  echo $info['start'];?>" class="form-control" id="inputEmail3" placeholder="请填写配送距离起始值">

          <span class="input-group-addon">公里</span>

      </div>

    </div>

  </div>

<div class="form-group">

    <label for="inputEmail3" class="col-sm-2 control-label">配送距离结束值</label>

    <div class="col-sm-5">

      <div class="input-group">

          <input type="number"  name="end" value="<?php  echo $info['end'];?>" class="form-control" id="inputEmail3" placeholder="请填写配送距离结束值">

          <span class="input-group-addon">公里</span>

      </div>

    </div>

  </div>

<div class="form-group">



    <label for="inputEmail3" class="col-sm-2 control-label">价格</label>



    <div class="col-sm-5">

      <div class="input-group">
		<?php  if($info['money']) { ?>
        <input type="text"  name="money" value="<?php  echo $info['money'];?>" class="form-control" id="inputEmail3" placeholder="请填写金额">
		<?php  } else { ?>
		<input type="text"  name="money" value="5" class="form-control" id="inputEmail3" placeholder="请填写金额">
		<?php  } ?>
        <span class="input-group-addon">元</span>
      </div>

    </div>



  </div>

  <div class="form-group">



    <label for="inputEmail3" class="col-sm-2 control-label">排序</label>



    <div class="col-sm-5">

      <div class="input-group">

        <input type="number"  name="num" value="<?php  echo $info['num'];?>" class="form-control"  placeholder="请填写排序">

      </div>

    </div>



  </div>





     </div>



   <input type="hidden" name="id" value="<?php  echo $info['id'];?>"/>



  <input type="hidden" name="token" value="<?php  echo $_W['token'];?>"/>



  <div class="form-group" style="margin-top: 20px;">

      <input type="submit" name="submit" value="提交" class="btn col-lg-3" style="color: white;background-color: #44ABF7;"/>

  </div>

</form>



</div>

<script type="text/javascript">

    $(function(){

        $("#frame-0").show();

        $("#yframe-0").addClass("wyactive");

    })

</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>