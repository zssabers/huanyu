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
</style>
<ul class="nav nav-tabs">
    <span class="ygxian"></span>
    <div class="ygdangq">当前位置:</div>
    <li><a href="<?php  echo $this->createWebUrl('print')?>">打印设备管理</a></li>
    <li class="active"><a href="<?php  echo $this->createWebUrl('addprint')?>">添加打印机</a></li>
</ul>
<div class="main">
    <form action="" method="post" class="form-horizontal form" enctype="multipart/form-data" id="invitative">
        <div class="panel panel-default ygdefault">
            <div class="panel-heading wyheader">
                添加打印机
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">打印机状态</label>
                    <div class="col-sm-9">
                        <label class="radio-inline">
                            <input type="radio" id="emailwy1" name="state" value="1" <?php  if($item['state']==1 || empty($item['state'])) { ?>checked<?php  } ?> />
                            <label for="emailwy1">开启</label>
                        </label>
                        <label class="radio-inline">
                            <input type="radio" id="emailwy2" name="state" value="2" <?php  if($item['state']==2) { ?>checked<?php  } ?> />
                            <label for="emailwy2">关闭</label>
                        </label>
                    </div>
                </div>


               <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">打印机位置</label>
                    <div class="col-sm-9">
                        <label class="radio-inline">
                            <input type="radio" id="emailwy3" name="location" value="1" <?php  if($item['location']==1 || empty($item['location'])) { ?>checked<?php  } ?> />
                            <label for="emailwy3">前台</label>
                        </label>
                        <label class="radio-inline">
                            <input type="radio" id="emailwy4" name="location" value="2" <?php  if($item['location']==2) { ?>checked<?php  } ?> />
                            <label for="emailwy4">后厨</label>
                        </label>
                    </div>
                </div>
    
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">打印机名称</label>
                    <div class="col-sm-9">
                        <input type="text" name="name" value="<?php  echo $item['name'];?>" id="web_name" class="form-control" />
                    </div>
                </div>
                 <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">头部标题</label>
                    <div class="col-sm-9">
                        <input type="text" name="dyj_title" value="<?php  echo $item['dyj_title'];?>" id="web_name" class="form-control" />
                    </div>
                </div> 
                    <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label" style="margin-right: 15px;">打印标签</label>
                    <select class="col-sm-8"  id="onefenlei" name='tag_id'>
                        <?php  if(is_array($tag)) { foreach($tag as $key => $item2) { ?>
                        <?php  if($item2['id']==$item['tag_id']) { ?>
                        <option value="<?php  echo $item2['id'];?>" selected="selected"><?php  echo $item2['tag_name'];?></option>
                        <?php  } else { ?>
                        <option value="<?php  echo $item2['id'];?>" ><?php  echo $item2['tag_name'];?></option>
                        <?php  } ?>
                        
                        <?php  } } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">打印机类型</label>
                    <div class="col-sm-9">
                        <select class="col-sm-5" id="type" name="type" autocomplete="off">  
                                <option value="1" <?php  if($item['type']=='1') { ?> selected <?php  } ?>>365</option>
                                <option value="2" <?php  if($item['type']=='2') { ?> selected <?php  } ?>>易联云(型号:k4)</option>
                                <option value="3" <?php  if($item['type']=='3') { ?> selected <?php  } ?>>飞蛾(型号:FP-58W)</option>
                                <option value="4" <?php  if($item['type']=='4') { ?> selected <?php  } ?>>喜讯(型号:XP58IIQR)</option>
                        </select>
                    </div>
                </div>
                <div class="form-group ygyi2">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">打印机设备编码</label>
                    <div class="col-sm-9">
                        <input type="text" name="dyj_id" value="<?php  echo $item['dyj_id'];?>" id="web_name" class="form-control" placeholder="SN码|机器码|MEI码" />
                    </div>
                </div>
                <div class="form-group ygyi2">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">打印机API密钥</label>
                    <div class="col-sm-9">
                        <input type="text" name="dyj_key" value="<?php  echo $item['dyj_key'];?>" id="web_name" class="form-control" />
                    </div>
                </div>  
          <!--       <div class="form-group ygyi2">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">打印次数</label>
                    <div class="col-sm-9">
                        <input type="text" name="num" value="<?php  echo $item['num'];?>" id="web_name" class="form-control" />
                    </div>
                </div>  
 -->
                <!-- 飞蛾打印机-->
                <div class="form-group ygyi3">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">飞鹅云后台注册账号</label>
                    <div class="col-sm-9">
                        <input type="text" name="fezh" value="<?php  echo $item['fezh'];?>" id="web_name" class="form-control" />
                    </div>
                </div>
                <div class="form-group ygyi3">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">飞鹅UKEY</label>
                    <div class="col-sm-9">
                        <input type="text" name="fe_ukey" value="<?php  echo $item['fe_ukey'];?>" id="web_name" class="form-control" />
                    </div>
                </div>  
                <div class="form-group ygyi3">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">打印机编号</label>
                    <div class="col-sm-9">
                        <input type="text" name="fe_dycode" value="<?php  echo $item['fe_dycode'];?>" id="web_name" class="form-control" />
                    </div>
                </div> 
            
                
                <!-- 易联云 -->
                <div class="form-group ygyi">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">打印机终端号</label>
                    <div class="col-sm-9">
                        <input type="text" name="mid" value="<?php  echo $item['mid'];?>" id="web_name" class="form-control" />
                    </div>
                </div>
                <div class="form-group ygyi">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">打印机终端密钥</label>
                    <div class="col-sm-9">
                        <input type="text" name="token2" value="<?php  echo $item['token'];?>" id="web_name" class="form-control" />
                    </div>
                </div>
                <div class="form-group ygyi">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">用户id(管理中心系统集成里获取)</label>
                    <div class="col-sm-9">
                        <input type="text" name="yy_id" value="<?php  echo $item['yy_id'];?>" id="web_name" class="form-control"  />
                    </div>
                </div>        
                 <div class="form-group ygyi">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">apikey(管理中心系统集成里获取)</label>
                    <div class="col-sm-9">
                        <input type="text" name="api" value="<?php  echo $item['api'];?>" id="web_name" class="form-control"  />
                    </div>
                </div>   
                  <div class="form-group ygyi4">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">打印机设备编码</label>
                    <div class="col-sm-9">
                        <input type="text" name="xx_sn" value="<?php  echo $item['xx_sn'];?>" id="web_name" class="form-control" placeholder="SN码|机器码|MEI码" />
                    </div>
                </div>

                     <div class="form-group ">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">打印次数</label>
                    <div class="col-sm-9">
                        <input type="text" name="num" value="<?php  echo $item['num'];?>" id="web_name" class="form-control" />
                        易联云打印机打印次数在易联云后台控制<BR>
                        喜讯打印机最大值为4
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
<!-- <?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?> -->
<script type="text/javascript">
  $(function(){
    "<?php  if($item) { ?>"
        "<?php  if($item['type']=='1') { ?>"
            $('.ygyi').hide();
            $('.ygyi3').hide();
             $('.ygyi4').hide();
        "<?php  } ?>"
        "<?php  if($item['type']=='2') { ?>"
            $('.ygyi2').hide();
            $('.ygyi3').hide();
             $('.ygyi4').hide();
        "<?php  } ?>"
        "<?php  if($item['type']=='3') { ?>"
            $('.ygyi').hide();
            $('.ygyi2').hide();
            $('.ygyi4').hide();
        "<?php  } ?>"   
        "<?php  if($item['type']=='4') { ?>"
            $('.ygyi').hide();
            $('.ygyi2').hide();
            $('.ygyi3').hide();
        "<?php  } ?>" 

    "<?php  } else { ?>"
        $('.ygyi').hide();
        $('.ygyi3').hide();
        $('.ygyi4').hide();
    "<?php  } ?>"
    $('#type').change(function(){
        $('.ygyi').show();
        $('.ygyi2').show();
        $('.ygyi3').show();
        $('.ygyi4').show();
        if($(this).val() == '1') {
            $('.ygyi').hide();
            $('.ygyi3').hide();
             $('.ygyi4').hide();
        }
        if($(this).val() == '2') {
            $('.ygyi2').hide();
            $('.ygyi3').hide();
            $('.ygyi4').hide();
        }
        if($(this).val() == '3') {
            $('.ygyi').hide();
            $('.ygyi2').hide();
            $('.ygyi4').hide();
        }
           if($(this).val() == '4') {
            $('.ygyi').hide();
            $('.ygyi2').hide();
            $('.ygyi3').hide();
        }
    });
    // $("#frame-7").addClass("in");
    $("#frame-8").show();
    $("#yframe-8").addClass("wyactive");
});
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
