<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/header', TEMPLATE_INCLUDEPATH)) : (include template('public/header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/comhead', TEMPLATE_INCLUDEPATH)) : (include template('public/comhead', TEMPLATE_INCLUDEPATH));?>
<link rel="stylesheet" type="text/css" href="../addons/zh_cjdianc/template/public/ygcsslist.css">
<style type="text/css">
     
    .yg5_key>div{float: left;line-height: 34px;}
    .store_td1{height: 45px;width: 50px;}
    .store_list_img{width: 40px;height: 40px;}
    .yg5_tabel{border-color: #e5e5e5;outline: 1px solid #e5e5e5;}
    .yg5_tr2>td{padding: 10px;border: 1px solid #e5e5e5;text-align: center;}
    .yg5_tr1>td{
        border: 1px solid #e5e5e5;
        background-color: #FAFAFA;
        font-weight: bold;
        text-align: center;
    }
    .ygcopy1>a>span,.ygcopy>a,.ygcopy>button,.td_type>span{margin-bottom: 10px;}
    .yg5_btn{background-color: #EEEEEE;color: #333;border: 1px solid #E4E4E4;border-radius: 6px;width: 100px;height: 34px;}
    .yghover2{position: absolute;bottom: -20px;left: -50%;z-index: 2;color: #333;display: none;}
    .yghover{position: relative;}
    .yghover:hover .yghover2{display: block;}
    .yglabel{background-color: #44abf7;display: inline-block;padding: 1px 10px;color: white;border-radius: 2px;font-size: 12px;}
    .yglabelgray{background-color: #d1dade;display: inline-block;padding: 1px 10px;color: white;border-radius: 2px;font-size: 12px;}
    .rel{
        position: relative;
    }
    .ab{
        position: absolute;
    }
    .udlr{
        top: 0;
        bottom: 0;
        right: 0;
        left: 0;
        margin:auto;
    }
    .rel img{
        width: 102px;
        height:84px;
    }
</style>
<ul class="nav nav-tabs">
    <span class="ygxian"></span>
    <div class="ygdangq">当前位置:</div>       
    <?php  if($_W['role']=='operator') { ?>
        <li class="active"><a href="<?php  echo $this->createWebUrl('store')?>">门店管理</a></li>
    <?php  } else { ?>
        <li class="active"><a href="<?php  echo $this->createWebUrl('store')?>">门店管理</a></li>
        <li><a href="<?php  echo $this->createWebUrl('addstore')?>">门店添加</a></li>
        <!-- <li><a href="<?php  echo $this->createWebUrl('ygdata')?>">日期选择</a></li> -->
    <?php  } ?>
</ul>
<div class="main">
  <!--   <form action="" method="post" class="form-horizontal form" enctype="multipart/form-data" id="invitative"> -->
        <div class="panel panel-default">
            <div class="panel-heading">
                门店管理&nbsp;>&nbsp;筛选查询
            </div>
            <div class="panel-body">
                <div class="row">                    
                    <form action="" method="get">
                           <input type="hidden" name="c" value="site" />
                           <input type="hidden" name="a" value="entry" />
                           <input type="hidden" name="m" value="zh_cjdianc" />
                           <input type="hidden" name="do" value="store" />
                        <div class="col-md-3 yg5_key">
                            <div>输入关键字：</div>
                            <div class="input-group" style="width: 200px">                                
                                <input type="text" name="keywords" class="form-control" placeholder="请输入门店名称">
                            </div>
                        </div>
                        <div class="col-md-3 yg5_key">
                            <div>门店类型：</div>
                            <select class="input-group" style="width: 200px" name="type">  
                            <option value="">不限</option>
                                 <?php  if(is_array($type)) { foreach($type as $row) { ?>                              
                                <option value="<?php  echo $row['id'];?>"><?php  echo $row['type_name'];?></option>
                                   <?php  } } ?>
                            </select>
                        </div>
                        <div class="col-md-3"></div>
                        <div class="input-group" style="width: 100px">
                            <input type="submit" class="btn yg5_btn" name="submit" value="搜索"/>
                             <input type="hidden" name="token" value="<?php  echo $_W['token'];?>"/>
                        </div>
                    </form>
                </div>  
            </div>
        </div>

        <!-- 门店列表部分开始 -->
        <div class="panel panel-default">
            <div class="panel-heading">
                门店列表
            </div>
            <div class="panel-body" style="padding: 0px 15px;">
                <div class="row">
                    <table class="yg5_tabel col-xs-12">
                        <tr class="yg5_tr1">
                            <td class="store_td1" class="col-xs-1">id</td>
                            <td class="col-xs-1">排序</td>
                            <td class="col-xs-1">门店LOGO</td>
                            <td class="col-xs-1">门店名称</td>
                            <td class="col-xs-1">门店类型</td>
                    <!--         <td class="col-xs-1">所属区域</td> -->
                            <td class="col-xs-2">商家支持</td>
                            <td class="col-xs-2">到期时间</td>
                  <!--           <td class="col-xs-2">门店简介</td> -->
                            <?php  if($_W['role']!='operator') { ?>
                            <td class="col-xs-1">门店状态</td>
                            <?php  } ?>
                             <?php  if($_W['role']!='operator') { ?>
                            <td class="col-xs-2">操作</td>
                            <?php  } ?>
                            <td class="col-xs-1">商家入口</td>
                        </tr>
                         <?php  if(is_array($list)) { foreach($list as $row) { ?>
                        <tr class="yg5_tr2">
                            <td><div><?php  echo $row['id'];?></div></td>
                            <td><div><?php  echo $row['number'];?></div></td>
                            
                            <td class="rel" style="overflow: hidden;">
                            <?php  if($row['is_brand']==1) { ?>
                                <div class="ab" style="background: red;transform:rotate(-45deg);padding: 2px 20px;left:-20px;top: 4px;color: #fff;">品牌</div>
                                <?php  } ?>
                                <img class="store_list_img" style="width:50px;height:50px;" src="<?php  echo $row['logo'];?>" alt=""/>
                              <!--   <span></span> -->
                            </td>
                            <td><?php  echo $row['name'];?></td>
                            <td><?php  echo $row['type_name'];?></td>
                            
                            <?php  $zc=pdo_get('cjdc_storeset',array('store_id'=>$row['id']))?>
                            <td class="td_type">
                                <?php  if($zc['is_yy']==1) { ?>
                                <span class="btn btn-xs storeinfo">预约</span>
                                <?php  } ?>
                                <?php  if($zc['is_wm']==1) { ?>
                                <span class="btn btn-xs storewarning">外卖</span>
                                <?php  } ?>
                                <?php  if($zc['is_dn']==1) { ?>
                                <span class="btn btn-xs storesuccess">堂食</span>
                                <?php  } ?>
                                <?php  if($zc['is_sy']==1) { ?>
                                <span class="btn btn-xs ygshouqian">收银</span>
                                <?php  } ?>
                                <?php  if($zc['is_pd']==1) { ?>
                                <span class="btn btn-xs ygshouqian" style="color:#CDAD00;border:1px solid #CDAD00;">排队取号</span>
                                <?php  } ?>
                                <?php  if($zc['is_pt']==1) { ?>
                                <span class="btn btn-xs ygshouqian" style="color:#D15FEE;border:1px solid #D15FEE;">拼团</span>
                                <?php  } ?>
                                <?php  if($zc['is_qg']==1) { ?>
                                <span class="btn btn-xs ygshouqian" style="color:#836FFF;border:1px solid #836FFF;">抢购</span>
                                <?php  } ?>
                            </td>
                       <!--      <td><?php  echo $row['md_content'];?></td> -->
                        <td class="rel">
                            <span class="rel"><?php  echo $row['rzdq_time'];?></span>
                            <?php  if($row['rzdq_time']<=date('Y-m-d H:i:s')) { ?>
                            <img src="/addons/zh_cjdianc/template/images/daoqi.png" class="ab udlr" alt="">
                            <?php  } ?>
                        </td>
                            <?php  if($_W['role']!='operator') { ?>
                            <td class="ygcopy1"><?php  if($row['is_open']==1) { ?>
                                <a href="javascript:void(0);" data-toggle="modal" data-target="#myModala<?php  echo $row['id'];?>">
                                    <span class="yglabel">开启</span>
                                </a>
                            <?php  } else if($row['is_open']==2) { ?>                          
                                 <a href="javascript:void(0);" data-toggle="modal" data-target="#myModalb<?php  echo $row['id'];?>">
                                    <span class="yglabelgray">关闭</span>
                                 </a>
                            <?php  } ?>
                            </td>
                            <?php  } ?>
                             <?php  if($_W['role']!='operator') { ?>
                            <td class="ygcopy">
                            <a href="<?php  echo $this->createWebUrl('addstore', array('id' => $row['id']))?>" class="storespan btn btn-xs">
                                <span class="fa fa-pencil"></span>
                                <span class="bianji">编辑
                                    <span class="arrowdown"></span>
                                </span>
                            </a>
                            <a href="<?php  echo $this->createWebUrl('psmoney', array('id' => $row['id']))?>" class="storespan btn btn-xs" >
                              <!-- <span class="fa fa-pencil-square-o" style="margin-right: 0"></span> -->
                              <img src="/addons/zh_cjdianc/template/images/qishou.png" style="width:12px;height: 12px;" alt="">
                              <span class="bianji">配送费管理
                                  <span class="arrowdown"></span>
                              </span>                            
                          </a>
                             <a href="javascript:void(0);" class="storespan btn btn-xs" data-toggle="modal" data-target="#myModalc<?php  echo $row['id'];?>">
                                <span class="fa fa-files-o"></span>
                                <span class="bianji">复制
                                    <span class="arrowdown"></span>
                                </span>
                            </a>

                            <a href="javascript:void(0);" class="storespan btn btn-xs" data-toggle="modal" data-target="#myModald<?php  echo $row['id'];?>">
                                <span class="fa fa-trash-o"></span>
                                <span class="bianji">删除
                                    <span class="arrowdown"></span>
                                </span>
                            </a>
                                </td>
                                <?php  } ?>
                                <td><a class="btn ygshouqian2 btn-xs" href="<?php  echo $this->createWebUrl('index',array('id'=>$row['id']))?>">管理</a></td>
                        </tr>
                        <div class="modal fade" id="myModald<?php  echo $row['id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
                                            <a href="<?php  echo $this->createWebUrl('store', array('op'=>'delete','id' => $row['id']))?>" type="button" class="btn btn-info" >确定</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- —————————————复制的弹框————————————— -->
                        <div class="modal fade" id="myModalc<?php  echo $row['id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel" style="font-size: 20px;">提示</h4>
                                    </div>
                                    <div class="modal-body" style="font-size: 20px">
                                        此功能会消耗大量服务器资源,请谨慎使用,确定复制么？
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                                            <a href="<?php  echo $this->createWebUrl('store', array('op'=>'copy','id' => $row['id']))?>" type="button" class="btn btn-info" >确定</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- —————————————开启的弹框————————————— -->
                        <div class="modal fade" id="myModala<?php  echo $row['id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel" style="font-size: 20px;">提示</h4>
                                    </div>
                                    <div class="modal-body" style="font-size: 20px">
                                        确定关闭吗？
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                                            <a href="<?php  echo $this->createWebUrl('store',array('is_open'=>2,'updid'=>$row['id']))?>" type="button" class="btn btn-info" >确定</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- —————————————关闭的弹框————————————— -->
                        <div class="modal fade" id="myModalb<?php  echo $row['id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel" style="font-size: 20px;">提示</h4>
                                    </div>
                                    <div class="modal-body" style="font-size: 20px">
                                        确定开启吗？
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                                            <a href="<?php  echo $this->createWebUrl('store',array('is_open'=>1,'updid'=>$row['id']))?>" type="button" class="btn btn-info" >确定</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <?php  } } ?>
                                 <?php  if(empty($list)) { ?>
          <tr class="yg5_tr2">
            <td colspan="11">
              暂无门店信息
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
<script type="text/javascript">
    $(function(){
        // $("#frame-0").addClass("in");
        $("#frame-0").show();
        $("#yframe-0").addClass("wyactive");
    })
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
