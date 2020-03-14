<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/header', TEMPLATE_INCLUDEPATH)) : (include template('public/header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/comhead', TEMPLATE_INCLUDEPATH)) : (include template('public/comhead', TEMPLATE_INCLUDEPATH));?>
<link rel="stylesheet" type="text/css" href="../addons/zh_cjdianc/template/public/ygcsslist.css">
<style type="text/css">
    .yg5_key>div{float: left;line-height: 34px;}
    .store_td1{height: 45px;}
    .store_list_img{width: 60px;height: 60px;}
    .yg5_tabel{border-color: #e5e5e5;outline: 1px solid #e5e5e5;}
    .yg5_tr2>td{padding: 10px 15px;border: 1px solid #e5e5e5;text-align: center;}
    .yg5_tr1>th{
        border: 1px solid #e5e5e5;
        padding-left: 15px;
        background-color: #FAFAFA;
        font-weight: bold;
        text-align: center;
    }
    .yg5_btn{background-color: #EEEEEE;color: #333;border: 1px solid #E4E4E4;border-radius: 6px;width: 100px;height: 34px;}
    .yangshi>a{color: #44ABF7;font-size: 14px;}
    .ygbody{border-color: #B3D6FF;background-color: #EEF6FF;color: #595961;border-radius: 6px;}
</style>
<ul class="nav nav-tabs">
    <span class="ygxian"></span>
    <div class="ygdangq">当前位置:</div>      
    <li class="active"><a href="<?php  echo $this->createWebUrl('account')?>">账号管理</a></li>
    <li><a href="<?php  echo $this->createWebUrl('countadd')?>">添加/编辑账号</a></li>
</ul>
<div class="main">
    <div class="panel panel-default ygbody">
        <div class="panel-body">
            <p class="yangshi">商户后台登陆地址:&nbsp;&nbsp;<a href="<?php  echo $_W['siteroot'];?>web/cjdianc.php?c=user&a=login" target="_blank"><?php  echo $_W['siteroot'];?>web/cjdianc.php?c=user&a=login</a></p>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            账号管理
        </div>
        <div class="panel-body" style="padding: 0px 15px;">
            <div class="row">
                <table class="yg5_tabel col-md-12">
                    <tr class="yg5_tr1">

                        <th class="col-md-1 store_td1">(ID)账号</th>
                        <th class="col-md-1">所属门店</th>
                        <!-- <th class="col-md-2">角色</th> -->
                       <th class="col-md-2">状态</th>
                        <th class="col-md-2">操作</th>
                    </tr>
                       <?php  if(is_array($list)) { foreach($list as $key => $item) { ?>
                    <tr class="yg5_tr2">
                       
                        <td><div class="type-parent"><?php  echo $item['username'];?></div></td>
                        <td><div class="type-parent"><?php  echo $item['seller_name'];?></div></td>
                        <!-- <td><a class="btn btn-info btn-sm" href="javascript:void(0);">店长</a></td> -->
                        <?php  if($item['status']==2) { ?>
                      <td><a class="btn storeblue btn-xs" href="javascript:void(0);">启用</a></td> 
                      <?php  } else if($item['status']==1) { ?>
                       <td><a class="btn storegrey btn-xs" href="javascript:void(0);">禁用</a></td> 
                       <?php  } ?>
                        <td>
                            <a href="<?php  echo $this->createWebUrl('countadd', array('id' => $item['id']))?>" class="storespan btn btn-xs">
                                <span class="fa fa-pencil"></span>
                                <span class="bianji">编辑
                                    <span class="arrowdown"></span>
                                </span>                            
                            </a>
                            <a href="javascript:void(0);" class="storespan btn btn-xs" data-toggle="modal" data-target="#myModal<?php  echo $item['id'];?>">
                                <span class="fa fa-trash-o"></span>
                                <span class="bianji">删除
                                    <span class="arrowdown"></span>
                                </span>
                            </a>
                            <!-- <a class="btn btn-warning btn-sm" href="<?php  echo $this->createWebUrl('countadd', array('id' => $item['id']))?>" title="编辑">改</a>&nbsp;&nbsp;
                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal<?php  echo $item['id'];?>">删</button> -->
                        </td>
                    </tr>
                    <div class="modal fade" id="myModal<?php  echo $item['id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel" style="font-size: 20px;">提示</h4>
                        </div>
                        <div class="modal-body" style="font-size: 20px">
                            确定删除么？
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                            <a href="<?php  echo $this->createWebUrl('account', array('op' => 'delete', 'id' => $item['id']))?>" type="button" class="btn btn-info" >确定</a>
                        </div>
                    </div>
                </div>
            </div>
                      <?php  } } ?>
                
              <?php  if(empty($list)) { ?>
             <tr class="yg5_tr2">
                <td colspan="4">
                  暂无门店账号信息
                </td>
              </tr>
             
              <?php  } ?>                    
                </table>
            </div>
        </form>
    </div>
    <?php  echo $pager;?>
</div>
<script type="text/javascript">
    $(function(){
        $("#frame-0").show();
        $("#yframe-0").addClass("wyactive");
    })
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>