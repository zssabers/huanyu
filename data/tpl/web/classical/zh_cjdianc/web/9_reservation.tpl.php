<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/header', TEMPLATE_INCLUDEPATH)) : (include template('public/header', TEMPLATE_INCLUDEPATH));?>

<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/comhead', TEMPLATE_INCLUDEPATH)) : (include template('public/comhead', TEMPLATE_INCLUDEPATH));?>
<link rel="stylesheet" type="text/css" href="../addons/zh_cjdianc/template/public/ygcsslist.css">
<style type="text/css">
  .store_td1{height: 45px;}
  .yg5_tabel{border-color: #e5e5e5;outline: 1px solid #e5e5e5;}
    .yg5_tr2>td{padding: 10px 20px;border: 1px solid #e5e5e5;text-align: center;}
    .yg5_tr1>th{
        border: 1px solid #e5e5e5;
        padding-left: 15px;
        background-color: #FAFAFA;
        font-weight: bold;
        text-align: center;
    }
</style>
<ul class="nav nav-tabs">
    <span class="ygxian"></span>
    <div class="ygdangq">当前位置:</div>    
    <li class="active"><a href="<?php  echo $this->createWebUrl('reservation')?>">预定时间</a></li>
    <li><a href="<?php  echo $this->createWebUrl('addreservation',array('op'=>'post'))?>">添加预定开放时间段</a></li>
      <li><a href="<?php  echo $this->createWebUrl('allreservation',array('op'=>'batch'))?>">批量新建</a></li>
</ul>
<div class="main"> 
    <div class="panel panel-default">
        <div class="panel-heading wyheader">
            预订开放时间段 列表
        </div>
        <div class="panel-body" style="padding: 0px 15px;">
            <div class="row">              
                <table class="yg5_tabel col-md-12">
                    <tr class="yg5_tr1">
                        <th class="store_td1">排序</th>
                        <th>预定时间点</th>                
                        <th>操作</th>
                    </tr>
                     <?php  if(is_array($list)) { foreach($list as $key => $item) { ?>

              <tr class="yg5_tr2">
                <td>
               <?php  echo $item['num'];?>
               </td>
               <td>
                <?php  echo $item['time'];?><?php  if($item['label']) { ?>(<?php  echo $item['label'];?>)<?php  } ?>
               </td> 
                <td>
                    <a href="<?php  echo $this->createWebUrl('addreservation',array('id'=>$item['id']));?>" class="storespan btn btn-xs">
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
                  <!-- <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal<?php  echo $item['id'];?>">删</button> -->
                </td>
               <!--  <td> <?php  echo $pager;?></td> -->
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
                            <a href="<?php  echo $this->createWebUrl('reservation', array('id'=>$item['id'],'op'=>'delete'));?>" type="button" class="btn btn-info" >确定</a>
                        </div>
                    </div>
                </div>
            </div>
               <?php  } } ?>
              <?php  if(empty($list)) { ?>
             <tr class="yg5_tr2">
                <td  colspan="8">
                  尚未添加预定时间段
                </td>
              </tr>
              <?php  } ?>
          </table>
        </div>
      </div>
    </div>
</div>
<div class="text-right we7-margin-top"><?php  echo $pager;?></div>
<script type="text/javascript">
    $(function(){
        // $("#frame-3").addClass("in");
        $("#frame-3").show();
        $("#yframe-3").addClass("wyactive");
    })
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>