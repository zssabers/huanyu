<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/header', TEMPLATE_INCLUDEPATH)) : (include template('public/header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/comhead', TEMPLATE_INCLUDEPATH)) : (include template('public/comhead', TEMPLATE_INCLUDEPATH));?>
<link rel="stylesheet" type="text/css" href="../addons/zh_cjdianc/template/public/ygcsslist.css">
<style type="text/css">
    .ygrow{margin-top: 20px;}
    .yg5_key>div{float: left;line-height: 34px;}
    .store_td1{height: 45px;}
    .store_list_img{width: 60px;height: 60px;}
    .yg5_tabel{border-color: #e5e5e5;outline: 1px solid #e5e5e5;}
    .yg5_tr2>td{padding: 15px;border: 1px solid #e5e5e5;text-align: center;}
    .yg5_tr1>td{
        border: 1px solid #e5e5e5;
        padding-left: 15px;
        background-color: #FAFAFA;
        font-weight: bold;
        text-align: center;
    }
    .yg5_btn{background-color: #EEEEEE;color: #333;border: 1px solid #E4E4E4;border-radius: 6px;width: 100px;height: 34px;}
    .orfont1{font-weight: bold;font-size: 24px;}
    .orfont2{color: #F5B340;font-size: 16px;margin-left: 15px;}
    .orderback{background-color: #FAFAFA;height: 50px;margin-bottom: 15px;padding: 10px;}
    .ordermain{font-size: 14px;width: 100%;}
    .orfont3{font-size: 20px;font-weight: bold;}
    .orfont4{font-size: 12px;color: #999;}
    .orderconfirm{border:1px solid #44ABF7;color: #44ABF7;padding: 5px 15px;border-radius: 6px;cursor: pointer;margin-right: 10px;}
    .orderconfirm:hover{background-color: #44ABF7;color: white;}
    .orderquxiao{border:1px solid #ddd;color: #666;padding: 5px 15px;border-radius: 6px;cursor: pointer;margin-right: 10px;}
    .orderquxiao:hover{background-color: #eee;color: #999;}
    .orderback2{border-bottom:1px solid #E9E9E9;margin-bottom: 10px;padding-bottom: 10px;}
    .orderback3{margin-bottom: 10px;padding-bottom: 10px;}
    .orderback2>div>p{margin-bottom: 5px;}
    .orderdish{margin-bottom: 10px;height: 15px;width: 100%;}
    .orderdish>div{float: left;margin-right: 50px;}    
    .orderbox1,.orderdish1{width: 200px;}
    .orderdish>div:nth-child(2){width: 80px;}
    .orderdish>div:nth-child(3){width: 80px;}
    .orderbox2,.orderdish>div:nth-child(4){width: 200px;}
    .orderbox2{margin-left: 310px;}
    .orderaccount{width: 100%;height: 25px;}
    .orfont5{color: #44ABF7;font-size: 14px;}
    .orfont6{font-size: 12px;color: #666;}
    .orfont7{font-weight: bold;font-size: 15px;}
    .dlorfont7{font-size: 18px;color: #44ABF7;}
    .orfont8{color: #44ABF7;}
    .orfont9{color: #666;}
    .orderpanel1{width: 50%;display: inline-block;}
    .orderpanel2{width: 30%;display: inline-block;margin-left: 30px;}
    .ordertelimg{width: 20px;height: 20px;}
    .ordertelimg1{color: #44ABF7;font-size: 14px;}
    .ordername{font-size: 20px;font-weight: bold;height: 30px;width: 100%;margin-bottom: 5px;}
    .orbeizhu{color: #FF7712;}
    .ordertime{margin-right: 10px;}
    .orfont10{color: #999;}
    .orderbtn{border: #FF7F50 1px solid;color: #FF7F50;background-color: #fff;margin-top: -10px;}
    .orderbtn:hover{background-color: #FF7F50;color: white;}
    .ortypeimg{position: absolute;left: 27%;top:53%;z-index: 10;opacity: 0.2;width: 150px;height: 150px;}
    .ortypeimg>img{width: 100%;height: 100%;}
    .ortypeimg2{position: absolute;left: 27%;top:53%;z-index: 10;opacity: 0.4;width: 150px;height: 150px;}
    .ortypeimg2>img{width: 100%;height: 100%;}
    .orderwu{text-align: center;padding: 20px 0px;}
    .wufont1{font-size: 18px;color: #666;margin-top: 20px;}
    .orderconfirm2{color: #fff;padding: 3px 10px;border-radius: 6px;margin-right: 10px;font-size: 12px;margin-top: 5px;background-color: #44ABF7;}
    .orfontyue1{text-indent: 4em;}
    .ordersucess{background-color: #44ABF7;color: white;}
    .ordersucess:hover{background-color: #44ABF7;color: white;}
</style>
<ul class="nav nav-tabs">
    <span class="ygxian"></span>
    <div class="ygdangq">当前位置:</div>  
  <li  <?php  if($type=='all') { ?> class="active" <?php  } ?>><a href="<?php  echo $this->createWebUrl('ydorder',array('type'=>all));?>">全部订单</a></li>
  <li   <?php  if($type=='wait') { ?> class="active" <?php  } ?>><a href="<?php  echo $this->createWebUrl('ydorder',array('type'=>wait));?>">待确认</a></li> 
  <li   <?php  if($type=='complete') { ?> class="active" <?php  } ?>><a href="<?php  echo $this->createWebUrl('ydorder',array('type'=>complete));?>">已确认</a></li> 
 <!--  <li   <?php  if($type=='reject') { ?> class="active" <?php  } ?>><a href="<?php  echo $this->createWebUrl('ydorder',array('type'=>reject));?>">已拒绝</a></li>  -->
  <li   <?php  if($type=='cancel') { ?> class="active" <?php  } ?>><a href="<?php  echo $this->createWebUrl('ydorder',array('type'=>cancel));?>">拒绝</a></li> 

</ul>

   <div class="row ygrow">
    <div class="col-lg-12">
        <form action="" method="POST" class="col-md-6">
            <div class="input-group" style="width: 300px">
                <input type="text" name="keywords" class="form-control" placeholder="请输入姓名/订单编号/门店名称">
                <span class="input-group-btn">
                    <input type="submit" class="btn btn-default" name="submit" value="查找"/>
                </span>
            </div>
            <input type="hidden" name="token" value="<?php  echo $_W['token'];?>"/>
        </form>
        <form action="" method="POST" class="col-md-6">
            <div class="input-group" style="width: 100px">
                <?php  echo tpl_form_field_daterange('time',$_GPC['time'],true);?>
                <span class="input-group-btn">
                    <input type="submit" class="btn btn-default" name="submit2" value="查找"/>
                    <input type="submit" class="btn btn-sm ordersucess" name="export_submit" value="导出"/>
                    <input type="hidden" name="token" value="<?php  echo $_W['token'];?>"/>
                </span>
            </div><!-- /input-group -->
        </form>
    </div><!-- /.col-lg-6 -->
</div> 
<div class="main ordermain">
<div class="row">
    <div class="col-md-8">
    <?php  if(!$list) { ?>
        <div class="panel panel-default">
            <div class="orderwu">
                <img src="../addons/zh_cjdianc/template/images/noorder.png">
                <p class="wufont1">暂无指定订单</p>
                <p class="orfont10">暂时没有筛选条件的订单，稍后再来看看吧！</p>
            </div>
        </div>
    <?php  } ?>
    <?php  if(is_array($list)) { foreach($list as $item) { ?>
        <div class="panel panel-default">
            <div class="panel-body" style="padding: 0px 15px;">
                <div class="row" style="position: relative;">
                    <div class="col-md-12 orderback">
                        <div class="left">
                            <span class="orfont1 orfont8">#<?php  echo $item['id'];?></span>
                             <a href="<?php  echo $this->createWebUrl('ydorder',array('op'=>'dy','order_id'=>$item['id']));?>"><span class="btn btn-xs orderbtn">打印小票</span></a>
                            <!-- <button class="btn btn-xs orderbtn orfont11">打印小票</button> -->
                        </div>              
                        <?php  if($item['yy_state']==2) { ?>
                        <div class="right orderconfirm" data-toggle="modal" data-target="#myModalb<?php  echo $item['id'];?>">确认订单</div>
                        <div class="right orderconfirm" data-toggle="modal" data-target="#myModalc<?php  echo $item['id'];?>">拒绝订单</div>
                          <?php  } ?>
                          <?php  if($item['yy_state']==2) { ?>
                          <div class="right orderconfirm2">待确认</div>
                          <?php  } else if($item['yy_state']==3) { ?>
                          <div class="right orderconfirm2">已确认</div>
                          <?php  } else if($item['yy_state']==4) { ?>
                          <div class="right orderconfirm2">已拒绝</div>
                          <?php  } ?>
                    </div>
                    <div class="col-md-12 orderback2">
                        <div class="ordername">
                            <div class="left ordername1"><?php  echo $item['name'];?> &nbsp;&nbsp;<span class="orfont4">#<?php  echo $item['md_name'];?></span></div>
                            <a href="<?php  echo $this->createWebUrl('ydorderinfo',array('id'=>$item['id']));?>"><div class="right btn btn-sm btn-default" style="border:none;">查看详情</div></a>
                        </div>
                        <div class="">
                        <?php  $zz=pdo_get('cjdc_table_type',array('id'=>$item['table_id']))?>
                            <div class="left orfont9"><?php  echo $zz['name'];?></div>
                            <div class="right ordertelimg1">
                                <img src="../addons/zh_cjdianc/template/images/ordertel.png" class="ordertelimg">
                                <span><?php  echo $item['tel'];?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 orderback2">
                        <p><span class="orbeizhu">备注：</span><?php  if($item['note']) { ?><?php  echo $item['note'];?><?php  } else { ?>无<?php  } ?></p>
                    </div>
                    <div class="col-md-12 orderback2">
                        <p class="orfont3">预计到店时间</p>
                        <div class="orderaccount">
                            <div class="orderbox1 left">预计到店时间</div>
                            <div class="orderbox2 left"><?php  echo $item['delivery_time'];?></div>
                        </div>
                         <div class="orderaccount">
                            <div class="orderbox1 left">预计到店人数</div>
                            <div class="orderbox2 left"><?php  echo $item['tableware'];?>人</div>
                        </div>               
                    </div>
                    <?php  $goods=pdo_getall('cjdc_order_goods',array('order_id'=>$item['id']))?>
                    <?php  if($goods) { ?>
                     <div class="col-md-12 orderback2">
                        <p class="orfont3">商品信息</p>
                        <?php  if(is_array($goods)) { foreach($goods as $item2) { ?>
                        <div class="orderdish">
                            <div class="left orderdish1"><?php  echo $item2['name'];?></div>
                            <div class="left">¥<?php  echo $item2['money'];?></div>
                            <div class="left">×<?php  echo $item2['number'];?></div>
                            <div class="left">¥<?php  echo number_format($item2['number']*$item2['money'],2)?></div>
                        </div>
                        <?php  } } ?>
                    </div>
                    <?php  } ?>

                    <div class="col-md-12 orderback2">
                        <p class="orfont3">押金</p>
                        <?php  if($item['money']>0) { ?>
                        <div class="orderaccount">
                            <div class="orderbox1 left">支付方式</div>
                            <?php  if($item['pay_type']==1) { ?>
                            <div class="orderbox2 left">微信支付</div>
                            <?php  } else if($item['pay_type']==2) { ?>
                            <div class="orderbox2 left">余额支付</div>
                            <?php  } else if($item['pay_type']==3) { ?>
                            <div class="orderbox2 left">积分支付</div>
                            <?php  } ?>
                        </div>
                        <?php  } ?>
                        <div class="orderaccount">
                            <div class="orderbox1 left">押金</div>
                            <div class="orderbox2 left">¥<?php  if($item['deposit']) { ?><?php  echo $item['deposit'];?><?php  } else { ?>0.00<?php  } ?></div>
                        </div>
                                            
                    </div>
                    <div class="col-md-12 orderback2">
                        <div class="orderaccount orfont7">
                            <div class="orderbox1 left">本单预计收入</div>
                            <?php  if($item['is_poundage']==1) { ?>
                            <div class="orderbox2 left">¥<?php  echo number_format($item['money']-($item['poundage']/100*$item['money']),2)?></div>
                            <?php  } else { ?>
                            <div class="orderbox2 left">¥<?php  echo number_format($item['money']-($item['md_poundage']/100*$item['money']),2)?></div>
                            <?php  } ?>

                        </div>
                        <div class="orderaccount orfont6">
                            本单顾客实际支付：¥<?php  if($item['money']) { ?><?php  echo $item['money'];?><?php  } else { ?>0.00<?php  } ?> <span class="orfont5"></span>
                        </div>                     
                    </div>
                    <div class="col-md-12 orderback3">
                        <div class="right orfont10">
                        <span class="ordertime">下单时间：<?php  echo $item['time'];?></span>
                        订单编号：<?php  echo $item['order_num'];?>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="modal fade" id="myModalb<?php  echo $item['id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel" style="font-size: 20px;">提示</h4>
                        </div>
                        <div class="modal-body" style="font-size: 20px">
                            是否要确认订单？
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                            <a href="<?php  echo $this->createWebUrl('ydorder',array('op'=>'ok','id'=>$item['id']));?>" type="button" class="btn btn-info" >确定</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="myModalc<?php  echo $item['id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel" style="font-size: 20px;">提示</h4>
                        </div>
                        <div class="modal-body" style="font-size: 20px">
                            是否要拒绝订单？
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                            <a href="<?php  echo $this->createWebUrl('ydorder',array('op'=>'tg','id'=>$item['id']));?>" type="button" class="btn btn-info" >确定</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php  } } ?>
    </div>
</div>
</div>
<div class="text-right we7-margin-top"><?php  echo $pager;?></div>

<script type="text/javascript">
    $(function(){
        $("#frame-1").show();
        $("#yframe-1").addClass("wyactive");
    })
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>