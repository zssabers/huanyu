<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/header', TEMPLATE_INCLUDEPATH)) : (include template('public/header', TEMPLATE_INCLUDEPATH));?>

<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/comhead', TEMPLATE_INCLUDEPATH)) : (include template('public/comhead', TEMPLATE_INCLUDEPATH));?>
<link rel="stylesheet" type="text/css" href="../addons/zh_cjdianc/template/public/ygcsslist.css">
<style type="text/css">
    .yg5_key>div{float: left;line-height: 34px;}
    .store_td1{height: 45px;}
    .store_list_img{width: 60px;height: 60px;}
    .yg5_tabel{border-color: #e5e5e5;outline: 1px solid #e5e5e5;text-align: center;}
    .yg5_tr2>td{padding: 15px;border: 1px solid #e5e5e5;}
    .yg5_tr1>td{
        border: 1px solid #e5e5e5;
        background-color: #FAFAFA;
        font-weight: bold;
    }
    .yg5_btn{background-color: #EEEEEE;color: #333;border: 1px solid #E4E4E4;border-radius: 6px;width: 100px;height: 34px;}
    .inorderbtn2>span,.inorderbtn>button,.inorderbtn>a>button{margin-bottom: 10px;}
    .orfont1{font-weight: bold;font-size: 24px;}
    .orfont2{color: #F5B340;font-size: 16px;margin-left: 15px;}
    .orderback{background-color: #FAFAFA;height: 50px;margin-bottom: 15px;padding: 10px;}
    .ordermain{font-size: 14px;width: 100%;}
    .orfont3{font-size: 20px;font-weight: bold;}
    .orfont4{font-size: 12px;color: #999;}
    .orderconfirm{border:1px solid #44ABF7;color: #44ABF7;padding: 5px 15px;border-radius: 6px;cursor: pointer;}
    .orderconfirm:hover{background-color: #44ABF7;color: white;}
    .orderback2{border-bottom:1px solid #E9E9E9;margin-bottom: 10px;padding-bottom: 10px;}
    .orderback3{margin-bottom: 10px;padding-bottom: 10px;}
    .orderback2>div>p{margin-bottom: 5px;}
    .orderdish{margin-bottom: 10px;height: 15px;width: 100%;}
    .orderdish>div{float: left;margin-right: 50px;}    
    .orderbox1,.orderdish1{width: 200px;}
    .orderdish>div:nth-child(2){width: 80px;}
    .orderdish>div:nth-child(3){width: 80px;}
    .orderbox2,.orderdish>div:nth-child(4){width: 80px;}
    .orderbox2{margin-left: 310px;}
    .orderaccount{width: 100%;height: 25px;}
    .orfont5{color: #44ABF7;font-size: 14px;}
    .orfont6{font-size: 12px;color: #666;}
    .orfont7{font-weight: bold;font-size: 15px;}
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
    .ortypeimg{position: absolute;left: 27%;top:34%;z-index: 10;opacity: 0.2;width: 150px;height: 150px;}
    .ortypeimg>img{width: 100%;height: 100%;}
    .ortypeimg2{position: absolute;left: 27%;top:34%;z-index: 10;opacity: 0.4;width: 150px;height: 150px;}
    .ortypeimg2>img{width: 100%;height: 100%;}
    .orderwu{text-align: center;padding: 20px 0px;}
    .wufont1{font-size: 18px;color: #666;margin-top: 20px;}
    .orfontyue1{text-indent: 4em;}
    .dlorfont7{font-size: 18px;color: #44ABF7;}
          .ordersucess{background-color: #44ABF7;color: white;}
  .ordersucess:hover{background-color: #44ABF7;color: white;}
</style>
<ul class="nav nav-tabs">
    <span class="ygxian"></span>
    <div class="ygdangq">当前位置:</div>  
    <li class="active"><a href="javascript:void(0);">当面付订单</a></li>
</ul>
<div class="row">
    <div class="col-lg-12" style="margin-top: 30px;">
    <form action="" method="get" class="col-md-4" style="padding-left: 0">
        <input type="hidden" name="c" value="site" />
                   <input type="hidden" name="a" value="entry" />
                   <input type="hidden" name="m" value="zh_cjdianc" />
                   <input type="hidden" name="do" value="dlindmorder" />
            <div class="input-group" style="width: 300px">
                <input type="text" name="keywords" class="form-control" placeholder="请输入订单编号" value="<?php  echo $_GPC['keywords'];?>">
                <span class="input-group-btn">
                    <input type="submit" class="btn btn-default" name="submit" value="查找"/>
                </span>
            </div>
            <input type="hidden" name="token" value="<?php  echo $_W['token'];?>"/>
    </form>
    <ul class="nav nav-tabs data_tip col-md-4" style="float: left;margin:0">
     <li<?php  if($type2=='yesterday') { ?> class="active" <?php  } ?>><a href="<?php  echo $this->createWebUrl2('dlindmorder',array('type2'=>yesterday));?>">昨天</a></li>
        <li<?php  if($type2=='today') { ?> class="active" <?php  } ?>><a href="<?php  echo $this->createWebUrl2('dlindmorder',array('type2'=>today));?>">今天</a></li>
        <li<?php  if($type2=='week') { ?> class="active" <?php  } ?>><a href="<?php  echo $this->createWebUrl2('dlindmorder',array('type2'=>week));?>">近七天</a></li>
        <li<?php  if($type2=='month') { ?> class="active" <?php  } ?>><a href="<?php  echo $this->createWebUrl2('dlindmorder',array('type2'=>month));?>">本月</a></li>
    </ul>
    <form action="" method="get" class="col-md-4" style="padding-left: 20px;">
        <input type="hidden" name="c" value="site" />
                   <input type="hidden" name="a" value="entry" />
                   <input type="hidden" name="m" value="zh_cjdianc" />
                   <input type="hidden" name="do" value="dlindmorder" />
            <div class="input-group" style="width: 100px">
                <?php  echo tpl_form_field_daterange('time',$_GPC['time'],true);?>
                <span class="input-group-btn">
                    <input type="submit" class="btn btn-default" name="submit2" value="查找"/>
                    <input type="submit" class="btn btn-sm ordersucess" name="export_submit" value="导出"/>
                </span>
            </div><!-- /input-group -->
            <input type="hidden" name="token" value="<?php  echo $_W['token'];?>"/>
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
                     <a href="<?php  echo $this->createWebUrl2('dlindmorder',array('op'=>'dy','order_id'=>$item['id']));?>"><button class="btn btn-xs orderbtn">打印小票</button></a>
                        </div>
                       <!--  <div class="right orderconfirm">确认接单</div> -->
                    </div>
                    <div class="col-md-12 orderback2">
                        <div class="ordername">
                            <div class="left"><?php  echo $item['name'];?> &nbsp;&nbsp;<span class="orfont4">#<?php  echo $item['md_name'];?></span></div>                           
                        </div>
                        
                    </div>
                    
                    <div class="col-md-12 orderback2">
                        <p class="orfont3">支付方式</p>
                        <div class="orderaccount">
                            <div class="orderbox1 left">支付方式</div>

                            <?php  if($item['pay_type']==1) { ?>
                            <div class="orderbox2 left">微信支付</div>
                            <?php  } else if($item['pay_type']==2) { ?>
                            <div class="orderbox2 left">余额支付</div>
                            <?php  } else if($item['pay_type']==3) { ?>
                            <div class="orderbox2 left">积分支付</div>
							<?php  } else if($item['pay_type']==5) { ?>
                            <div class="orderbox2 left">储值卡支付</div>
                            <?php  } ?>
                        </div>
                        <div class="orderaccount">
                            <div class="orderbox1 left">支付金额</div>
                            <div class="orderbox2 left">¥<?php  echo $item['money'];?></div>
                        </div>                     
                    </div>
                    <div class="col-md-12 orderback2">
                        <!--<div class="orderaccount orfont7">
                            <div class="orderbox1 left">本单预计收入</div>
                            <?php  if($item['is_poundage']==1) { ?>
                            <div class="orderbox2 left">¥<?php  echo number_format($item['money']-($item['poundage']/100*$item['money']),2)?></div> 
                            <?php  } else { ?>
                            <div class="orderbox2 left">¥<?php  echo number_format($item['money']-($item['md_poundage']/100*$item['money']),2)?></div> 
                            <?php  } ?>                   
                        </div>-->
                        <div class="orderaccount orfont6">
                            本单顾客实际支付：¥<?php  echo $item['money'];?>
                        </div>                     
                    </div>
                    <div class="col-md-12 orderback3">
                        <div class="right orfont10">
                        <span class="ordertime">付款时间：<?php  echo $item['time'];?> 订单编号：<?php  echo $item['order_num'];?></span>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <?php  } } ?>
    </div>
     <!-- <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading dlorfont7">今日当面付订单</div>
            <div class="panel-body" style="padding: 15px;font-size: 16px;">                
                <p>已完成订单量：<span class="dlorfont7"><?php  echo $dm2;?></span>单</p>
                <p>营业额：</p>
                <p>微信完成<span class="dlorfont7"><?php  echo $wxdm2;?></span>单，收入
                    <span class="dlorfont7">¥&nbsp;<?php  if($wx['total']) { ?><?php  echo $wx['total'];?><?php  } else { ?>0.00<?php  } ?></span>元
                </p>
                <p>余额完成<span class="dlorfont7"><?php  echo $yuedm2;?></span>单，收入
                    <span class="dlorfont7">¥&nbsp;<?php  if($yue['total']) { ?><?php  echo $yue['total'];?><?php  } else { ?>0.00<?php  } ?></span>元
                </p>
                <p>积分完成<span class="dlorfont7"><?php  echo $jfdm2;?></span>单，收入
                    <span class="dlorfont7">¥&nbsp;<?php  if($jf['total']) { ?><?php  echo $jf['total'];?><?php  } else { ?>0.00<?php  } ?></span>元
                </p>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading dlorfont7">昨日当面付订单</div>
            <div class="panel-body" style="padding: 15px;font-size: 16px;">                
                <p>已完成订单量：<span class="dlorfont7"><?php  echo $ztdm2;?></span>单</p>
                <p>营业额：</p>
                <p>微信完成<span class="dlorfont7"><?php  echo $ztwxdm2;?></span>单，收入
                    <span class="dlorfont7">¥&nbsp;<?php  if($ztwx['total']) { ?><?php  echo $ztwx['total'];?><?php  } else { ?>0.00<?php  } ?></span>元
                </p>
                <p>余额完成<span class="dlorfont7"><?php  echo $ztyuedm2;?></span>单，收入
                    <span class="dlorfont7">¥&nbsp;<?php  if($ztyue['total']) { ?><?php  echo $ztyue['total'];?><?php  } else { ?>0.00<?php  } ?></span>元
                </p>
                <p>积分完成<span class="dlorfont7"><?php  echo $ztjfdm2;?></span>单，收入
                    <span class="dlorfont7">¥&nbsp;<?php  if($ztjf['total']) { ?><?php  echo $ztjf['total'];?><?php  } else { ?>0.00<?php  } ?></span>元
                </p>
            </div>
        </div>        
    </div> -->
</div>
</div>
<div class="text-right we7-margin-top">
<?php  echo $pager;?>
</div>


<audio id="myaudio" src="../addons/zh_cjdianc/template/images/yy.mp3" controls="controls" loop="false" hidden="true" >
<script type="text/javascript">
    $(function(){
        // $("#frame-1").addClass("in");
        $("#frame-1").show();
        $("#yframe-1").addClass("wyactive");
    })
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>