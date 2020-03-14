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
  .orderback2{border-bottom:1px solid #E9E9E9;margin-bottom: 10px;padding-bottom: 10px;}
  .orderback3{margin-bottom: 10px;padding-bottom: 10px;}
  .orderback2>div>p{margin-bottom: 5px;}
  .orderdish{margin-bottom: 10px;height: 15px;width: 100%;}
  .orderdish>div{float: left;margin-right: 50px;}    
  .orderbox1,.orderdish1{width: 250px;}
  .orderdish>div:nth-child(2){width: 80px;}
  .orderdish>div:nth-child(3){width: 80px;}
  .orderbox2,.orderdish>div:nth-child(4){width: 80px;}
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
  .ordersucess{background-color: #44ABF7;color: white;}
  .ordersucess:hover{background-color: #44ABF7;color: white;}
  .ortypeimg{position: absolute;left: 27%;top:53%;z-index: 10;opacity: 0.2;width: 150px;height: 150px;}
  .ortypeimg>img{width: 100%;height: 100%;}
  .ortypeimg2{position: absolute;left: 27%;top:53%;z-index: 10;opacity: 0.4;width: 150px;height: 150px;}
  .ortypeimg2>img{width: 100%;height: 100%;}
  .orderwu{text-align: center;padding: 20px 0px;}
  .wufont1{font-size: 18px;color: #666;margin-top: 20px;}
   .orderconfirm2{color: #fff;padding: 3px 10px;border-radius: 6px;margin-right: 10px;font-size: 12px;margin-top: 5px;background-color: #44ABF7;}
  .orfontyue1{text-indent: 4em;}
  .storespan2{font-size: 14px;color: white;margin: 5px;position: relative;background-color: #FF7F50;}
  .storespan2:hover{color: #fff;}
  .storespan2:hover .bianji{display: block;}
    .data_tip,.nav_head{
          display: flex;
          justify-content: space-between;
          align-items: center;
    }
</style>
<ul class="nav nav-tabs">
  <span class="ygxian"></span>
  <div class="ygdangq">当前位置:</div> 
  <li<?php  if($type=='all') { ?> class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl2('dltableorder',array('type'=>all,'table_id'=>$table_id));?>">全部订单</a></li>
  <li<?php  if($type=='wait') { ?> class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl2('dltableorder',array('type'=>wait,'table_id'=>$table_id));?>">待支付</a></li> 
  <li<?php  if($type=='complete') { ?> class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl2('dltableorder',array('type'=>complete,'table_id'=>$table_id));?>">已完成</a></li> 
  <li<?php  if($type=='close') { ?> class="active" <?php  } ?>><a href="<?php  echo $this->createWebUrl2('dltableorder',array('type'=>close,'table_id'=>$table_id));?>">已关闭</a></li> 
</ul>

<div class="row ygrow">
    <div class="col-lg-11 nav_head">
        <form action="" method="get" style="padding: 0" class="col-md-4">
            <input type="hidden" name="c" value="site" />
            <input type="hidden" name="a" value="entry" />
            <input type="hidden" name="m" value="zh_cjdianc" />
            <input type="hidden" name="do" value="dltableorder" />
            <input type="hidden" name="table_id" value="<?php  echo $table_id;?>" />
            <div class="input-group" style="width: 300px;">
                <input type="text" name="keywords" class="form-control" placeholder="请输入订单编号">
                <span class="input-group-btn">
                    <input type="submit" class="btn btn-default" name="submit" value="查找"/>
                </span>
            </div>
            <input type="hidden" name="token" value="<?php  echo $_W['token'];?>"/>
        </form>
        <ul class="nav nav-tabs data_tip col-md-4" style="float: left;margin:0">
         <li<?php  if($type2=='yesterday') { ?> class="active" <?php  } ?>><a href="<?php  echo $this->createWebUrl2('dltableorder',array('type2'=>yesterday,'type'=>$type,'table_id'=>$table_id));?>">昨天</a></li>
            <li<?php  if($type2=='today') { ?> class="active" <?php  } ?>><a href="<?php  echo $this->createWebUrl2('dltableorder',array('type2'=>today,'type'=>$type,'table_id'=>$table_id));?>">今天</a></li>
            <li<?php  if($type2=='week') { ?> class="active" <?php  } ?>><a href="<?php  echo $this->createWebUrl2('dltableorder',array('type2'=>week,'type'=>$type,'table_id'=>$table_id));?>">近七天</a></li>
            <li<?php  if($type2=='month') { ?> class="active" <?php  } ?>><a href="<?php  echo $this->createWebUrl2('dltableorder',array('type2'=>month,'type'=>$type,'table_id'=>$table_id));?>">本月</a></li>
        </ul>  
        <form action="" method="get" class="col-md-4">
           <input type="hidden" name="c" value="site" />
           <input type="hidden" name="a" value="entry" />
           <input type="hidden" name="m" value="zh_cjdianc" />
           <input type="hidden" name="do" value="dltableorder" />
           <input type="hidden" name="table_id" value="<?php  echo $table_id;?>" />
            <div class="input-group" style="width: 100px">
                <?php  echo tpl_form_field_daterange('time',$_GPC['time'],true);?>
                <span class="input-group-btn">
                    <input type="submit" class="btn btn-default" name="submit2" value="查找"/>
                </span>
            </div><!-- /input-group -->
            <input type="hidden" name="token" value="<?php  echo $_W['token'];?>"/>
        </form>
    </div><!-- /.col-lg-6 -->
</div>  

 <?php  if(is_array($data3)) { foreach($data3 as $key => $item) { ?>
<div class="main ordermain">
  <div class="row">
    <div class="col-md-11">
      <div class="panel panel-default">
          <div class="panel-heading">
           <span style="margin-right: 300px ">订单编号: <?php  echo $item['order']['order_num'];?></span>   商品清单
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
                      <?php  if(is_array($item['goods'])) { foreach($item['goods'] as $key => $item2) { ?>
                      <tr class="yg5_tr2">
                          <td><?php  echo $item2['name'];?></td>
                           <td><?php  if($item2['spec']) { ?><?php  echo $item2['spec'];?><?php  } else { ?>无规格<?php  } ?></td>
                          <td><img height="40" src="<?php  echo tomedia($item2['img']);?>"></td>
                          <td>¥<?php  echo $item2['money'];?></td>
                          <td><?php  echo $item2['number'];?></td>
                          <td>¥<?php  echo number_format($item2['number']*$item2['money'],2)?></td>
                      </tr>
                       <?php  } } ?>
                      <tr class="yg5_tr3" style="height: 45px">
                          <td colspan="6" style="text-align: right;">
                            <div style="margin:15px 40px;float: right;">优惠：<span>¥<?php  echo number_format($item['order']['discount'],2)?></span></div>
                            <div style="margin:15px 40px">支付：<span>¥<?php  echo number_format($item['order']['money'],2)?></span></div>
                          </td>
                      </tr>
                  </table>
              </div>
          </div>
      </div>
    </div>
  </div>
</div>
  <?php  } } ?>
     <?php  if(empty($list)) { ?>
          <div class="yg5_tr2" style="text-align:center">
            <img src="../addons/zh_cjdianc/template/images/none_data.png" alt="" style="margin-top: 200px">
            <p style="margin:30px auto">暂无订单信息</p>
         
      </div> 
      <?php  } ?>  
<div class="text-right we7-margin-top"><?php  echo $pager;?></div>
  <script type="text/javascript">
    $(function(){
        // $("#frame-1").addClass("in");
        $("#frame-3").show();
        $("#yframe-3").addClass("wyactive");
      })
    </script>
    <?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
