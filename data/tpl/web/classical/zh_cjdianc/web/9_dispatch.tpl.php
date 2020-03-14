<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/header', TEMPLATE_INCLUDEPATH)) : (include template('public/header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/comhead', TEMPLATE_INCLUDEPATH)) : (include template('public/comhead', TEMPLATE_INCLUDEPATH));?>
<link rel="stylesheet" type="text/css" href="../addons/zh_cjdianc/template/public/ygcss.css">
<ul class="nav nav-tabs">
    <span class="ygxian"></span>
    <div class="ygdangq">当前位置:</div>    
    <li class="active"><a href="javascript:void(0);">提现设置</a></li>
</ul>
<div class="main">
    <form action="" method="post" class="form-horizontal form" enctype="multipart/form-data">
        <!--<input type="hidden" name="parentid" value="<?php  echo $parent['id'];?>" />-->
        <div class="panel panel-default ygdefault">
            <div class="panel-heading wyheader">
                商户配送方式设置
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label for="lastname" class="col-sm-2 control-label">配送方式</label>
                    <div class="col-sm-10">
                        <label class="checkbox-inline">
                        <?php  if($item['is_sj']==1) { ?>  
                        <input type="checkbox" name="is_sj" id="optionsRadios3" value="1" checked> 商家配送
                        <?php  } else { ?>
                        <input type="checkbox" name="is_sj" id="optionsRadios3" value="1" > 商家配送
                        <?php  } ?>
                        </label>
                        <label class="checkbox-inline">
                            <?php  if($item['is_dada']==1) { ?>  
                            <input type="checkbox" name="is_dada" id="optionsRadios4"  value="1" checked> 达达配送
                              <?php  } else { ?>
                               <input type="checkbox" name="is_dada" id="optionsRadios4"  value="1" > 达达配送
                               <?php  } ?>
                        </label>
                        <label class="checkbox-inline">
                           <?php  if($item['is_kfw']==1) { ?>  
                            <input type="checkbox" name="is_kfw" id="optionsRadios4"  value="1" checked> 快服务配送
                             <?php  } else { ?>
                                <input type="checkbox" name="is_kfw" id="optionsRadios4"  value="1"> 快服务配送
                                 <?php  } ?>
                        </label>
                         <label class="checkbox-inline">
                           <?php  if($item['is_pt']==1) { ?>  
                            <input type="checkbox" name="is_pt" id="optionsRadios4"  value="1" checked> <?php  echo $ps_name;?>
                             <?php  } else { ?>
                                <input type="checkbox" name="is_pt" id="optionsRadios4"  value="1"> <?php  echo $ps_name;?>
                                 <?php  } ?>
                        </label>
                        <div class="help-block">*注意：不勾选则关闭此配送方式</div>
                    </div>
                </div>
 
                <div class="form-group no_guo">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">配送名称</label>
                    <div class="col-sm-9">
                       <input type="text" name="ps_name" class="form-control" value="<?php  echo $item['ps_name'];?>" />
                        <div class="help-block">*不填写会默认为超级跑腿</div>
                    </div>
                </div> 
                <div class="form-group no_guo">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">自动收货时间(天)</label>
                    <div class="col-sm-9">
                       <input type="text" name="sh_time" class="form-control" value="<?php  echo $item['sh_time'];?>" />
                        <div class="help-block">*商家接单多少天后订单自动完成</div>
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
        // $("#frame-13").addClass("in");
        $("#frame-14").show();
        $("#yframe-14").addClass("wyactive");
    })
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>