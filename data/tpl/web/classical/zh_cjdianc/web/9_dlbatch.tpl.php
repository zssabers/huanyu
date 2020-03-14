<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/header', TEMPLATE_INCLUDEPATH)) : (include template('public/header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/comhead', TEMPLATE_INCLUDEPATH)) : (include template('public/comhead', TEMPLATE_INCLUDEPATH));?>
<link rel="stylesheet" type="text/css" href="../addons/zh_cjdianc/template/public/ygcss.css">
<style type="text/css">
  .addtabel1{margin-left: 20px;}
  .addtabel2{height: 34px;border: 1px solid #e5e5e5;}
</style>
<ul class="nav nav-tabs">
    <span class="ygxian"></span>
    <div class="ygdangq">当前位置:</div>    
    <li><a href="<?php  echo $this->createWebUrl2('dltable2')?>">餐桌列表</a></li>
    <li class="active"><a href="">添加餐桌</a></li>
</ul>
<div class="main">
  <div class="panel panel-default ygdefault">

        <div class="panel-heading wyheader">批量添加餐桌</div>

        <div class="panel-body">

<form class="form-horizontal" action="" method="POST">


<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">餐桌名称</label>
    <div class="col-sm-10">
      <input type="text"  name="name" value="<?php  echo $list['name'];?>" class="form-control" id="inputEmail3" placeholder="请填写餐桌名称">
    </div>
  </div>

 <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">可就餐人数</label>
    <div class="col-sm-10">
      <input type="number"  name="num" value="<?php  echo $list['num'];?>" class="form-control" id="inputEmail3" placeholder="请填写就餐人数">
    </div>
  </div>



   <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">标签</label>
    <div class="col-sm-10">
      <input type="text"  name="tag" value="<?php  echo $list['tag'];?>" class="form-control" id="inputEmail3" placeholder="请填写标签">
    </div>
  </div>

   <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">桌台分类</label>
    <div class="col-sm-10">
       <select class="form-control" name="type_id"> 
    <?php  if(is_array($type)) { foreach($type as $key => $item) { ?>
       <?php  if($item['id']==$list['type_id']) { ?>
      <option value="<?php  echo $item['id'];?>" selected="selected"><?php  echo $item['name'];?></option>
      <?php  } else { ?>
      <option value="<?php  echo $item['id'];?>" ><?php  echo $item['name'];?></option>
      <?php  } ?>
     <?php  } } ?>
    </select>
    </div>
  </div>

<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">餐桌创建数量</label>
    <div class="col-sm-10">
      <input type="number"  name="table_count" value="<?php  echo $list['table_count'];?>" class="form-control" id="inputEmail3" placeholder="请填写餐桌名称">
      <span class="help-block">根据创建的桌台数量，系统会自动依据起始桌台号依次递增
      <br>
       例如C001, C002, C003, C004.....,一次最多创建10张桌台
                        
      </span>
    </div>
  </div>

<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">顺序</label>
    <div class="col-sm-10">
      <input type="text"  name="orderby" value="<?php  echo $list['orderby'];?>" class="form-control" id="inputEmail3" placeholder="请填写顺序">
    </div>
  </div>


    <div class="form-group">
          <input type="submit" name="submit" value="提交" class="btn col-lg-3 col-lg-offset-3" style="color: white;background-color: #44ABF7;"/>
          <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
          <input type="hidden" name="id" value="<?php  echo $list['id'];?>" />
      </div>

</form>

</div>
</div>
</div>
<script type="text/javascript">
    $(function(){
        // $("#frame-3").addClass("in");
        $("#frame-3").show();
        $("#yframe-3").addClass("wyactive");
    })
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>