<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/header', TEMPLATE_INCLUDEPATH)) : (include template('public/header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/comhead', TEMPLATE_INCLUDEPATH)) : (include template('public/comhead', TEMPLATE_INCLUDEPATH));?>
<link rel="stylesheet" type="text/css" href="../addons/zh_cjdianc/template/public/ygcsslist.css">
<style type="text/css">   
    .store_td1{height: 45px;}  
    .yg5_tabel{border-color: #e5e5e5;outline: 1px solid #e5e5e5;}
    .yg5_tabel th{height: 45px;padding: 0 20px;font-weight: normal;}
    .yg5_tr2>td{padding: 15px;border: 1px solid #e5e5e5;text-align: center;background-color: white;}
    .yg5_tr1>td{
        border: 1px solid #e5e5e5;
        background-color: #FAFAFA;
        font-weight: bold;
        text-align: center;
    }
    .yghuise{background: #caad42;}
    .input-group{margin-top: 20px;}
    .reset_box{background: #fff;padding: 20px;overflow: hidden;margin-top: 20px}
    .reset_tip{font-size: 14px;}
    .reset_tip b{font-size: 26px;margin:0 5px 0 40px;color: #FFB025}
    .reset_tip span{font-size: 16px;font-weight: normal;color: #FFB025}
    .reset_tip a{color: #2589ff;background: #fff;border-color: #2589ff;margin-top: -15px;margin-left: 20px}
    .reset_tip a:hover{color: #fff;background: #2589ff}
    .reset_detail{margin-top: 20px}
    .reset_detail ul li{margin-top: 10px}
    .reset_detail ul li a{color: #2589ff}
    .modal_tip{margin-top:10px;}
    .modal_tip label{font-weight: normal;text-align: right;}
    .modal_tip label i{color:#ff5050;}
    .modal_tip input{border:1px solid #888;}
    .tip_msg{color:#ff5050;font-weight: normal;margin-top: 5px}
</style>
<ul class="nav nav-tabs">
    <span class="ygxian"></span>
    <div class="ygdangq">当前位置:</div> 
    <li class="active"><a href="javascript:;">财务管理</a></li>
</ul>
<div class="ygrow reset">
    <div class="reset_box">
        <div class="reset_tip">可提现余额<b><?php  echo $ktxcost;?></b><span>元</span><a href="javascript:;" class="btn btn-default reset_btn" data-toggle="modal" data-target="#myModal">申请提现</a></div>
        <div class="reset_detail">
            <ul>
                <li class="col-md-4">未入账:  <?php  echo $wrz_money;?></li>
                <li class="col-md-4">提现中: <?php  echo $shtxz;?></li>
                <li class="col-md-4">已提现: <?php  echo $shytx;?></li>

<!--                 <li class="col-md-4"><a href="javascript:;">提现明细</a></li>
 -->            </ul>
        </div>
    </div>

</div>

<div class="row ygrow">
    <div class="col-lg-12">
        <form action="" method="get" class="col-md-4">
                   <input type="hidden" name="c" value="site" />
                   <input type="hidden" name="a" value="entry" />
                   <input type="hidden" name="m" value="zh_cjdianc" />
                   <input type="hidden" name="do" value="dlfinance" />
            <div class="input-group" style="width: 100px">
                <?php  echo tpl_form_field_daterange('time',$_GPC['time']);?>
                <span class="input-group-btn">
                    <input type="submit" class="btn btn-default" name="submit2" value="查找"/>
                </span>
            </div><!-- /input-group -->
            <input type="hidden" name="token" value="<?php  echo $_W['token'];?>"/>
        </form>
    </div><!-- /.col-lg-6 -->
</div>  

 <div class="main">
    <div class="panel panel-default">

        <div class="panel-body" style="padding: 0px 15px;">
            <div class="row">
                <table class="yg5_tabel col-md-12">
                    <tr class="yg5_tr1">
                        <th colspan="7">提现记录</th>
                    </tr>
                    <tr class="yg5_tr1">
                        <td class="store_td1 col-md-2">
   <!--                          <input type="checkbox" class="allcheck" />
                            <span class="store_inp">全选</span> -->
                            提现单号
                        </td>
                        <td class="col-md-1">申请时间</td>
                        <td class="col-md-1">商户实收</td>
                        <td class="col-md-1">提现金额</td>
                       <!--  <td class="col-md-1">收款人</td> -->
                        <td class="col-md-1">付款时间</td>
                        <td class="col-md-1">状态</td>
                       <!--   <td class="col-md-2">操作</td> -->
                    </tr>
                     <?php  if(is_array($list)) { foreach($list as $key => $item) { ?>
                    <tr class="yg5_tr2">
                        <td class="col-md-1 cainame<?php  echo $item['id'];?>">
                        <?php  echo $item['id'];?>
                           
                        </td>
                        <td class="col-md-1"> <?php  echo $item['time'];?></td>
                        <td class="col-md-1 money<?php  echo $item['id'];?>">
                        <?php  echo $item['sj_cost'];?>
                        
                        </td>
                        <td class="col-md-1 dn_money<?php  echo $item['id'];?>">
                  
                        <?php  echo $item['tx_cost'];?>
                    <!--    
                        </td>
                        <td class="col-md-1 box_money<?php  echo $item['id'];?>">
                      
                        
                        </td> -->
                        <td class="col-md-1 num<?php  echo $item['id'];?>"> 
                    <?php  echo $item['sh_time'];?>
                        
                        
                        </td>
                        <?php  if($item['state']==1) { ?>
                     <td >
                        <span class="label storered">待审核</span>
                    </td >
                    <?php  } else if($item['state']==2) { ?>
                    <td >
                        <span class="label storeblue">已提现</span>
                    </td>
                    <?php  } else if($item['state']==3) { ?>
                    <td >
                       <span class="label yghuise">已拒绝</span>
                   </td>
                   <?php  } ?>  
                 <!--   <td >
                     <?php  if($item['state']==1) { ?>
                      <?php  if($item['user_id'] and $item['type']==2) { ?>
                      <a class="btn btn-info btn-xs" href="<?php  echo $this->createWebUrl('finance',array('id'=>$item['id'],'op'=>'adopt2'))?>" >打款通过</a>
                      <?php  } ?>
                      <a class="btn ygyouhui2 btn-xs" href="<?php  echo $this->createWebUrl('finance',array('id'=>$item['id'],'op'=>'adopt'))?>" >通过</a>
                      <a class="btn ygshouqian2 btn-xs" href="<?php  echo $this->createWebUrl('finance', array('id' => $item['id'],'op'=>'reject'))?>" title="拒绝">拒绝</a>
                      <?php  } ?>
                      </td> -->
                    </tr>                          

                <?php  } } ?>
                <?php  if(empty($list)) { ?>
                <tr class="yg5_tr2">
                    <td colspan="7">
                      暂无提现信息
                    </td>
                </tr>
                <?php  } ?>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- 模态框（Modal） -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    提现
                </h4>
            </div>
            <form name="js_form" method="post" action="">
                <div class="modal-body">
                    <div class="col-md-12 modal_tip">
                        <label for="" class="col-md-3">可提现金额</label>
                        <p class="col-md-6"><span class="tatal"><?php  echo $ktxcost;?></span>元</p>
                    </div>
                    <div class="form-group">
                         <label style="width: 25%;text-align: right;" class="col-xs-12 col-sm-3 col-md-2 control-label">提现方式 </label>
                    <div class="col-sm-9">             
                           <?php  if($system['is_yhk']==1) { ?> 
                        <span class="radio-inline">
                            <input id="is_psxx2" type="radio" name="is_brand" value="2" checked /> 
                            <label for="is_psxx2">银行卡</label>
                        </span>
                         <?php  } ?>
                        <?php  if($system['is_wx']==1) { ?>  
                        <span class="radio-inline">
                            <input id="is_psxx1" type="radio" name="is_brand" value="1" checked />
                            <label for="is_psxx1">微信</label>              
                        </span>
                          <?php  } ?>
                        <span class="help-block">*必须选择一种提现方式</span>
                        
                    </div>
                </div>
            
                       <div class="col-md-12 modal_tip">
                        <label for="" class="col-md-3">收款人<i>*</i></label>
                        <input type="text" class="col-md-6"  name="name">
                    </div>
                    <div class="col-md-12 modal_tip">
                        <label for="" class="col-md-3">提现金额<i>*</i></label>
                        <input type="number" class="col-md-6 js_con"  name="tx_cost">
                    </div>
                      <span class="help-block hide_0" style="margin-left:25%;">*选择银行卡以下必须填写</span>
                    <div class="col-md-12 modal_tip hide_0">
                        <label for="" class="col-md-3">手机号<i>*</i></label>
                        <input type="number" class="col-md-6"  name="tel">
                    </div>
                          <div class="col-md-12 modal_tip hide_0">
                        <label for="" class="col-md-3">银行卡号<i>*</i></label>
                        <input type="number" class="col-md-6"  name="yhk_num">
                    </div>
                           <div class="col-md-12 modal_tip hide_0">
                        <label for="" class="col-md-3">开户行信息<i>*</i></label>
                        <input type="text" class="col-md-6"  name="yh_info">
                    </div>
                    <div class="col-md-12">
					    <span class="help-block" style="margin-left: 25%;">提现手续费：<?php  echo $list4['poundage']+$list4['tg_poundage']?>%</span>
                        <label class="col-md-3"></label>
                        <strong class="tip_msg"></strong>
						
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭
                    </button>
                    <input type="submit" value="确定" class="btn btn-primary js_submit" name="submit2">
                     <input type="hidden" name="token" value="<?php  echo $_W['token'];?>"/>
 <!--                    <button type="button" class="btn btn-primary">
                        提交
                    </button> -->
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>
<div class="text-right we7-margin-top"><?php  echo $pager;?></div>

<script type="text/javascript">
    $(function(){
        // $("#frame-2").addClass("in");
        $("#frame-6").show();
        $("#yframe-6").addClass("wyactive");
        var rdoValue = $('.col-sm-9').find(':radio:checked').val();
        if(rdoValue==null){
            console.log('没有选中')
            $(".help-block").html('请在设置中开启提现方式')
        }
         if(rdoValue==2){
                $(".hide_0").show();
            }else{
                $(".hide_0").hide();
            }
        console.log('这是选中的input值'+rdoValue);
        $(".radio-inline").click(function(){
            var rdoValue = $('.col-sm-9').find(':radio:checked').val();
            if(rdoValue==2){
                $(".hide_0").show();
            }else{
                $(".hide_0").hide();
            }
            console.log('这是选中的input值'+rdoValue);
        });     
        //表单验证
        $(".js_submit").click(function(){
            var num=$(".js_con").val();
            var tatal=Number($(".tatal").html());
            console.log(typeof(num))
            console.log("提现金额"+tatal)

            if(num==""){
                $(".tip_msg").html("请输入提现金额!")
                return false;
            }else if(num>tatal){
                $(".tip_msg").html("提现金额大于可提现金额!")
                return false;
            }
            $(".tip_msg").html("")

        })
        
    })
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>

