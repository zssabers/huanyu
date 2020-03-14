<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/header', TEMPLATE_INCLUDEPATH)) : (include template('public/header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/comhead', TEMPLATE_INCLUDEPATH)) : (include template('public/comhead', TEMPLATE_INCLUDEPATH));?>
<link rel="stylesheet" type="text/css" href="../addons/zh_cjdianc/template/public/ygcss.css">
<style type="text/css">
    .ygmargin{margin-top: 10px;color: #999;}
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
</style>
<ul class="nav nav-tabs">
    <span class="ygxian"></span>
    <div class="ygdangq">当前位置:</div>    
    <li class="active"><a href="javascript:void(0);">会员卡设置</a></li>
</ul>
<div class="main">
    <form action="" method="post" class="form-horizontal form" enctype="multipart/form-data" id="invitative">
        <div class="panel panel-default ygdefault">
            <div class="panel-heading wyheader">
                会员卡&nbsp;>&nbsp;会员卡设置
            </div>
            <div class="panel-body">
			<div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">会员卡名称</label>
                    <div class="col-sm-9">
                        <input name="hy_name" class="form-control" value="<?php  echo $item['hy_name'];?>">
                    </div>

                </div>
             <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">会员卡 </label>	
                    <div class="col-sm-9">
                        <span class="radio-inline">
                            <input id="is_psxx1" type="radio" name="is_hy" value="1" <?php  if($item['is_hy']==1) { ?>checked<?php  } ?> />
                            <label for="is_psxx1">开启</label>              
                        </span>
                        <span class="radio-inline">
                            <input id="is_psxx2" type="radio" name="is_hy" value="2" <?php  if($item['is_hy']==2 || empty($item['is_hy'])) { ?>checked<?php  } ?> /> 
                            <label for="is_psxx2">关闭</label>
                        </span>
                        <span class="help-block">*关闭后小程序端不显示会员中心入口</span>
                     
                        
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">会员免配送费 </label>
                    <div class="col-sm-9">
                        <span class="radio-inline">
                            <input id="is_psxx3" type="radio" name="is_vip_delivery" value="1" <?php  if($item['is_vip_delivery']==1) { ?>checked<?php  } ?> />
                            <label for="is_psxx3">开启</label>              
                        </span>
                        <span class="radio-inline">
                            <input id="is_psxx4" type="radio" name="is_vip_delivery" value="2" <?php  if($item['is_vip_delivery']==2 || empty($item['is_vip_delivery'])) { ?>checked<?php  } ?> /> 
                            <label for="is_psxx4">关闭</label>
                        </span>
                        <span class="help-block">*开启后会员用户下单免配送费</span>
                     
                        
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">中部广告</label>
                    <div class="col-sm-9">
                        <?php  echo tpl_form_field_image('zb_img', $item['zb_img'])?>
                        <div class="ygmargin">*建议宽高 750*1220</div>
                    </div>
                </div>
             
                <div class="panel-body">
<!--                 <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">会员折扣(%)</label>
                    <div class="col-sm-9">
                       <input type="number" name="hy_discount" class="form-control" value="<?php  echo $item['hy_discount'];?>" />
                       <div class="ygmargin">*会员用户外卖买单时享受折扣,填90代表9折</div>
                    </div>

                </div>  --> 
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">会员页注释内容</label>
                    <div class="col-sm-9">
                        <textarea name="hy_note" class="form-control"  cols="30" rows="7"><?php  echo $item['hy_note'];?></textarea>
                       <!-- <div class="ygmargin">*会员用户外卖买单时享受折扣,填90代表9折</div> -->
                    </div>

                </div> 
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">会员权益说明</label>
                    <div class="col-sm-9">
                         <?php  echo tpl_ueditor('hy_details',$item['hy_details']);?>
                    </div>
                </div>
                 <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">开通会员协议</label>
                    <div class="col-sm-9">
                         <?php  echo tpl_ueditor('kt_details',$item['kt_details']);?>
                    </div>
                </div>
             
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
        // $("#frame-14").addClass("in");
        $("#frame-16").show();
        $("#yframe-16").addClass("wyactive");
    })
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>