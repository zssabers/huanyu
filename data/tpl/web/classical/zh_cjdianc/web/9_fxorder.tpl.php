<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/header', TEMPLATE_INCLUDEPATH)) : (include template('public/header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/comhead', TEMPLATE_INCLUDEPATH)) : (include template('public/comhead', TEMPLATE_INCLUDEPATH));?>
<link rel="stylesheet" type="text/css" href="../addons/zh_cjdianc/template/public/ygcsslist.css">
<style type="text/css">
    .ygrow{margin-top: 20px;}
    .ordermain{font-size: 14px;width: 100%;}
    .yg_back{background: #fff;border-top:15px solid #F5F7F9;border-left:15px solid #F5F7F9}
    /*暂无订单*/
    .orderwu{text-align: center;padding: 20px 0px;}
    .wufont1{font-size: 18px;color: #666;margin-top: 20px;}
    .nav_head{
          display: flex;
          justify-content: space-between;
          align-items: center;
          background-color: #f8f8f8;
          padding: 20px;
          margin-bottom: 15px;
    }

    .title{
        border-bottom: 1px solid #e5e5e5;
        padding: 15px;
        margin-bottom: 15px;
    }
    .blue{
        padding: 8px;
        border:0;
        background: #00aeff;
        color: #fff;
    }
    .mb-4{margin-bottom: 20px;}
    .status{border-bottom: 1px solid #ddd;display: flex;padding-left: 0;margin-bottom: 0;height: 30px;}
    .status li {
        margin:0 0 -1px 0;
        background: #f8f8f8;
        height: 30px;
        width: 70px;
    }
    .status li a.on {
        border-color: #ddd #ddd #fff;
        background-color: #fff;
    }
    .status li a {
        color: #464a4c;
        border: 1px solid #ddd;
        border-radius: 0;
        margin:0;
        float: left;
        width: 100%;
        height: 100%;
        text-align: center;
        line-height: 30px;
    }
    .fs-0{
        float: left;
    }
    .pro_img{
        width: 100px;
        height: 100px;
        background-color: #ddd;
        margin-right: 10px;
        margin-left: 10px; 
    }
    .wait,
    .green{
        font-size: 8px;
        color: #fff;
        border-radius: 5px;
        padding: 2px 10px;
    }
    .green{
        background: #5cb85c;
    }
    .wait{
        background: #f0ad4e
    }
    .order_state{
        margin-top: 10px;
    }
 </style>
<div class="">
    <div class="title col-md-12">分销订单</div>
    <div class="col-lg-12 nav_head">
        <form action="" method="get" class="col-md-4" style="padding-left: 0">
            <input type="hidden" name="c" value="site" />
            <input type="hidden" name="a" value="entry" />
            <input type="hidden" name="m" value="zh_cjdianc" />
            <input type="hidden" name="do" value="fxorder" />
            <input type="hidden" name="type" value="<?php  echo $type;?>" />
            <div class="input-group" style="width: 300px;">
                <input type="text" name="keywords" class="form-control" placeholder="请输入订单编号" value="<?php  echo $_GPC['keywords'];?>">
                <span class="input-group-btn">
                    <input type="submit" class="btn btn-default blue" name="submit" value="查找"/>
                </span>
            </div>
            <input type="hidden" name="token" value="<?php  echo $_W['token'];?>"/>
        </form>
    </div><!-- /.col-lg-6 -->
</div>  
<div class="main ordermain">
    <div class="row">
        <div class="col-md-12">
            <div class="mb-4">
                <ul class="status">
                    <!-- <li class="">
                        <a <?php  if($type=='all') { ?> class="on" <?php  } ?> href="<?php  echo $this->createWebUrl('fxorder',array('type'=>all,'user_id'=>$user_id));?>">全部</a>
                    </li> -->
                    <li class="" >
                        <a <?php  if($type=='1') { ?> class="on" <?php  } ?> href="<?php  echo $this->createWebUrl('fxorder',array('type'=>1,'user_id'=>$user_id));?>">外卖订单</a>
                    </li>
                    <li class="">
                        <a <?php  if($type=='2') { ?> class="on" <?php  } ?> href="<?php  echo $this->createWebUrl('fxorder',array('type'=>2,'user_id'=>$user_id));?>">店内订单</a>
                    </li>
                     <li class="">
                        <a <?php  if($type=='3') { ?> class="on" <?php  } ?> href="<?php  echo $this->createWebUrl('fxorder',array('type'=>3,'user_id'=>$user_id));?>">预约订单</a>
                    </li>
                    <li class="">
                        <a <?php  if($type=='4') { ?> class="on" <?php  } ?> href="<?php  echo $this->createWebUrl('fxorder',array('type'=>4,'user_id'=>$user_id));?>">收银订单</a>
                    </li>
                     <li class="">
                        <a <?php  if($type=='5') { ?> class="on" <?php  } ?> href="<?php  echo $this->createWebUrl('fxorder',array('type'=>5,'user_id'=>$user_id));?>">抢购订单</a>
                    </li>
                     <li class="">
                        <a <?php  if($type=='6') { ?> class="on" <?php  } ?> href="<?php  echo $this->createWebUrl('fxorder',array('type'=>6,'user_id'=>$user_id));?>">拼团订单</a>
                    </li>
                </ul>
            </div>
            <table class="table table-bordered bg-white">
                <tbody>
                    <tr>
                        <th class="col-md4-">商品信息</th>
                        <th class="col-md-2" style="text-align: center;">金额</th>
                        <th class="col-md-2" style="text-align: center;">订单状态</th>
                        <th class="col-md-4" style="text-align: center;">分销情况</th>
                    </tr>
                </tbody>
            </table>
            <?php  if(is_array($data3)) { foreach($data3 as $key => $item) { ?>
            <!--订单列表-->
            <div class="order-item">
                <table class="table table-bordered bg-white">
                    <tbody>
                        <tr>
                            <td colspan="5">
                                <span class="mr-5"><?php  echo $item['order']['time'];?></span>
                                <span class="mr-5">订单号：<?php  echo $item['order']['order_num'];?></span>
                                <span class="mr-5">用户：<?php  echo $item['order']['yh_name'];?></span>
                                <span>订单类型：<?php  if($type=='1') { ?>外卖订单<?php  } else if($type=='2') { ?>店内订单<?php  } else if($type=='3') { ?>预定订单<?php  } else if($type=='4') { ?>收银订单<?php  } else if($type=='5') { ?>抢购订单<?php  } else if($type=='6') { ?>拼团订单<?php  } ?></span>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-md-4">
                                <div class="goods-item" flex="dir:left box:first">
                                <?php  if($item['order']['type']==4) { ?>
                                  <div class="fs-sm">客户付款</div>
                                <?php  } else { ?>
                                  <?php  if(is_array($item['goods'])) { foreach($item['goods'] as $item2) { ?>
                                    <div class="goods-info">                                   
                                        <div class="goods-name"><?php  echo $item2['name'];?></div>
                                        <?php  if($item2['spec']) { ?>
                                        <div class="fs-sm">规格：<span class="text-danger"><span class="mr-3"><?php  echo $item2['spec'];?></span></span></div>
                                        <?php  } ?>
                                        <div class="fs-sm">单价:<span class="text-danger">¥<?php  echo $item2['money'];?>元</span></div>                                        
                                        <div class="fs-sm">数量：<span class="text-danger"><?php  echo $item2['num'];?>件</span></div>
                                        <div class="fs-sm">小计：<span class="text-danger">¥<?php  echo number_format($item2['num']*$item2['money'],2)?>元</span></div>

                                    </div>
                                     <?php  } } ?>
                                     <?php  } ?>
                                    <?php  if($type==5) { ?>
                                     <div class="goods-info">                                   
                                        <div class="fs-sm">商品名称：<span class="text-danger"><span class="mr-3"><?php  echo $item['order']['good_name'];?></span></span></div>
                                    </div>
                                    <?php  } ?>
                                    <?php  if($type==6) { ?>
                                     <div class="goods-info">                                   
                                        <div class="fs-sm">商品名称：<span class="text-danger"><span class="mr-3"><?php  echo $item['order']['goods_name'];?></span></span></div>
                                    </div>
                                    <?php  } ?>
                                </div>
                            </td>
                            <td class="col-md-2" style="text-align: center;">
                                <div>实际付款：<?php  echo $item['order']['money'];?>元</div>
                            </td>
                            <td class="col-md-2" style="text-align: center;">
                                <?php  if($item['order']['type']==1) { ?>
                                <div class="order_state">订单状态：
                                <?php  if($item['order']['state']==1) { ?><span class="wait">待支付</span>
                                 <?php  } else if($item['order']['state']==2) { ?><span class="wait">待接单</span>
                                 <?php  } else if($item['order']['state']==3) { ?><span class="wait">待送达</span>
                                  <?php  } else if($item['order']['state']==4) { ?><span class="wait">已完成</span>
                                   <?php  } else if($item['order']['state']==5) { ?><span class="wait">已评价</span>
                                    <?php  } else if($item['order']['state']==6) { ?><span class="wait">已取消</span>
                                    <?php  } else if($item['order']['state']==7) { ?><span class="wait">已拒接</span>
                                    <?php  } else if($item['order']['state']==8) { ?><span class="wait">待退款</span>
                                    <?php  } else if($item['order']['state']==9) { ?><span class="wait">退款成功</span>
                                    <?php  } else if($item['order']['state']==10) { ?><span class="wait">退款拒绝</span>
                                <?php  } ?>
                                <?php  } ?>
                                <?php  if($type==5 || $type==6) { ?>
                                <div class="order_state">订单状态：
                                <span class="wait">已核销</span>
                                </div>
                                <?php  } ?>
                                <?php  if($item['order']['type']==2) { ?>
                                <div class="order_state">订单状态：
                                <?php  if($item['order']['dn_state']==1) { ?><span class="wait">待付款</span>
                                 <?php  } else if($item['order']['dn_state']==2) { ?><span class="wait">已完成</span>
                                 <?php  } else if($item['order']['dn_state']==3) { ?><span class="wait">已关闭</span>
                                <?php  } ?>
                                </div>
                                <?php  } ?>
                                  <?php  if($item['order']['type']==3) { ?>
                                <div class="order_state">订单状态：
                                <?php  if($item['order']['yy_state']==1) { ?><span class="wait">待付款</span>
                                 <?php  } else if($item['order']['yy_state']==2) { ?><span class="wait">待确定</span>
                                 <?php  } else if($item['order']['yy_state']==3) { ?><span class="wait">已通过</span>
                                  <?php  } else if($item['order']['yy_state']==4) { ?><span class="wait">已拒绝</span>
                                <?php  } ?>
                                </div>
                                <?php  } ?>
                                     <?php  if($item['order']['type']==4) { ?>
                                <div class="order_state">订单状态：
                                <?php  if($item['order']['dm_state']==1) { ?><span class="wait">待付款</span>
                                 <?php  } else if($item['order']['dm_state']==2) { ?><span class="wait">已付款</span>
                               
                                <?php  } ?>
                                </div>
                                <?php  } ?>
                            </td>
                            <td class="col-md-4">
                             <?php  if(is_array($item['yjinfo'])) { foreach($item['yjinfo'] as $item3) { ?>
                                <div class="col-md-6">
                                    <div>昵称：<?php  echo $item3['name'];?></div>
                                    <div>姓名：<?php  echo $item3['user_name'];?></div>
                                    <div>电话：<?php  echo $item3['user_tel'];?></div>
                                    <div><?php  echo $item3['note'];?>：<?php  echo $item3['money'];?>元</div>
                                </div>
                                 <?php  } } ?>
                           </td>
                        </tr>
                        <tr>
                            <td colspan="5">
                            <?php  if($item['order']['type']==1) { ?>
                                <div>
                                    <span class="mr-3">收货人：<?php  echo $item['order']['name'];?></span>
                                    <span class="mr-3">电话：<?php  echo $item['order']['tel'];?></span>
                                    <span>地址：<?php  echo $item['order']['address'];?></span>
                                </div>
                                <?php  if($item['order']['note']) { ?>
                                <div><span>备注：<?php  echo $item['order']['note'];?></span></div>
                                <?php  } ?>
                            <?php  } else if($item['order']['type']==2) { ?>
                             <div>
                                    <span class="mr-3">餐桌：<?php  echo $item['order']['table_name'];?></span>
                            
                                </div>
                            <?php  } ?>
                            <div>
                                   
                            
                                </div>
                            </td>
                            </tr>
                   </tbody>
                </table>
            </div>
            <?php  } } ?>


            <?php  if(empty($data3)) { ?>
           <!--暂无订单-->
            <div class="panel panel-default">
                <div class="orderwu">
                    <img src="../addons/zh_cjdianc/template/images/noorder.png">
                    <p class="wufont1">暂无指定订单</p>
                    <p class="orfont10">暂时没有筛选条件的订单，稍后再来看看吧！</p>
                </div>
            </div>
            <?php  } ?>
        </div><!--col-md-12-->
    </div><!--row-->
</div><!--ordermain-->
<div class="text-right we7-margin-top"><?php  echo $pager;?></div>


<script type="text/javascript">
    $(function(){
        // $("#frame-1").addClass("in");
        $("#frame-9").show();
        $("#yframe-9").addClass("wyactive");
    })
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>