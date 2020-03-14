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
    <li><a href="<?php  echo $this->createWebUrl('ad')?>">广告列表</a></li>
    <li class="active"><a href="<?php  echo $this->createWebUrl('addad')?>">添加广告</a></li>
</ul>
<div class="main">
    <form action="" method="post" class="form-horizontal form" enctype="multipart/form-data">
        <!--<input type="hidden" name="parentid" value="<?php  echo $parent['id'];?>" />-->
        <div class="panel panel-default ygdefault">
            <div class="panel-heading wyheader">
                内容编辑
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">广告类型</label>
                    <div class="col-sm-9">
                        <select name="type" class="col-md-4">
                            <option value="1" <?php  if($info['type']==1) { ?>selected<?php  } ?>>首页轮播图</option>
                            <!-- <option value="11" <?php  if($info['type']==11) { ?>selected<?php  } ?>>多店中部小广告位</option> -->
                            <!-- <option value="3" <?php  if($info['type']==3) { ?>selected<?php  } ?>>多店中部大广告位</option> -->
                            <!-- <option value="4" <?php  if($info['type']==4) { ?>selected<?php  } ?>>多店底部广告位</option> -->
                            <!-- <option value="9" <?php  if($info['type']==9) { ?>selected<?php  } ?>>拼团广告位</option> -->
                            <!-- <option value="10" <?php  if($info['type']==10) { ?>selected<?php  } ?>>精选好店广告位</option> -->
                            
                            <!-- <option value="6" <?php  if($info['type']==6) { ?>selected<?php  } ?>>积分商城广告位</option> -->
                            <!-- <option value="8" <?php  if($info['type']==8) { ?>selected<?php  } ?>>会员中心广告位</option> -->
                            <!-- <option value="7" <?php  if($info['type']==7) { ?>selected<?php  } ?>>个人中心广告位</option> -->
                            <!-- <option value="5" <?php  if($info['type']==5) { ?>selected<?php  } ?>>门店入驻广告位</option> -->
                            <!-- <option value="2" <?php  if($info['type']==2) { ?>selected<?php  } ?>>平台开屏广告位</option> -->
              <!--               <option value="9" <?php  if($info['type']==10) { ?>selected<?php  } ?>>抢购广告位</option> -->
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">标题</label>
                    <div class="col-sm-9">
                        <input type="text" name="title" class="form-control" value="<?php  echo $info['title'];?>" />
                    </div>
                </div>               
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">图片</label>
                    <div class="col-sm-9">
                        <?php  echo tpl_form_field_image('logo', $info['logo'])?>
                        <div class="ygmargin">首页轮播图       702*300<br>
											  <!-- 多店中部小广告位建议尺寸　189*94<br> -->
											  <!-- 多店中部大广告位建议尺寸　392*82<br> -->
											  <!-- 多店底部广告位建议尺寸　　392*82<br> -->
											  <!-- 拼团广告位建议尺寸　　　　414*248<br> -->
											  <!-- 精选好店广告位建议尺寸　　414*198<br> -->
											  <!-- 积分商城广告位建议尺寸　　414*198<br> -->
											  <!-- 会员中心广告位建议尺寸　　414*198<br> -->
										      <!-- 个人中心广告位建议尺寸　　414*110<br> -->
											  <!-- 门店入驻广告位建议尺寸　　414*198<br> -->
											  <!-- 平台开屏广告建议尺寸　　　414*736 -->
											  </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">选择跳转方式</label>
                    <div class="col-sm-9">
                        <select name="item" class="col-sm-9" id="type">
                            <option value="1" <?php  if($info['item']=='1') { ?> selected <?php  } ?>>内部网页跳转</option>
                            <option value="2" <?php  if($info['item']=='2') { ?> selected <?php  } ?>>外部网页跳转</option>
                            <option value="3" <?php  if($info['item']=='3') { ?> selected <?php  } ?>>关联小程序跳转</option>
                        </select>
                    </div>
                </div>
                <div class="form-group ygyi1">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">内部链接</label>
                    <div class="col-sm-9">
                        <input type="text" name="src" class="form-control" value="<?php  echo $info['src'];?>" />
                   <div class="ygmargin">*跳转到积分商城(/zh_cjdianc/pages/integral/integral)</div>
                        <div class="ygmargin">*跳转合作加盟(/zh_cjdianc/pages/ruzhu/index)</div>
                        <div class="ygmargin">*跳转分销中心(/zh_cjdianc/pages/distribution/index)</div>
                        <div class="ygmargin">*跳转会员中心(/zh_cjdianc/pages/hyk/hyk)</div>
                        <div class="ygmargin">*跳转商家详情(/zh_cjdianc/pages/seller/index?sjid=1) sjid=商家id</div>
<!--                         <div class="ygmargin">*跳积分商城../integral/integral</div>
                        <div class="ygmargin">*跳优惠券中心../coupons/shop_coupons</div>
                        <div class="ygmargin">*跳充值中心../logs/cash</div> -->
                    </div>
                </div>
                <div class="form-group ygyi2">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">外部链接</label>
                    <div class="col-sm-9">
                        <input type="text" name="src2" class="form-control" value="<?php  echo $info['src2'];?>" />
                        <div class="ygmargin">*此链接为网页外部跳转链接，需要在小程序后台配置业务域名</div>
                    </div>
                </div>
                <div class="form-group ygyi3">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">跳转小程序名称</label>
                    <div class="col-sm-9">
                        <input type="text" name="xcx_name" class="form-control" value="<?php  echo $info['xcx_name'];?>" />
                    </div>
                </div> 
                <div class="form-group ygyi3">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">小程序appid</label>
                    <div class="col-sm-9">
                        <input type="text" name="appid" class="form-control" value="<?php  echo $info['appid'];?>" />
                        <div class="ygmargin">*请输入跳转的小程序appid(须同一公众号下的关联的小程序之间才可以相互跳转)</div>
                    </div>
                </div>

                <!-- <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">链接</label>
                    <div class="col-sm-9">
                        <input type="text" name="src" class="form-control" value="<?php  echo $info['src'];?>" />
                         *跳转到商家链接(../info/info?id=1)id=商家id
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">跳转小程序名称</label>
                    <div class="col-sm-9">
                        <input type="text" name="xcx_name" class="form-control" value="<?php  echo $info['xcx_name'];?>" />
                       
                    </div>
                </div> 
             <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">小程序appid</label>
                    <div class="col-sm-9">
                        <input type="text" name="appid" class="form-control" value="<?php  echo $info['appid'];?>" />
                        *要跳转的小程序appid(只有同一公众号下的关联的小程序之间才可相互跳转)
                    </div>
                </div> -->
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">排序</label>
                    <div class="col-sm-9">
                        <input type="text" name="orderby" class="form-control" value="<?php  echo $info['orderby'];?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">是否禁用</label>
                    <div class="col-sm-9">
                        <label class="radio-inline">
                            <input type="radio" id="emailwy1" name="status" value="1" <?php  if($info['status']==1 || empty($info['status'])) { ?>checked<?php  } ?> />
                            <label for="emailwy1">启用</label>
                        </label>
                        <label class="radio-inline">
                            <input type="radio" id="emailwy2" name="status" value="2" <?php  if($info['status']==2) { ?>checked<?php  } ?> />
                            <label for="emailwy2">禁用</label>
                        </label>    
                    </div>
                </div>
            </div>

        </div>

        <div class="form-group">
            <input type="submit" name="submit" value="提交" class="btn col-lg-3" style="color: white;background-color: #44ABF7;"/>
            <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
            <input type="hidden" name="id" value="<?php  echo $info['id'];?>" />
        </div>
    </form>
</div>
<script type="text/javascript">
    $(function(){
        // $("#frame-2").addClass("in");
        $("#frame-2").show();
        $("#yframe-2").addClass("wyactive");
        "<?php  if($info) { ?>"
            "<?php  if($info['item']=='1') { ?>"
                $('.ygyi2').hide();
                $('.ygyi3').hide();
            "<?php  } ?>"
            "<?php  if($info['item']=='2') { ?>"
                $('.ygyi1').hide();
                $('.ygyi3').hide();
            "<?php  } ?>" 
            "<?php  if($info['item']=='3') { ?>"
                $('.ygyi1').hide();
                $('.ygyi2').hide();
            "<?php  } ?>"            
        "<?php  } else { ?>"
            $('.ygyi2').hide();
            $('.ygyi3').hide();
        "<?php  } ?>"
        $("select#type").change(function(){
            if($(this).val()=='1'){
                console.log($(this).val())
                $(".ygyi1").show();
                $(".ygyi2").hide();
                $(".ygyi3").hide();  
            }else if($(this).val()=='2'){
                console.log($(this).val())
                $(".ygyi1").hide();
                $(".ygyi2").show();
                $(".ygyi3").hide();  
            }else if($(this).val()=='3'){
                console.log($(this).val())
                $(".ygyi1").hide();
                $(".ygyi2").hide();
                $(".ygyi3").show();  
            }
         })
    })
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>