<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/header', TEMPLATE_INCLUDEPATH)) : (include template('public/header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/comhead', TEMPLATE_INCLUDEPATH)) : (include template('public/comhead', TEMPLATE_INCLUDEPATH));?>
<style type="text/css">
    .info{padding: 30px;}
    .progress{height: 5px;}
    .infoul>li{padding: 0px;position: relative;}
    .infoul>li>div:nth-child(1){margin-bottom: 15px;margin-left: -15px;}
    .info_gou{width: 20px;height: 20px;color: white;border-radius: 50%;text-align: center;line-height: 20px;position: absolute;top: 27px;left: 0px;}
    .info_grey{background-color: #e6e6e6;}
    .info_green{background-color: #44ABF7;}
    .progress-bar-yg{background-color: #44ABF7;}
    .info_left{border-right: 1px solid #ccc;}
    .info_right{padding: 15px;}
    .info_left_title{font-size: 14px;font-weight: bold;}
    .info_left_content>p>span:nth-child(1),.info_left_content2>p>span:nth-child(1){color: #999999;margin-right: 10px;}
    .info_left_content{border-bottom: 1px dashed #ccc;padding-left: 100px;padding-top: 15px;}
    .info_left_content2{padding-left: 100px;padding-top: 15px;padding-bottom: 5px;}
    .info_right_top{border-bottom: 1px dashed #ccc;height: 230px;line-height: 30px;}
    .info_right_type{font-size: 14px;font-weight: bold;margin-left: 15px;}
    .info_right_type>span{font-size: 18px;}
    .gantan{color: #0077DD;border: 1px solid #0077DD;width: 30px;height: 30px;border-radius: 50%;text-align: center;line-height: 30px;font-size: 22px;font-weight: bold;}
    .info1{height: 32px;}
    .info1>div{float: left;}
    .font1{color: #FF6600;font-size: 16px;font-weight: bold;}
    .beizhu{margin: 10px 0px;}
    .content1>div{float: left;}
    .content1>div:nth-child(1){width: 90px;text-align: right;color: #999;margin-right: 10px;}
    .content_inp{width: 122px;height: 32px;border:1px solid #ccc;padding: 0px 10px;}
    .info_right_bot{padding: 10px 0px;}
    .content_font{text-align: right;color: #999;}
    .store_td1{height: 45px;}
    .store_list_img{width: 60px;height: 60px;}
    .yg5_tabel{border-color: #e5e5e5;outline: 1px solid #e5e5e5;text-align: center;}
    .yg5_tr2>td{padding: 15px;border: 1px solid #e5e5e5;}
    .yg5_tr1>td{
        border: 1px solid #e5e5e5;
        padding-left: 15px;
        background-color: #FAFAFA;
        font-weight: bold;
    }
    .yg5_tr3>td{font-weight: bold;height: 45px;}
    .yg5_tr3>td:nth-child(1){text-align: right;padding-right: 50px;}
    .rizhi{margin-top: 20px;}
    .rizhi>li{width: 100%;border-top: 1px solid #ccc;height: 80px;padding:15px 20px 10px 20px;}
    .rizhip{font-size: 13px;font-weight: bold;}
    .rizhip>span:nth-child(1){margin-right: 10px;}
    .rizhip2{margin-left: 20px;}
    .label-orderinfo{background-color: #44ABF7;color: white;}
    .ygmain{font-size: 12px;}
    .tip{
        position: absolute;
        top: -20px;
        left: -5px;
        height: 0;
        width: 0;
        border-top: 30px solid transparent;
        border-right: 30px solid orange;
        border-bottom: 30px solid transparent;
        line-height: 20px;
        color: #fff;
        transform: rotate(45deg);
        -ms-transform: rotate(45deg);
        -moz-transform: rotate(45deg);
        -webkit-transform: rotate(45deg);
        -o-transform: rotate(45deg);       
    }
    .tip p{
        font-size: 14px;
        position: absolute;
        top: -9px;
        left: 10px;
        transform: rotate(-45deg);
        -ms-transform: rotate(-45deg);
        -moz-transform: rotate(-45deg);
        -webkit-transform: rotate(-45deg);
        -o-transform: rotate(-45deg);         
    }
</style>
<div class="main ygmain">
    <div class="panel panel-default">
        <div class="panel-body">
            <a class="btn label-orderinfo" href="<?php  echo $this->createWebUrl2('dlindnorder');?>"><i class="fa fa-refresh"></i>返回订单管理</a>
            <div class="right">
        <?php  if($item['dn_state']==1) { ?>
        <?php  if($item['order']['pay_type']==5) { ?>
                 <a onclick="if(!confirm('确定收到付款')) return false;" " href="<?php  echo $this->createWebUrl2('dlindnorder',array('op'=>'receivables','id'=>$item['id']));?>"><span class="label label-success">确认收款</span></a>
                 <?php  } ?>
                 <a onclick="if(!confirm('确定关闭订单')) return false;" " href="<?php  echo $this->createWebUrl2('dlindnorder',array('op'=>'close','id'=>$item['id'],table_id=>$item['table_id']));?>"><span class="label label-warning">关闭订单</span></a>
                   <?php  } else if($item['dn_state']==2&&$item['t_status']!=0) { ?>
              <a onclick="if(!confirm('确定是否重新开台')) return false;" href="<?php  echo $this->createWebUrl2('dlindnorder',array('op'=>'open','id'=>$item['table_id']));?>"><span class="label label-success">重新开台</span></a>
                   <?php  } ?> 
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            订单号：<?php  echo $item['order_num'];?>
        </div>
        <div class="panel-body" style="padding: 0px 15px;">
            <div class="row info">
                <!-- 一种状态开始 -->
                <?php  if($item['dn_state']==1) { ?>
                <ul class="col-md-9 col-md-push-2 infoul">
                    <li class="col-md-5">
                        <div style="color: #44ABF7;">买家下单</div>
                        <div class="progress">
                            <div class="progress-bar progress-bar-yg" role="progressbar" aria-valuenow="60" 
                                aria-valuemin="0" aria-valuemax="100" style="width: 50%;">
                            </div>
                        </div>
          
                        <div class="info_gou info_green">
                            <span class="fa fa-check"></span>
                        </div>
                    </li>
                    <li class="col-md-5">
                        <div style="color: #999;">交易完成</div>
                        <div class="progress">
                            <div class="progress-bar progress-bar-yg" role="progressbar" aria-valuenow="60" 
                                aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
                            </div>
                        </div>
                        <div class="info_gou info_grey">
                            <span class="fa fa-check"></span>
                        </div>
                    </li>
                    <li class="col-md-2">
                        <div style="color: #999;">交易关闭</div>                        
                        <div class="info_gou info_grey">
                            <span class="fa fa-check"></span>
                        </div>
                    </li>
                </ul>
                <?php  } ?>
                <!-- 一种状态结束 -->
                <!-- 二种状态开始 -->
                <?php  if($item['dn_state']==2) { ?>
                <ul class="col-md-9 col-md-push-2 infoul">
                    <li class="col-md-5">
                        <div style="color: #44ABF7;">买家下单</div>
                        <div class="progress">
                            <div class="progress-bar progress-bar-yg" role="progressbar" aria-valuenow="60" 
                                aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
                            </div>
                        </div>
                        <div class="info_gou info_green">
                            <span class="fa fa-check"></span>
                        </div>
                    </li>
                    <li class="col-md-5">
                        <div style="color: #44ABF7;">交易完成</div>
                        <div class="progress">
                            <div class="progress-bar progress-bar-yg" role="progressbar" aria-valuenow="60" 
                                aria-valuemin="0" aria-valuemax="100" style="width: 50%;">
                            </div>
                        </div>
                        <div class="info_gou info_green">
                            <span class="fa fa-check"></span>
                        </div>
                    </li>
                    <li class="col-md-2">
                        <div style="color: #999;">交易关闭</div>                        
                        <div class="info_gou info_grey">
                            <span class="fa fa-check"></span>
                        </div>
                    </li>
                </ul>
                <?php  } ?>
                <!-- 二种状态结束 -->
                <!-- 三种状态结束 -->
                <?php  if($item['dn_state']==3) { ?>
                <ul class="col-md-9 col-md-push-2 infoul">
                    <li class="col-md-5">
                        <div style="color: #44ABF7;">买家下单</div>
                        <div class="progress">
                            <div class="progress-bar progress-bar-yg" role="progressbar" aria-valuenow="60" 
                                aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
                            </div>
                        </div>
                        <div class="info_gou info_green">
                            <span class="fa fa-check"></span>
                        </div>
                    </li>
                    <li class="col-md-5">
                        <div style="color: #44ABF7;">交易完成</div>
                        <div class="progress">
                            <div class="progress-bar progress-bar-yg" role="progressbar" aria-valuenow="60" 
                                aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
                            </div>
                        </div>
                        <div class="info_gou info_green">
                            <span class="fa fa-check"></span>
                        </div>
                    </li>
                    <li class="col-md-2">
                        <div style="color: #44ABF7;">交易关闭</div>                        
                        <div class="info_gou info_green">
                            <span class="fa fa-check"></span>
                        </div>
                    </li>
                </ul>
                <?php  } ?>
                <!-- 三种状态结束 -->
            </div>
        </div>
    </div>
    <div class="panel panel-default">        
        <div class="panel-body" style="padding: 15px 30px;">
            <div class="row">
                <div class="col-md-6 info_left">
                    <div class="info_left_title">订单信息</div>
                    <div class="info_left_content">
                        <p><span>订单编号：</span><?php  echo $item['order_num'];?></p>
                        <?php  if($item['code']) { ?>
                        <p><span>支付流水：</span><?php  echo $item['code'];?></p>
                        <?php  } ?>
                        <p>
                            <span>订单类型：</span>
                            <span class="font1">店内</span>
                        </p>
                        <p><span>付款类型</span> <?php  if($item['pay_type']==1) { ?>
                <span class="label label-orderinfo"> 微信支付</span>
                <?php  } else if($item['pay_type']==2) { ?>
                <span class="label label-orderinfo"> 余额支付</span>
                <?php  } else if($item['pay_type']==5) { ?>
                <span class="label label-orderinfo"> 餐后支付</span>
                <?php  } ?>
                <?php  if($item['dn_state']==1) { ?>（<span style="color: #B22222;">未付款</span>）<?php  } ?></p>
                    </div>
                    <div class="info_left_content">
                        <p><span>下单时间：</span><?php  echo $item['time'];?></p>
                       <!--  <p><span>收货信息：</span>张三三15107087042(后台)</p> -->
                       <!--  <p><span>用餐人数：</span>大厅-c002 2017-10-13 09:00</p> -->
                        <p><span>桌台信息：</span><?php  echo $item['table_name'];?>--<?php  echo $item['type_name'];?></p>
                    </div>
                    <div class="info_left_content2">
                        <p><span>买家留言：</span><?php  if($item['note']) { ?><?php  echo $item['note'];?><?php  } else { ?>无<?php  } ?></p>
                    </div>
                </div>
                <div class="col-md-6 info_right">
                    <div class="info_right_top">
                        <div class="col-md-12 info1">
                            <div class="gantan"><span class="fa fa-exclamation"></span></div>
                            <div class="info_right_type">订单状态：<?php  if($item['dn_state']==1) { ?>
                        <span  style="color:red" >待付款</span>
                        <?php  } else if($item['dn_state']==2) { ?>
                        <span  style="color:green" >已完成</span>
                        <?php  } else if($item['dn_state']==3) { ?>
                        <span  style="color:gray" >已关闭</span>
                        <?php  } else if($item['dn_state']==4) { ?>
                        <span  style="color:green" >已评价</span>
                        <?php  } ?></div>
                        </div>
                       <!--  <div class="col-md-12 beizhu">【备注】</div> -->
                        <div class="content1 col-md-12">
                            <div>总金额：</div>
                            <?php  if($item['dn_state']==1) { ?>
                            <div class="font1">¥
                                <input style="border:0" type="text" name="money" data-id="<?php  echo $item['id'];?>" data-money="<?php  echo $item['money'];?>" value="<?php  echo $item['money'];?>">
                            </div>
                            <?php  } else { ?>
                            <div class="font1">¥
                                <?php  echo $item['money'];?>
                            </div>
                            <?php  } ?>
                            <?php  if($item['original_money']) { ?>
                            <div>改动前价格：</div>
                             <div class="font1">¥
                             <?php  echo $item['original_money'];?>
                             </div>
                            <?php  } ?>
                        </div>
                        <div class="content1 col-md-12">
                            <div>&nbsp;</div>
                            <div>（货价<?php  echo number_format($item['money']+$item['discount'],2)?>）</div>
                        </div>
                        <div class="content1 col-md-12">
                            <div>优惠金额：</div>
                            <div><?php  echo  number_format($item['discount'],2)?></div>
                        </div>
                        <?php  if($item['pay_time']) { ?>
                        <div class="content1 col-md-12">
                            <div>付款时间：</div>
                            <div><?php  echo $item['pay_time'];?></div>
                        </div>
                        <?php  } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- 商品清单部分 -->
    <div class="panel panel-default">
        <div class="panel-heading">
            商品清单
        </div>
        <div class="panel-body" style="padding: 0px 15px;">
            <div class="row">
                <table class="yg5_tabel col-md-12">
                    <tr class="yg5_tr1">
                        <td class="col-md-2 store_td1">菜品名称</td>
                        <td class="col-md-2">规格</td>
                        <td class="col-md-2">图片</td>
                        <td class="col-md-2">单价</td>
                        <td class="col-md-2">数量</td>
                        <td class="col-md-2">小计(元）</td>
                    </tr>
                    <?php  if(is_array($goods)) { foreach($goods as $key => $item2) { ?>
                    <tr class="yg5_tr2">
                        <td style="position: relative;">   
                        <?php  if($item2['is_jc']==1) { ?> 
                            <div class="tip">
                                <p>加</p>
                            </div>
                            <?php  } ?>
                        <?php  echo $item2['name'];?>
                        </td>
                         <td><?php  if($item2['spec']) { ?><?php  echo $item2['spec'];?><?php  } else { ?>无规格<?php  } ?></td>
                        <td><img height="40" src="<?php  echo tomedia($item2['img']);?>"></td>
                        <td>¥<?php  echo $item2['money'];?></td>
                        <td><?php  echo $item2['number'];?></td>
                        <td>¥<?php  echo number_format($item2['number']*$item2['money'],2)?></td>
                    </tr>
                     <?php  } } ?>
                    <tr class="yg5_tr3">
                        <td colspan="4">合计</td>
                        <td colspan="1">¥<?php  echo number_format($item['money']+$item['discount'],2)?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <?php  echo $pager;?>
</div>
<script type="text/javascript">
    $(function(){
        // $("#frame-1").addClass("in");
        $("#frame-1").show();
        $("#yframe-1").addClass("wyactive");
        $("input[name='money']").change(function () {
            let money =$("input[name='money']").val()
            let id =$("input[name='money']").attr("data-id")
            let y_money =$("input[name='money']").attr("data-money")
            $.ajax({
                type:"post",
                url:"<?php  echo $_W['siteroot'];?>/app/index.php?i=<?php  echo $_W['uniacid'];?>&c=entry&do=UpdOrderMoney&m=zh_cjdianc",
                dataType:"text",
                data:{id:id,money:money,y_money:y_money},
                success:function(data){
                    console.log(data);
                }
            })

        })
    })
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>