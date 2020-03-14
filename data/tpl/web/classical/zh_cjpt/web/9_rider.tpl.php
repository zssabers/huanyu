<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/header', TEMPLATE_INCLUDEPATH)) : (include template('public/header', TEMPLATE_INCLUDEPATH));?>

<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/comhead', TEMPLATE_INCLUDEPATH)) : (include template('public/comhead', TEMPLATE_INCLUDEPATH));?>
<link rel="stylesheet" type="text/css" href="../addons/zh_cjpt/template/public/ygcsslist.css">
<style>
  .yg5_tr1>td{
    border: 1px solid #e5e5e5;   
    text-align: center; 
    padding: 10px 0;

  }
  .yg5_tr2>td {
    border: 1px solid #e5e5e5;
    padding: 10px 0;
    text-align: center;
  }
  .qs_box{
    height: 35px;
    line-height: 35px;
    font-size: 14px;
    margin-bottom: 15px;
  }
  .qs_box label{
    text-align: center;
    font-weight: normal;
  }
  .con{
    padding:0 10px;
    border-radius: 5px;
    border:1px solid #ccc;
  }
  .qs_state{
    border:1px solid #ccc;
    border-radius: 5px;
  }
  .qs_money{
    text-align: center;
  }
</style>

<ul class="nav nav-tabs">
  <span class="ygxian"></span>
  <div class="ygdangq">当前位置:</div>

  <li   <?php  if($type=='wait') { ?> class="active" <?php  } ?>><a href="<?php  echo $this->createWebUrl('rider',array('type'=>wait,'state'=>1));?>">待审核</a></li>
  <li   <?php  if($type=='now') { ?> class="active" <?php  } ?>><a href="<?php  echo $this->createWebUrl('rider',array('type'=>now,'state'=>2));?>">审核通过</a></li>
  <li   <?php  if($type=='delivery') { ?> class="active" <?php  } ?>><a href="<?php  echo $this->createWebUrl('rider',array('type'=>delivery,'state'=>3));?>">审核拒绝</a></li>
  <li  <?php  if($type=='all') { ?> class="active" <?php  } ?>><a href="<?php  echo $this->createWebUrl('rider',array('type'=>all));?>">全部</a></li>
  <input class="btn  btn-sm tabel_btn" style="background:#20a0ff;color:#fff" type="button" name="all" id="all_shenhe" value='全选'>
  <input class="btn  btn-sm tabel_btn" style="background:#20a0ff;color:#fff" type="button" name="cancel" id="cancel" value='批量通过'>
</ul>



<div class="row ygrow" style="margin-top: 20px;">

  <div class="col-lg-12">

    <form action="" method="get" class="col-md-6">
      <input type="hidden" name="c" value="site" />
      <input type="hidden" name="a" value="entry" />
      <input type="hidden" name="m" value="zh_cjpt" />
      <input type="hidden" name="do" value="rider" />

      <div class="input-group" style="width: 300px">

        <input type="text" name="keywords" class="form-control"  value="<?php  echo $_GPC['keywords'];?>" placeholder="请输入骑手名称或手机号">

        <span class="input-group-btn">

          <input type="submit" class="btn btn-default" name="submit" value="查找"/>

        </span>

      </div>

      <input type="hidden" name="token" value="<?php  echo $_W['token'];?>"/>

    </form>
  </div><!-- /.col-lg-6 -->

</div>  

<div class="main">
  <div class="panel panel-default">
    <div class="panel-heading">
      入驻审核管理
    </div>
    <div class="panel-body" style="padding: 0 15px;">
      <div class="row">
        <table class="yg5_tabel col-md-12">
          <tr class="yg5_tr1">
            <td class="store_td1 col-md-1">骑手名称</td>
            <td class="col-md-1">图像</td>
            <td class="col-md-1">账号</td>
            <td class="col-md-1">申请时间</td>         
            <td class="col-md-1">审核时间</td>
            <td class="col-md-1">状态</td>
            <td class="col-md-2">操作</td>
          </tr>
          <?php  if(is_array($list)) { foreach($list as $key => $item) { ?>
          <tr class="yg5_tr2">
            <td class="store_td1" style="position: relative;">
              <?php  if($item['state']==1) { ?>
              <input type="checkbox" name="check" style="position: absolute;left: 40px" value="<?php  echo $item['id'];?>">
              <?php  } ?>
              <?php  echo $item['name'];?>
            </td>
            <td><div class="type-parent"><img height="40" src="<?php  echo tomedia($item['logo']);?>">&nbsp;&nbsp;</div></td>
            <td><?php  echo $item['tel'];?></td>
            <td><?php  echo date('Y-m-d H:i:s',$item['time'])?></td> 
            <?php  if($item['sh_time']) { ?>
            <td><?php  echo date('Y-m-d H:i:s',$item['sh_time'])?></td> 
            <?php  } else { ?>
            <td>账号审核中</td>
            <?php  } ?>
            <?php  if($item['state']==1) { ?>
            <td >
              <span class="label storered">待审核</span>
            </td >
            <?php  } else if($item['state']==2) { ?>
            <td >
              <span class="label storeblue">已通过</span>
            </td>
            <?php  } else if($item['state']==3) { ?>
            <td >
             <span class="label storegrey">已拒绝</span>
           </td>
           <?php  } else if($item['state']==4) { ?>
           <td >
             <span class="label storegrey">已到期</span>
           </td>
           <?php  } ?>  
           <td>

             <!--          <?php  if($item['state']==1) { ?>
                      <a class="btn ygyouhui2 btn-xs" href="<?php  echo $this->createWebUrl('rider',array('id'=>$item['id'],'op'=>'adopt'))?>" >通过</a>
                      <a class="btn storegrey2 btn-xs" href="<?php  echo $this->createWebUrl('rider', array('id' => $item['id'],'op'=>'reject'))?>" title="拒绝">拒绝</a>
                      <?php  } ?> -->
                      <!-- <a class="btn btn-danger btn-xs" href="<?php  echo $this->createWebUrl('attestation', array('id' => $item['id'],'op'=>'delete'))?>" onclick="return confirm('确认删除吗？');return false;" title="删除">删</a> -->
                      <?php  if($item['state']==2) { ?>
                      <a href="javascript:;" class="storespan btn btn-xs" data-toggle="modal" data-target="#myModal<?php  echo $item['id'];?>">
                        <span class="fa fa-pencil-square-o" style="margin-right: 0"></span>
                        <span class="bianji">修改
                          <span class="arrowdown"></span>
                        </span>                            
                      </a>
                      <?php  } else { ?>
                      <a href="<?php  echo $this->createWebUrl('riderinfo',array('id'=>$item['id']));?>" class="storespan btn btn-xs">
                        <span class="fa fa-pencil"></span>
                        <span class="bianji">编辑
                          <span class="arrowdown"></span>
                        </span>                            
                      </a>
                      <?php  } ?>
                      <a class="storespan btn btn-xs" href="<?php  echo $this->createWebUrl('rider', array('id' => $item['id'],'op'=>'delete'))?>" onclick="return confirm('确认删除吗？');return false;">
                        <span class="fa fa-trash-o"></span>
                        <span class="bianji">删除
                          <span class="arrowdown"></span>
                        </span>
                      </a>
                    </td>

                  </td>
                </tr>

                <!-- 修改信息弹框（Modal） -->
                <div class="modal fade" id="myModal<?php  echo $item['id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                          &times;
                        </button>
                        <h4 class="modal-title" id="myModalLabel">
                          编辑信息
                        </h4>
                      </div>
                      <form action="" method="post" class="form-horizontal form" enctype="multipart/form-data">
                        <div class="modal-body">
                          <div class="qs_box col-md-12">
                            <label for="" class="col-md-3">姓名 :</label>
                            <input type="text" value="<?php  echo $item['name'];?>" name="name" class="col-md-6 con">
                          </div>
                          <div class="qs_box col-md-12">
                            <label for="" class="col-md-3">配送员账号 :</label>
                            <input type="text" value="<?php  echo $item['tel'];?>" name="tel" class="col-md-6 con">
                          </div>
                          <div class="qs_box col-md-12">
                            <label for=""  class="col-md-3">配送员密码 :</label>
                            <input type="password" value="<?php  echo $item['pwd'];?>" name="pwd" class="col-md-6 con">
                          </div>
                          <div class="qs_box col-md-12">
                            <label for=""  class="col-md-3">邮箱 :</label>
                            <input type="text" value="<?php  echo $item['email'];?>" name="email" class="col-md-6 con">
                          </div>
                          <div class="qs_box col-md-12">
                            <label for="" class="col-md-3">工作状态 :</label>
                            <select name="status" id="" class="col-md-2 qs_state">
                              <option value="1" <?php  if($item['status']=='1') { ?> selected <?php  } ?>>在岗</option>
                              <option value="2" <?php  if($item['status']=='2') { ?> selected <?php  } ?>>休息</option>
                            </select>
                          </div>
                          <div class="qs_box col-md-12">
                            <div class="col-md-4 qs_money">
                              <label for="" class="">可提现资金 :</label>
                              <span><?php  echo $item['yx'];?>元</span>
                            </div>
                            <div class="col-md-4 qs_money">
                              <label for="" class="">冻结资金 :</label>
                              <span><?php  echo $item['dj'];?>元</span>
                            </div>
                          </div>              
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">取消
                          </button>
                          <input type="submit" class="btn btn-primary" value="确定" name="submit">
<!--           <button type="button" class="btn btn-primary">
            确定
          </button> -->
        </div>
        <input type="hidden" name="id" value="<?php  echo $item['id'];?>"/>
        <input type="hidden" name="token" value="<?php  echo $_W['token'];?>"/>
      </form>
    </div>
  </div>
</div>



<?php  } } ?>
<?php  if(empty($list)) { ?>
<tr class="yg5_tr2">
  <td colspan="9">
    暂无入驻信息
  </td>
</tr> 
<?php  } ?>        



</table>

</div>

</div>

</div>

</div>

<div class="text-right we7-margin-top">

 <?php  echo $pager;?>

</div>
<script type="text/javascript">
  $(function(){
    $("#frame-4").show();
    $("#yframe-4").addClass("wyactive");
         // 全部选中
         $("input[name='all']").click(function(){
           if($("input[name='all']").val()=='全选'){
            $("input[name='all']").val("全不选")
            $("input[name='check']").prop("checked",true);
            var checkInput = $('input[type=checkbox]:checked')
            console.log(checkInput)
          }else{
            $("input[name='all']").val("全选")
            $("input[name='check']").prop("checked",false);
          }

        })
       	// 删除选中的桌台
       	$("input[name='cancel']").click(function(){
		// 获取选中的input的value值  即每个桌台的id
    var inputValue = document.getElementById("all_shenhe").value;
    var checkInput = $('input[type=checkbox]:checked')
    var check = []
    for(let i in checkInput){
      if(checkInput[i].defaultValue!=null){
       check.push(checkInput[i].defaultValue)
     }
   }	
   console.log(check)
   if(check.length==0){
    alert('请选择可以审核的骑手')
  }else{
        		// 请求接口删除数据
            $.ajax({
              type:"post",
              url:"<?php  echo $_W['siteroot'];?>/app/index.php?i=<?php  echo $_W['uniacid'];?>&c=entry&do=ShRider&m=zh_cjpt",
              dataType:"text",
              data:{id:check},
              success:function(data){
                console.log(data);      
                location.reload();
              }
            })    
          }

        })

       })
     </script><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>