<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/header', TEMPLATE_INCLUDEPATH)) : (include template('public/header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/comhead', TEMPLATE_INCLUDEPATH)) : (include template('public/comhead', TEMPLATE_INCLUDEPATH));?>
<link rel="stylesheet" type="text/css" href="../addons/zh_cjdianc/template/public/ygcsslist.css">
<style type="text/css">
    .yg5_key>div{float: left;line-height: 34px;}
    .store_td1{height: 45px;}
    .store_list_img{width: 40px;height: 40px;}
    .yg5_tabel{border-color: #e5e5e5;outline: 1px solid #e5e5e5;}
    .yg5_tr2>td{padding: 10px;border: 1px solid #e5e5e5;text-align: center;}
    .yg5_tr1>td{
        border: 1px solid #e5e5e5;
        padding-left: 15px;
        background-color: #FAFAFA;
        font-weight: bold;
        text-align: center;
    }
    .yg5_btn{background-color: #EEEEEE;color: #333;border: 1px solid #E4E4E4;border-radius: 6px;width: 100px;height: 34px;}
    /*#frame-4{display: block;visibility: visible;}*/
</style>
<ul class="nav nav-tabs">
    <span class="ygxian"></span>
    <div class="ygdangq">当前位置:</div>     
    <li class="active"><a href="<?php  echo $this->createWebUrl('storetype')?>">门店类型管理</a></li>
    <li><a href="<?php  echo $this->createWebUrl('addstoretype')?>">添加门店类型</a></li>
</ul>
<div class="main">
    <!-- <div class="panel panel-default">
        <div class="panel-body">
            <a class="btn btn-primary" href="javascript:location.reload()"><i class="fa fa-refresh"></i>刷新</a>
        </div>
    </div> -->
    <!-- 门店列表部分开始 -->
        <div class="panel panel-default ygdefault">
            <div class="panel-heading wyheader">
                门店列表
            </div>
            <div class="panel-body" style="padding: 0px 15px;">
                <div class="row">
                    <table class="yg5_tabel col-md-12">
                        <tr class="yg5_tr1">
                            <td class="store_td1 col-md-1">id</td>
                            <td class="col-md-2">图标</td>
                            <td class="col-md-2">类型名称</td>
                             <td class="col-md-1">外卖手续费</td>
                             <td class="col-md-1">店内手续费</td>
                             <td class="col-md-1">当面手续费</td>
                              <td class="col-md-1">预约手续费</td>
                            <td class="col-md-3">操作</td>
                        </tr>
                        <?php  if(is_array($list)) { foreach($list as $row) { ?>
                        <tr class="yg5_tr2">
                            <td><div><?php  echo $row['id'];?></div></td>
                            <td>
                                <img class="store_list_img" src="<?php  echo tomedia($row['img']);?>" alt=""/>                                
                            </td>
                            <td><?php  echo $row['type_name'];?></td>

                            <td><?php  echo $row['poundage'];?>%</td>
                             <td><?php  echo $row['dn_poundage'];?>%</td>
                             <td><?php  echo $row['dm_poundage'];?>%</td>
                              <td><?php  echo $row['yd_poundage'];?>%</td>
                            <td>
                                <a href="<?php  echo $this->createWebUrl('addstoretype', array('id' => $row['id']))?>" class="storespan btn btn-xs">
                                    <span class="fa fa-pencil"></span>
                                    <span class="bianji">编辑
                                        <span class="arrowdown"></span>
                                    </span>
                                
                                </a>
                                <a href="javascript:void(0);" class="storespan btn btn-xs" data-toggle="modal" data-target="#myModal<?php  echo $row['id'];?>">
                                    <span class="fa fa-trash-o"></span>
                                    <span class="bianji">删除
                                        <span class="arrowdown"></span>
                                    </span>
                                </a>
                                <!-- <a class="btn btn-warning btn-sm" href="<?php  echo $this->createWebUrl('addstoretype', array('id' => $row['id']))?>" title="编辑">改</a>&nbsp;&nbsp;
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal<?php  echo $row['id'];?>">删</button> -->
                            </td>
                        </tr>
                         <div class="modal fade" id="myModal<?php  echo $row['id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
                            <a href="<?php  echo $this->createWebUrl('storetype', array('id' => $row['id']))?>" type="button" class="btn btn-info" >确定</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php  } } ?>
            <?php  if(empty($list)) { ?>
                <tr class="yg5_tr2">
                    <td colspan="7">
                      暂无门店类型
                    </td>
                </tr>         
            <?php  } ?>  
                    </table>
                </div>
            </div>
        </div>
    <?php  echo $pager;?>
</div>
<script type="text/javascript">
    $(function(){
        // $("#frame-4").addClass("in");
        $("#frame-4").show();
        $("#yframe-4").addClass("wyactive");
    })
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>