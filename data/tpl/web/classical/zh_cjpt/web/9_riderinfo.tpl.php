<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/header', TEMPLATE_INCLUDEPATH)) : (include template('public/header', TEMPLATE_INCLUDEPATH));?>

<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/comhead', TEMPLATE_INCLUDEPATH)) : (include template('public/comhead', TEMPLATE_INCLUDEPATH));?>

<link rel="stylesheet" type="text/css" href="../addons/zh_cjpt/template/public/ygcss.css">

<style type="text/css">

  /*#frame-5{display: block;visibility: visible;}*/

  .yg_inp>input{margin-bottom: 10px;}

  .storeimg{

  	max-width: 300px;

  	max-height: 300px;

  }

  .bigzheng,.bigfan{min-width: 500px;min-height: 500px;max-width: 600px;max-height: 600px;}

  .xuanbtn1,.xuanbtn2,.xuanbtn3,.xuanbtn4{

    /* position: absolute; */

    bottom: 10px;

    right: 5%;



  }

</style>

<ul class="nav nav-tabs">    

  <span class="ygxian"></span>

  <div class="ygdangq">当前位置:</div>

  <li><a href="<?php  echo $this->createWebUrl('rider')?>">入驻审核</a></li>

  <li class="active"><a href="javascript:void(0);">入驻详情</a></li>

</ul>

<div class="main">

  <form action="" method="post" class="form-horizontal form" enctype="multipart/form-data" id="invitative">

    <div class="panel panel-default ygdefault">

      <div class="panel-heading wyheader">

        入驻审核&nbsp;>&nbsp;入驻详情

      </div>

      <div class="panel-body">
        <div class="form-group">
          <label class="col-xs-12 col-sm-3 col-md-2 control-label">骑手名称</label>
          <div class="col-sm-9">
            <input type="text" name="name" value="<?php  echo $item['name'];?>" id="web_name" class="form-control" />
          </div>
        </div>


        <div class="form-group">
          <label class="col-xs-12 col-sm-3 col-md-2 control-label">联系人电话</label>
          <div class="col-sm-9">
            <input type="text" name="tel" value="<?php  echo $item['tel'];?>" id="web_name" class="form-control" />
          </div>
        </div>
<!--        <div class="form-group">
          <label class="col-xs-12 col-sm-3 col-md-2 control-label">密码</label>
          <div class="col-sm-9">
            <input type="text" name="pwd" id="web_name" class="form-control" />
          </div>
        </div> -->
        <div class="form-group">
        <label class="col-xs-12 col-sm-3 col-md-2 control-label">工作状态</label>
          <div class="col-sm-9">
            <select class="col-sm-5 js_select" id="type testSelect" name="status" autocomplete="off">  
              <option value="1" <?php  if($item['status']=='1') { ?> selected <?php  } ?>>在岗</option>
              <option value="2" <?php  if($item['status']=='2') { ?> selected <?php  } ?>>休息</option>
            </select>
          </div>
           </div>
      <div class="form-group">
          <label class="col-xs-12 col-sm-3 col-md-2 control-label">logo</label>
          <div class="col-sm-9">
            <img class="storeimg attzheng" src="<?php  echo tomedia($item['logo']);?>" data-toggle="modal" >
          </div>
        </div>
      
       <div class="form-group">
          <label class="col-md-2 control-label">身份证正面照</label>
          <div class="col-sm-3">
      		<img class="storeimg attzheng" id="usertu1<?php  echo $row['id'];?>" src="<?php  echo tomedia($item['zm_img']);?>" data-toggle="modal" data-target="#myModalu<?php  echo $row['id'];?>">
          <!-- —————————放大图片——————————— -->

          	<div class="modal fade" id="myModalu<?php  echo $row['id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

                <div class="modal-dialog" role="document">

                    <div class="modal-content">

                        <div class="modal-header">

                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                            <h3 class="modal-title" id="myModalLabel">身份证正面照</h3>

                        </div>

                        <div class="modal-body" style="padding: 5px 30px 15px;text-align: center;">

                            <img class="bigzheng zhuan1" src="<?php  echo tomedia($item['zm_img']);?>">

                            <div class="btn btn-sm storeblue xuanbtn1">

                                <span class="fa fa-share"></span>点击旋转

                              </div>

                        </div>

                        

                        <div class="modal-footer">

                            <button type="button" class="btn btn-default" data-dismiss="modal">确定</button>



                        </div>

                    </div>

                </div>

            </div>

            <!-- —————————放大图片——————————— -->

            

          </div>

          <div class="col-md-2" style="text-align: right;">身份证反面照</div>

          	<div class="col-sm-3">

	            <img class="storeimg attfan" id="usertu2<?php  echo $row['id'];?>" src="<?php  echo tomedia($item['fm_img']);?>" data-toggle="modal" data-target="#myModalu2<?php  echo $row['id'];?>">

	          	<div class="modal fade" id="myModalu2<?php  echo $row['id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

	                <div class="modal-dialog" role="document">

	                    <div class="modal-content">

	                        <div class="modal-header">

	                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

	                            <h3 class="modal-title" id="myModalLabel">身份证反面照</h3>

	                        </div>

	                        <div class="modal-body" style="padding: 5px 30px 15px;text-align: center;">

	                            <img class="bigfan zhuan2" src="<?php  echo tomedia($item['fm_img']);?>">

                              <div class="btn btn-sm storeblue xuanbtn2">

                                <span class="fa fa-share"></span>点击旋转

                              </div>

	                        </div>

	                        

	                        <div class="modal-footer">

	                            <button type="button" class="btn btn-default" data-dismiss="modal">确定</button>

	                        </div>

	                    </div>

	                </div>

	            </div>

          	</div>

        </div>

    

      
      
    <div class="form-group">
      <label class="col-xs-12 col-sm-3 col-md-2 control-label">状态</label>
      <div class="col-sm-9">
        <select name="state" class="col-md-4">
          <?php  if($item['state']==1) { ?>
          <option value="1" selected>待审核</option>
          <option value="2" >已通过</option>
          <option value="3" >已拒绝</option>
          <?php  } else if($item['state']==2) { ?>
          <option value="1" >待审核</option>
          <option value="2" selected>已通过</option> 
          <option value="3" >已拒绝</option>
          <?php  } else if($item['state']==3) { ?>
          <option value="1" >待审核</option>
          <option value="2">已通过</option>
          <option value="3"  selected>已拒绝</option>
            <?php  } else if($item['state']==4) { ?>
          <option value="1" >待审核</option>
          <option value="2">已通过</option>
          <option value="3">已拒绝</option>
          <option value="4"  selected>已到期</option>
          <?php  } else { ?>
          <option value="1" >待审核</option>
          <option value="2">已通过</option>
          <option value="3">已拒绝</option>
           <option value="4" >已到期</option>
          <?php  } ?>
        </select>
      </div>
    </div>

     

</div>

</div>

<div class="form-group">
  <a class="btn col-sm-2" style="color: white;background-color: #44ABF7;" href="<?php  echo $this->createWebUrl('rider');?>">返回列表</a>
  <div class="col-sm-1"></div>
  <!--   <?php  if($item['state']==1) { ?>
  <a class="btn col-sm-2" style="color: white;background-color: #44ABF7;" href="<?php  echo $this->createWebUrl('rzcheck',array('id'=>$item['id'],'op'=>'adopt'));?>">通过</a>
  <div class="col-sm-1"></div>
  <a class="btn col-sm-2" style="color: white;background-color: #44ABF7;" href="<?php  echo $this->createWebUrl('rzcheck', array('id' => $item['id'],'op'=>'reject'));?>">拒绝</a>
   <?php  } ?> -->
   <input class="btn col-lg-3 col-lg-push-1" style="color: white;background-color: #44ABF7;" type="submit" name="submit" value="修改" /> 
  <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
  <input type="hidden" name="id" value="<?php  echo $item['id'];?>" />
</div>

</form>

</div>

<!-- <?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?> -->

<script type="text/javascript">

  $(function(){

    $("#frame-4").show();

    $("#yframe-4").addClass("wyactive");



    var zhuan1=0;

    $(".xuanbtn1").click(function(){

      zhuan1 = zhuan1+90;

      $(".zhuan1").css({"transform":"rotate("+zhuan1+"deg)"});

    })



    var zhuan2=0;

    $(".xuanbtn2").click(function(){

      zhuan2 = zhuan2+90;

      $(".zhuan2").css({"transform":"rotate("+zhuan2+"deg)"});

    })



    var zhuan3=0;

    $(".xuanbtn3").click(function(){

      zhuan3 = zhuan3+90;

      $(".zhuan3").css({"transform":"rotate("+zhuan3+"deg)"});

    })



    var zhuan4=0;

    $(".xuanbtn4").click(function(){

      zhuan4 = zhuan4+90;

      $(".zhuan4").css({"transform":"rotate("+zhuan4+"deg)"});

    })

  })

</script><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>