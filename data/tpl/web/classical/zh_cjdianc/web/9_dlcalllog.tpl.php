<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/header', TEMPLATE_INCLUDEPATH)) : (include template('public/header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/comhead', TEMPLATE_INCLUDEPATH)) : (include template('public/comhead', TEMPLATE_INCLUDEPATH));?>
<link rel="stylesheet" type="text/css" href="../addons/zh_cjdianc/template/public/ygcsslist.css">
<style type="text/css">
    .yg5_key>div{float: left;line-height: 34px;}
    .store_td1{height: 45px;}
    .store_list_img{width: 60px;height: 60px;}
    .yg5_tabel{border-color: #e5e5e5;outline: 1px solid #e5e5e5;}
    .yg5_tr2>td{padding: 10px 15px;border: 1px solid #e5e5e5;text-align: center;}
    .yg5_tr1>th{
        border: 1px solid #e5e5e5;
        padding-left: 15px;
        background-color: #FAFAFA;
        font-weight: bold;
        text-align: center;
    }
    .yg5_btn{background-color: #EEEEEE;color: #333;border: 1px solid #E4E4E4;border-radius: 6px;width: 100px;height: 34px;}
    .storered{padding: 6px 20px;border-radius: 5px;float: right;margin-right: 478px}
</style>
<ul class="nav nav-tabs">
    <span class="ygxian"></span>
    <div class="ygdangq">当前位置:</div>    
    <li class="active"><a href="">呼叫记录</a></li>
    <button class="btn ygshouqian2 dish_left" id="allselect">批量删除</button>
    <a href="<?php  echo $this->createWebUrl2('dlcalllog',array('op'=>'ok'));?>" class="storered">确认呼叫</a>
</ul>
<div class="main">
    <div class="panel panel-default">
        <div class="panel-heading">
            呼叫记录
        </div>                
        <div class="panel-body" style="padding: 0px 15px;">
            <div class="row">
                <table class="yg5_tabel col-md-12">
                    <tr class="yg5_tr1">
                        <th>
                            <input type="checkbox" class="allcheck" />
                            <span class="store_inp">全选</span>
                        </th>
                        <th class="col-md-2 store_td1">餐桌类型</th>
                        <th class="col-md-2">餐桌名称</th>                       
                        <th class="col-md-1">餐桌标签</th>
                         <th class="col-md-2">呼叫时间</th>
                         <th class="col-md-2">状态</th>
                        <th class="col-md-2">操作</th>
                    </tr>
                    <?php  if(is_array($list)) { foreach($list as $row) { ?>
                    <tr class="yg5_tr2">
                        <td>
                            <input type="checkbox" name="test" value="<?php  echo $row['id'];?>">
                        </td>                    
                        <td><div class="type-parent"><?php  echo $row['type_name'];?>&nbsp;&nbsp;</div></td>
                        <td><?php  echo $row['name'];?></td>
                        <td><?php  echo $row['tag'];?></td>
                        <td><?php  echo date('Y-m-d H:i:s',$row['time'])?></td>
                        <?php  if($row['state']==1) { ?>
                        <td >
                           <span class="label label-danger">待服务</span>
                       </td>
                       <?php  } else if($row['state']==2) { ?>
                       <td >
                           <span class="label label-success">已服务</span>
                       </td>
                       <?php  } ?>
                        <td>
                         <?php  if($row['state']==1) { ?>
                              <a class="btn btn-info"  style="vertical-align: baseline" href="<?php  echo $this->createWebUrl2('dlcalllog',array('id'=>$row['id'],'op'=>'fw'));?>"> 确认服务</a>
                         <?php  } ?>
                            <a href="javascript:void(0);" class="storespan btn btn-xs" data-toggle="modal" data-target="#myModal<?php  echo $row['id'];?>">
                                <span class="fa fa-trash-o"></span>
                                <span class="bianji">删除
                                    <span class="arrowdown"></span>
                                </span>
                            </a>
                            <!-- <a class="btn btn-warning btn-sm" href="<?php  echo $this->createWebUrl2('dladdprint', array('id' => $row['id']))?>" title="编辑">改</a>&nbsp;&nbsp;<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal<?php  echo $row['id'];?>">删</button> -->
                        </td>
                    </tr>
                     <div class="modal fade" id="myModal<?php  echo $row['id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel" style="font-size: 20px;">提示</h4>
                                </div>
                                <div class="modal-body" style="font-size: 20px">
                                    确定删除么？
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                                        <a href="<?php  echo $this->createWebUrl2('dlcalllog', array('op' => 'delete', 'id' => $row['id']))?>" type="button" class="btn btn-info" >确定</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php  } } ?>
                   
                   <?php  if(empty($list)) { ?>
                    <tr class="yg5_tr2">
                        <td colspan="11">
                          暂无打印机信息
                        </td>
                    </tr>
                    <?php  } ?> 
                </table>
            </div>
        </form>
    </div>
   
</div>
<div class="text-right we7-margin-top">
<?php  echo $pager;?>
</div>
<script type="text/javascript">
    $(function(){
        // $("#frame-8").addClass("in");
        $("#frame-10").show();
        $("#yframe-10").addClass("wyactive");


        $(".allcheck").on('click',function(){
            var checked = $(this).get(0).checked;
            $("input[type=checkbox]").prop("checked",checked);
        });

        $("#allselect").on('click',function(){
            var check = $("input[type=checkbox][class!=allcheck]:checked");
            if(check.length < 1){
                alert('请选择要删除的呼叫记录!');
                return false;
            }else if(confirm("确认要删除此呼叫记录?")){
                var id = new Array();
                check.each(function(i){
                    id[i] = $(this).val();
                });
               // console.log(id)
                $.ajax({
                    type:"post",
                    url:"<?php  echo $_W['siteroot'];?>/app/index.php?i=<?php  echo $_W['uniacid'];?>&c=entry&do=delcall&m=zh_cjdianc",
                    dataType:"text",
                    data:{id:id},
                    success:function(data){
                        console.log(data);      
                        location.reload();
                    }
                })
               
            }
        });
    })
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
    <script type="text/javascript">

$(function(){
    setInterval(function(){
               $.ajax({ 
                type: "post",
                dataType: "json",
                url: "<?php  echo $_W['siteroot'];?>/app/index.php?i=<?php  echo $_W['uniacid'];?>&c=entry&do=newcall&m=zh_cjdianc&type=1&store_id=<?php  echo $_COOKIE['storeid'];?>",
                success: function (data) {
                    console.log(data);
                    var src=data
                   // if(data=='1'){
                        $("#myaudio").attr('src',src);
                     var myAuto = document.getElementById('myaudio');
                     myAuto.play(); 

                    
                    //}
                },
                error:function (data) {
                    console.log(data)
                }

            })
          },10000);
})
    
</script>
<audio id="myaudio" src=" " controls="controls"  hidden="true" ></audio>