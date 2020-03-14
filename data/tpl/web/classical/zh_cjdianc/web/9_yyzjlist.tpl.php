<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/header', TEMPLATE_INCLUDEPATH)) : (include template('public/header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/comhead', TEMPLATE_INCLUDEPATH)) : (include template('public/comhead', TEMPLATE_INCLUDEPATH));?>
<link rel="stylesheet" type="text/css" href="../addons/zh_cjdianc/template/public/ygcsslist.css">
<style type="text/css">
    .ygrow{margin-top: 20px;font-size: 12px;}
    .ygmartop{margin-top: 30px;font-size: 12px;}
    .ygmartop2{margin-bottom: 10px;}
    .yg5_key>div{float: left;line-height: 34px;}
    .store_td1{height: 45px;}
    .store_list_img{width: 60px;height: 60px;}
    .yg5_tabel{border-color: #e5e5e5;outline: 1px solid #e5e5e5;}
    .yg5_tr2>td{padding: 15px;border: 1px solid #e5e5e5;text-align: center;background-color: white;}
    .yg5_tr1>td{
        border: 1px solid #e5e5e5;
/*        padding-left: 15px;
*/        background-color: #FAFAFA;
        font-weight: bold;
        text-align: center;
    }
    .yg5_btn{background-color: #EEEEEE;color: #333;border: 1px solid #E4E4E4;border-radius: 6px;width: 100px;height: 34px;}
    .yg5_btn2{background-color: white;color: #333;border: 1px solid white;border-radius: 6px;width: 100px;height: 34px;}
    .yg13_img{width: 50px;height: 50px;border-radius: 4px;}
    .yg_name{width: 30%;height: 34px;line-height: 34px;color: #333;float: left;background-color: white;border: 1px solid #E4E4E4;text-align: center;}
    .yg_left{float: left;}
    .form-control{width: 70%;}
    .ygseledi{width: 60%;}
    .dishes{display: flex;align-items: center;}
    .dishes_font{font-size: 20px;}
    .dishes_inp{width: 195px;height: 23px;border: none;}
    .dishes_inp2{margin-right: 20px;}
    .input_box{border: 2px solid #5bc0de;border-radius: 4px;padding: 5px;margin-right: 10px;background-color: #5bc0de;color: white;}
    .store_inp{margin-left: 5px;}
    .dish_left{margin-right: 20px;}
    .dish_btn>button,.dish_btn>a{margin-bottom: 10px;}
    .ygboxl{margin-bottom: 15px;}
    .table_list{border:1px solid #ccc;margin:20px 0;}
    .table_list td{text-align: center;font-weight: bold}
    .table_list td span{color:#f65b1a;font-weight: bold}
    .data_list{float: left;}
    .data_list a{border:1px solid #e7e7eb;float: left;padding:10px;background: #fff;}
    .data_list a.active{background:#3dc6b6; color:#fff;}
    .daterange-time{padding: 6px;}
    .fuhao{font-size: 26px}
    /*.ygboxl>.input-group{border:1px solid green;}*/


</style>
<ul class="nav nav-tabs" style="float: left;margin-bottom: 20px;">
    <span class="ygxian"></span>
    <div class="ygdangq">当前位置:</div> 
    <li<?php  if($type=='yesterday') { ?> class="active" <?php  } ?>><a href="<?php  echo $this->createWebUrl('yyzjlist',array('type'=>yesterday));?>">昨天</a></li>
    <li<?php  if($type=='today') { ?> class="active" <?php  } ?>><a href="<?php  echo $this->createWebUrl('yyzjlist',array('type'=>today));?>">今天</a></li>
    <li<?php  if($type=='week') { ?> class="active" <?php  } ?>><a href="<?php  echo $this->createWebUrl('yyzjlist',array('type'=>week));?>">近七天</a></li>
    <li<?php  if($type=='month') { ?> class="active" <?php  } ?>><a href="<?php  echo $this->createWebUrl('yyzjlist',array('type'=>month));?>">本月</a></li>
</ul>
<div class="row ygrow" style="float: left;margin-top: 30px;">
    <div class="col-lg-12">
        <form action="" method="get" class="col-md-4">
                   <input type="hidden" name="c" value="site" />
                   <input type="hidden" name="a" value="entry" />
                   <input type="hidden" name="m" value="zh_cjdianc" />
                   <input type="hidden" name="do" value="yyzjlist" />
            <div class="input-group" style="width: 100px">
                <?php  echo tpl_form_field_daterange('time',$_GPC['time']);?>
                <span class="input-group-btn">
                    <input type="submit" class="btn btn-default" name="submit2" value="查找"/>
                </span>
                 <span class="input-group-btn">
                    <input type="submit" class="btn btn-default" name="export_submit" value="导出"/>
                </span>
            </div><!-- /input-group -->
            <input type="hidden" name="token" value="<?php  echo $_W['token'];?>"/>
<!--         </form>
        <form action="" method="POST">
        <div class="col-md-4">        
        <input type="submit" class="btn btn-sm ordersucess" name="export_submit" value="导出"/>
        <input type="hidden" name="token" value="<?php  echo $_W['token'];?>"/>
        
        </div>
        </form> -->
    </div><!-- /.col-lg-6 -->
</div>  

<table class="table table-striped table_list">
    <tr>
        <td>
            <p>商户实收</p>
            <span>¥<?php  echo number_format($list2['total_money']-$list3['tk_money']-$list3['hb_money']-$list6['commission']-$list7['yycommission']-$list8['fwycommission'],2)?></span>
        </td>
        <td>
            <p class="fuhao">=</p>
        </td>
        <td>
            <p>消费金额</p>
            <span>¥<?php  echo $list2['total_money']+$list2['discount']?></span>
        </td>
        <td>
            <p class="fuhao">－</p>
        </td>
        <td>
            <p>优惠金额</p>
            <span>¥<?php  if($list2['discount']) { ?><?php  echo $list2['discount'];?><?php  } else { ?>0.00<?php  } ?></span>
        </td>
        <td>
            <p class="fuhao">－</p>
        </td>
        <td>
            <p>优惠券佣金</p>
            <span>¥<?php  echo $list6['commission'];?></span>
        </td>
        <td>
            <p class="fuhao">－</p>
        </td>
        <td>
            <p>推广员佣金</p>
            <span>¥<?php  echo $list7['yycommission'];?></span>
        </td>
        <td>
            <p class="fuhao">－</p>
        </td>
        <td>
            <p>员工佣金</p>
            <span>¥<?php  echo $list8['fwycommission'];?></span>
        </td>
        <td>
            <p class="fuhao">－</p>
        </td>
        <td>
            <p>累计退款金额</p>
            <span>¥<?php  if($list3['tk_money']) { ?><?php  echo $list3['tk_money'];?><?php  } else { ?>0.00<?php  } ?></span>
        </td>
        <td>
            <p class="fuhao">－</p>
        </td>
        <td>
            <p>平台配送费</p>
            <span>¥0.00</span>
        </td>        
    </tr>
</table>
 <div class="main">
    <div class="panel panel-default">

        <div class="panel-body" style="padding: 0px 15px;">
            <div class="row">
                <table class="yg5_tabel col-md-12">
                    <tr class="yg5_tr1">
                    	<td class="store_td1 col-md-1">
   <!--                          <input type="checkbox" class="allcheck" />
                            <span class="store_inp">全选</span> -->
                            订单编号
                        </td>
                        <td class="col-md-1">支付时间</td>
                        <td class="col-md-1">支付渠道</td>
                        <td style="width: 50px">商户实收</td>
                        <td style="width: 50px">消费金额</td>
                        <td style="width: 50px">优惠金额</td>
                        <td class="col-md-1">优惠券佣金</td>
                        <td class="col-md-1">推广员佣金</td>
                        <td style="width: 50px">员工佣金</td>
                        <td class="col-md-1">累计退款金额</td>
                        <td style="width: 50px">平台配送费</td>
                        <td style="width: 50px">状态</td>
                    </tr>
                     <?php  if(is_array($list)) { foreach($list as $key => $item) { ?>
                    <tr class="yg5_tr2">
                    	<td>
                            <?php  echo $item['order_num'];?>
                        </td>
                        <td>
                           <?php  echo $item['time'];?>
                        </td>
                       
                        <?php  if($item['pay_type']==1) { ?>
                      <td> <span class="label storeinfo">微信支付</span></td>
                      <?php  } else if($item['pay_type']==2) { ?>
                      <td> <span class="label storesuccess">余额支付</span></td>
                      <?php  } else if($item['pay_type']==3) { ?>
                      <td>  <span class="label storewarning">积分支付</span></td>
                        <?php  } else if($item['pay_type']==4) { ?>
                      <td>  <span class="label storewarning">货到付款</span></td>
                      <?php  } ?>
                      <?php  if($item['yy_state']==4) { ?>
                        <td class="col-md-1 cainame<?php  echo $item['id'];?>">
                        0.00                          
                        </td>
                          </td>
                        <td class="col-md-1 dn_money<?php  echo $item['id'];?>">
                        <?php  echo $item['money'];?>
                        </td>
                        <td class="col-md-1 box_money<?php  echo $item['id'];?>">                            
                        0.00
                        </td>
                        <td class="col-md-1 num<?php  echo $item['id'];?>">                         
                        0.00
                        </td>
                         </td>
                        <td class="col-md-1 num<?php  echo $item['id'];?>">                         
                        0.00
                        </td>
                           </td>
                        <td class="col-md-1 num<?php  echo $item['id'];?>">                         
                        0.00
                        </td>
                           </td>
                        <td class="col-md-1 num<?php  echo $item['id'];?>">                         
                       <?php  echo $item['money'];?>
                        </td>
                           </td>
                        <td class="col-md-1 num<?php  echo $item['id'];?>">                         
                        0.00
                        </td>
                        <?php  } else { ?>
                          <td class="col-md-1 cainame<?php  echo $item['id'];?>">
                       <?php  echo number_format($item['money']-$item['commission']-$item['yycommission']-$item['fwycommission'],2)?>
						</td>
                       
                         <td class="col-md-1"> <?php  echo  number_format($item['money']+$item['discount'],2)?></td>
                       
                        <td class="col-md-1 money<?php  echo $item['id'];?>">
                        <?php  echo $item['discount'];?>
                        
                        </td>
                        <td class="col-md-1 dn_money<?php  echo $item['id'];?>">
                   	    <?php  echo $item['commission'];?>
                        </td>
                        <td class="col-md-1 box_money<?php  echo $item['id'];?>">                        	
                        <?php  echo $item['yycommission'];?>
                        </td>
                        <td class="col-md-1 num<?php  echo $item['id'];?>">                         
                    	<?php  echo $item['fwycommission'];?>
                        </td>
                
                        <td class="col-md-1 cainame<?php  echo $item['id'];?>">
                      0.00                        
                        </td>
                      
                           <td class="col-md-1 cainame<?php  echo $item['id'];?>">
                     0.00                     
                        </td>
                        <?php  } ?>
                        <?php  if($item['yy_state']==3) { ?>
                        <td >
                        <span class="label storesuccess">
                      已入账   
                      </span>                     
                        </td>
                        <?php  } else if($item['yy_state']==2 ) { ?>
                          <td >
                           <span class="label storeinfo">
                      未入账                        
                        </td>
                          </span>  
                        <?php  } else if($item['yy_state']==4  ) { ?>
                         <td >
                        <span class="label storewarning">
                        已退款
                          </span>  
                          </td>
                        <?php  } ?>
                        </tr>                          

                <?php  } } ?>
                <?php  if(empty($list)) { ?>
                <tr class="yg5_tr2">
                    <td colspan="12">
                      暂无资金信息
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
        // $("#frame-2").addClass("in");
        $("#frame-6").show();
        $("#yframe-6").addClass("wyactive");
        
    })
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>

