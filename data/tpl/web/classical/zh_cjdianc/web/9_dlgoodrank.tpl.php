<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/header', TEMPLATE_INCLUDEPATH)) : (include template('public/header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/comhead', TEMPLATE_INCLUDEPATH)) : (include template('public/comhead', TEMPLATE_INCLUDEPATH));?>
<link rel="stylesheet" type="text/css" href="../addons/zh_cjdianc/template/public/ygcsslist.css">
<style type="text/css">
    .row{padding-top: 20px;padding-bottom: 50px;}
    .neirong>tr:nth-child(odd){background-color: #F4F6F7;}
    .ranktitle{border-bottom: 1px solid #EFEFEF;padding-top: 10px;padding-bottom: 20px;}
    .ranktitle>div{padding-left: 0px;padding-right: 0px;}
    .radius50{border-radius: 50%;margin-right: 5px;}
    .table tr{height: 24px;}
    .table>tbody>tr>td{line-height: 30px;text-align: center;}
    .table>tbody>tr>td:nth-child(2){padding-left:10%;text-align: left;}
    .table>thead>tr>th{text-align: center;}
        .navback{display: none;}
    .yg_back{margin-left: 170px;}
     .store_list_img{width: 40px;height: 40px;}
</style>
<ul class="nav nav-tabs">
    <span class="ygxian"></span>
    <div class="ygdangq">当前位置:</div>    
    <li <?php  if($type=='wm') { ?> class="active" <?php  } ?>><a href="<?php  echo $this->createWebUrl2('dlgoodrank',array('type'=>wm));?>">外卖菜品排行</a></li>
    <li <?php  if($type=='dn') { ?> class="active" <?php  } ?>><a href="<?php  echo $this->createWebUrl2('dlgoodrank',array('type'=>dn));?>">店内菜品排行</a></li>
</ul>
<div class="main">
    <!-- <div class="panel panel-default">
        <div class="panel-body">
            <a class="btn btn-primary" href="javascript:location.reload()"><i class="fa fa-refresh"></i>刷新</a>
        </div>
    </div> -->
    <div class="panel panel-default">
        <div class="panel-heading">
            菜品排行
        </div>
        <div class="panel-body" style="padding: 0px 15px;">

            <div class="row">
           
     
                <div class="col-md-12">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="col-md-1">排行</th>
                                <th class="col-md-1">菜品图片</th>
                                <th class="col-md-2">菜品名称</th>
                                <th class="col-md-1">销量</th>
                            </tr>
                        </thead>
                        <tbody>

                        <?php  if(is_array($data)) { foreach($data as $key => $row) { ?>
                        <?php  $num=$key+1?>
                            <tr class="rank">
                                <td>
                                    <labe class='label storered' style='padding:8px; <?php  if($num==1 || $num==2 || $num==3) { ?><?php  } else { ?>background-color: #ccc<?php  } ?>' >&nbsp;<?php  echo $num;?>&nbsp;</labe>
                                </td>
                                <td>
                                <img class="store_list_img" src="<?php  echo $row['img'];?>"/>
                                </td>
                                 <td><?php  echo $row['name'];?></td>
                                  <td><?php  echo $row['goodnum'];?></td>

                            </tr>
                            <?php  } } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
</div>
<div class="text-right we7-margin-top">
     <?php  echo $pager;?>
</div>
<script type="text/javascript">
    $(function(){
        // $("#frame-5").addClass("in");
        $("#frame-4").show();
        $("#yframe-4").addClass("wyactive");
    })
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
