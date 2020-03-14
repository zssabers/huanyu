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
    .navback{width: 0}
    .main{margin: 16px 0px 30px 45px;}
    .nav_box{
        left: 150px;
        top: 48px;
        bottom: 0;
        color: #333;
        border-right: 1px solid #efefef;
        text-align: center;
        position: fixed;
        background: #fff;
        z-index: 99;   
        padding:0;     
    }
    .left_nav{
        padding-top: 20px
    }
    .left_nav li{
        line-height: 45px;
    }
    .left_nav li.active{
        color: #00aeff;
        background: #edf6ff
    }
    .left_nav li:hover{
        background: #edf6ff;
    }
    .left_nav li:hover a{
        color: #00aeff;
    }
    
</style>
<div class="nav_box col-md-1">
    <ul class="left_nav">
    <!--     <span class="ygxian"></span>
        <div class="ygdangq">当前位置:</div>  -->   
        <li class="active"><a href="javascript:void(0);">短信设置</a></li>
    </ul>
</div>
<!-- <ul class="nav nav-tabs">
    <span class="ygxian"></span>
    <div class="ygdangq">当前位置:</div>    
    <li class="active"><a href="javascript:void(0);">短信设置</a></li>
</ul> -->
<div class="main">
    <form action="" method="post" class="form-horizontal form" enctype="multipart/form-data" id="invitative">
        <div class="panel panel-default ygdefault">
            <div class="panel-heading wyheader">
                短信设置
            </div>
            <div class="panel-body">
                <!-- <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">短信服务类型</label>
                    <div class="col-sm-9">
                        <select class="col-sm-5" id="test" name="item" autocomplete="off">  
                            <option value="1" <?php  if($item['item']=='1') { ?> selected <?php  } ?>>聚合数据</option>
                            <option value="2" <?php  if($item['item']=='2') { ?> selected <?php  } ?>>腾讯云</option>
                            <option value="3" <?php  if($item['item']=='3') { ?> selected <?php  } ?>>阿里云</option>
                        </select>
                    </div>
                </div>
                <div class="form-group control_0">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">应用key：</label>
                    <div class="col-sm-5">
                        <input type="text" name="appkey" value="<?php  echo $item['appkey'];?>" id="web_name" class="form-control" />
                        <div class="help-block">
                        * 请输入聚合短信的AppKey
                        </div>
                    </div>
                </div>
                                <div class="form-group control">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">appid：</label>
                    <div class="col-sm-9">
                        <input type="text" name="appid" value="<?php  echo $item['appid'];?>" id="web_name" class="form-control" />
                    </div>
                </div>
                <div class="form-group control">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">appkey：</label>
                    <div class="col-sm-9">
                        <input type="text" name="tx_appkey" value="<?php  echo $item['tx_appkey'];?>" id="web_name" class="form-control" />
                    </div>
                </div>
                <div class="form-group control">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">签名内容：</label>
                    <div class="col-sm-9">
                        <input type="text" name="sign" value="<?php  echo $item['sign'];?>" id="web_name" class="form-control" />
                    </div>
                </div>
                <div class="form-group control">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">国家(地区)码：</label>
                    <div class="col-sm-9">
                        <input type="text" name="code" value="<?php  echo $item['code'];?>" id="web_name" class="form-control" />
                    </div>
                </div>


                <div class="form-group aliyun">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">阿里云用户名/AppKey：</label>
                    <div class="col-sm-9">
                        <input type="text" name="aliyun_appkey" value="<?php  echo $item['aliyun_appkey'];?>" id="web_name" class="form-control" />
                    </div>
                </div>
                <div class="form-group aliyun">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label"> 秘钥/AppSecret：</label>
                    <div class="col-sm-9">
                        <input type="text" name="aliyun_appsecret" value="<?php  echo $item['aliyun_appsecret'];?>" id="web_name" class="form-control" />
                    </div>
                </div>
                <div class="form-group aliyun">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">短信签名：</label>
                    <div class="col-sm-9">
                        <input type="text" name="aliyun_sign" value="<?php  echo $item['aliyun_sign'];?>" id="web_name" class="form-control" />
                    </div>
                </div> -->
            
                 <div class="form-group">
                    <label class="col-md-2 control-label">外卖提醒通知：</label>
                    <!-- <div class="col-md-4">
                        <input type="text" name="wm_tid" value="<?php  echo $item['wm_tid'];?>" id="web_name" class="form-control" />
                    </div> -->
                    <div class="col-sm-6">
                        <label class="radio-inline">
                            <input type="radio" id="emailwy1" name="is_wm" value="1" <?php  if($item['is_wm']==1) { ?>checked<?php  } ?> />
                            <label for="emailwy1">启用</label>
                        </label>
                        <label class="radio-inline">
                            <input type="radio" id="emailwy2" name="is_wm" value="2" <?php  if($item['is_wm']==2 || empty($item['is_wm'])) { ?>checked<?php  } ?> />
                            <label for="emailwy2">禁用</label>
                        </label>
                        <!-- <div class="help-block">
                        * 选择不开启，用户下单商家则收不到短信提醒
                        </div> -->    
                    </div>
                    <!-- <div class="help-block col-md-8 col-md-offset-2">
                        * 请输入短信模板ID
                    </div> -->
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">店内提醒通知：</label>
                    <!-- <div class="col-md-4">
                        <input type="text" name="dn_tid" value="<?php  echo $item['dn_tid'];?>" id="web_name" class="form-control" />                        
                    </div> -->
                    <div class="col-md-6">
                        <label class="radio-inline">
                            <input type="radio" id="emailwy5" name="is_dn" value="1" <?php  if($item['is_dn']==1) { ?>checked<?php  } ?> />
                            <label for="emailwy5">启用</label>
                        </label>
                        <label class="radio-inline">
                            <input type="radio" id="emailwy6" name="is_dn" value="2" <?php  if($item['is_dn']==2  || empty($item['is_dn'])) { ?>checked<?php  } ?> />
                            <label for="emailwy6">禁用</label>
                        </label>
                           
                    </div>
                    <!-- <div class="help-block col-md-8 col-md-offset-2">
                        *  请输入短信模板ID
                    </div>  -->
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">预定提醒通知：</label>
                   <!--  <div class="col-md-4">
                        <input type="text" name="yy_tid" value="<?php  echo $item['yy_tid'];?>" id="web_name" class="form-control" />                        
                    </div> -->
                    <div class="col-md-6">
                        <label class="radio-inline">
                            <input type="radio" id="emailwy3" name="is_yy" value="1" <?php  if($item['is_yy']==1 || empty($item['is_yy'])) { ?>checked<?php  } ?> />
                            <label for="emailwy3">启用</label>
                        </label>
                        <label class="radio-inline">
                            <input type="radio" id="emailwy4" name="is_yy" value="2" <?php  if($item['is_yy']==2) { ?>checked<?php  } ?> />
                            <label for="emailwy4">禁用</label>
                        </label>
                    </div>
                    <!-- <div class="help-block col-md-8 col-md-offset-2">
                        * 请输入短信模板ID
                    </div> -->
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">退款提醒通知：</label>
                    <!-- <div class="col-md-4">
                        <input type="text" name="tk_tid" value="<?php  echo $item['tk_tid'];?>" id="web_name" class="form-control" />                        
                    </div> -->
                    <div class="col-md-6">
                        <label class="radio-inline">
                            <input type="radio" id="emailwy7" name="is_tk" value="1" <?php  if($item['is_tk']==1) { ?>checked<?php  } ?> />
                            <label for="emailwy7">启用</label>
                        </label>
                        <label class="radio-inline">
                            <input type="radio" id="emailwy8" name="is_tk" value="2" <?php  if($item['is_tk']==2  || empty($item['is_tk'])) { ?>checked<?php  } ?> />
                            <label for="emailwy8">禁用</label>
                        </label>
                    </div>
                    <!-- <div class="help-block col-md-8 col-md-offset-2">
                        * 请输入短信模板ID
                    </div> -->
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">接收人手机号：</label>
                    <div class="col-sm-5">
                        <input type="text" name="tel" value="<?php  echo $item['tel'];?>" id="web_name" class="form-control" />
                        <div class="help-block">
                            * 请绑定接收人手机号，有新订单会发送短信到此手机号
                        </div>
                    </div>
                </div>
                <!-- <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">接收人公众号openId：</label>
                    <div class="col-sm-5">
                        <input type="text" name="openId" value="<?php  echo $item['openId'];?>" id="web_name" class="form-control" />
                        <div class="help-block">
                            * 请绑定用户公众号openId,用来接收新订单提醒模板消息
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
        
        <div class="form-group">
            <input type="submit" name="submit" value="保存设置" class="btn col-lg-3" style="color: white;background-color: #44ABF7;" />
            <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
            <input type="hidden" name="id" value="<?php  echo $item['id'];?>" />
        </div>
    </form>
</div>
<script type="text/javascript">
    $(function(){
        $("#frame-4").show();
        $("#yframe-4").addClass("wyactive");
        select()
        $("#test").change(function(){
            select()
        })
        function select(){
             var options=$("#test option:selected").val(); //获取选中的项
             if(options==1){
                $(".control").hide()
                $(".aliyun").hide()
                $(".control_0").show()
             }else if(options==2){
                $(".control").show()
                $(".aliyun").hide()
                $(".control_0").hide()
             }else{
                $(".control").hide()
                $(".aliyun").show()
                $(".control_0").hide()
             }
            }
    })
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
