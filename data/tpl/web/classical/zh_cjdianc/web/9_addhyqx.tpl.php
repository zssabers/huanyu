<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/header', TEMPLATE_INCLUDEPATH)) : (include template('public/header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/comhead', TEMPLATE_INCLUDEPATH)) : (include template('public/comhead', TEMPLATE_INCLUDEPATH));?>
<link rel="stylesheet" type="text/css" href="../addons/zh_cjdianc/template/public/ygcss.css">
<ul class="nav nav-tabs">    
    <li ><a href="<?php  echo $this->createWebUrl('hyqx')?>">会员期限</a></li>
    <li class="active"><a href="<?php  echo $this->createWebUrl('addhyqx')?>">添加会员期限</a></li>
</ul>
<div class="main">
    <form action="" method="post" class="form-horizontal form" enctype="multipart/form-data">
        <!--<input type="hidden" name="parentid" value="<?php  echo $parent['id'];?>" />-->
        <div class="panel panel-default ygdefault">
            <div class="panel-heading wyheader">
                会员期限
            </div>
        <div class="panel-body">
                <form class="form-horizontal" action="" method="POST">
    <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">会员时间(月)</label>
                    <div class="col-sm-9">
                        <input type="number" name="days"  class="form-control" value="<?php  echo $info['days'];?>" />
                        *请输入会员的月数
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">价格</label>
                    <div class="col-sm-9">
                        <input type="text" name="money" onkeyup="value=value.replace(/[^\d.]/g,'')" class="form-control" value="<?php  echo $info['money'];?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">排序</label>
                    <div class="col-sm-9">
                        <input type="number" name="num"  class="form-control" value="<?php  echo $info['num'];?>" />
                        *从小到大排序
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
        $("#frame-16").show();
        $("#yframe-16").addClass("wyactive");
    })
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>