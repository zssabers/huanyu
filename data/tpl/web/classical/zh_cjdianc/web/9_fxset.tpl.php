<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/header', TEMPLATE_INCLUDEPATH)) : (include template('public/header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/comhead', TEMPLATE_INCLUDEPATH)) : (include template('public/comhead', TEMPLATE_INCLUDEPATH));?>
<link rel="stylesheet" type="text/css" href="../addons/zh_cjdianc/template/public/ygcss.css">
<style type="text/css">
    input[type="radio"] + label::before {
        content: "\a0"; /*不换行空格*/
        display: inline-block;
        vertical-align: middle;
        font-size: 16px;
        width: 1em;
        height: 1em;
        margin-right: .4em;
        border-radius: 50%;
        border: 2px solid #ddd;
        text-indent: .15em;
        line-height: 1; 
    }
    input[type="radio"]:checked + label::before {
        background-color: #44ABF7;
        background-clip: content-box;
        padding: .1em;
        border: 2px solid #44ABF7;
    }
    input[type="radio"] {
        position: absolute;
        clip: rect(0, 0, 0, 0);
    }
    .ygmargin{margin-top: 10px;color: #999;}
</style>
<ul class="nav nav-tabs">
    <span class="ygxian"></span>
    <div class="ygdangq">当前位置:</div>    
    <li class="active"><a href="javascript:void(0);">分销设置</a></li>
</ul>
<div class="main">
    <form action="" method="post" class="form-horizontal form" enctype="multipart/form-data">
        <!--<input type="hidden" name="parentid" value="<?php  echo $parent['id'];?>" />-->
        <div class="panel panel-default ygdefault">
            <div class="panel-heading wyheader">
                分销设置
            </div>
            <div class="panel-body">
            <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">分销入口</label>
                    <div class="col-sm-9">
                        <label class="radio-inline">
                            <input type="radio" id="emailwy1" name="is_open" value="1" <?php  if($item['is_open']==1 || empty($item['is_open'])) { ?>checked<?php  } ?> />
                            <label for="emailwy1">开启</label>
                        </label>
                        <label class="radio-inline">
                            <input type="radio" id="emailwy2" name="is_open" value="2" <?php  if($item['is_open']==2) { ?>checked<?php  } ?> />
                            <label for="emailwy2">关闭</label>
                        </label>
                        <div class="ygmargin">(*开启后小程序端显示分销中心入口)</div> 
                    </div>
                    
                </div>
                <div class="form-group">
                <label class="col-xs-12 col-sm-3 col-md-2 control-label">分销名称</label>
                	<div class="col-sm-9">
                		<p class="input-group">
                			<input type="text" name="fx_name" value="<?php  echo $item['fx_name'];?>" id="points" class="form-control" />
							  <div class="ygmargin">(*默认名称为分销中心)</div> 
                		</p>
						
                	</div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">自定义下线名称</label>
                    <div class="col-sm-9">
                        <p class="input-group">
                            <input type="text" name="xx_name" value="<?php  echo $item['xx_name'];?>" id="points2" class="form-control" />
                        <div class="ygmargin">(*默认名称为我的伙伴)</div>
                        </p>

                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">分销商审核</label>
                    <div class="col-sm-9">
                        <label class="radio-inline">
                            <input type="radio" id="is_check3" name="is_check" value="1" <?php  if($item['is_check']==1 || empty($item['is_check'])) { ?>checked<?php  } ?> />
                            <label for="is_check3">开启</label>
                        </label>
                        <label class="radio-inline">
                            <input type="radio" id="is_check4" name="is_check" value="2" <?php  if($item['is_check']==2) { ?>checked<?php  } ?> />
                            <label for="is_check4">关闭</label>
                        </label>
                        <div class="ygmargin">(*开启后需要申请分销并后台审核通过才能成为分销商)</div>    
                    </div>
                    
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">分销层级</label>
                    <div class="col-sm-9">
                        <label class="radio-inline distribution_one">
                            <input type="radio" id="emailwy7" name="is_ej" value="1" <?php  if($item['is_ej']==1 || empty($item['is_ej'])) { ?>checked<?php  } ?> />
                            <label for="emailwy7">一级分销</label>
                        </label>
                        <label class="radio-inline distribution_two">
                            <input type="radio" id="emailwy8" name="is_ej" value="2" <?php  if($item['is_ej']==2) { ?>checked<?php  } ?> />
                            <label for="emailwy8">二级分销</label>
                        </label>    
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">分销类型</label>
                    <div class="col-sm-9">
                        <select class="col-sm-5 js_select" id="type testSelect" name="type" autocomplete="off">  
                                <option value="1" <?php  if($item['type']=='1') { ?> selected <?php  } ?>>店内分销</option>
                                <option value="2" <?php  if($item['type']=='2') { ?> selected <?php  } ?>>外卖分销</option>
                                <option value="3" <?php  if($item['type']=='3') { ?> selected <?php  } ?>>店内+外卖分销</option>
                        </select>
                    </div>
                    <div class="col-sm-12">
                        <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
                        <span class="help-block col-sm-9">*选着对应的分销,填写相对应的佣金比列,店内包含(预约,收银,抢购,拼团)</span>
                    </div>
                </div>
       

               <!-- <div class="form-group ygyi2 one">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">店内一级佣金比列</label>
                    <div class="col-sm-9">
                      <p class="input-group">
                         <input type="text" onkeyup="value=value.replace(/[^\d.]/g,'')" name="dn_yj" value="<?php  echo $item['dn_yj'];?>" id="points" class="form-control" />
                         <span class="input-group-addon">%</span>
                         </p>
                          <span class="help-block">*一级下线消费时,分销商可获得佣金比例</span>
                    </div>
                </div>
                <div class="form-group ygyi2 two">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">店内二级佣金比列</label>
                    <div class="col-sm-9">
                        <p class="input-group">
                         <input type="text" onkeyup="value=value.replace(/[^\d.]/g,'')" name="dn_ej" value="<?php  echo $item['dn_ej'];?>" id="points" class="form-control" />
                         <span class="input-group-addon">%</span>
                         </p>
                          <span class="help-block">*二级下线消费时,分销商可获得佣金比例</span>
                    </div>
                </div> 
                 飞蛾打印机
                <div class="form-group ygyi3 one">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">外卖一级佣金比列</label>
                    <div class="col-sm-9">
                        <p class="input-group">
                         <input type="text" onkeyup="value=value.replace(/[^\d.]/g,'')" name="wm_yj" value="<?php  echo $item['wm_yj'];?>" id="points" class="form-control" />
                         <span class="input-group-addon">%</span>
                         </p>
                          <span class="help-block">*一级下线消费时,分销商可获得佣金比例</span>
                    </div>
                </div>
                <div class="form-group ygyi3 two">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">外卖二级佣金比列</label>
                    <div class="col-sm-9">
                        <p class="input-group">
                         <input type="text" onkeyup="value=value.replace(/[^\d.]/g,'')" name="wm_ej" value="<?php  echo $item['wm_ej'];?>" id="points" class="form-control" />
                         <span class="input-group-addon">%</span>
                         </p>
                          <span class="help-block">*二级下线消费时,分销商可获得佣金比例</span>
                    </div>
                </div>  --> 
                
            <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">分销中心图片</label>
                    <div class="col-sm-9">
                        <?php  echo tpl_form_field_image('img', $item['img'])?>
                        <div class="ygmargin">*建议宽高比例 750*560</div>
                    </div>
                </div> 
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">申请分销商图片</label>
                    <div class="col-sm-9">
                        <?php  echo tpl_form_field_image('img2', $item['img2'])?>
                        <div class="ygmargin">*建议宽高比例 390*240</div>
                    </div>
                </div> 
				<div class="form-group">
                  <label class="col-xs-12 col-sm-3 col-md-2 control-label">申请分销商费用</label>
                    <div class="col-sm-9">
                        <p class="input-group">
                             <input type="text" name="money" value="<?php  echo $item['money'];?>" id="points" class="form-control" />
                             <span class="input-group-addon">元</span>
                        </p>
                 </div>
                </div>
                <div class="form-group">
                  <label class="col-xs-12 col-sm-3 col-md-2 control-label">最低提现金额</label>
                    <div class="col-sm-9">
                        <p class="input-group">
                             <input type="text" name="tx_money" value="<?php  echo $item['tx_money'];?>" id="points" class="form-control" />
                             <span class="input-group-addon">元</span>
                        </p>
                        <div class="help-block">*最低提现金额不能小于1元，建议填写整数，不填写为不限制</div>
                 </div>
                </div>
                <div class="form-group">
                  <label class="col-xs-12 col-sm-3 col-md-2 control-label">提现费率</label>
                  <div class="col-sm-9">
                        <p class="input-group">
                             <input type="number" name="tx_rate" value="<?php  echo $item['tx_rate'];?>" id="points" class="form-control" />
                             <span class="input-group-addon">%</span>
                        </p>
                        <div class="help-block">*用户申请提现时，每笔申请提现扣除的费用，默认为空，即提现不扣费</div>
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="col-xs-12 col-sm-3 col-md-2 control-label">分销商申请协议</label>
                  <div class="col-sm-9">
                       <?php  echo tpl_ueditor('fx_details',$item['fx_details']);?>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-xs-12 col-sm-3 col-md-2 control-label">佣金提现协议</label>
                  <div class="col-sm-9">
                       <?php  echo tpl_ueditor('tx_details',$item['tx_details']);?>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-xs-12 col-sm-3 col-md-2 control-label">分销商说明</label>
                  <div class="col-sm-9">
                       <?php  echo tpl_ueditor('instructions',$item['instructions']);?>
                  </div>
                </div>

             </div>
        </div>
        <div class="form-group">
            <input type="submit" name="submit" value="提交" class="btn col-sm-3" style="color: white;background-color: #44ABF7;"/>
            <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
             <input type="hidden" name="id" value="<?php  echo $item['id'];?>" />
        </div>
    </form>
</div>
<script type="text/javascript">
   $(function(){
    // "<?php  if($item) { ?>"
    //     "<?php  if($item['type']=='1') { ?>"
    //         $('.ygyi').hide();
    //         $('.ygyi3').hide();
    //     "<?php  } ?>"
    //     "<?php  if($item['type']=='2') { ?>"
    //         $('.ygyi2').hide();
    //         $('.ygyi3').hide();
    //     "<?php  } ?>"
    //     "<?php  if($item['type']=='3') { ?>"
    //         $('.ygyi').hide();
    //         $('.ygyi2').hide();
    //     "<?php  } ?>"            
    // "<?php  } else { ?>"
    //     $('.ygyi').hide();
    //     $('.ygyi3').hide();
    // "<?php  } ?>"
    // $('.js_select').change(function(){
    //   console.log($(this).val())
    //     $('.ygyi').show();
    //     $('.ygyi2').show();
    //     $('.ygyi3').show();
    //     if($(this).val() == '1') {
    //         $('.ygyi').hide();
    //         $('.ygyi3').hide();
    //     }
    //     if($(this).val() == '2') {
    //         $('.ygyi2').hide();
    //         $('.ygyi3').show();
    //     }
    //     // if($(this).val() == '3') {
    //     //     $('.ygyi').hide();
    //     //     $('.ygyi2').hide();
    //     // }
    // });
    $("#frame-9").show();
    $("#yframe-9").addClass("wyactive");

    var val=""
    var con=""
    val=$("input[name='is_ej']:checked").val()//单选选中
    con=$('.js_select option:selected').val()//下拉选中
    console.log(val)
    console.log(con)
    grade(val)

    function grade(num){
      if(num==2){//二级
        $(".two").show()//ygyi2 店内
        $(".one").show()//ygyi3 外卖
        two(con)
      }else{//一级
        $(".two").hide()
        $(".one").show()
        one(con)
      }
    }
    //一级
    function one(num){
      if(num==1){//店内
        $(".one.ygyi2").show()
        $(".one.ygyi3").hide()
      }else if(num==2){//外卖
        $(".one.ygyi2").hide()
        $(".one.ygyi3").show()
      }else{
        $(".one.ygyi2").show()
        $(".one.ygyi3").show()        
      }
    }

    //二级
    function two(num){
      if(con==1){//店内
        $(".ygyi2").show()
        $(".ygyi3").hide()
      }else if(con==2){//外卖
        $(".ygyi2").hide()
        $(".ygyi3").show()
      }else{
        $(".ygyi2").show()
        $(".ygyi3").show()        
      }
    }

    $(".distribution_two").click(function(){
      val=$(this).children("input").val()
      console.log(val)
      grade(val)     
    })
    $(".distribution_one").change(function(){
      val=$(this).children("input").val()
      console.log(val)
      grade(val)
    })

});
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>