<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/header', TEMPLATE_INCLUDEPATH)) : (include template('public/header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/comhead', TEMPLATE_INCLUDEPATH)) : (include template('public/comhead', TEMPLATE_INCLUDEPATH));?>
<link rel="stylesheet" type="text/css" href="../addons/zh_cjdianc/template/public/ygcsslist.css">
<style type="text/css">
    .yg5_key>div{float: left;line-height: 34px;}
    .store_td1{height: 45px;}
    .store_list_img{width: 40px;height: 40px;}
    .yg5_tabel{border-color: #e5e5e5;outline: 1px solid #e5e5e5;font-size: 12px;}
    .yg5_tr2>td{padding: 10px 15px;border: 1px solid #e5e5e5;text-align: center;}
    .yg5_tr1>th{
        border: 1px solid #e5e5e5;
        padding-left: 15px;
        background-color: #FAFAFA;
        font-weight: bold;
        text-align: center;
    }
    .yg5_btn{background-color: #EEEEEE;color: #333;border: 1px solid #E4E4E4;border-radius: 6px;width: 100px;height: 34px;}
    .store_inp{margin-left: 5px;}
    .ygshanchu{color: white;background-color: #44ABF7;}
    .accout_inp{width: 100%;height: 35px;border: 1px solid #cccccc;font-size: 14px;color: #333;}
    .navback{display: none;}
    .yg_back{margin-left: 170px;}
    .scour{
      position: relative;
      width: 100%;
      display: block;
    }
    .scour:hover .scour_tip{
      display: block;
    }
    .scour_tip{
      display: none;
      position: absolute;
      left: 50%;
      bottom: 27px;
      background-color: #333;
      color: white;
      padding: 2px 7px;
      border-radius: 2px;
      font-size: 10px;
      margin-left: -20px
    }
    .scour_tip:after{
      content: "";
      display:block;
      width: 0;
      height: 0;
      border-bottom: 10px solid #333;
      border-left: 10px solid transparent;
      transform: rotate(45deg);
      position: absolute;
      left: 40%;
      top: 78%;
    }
</style>
<ul class="nav nav-tabs">
    <span class="ygxian"></span>
    <div class="ygdangq">当前位置:</div>    
    <li class="active"><a href="javascript:void(0);">会员列表</a></li>
</ul>
<div class="main">
    <div class="panel panel-default">
        <div class="panel-body">

        <form action="" method="get" class="col-md-4">
              <input type="hidden" name="c" value="site" />
                   <input type="hidden" name="a" value="entry" />
                   <input type="hidden" name="m" value="zh_cjdianc" />
                   <input type="hidden" name="do" value="dlinuser" />
            <div class="input-group" style="width: 300px">
                <input type="text" name="keywords" class="form-control" placeholder="请输入昵称">
                <span class="input-group-btn">
                    <input type="submit" class="btn btn-default" name="submit" value="查找"/>
                </span>
            </div>
			</br>
			<button class="btn btn-default ygshanchu"><a href="<?php  echo $this->createWebUrl2('dlinuser');?>">全部用户</a></button>
			<button class="btn btn-default ygshanchu"><a href="<?php  echo $this->createWebUrl2('dlinuser',array('type'=>wait,'juese'=>1));?>">我的异业联盟成员</a></button>
			<a href="javascript:void(0);" data-toggle="modal" data-target="#myModalcc"><span class="btn btn-xs ygyouhui2">赠送优惠券</span> </a>
            <input type="hidden" name="token" value="<?php  echo $_W['token'];?>"/>
        </form>
       
    
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            会员列表
			<input type="hidden" value="<?php  echo $storeid;?>" class="storeid">
        </div>
        <div class="panel-body" style="padding: 0px 15px;">
            <div class="row">
                <table class="yg5_tabel col-md-12" id="test_table">
                    <tr class="yg5_tr1">
						<th class="store_td1 col-md-1">
                            <input type="checkbox" class="allcheck" />
                            <span class="store_inp">全选</span>
                        </th>
						
                        <th class="store_td1 col-md-1" >id</th>
                        <th class="col-md-1">会员昵称</th>
                        <th class="store_td1 col-md-1">会员头像</th>
						<th class="col-md-2">会员手机号码</th>
						<?php  if(!$juese) { ?>
                        <th class="col-md-2">最后下单时间</th>
						<?php  } ?>
                        <th class="col-md-1"><?php  if($juese==1) { ?>推广<?php  } ?>订单量</th>
                    </tr>
                      <?php  if(is_array($list)) { foreach($list as $row) { ?>
                    <tr class="yg5_tr2">
     
						<td>
                        <input type="checkbox" name="test" value="<?php  echo $row['id'];?>">
						</td>
                        <td ><?php  echo $row['id'];?>
						<?php  if($juese==1) { ?>
						</br>
						<a href="javascript:void(0);" data-toggle="modal" class="yycode" style="position: relative;">
						 <input type="hidden" value="<?php  echo $row['id'];?>">
						 <span class="btn btn-xs ygyouhui2">异业码</span>
						 <img class="img" src="" style="width:106px;height:106px;display:none">
						</a>
						<?php  } ?>
						</td>
                        
                        <td><?php  echo $row['name'];?>
						</br>
					   <?php  if($juese==1) { ?>
						 <span class="label label-info">异业用户</span>              
					   <?php  } ?>
						</td>
                        <td><img class="store_list_img" src="<?php  echo $row['img'];?>"/></td>
                        <td>
						<?php  if($row['tel']) { ?><?php  echo $row['tel'];?><?php  } else if($row['user_tel']) { ?><?php  echo $row['user_tel'];?><?php  } else { ?>无<?php  } ?>
						
						</td>
						<?php  if(!$juese) { ?>
                        <td><?php  echo $row['ordertime'];?></td> 
						<?php  } ?>
                         <td>
						 <?php  if(!$juese) { ?>
                        <a href="<?php  echo $this->createWebUrl2('dlinuserorder', array('user_id' => $row['id']))?>" class="scour"><?php  echo $row['ordernum'];?>
						
                              <span class="scour_tip">查看明细
                                  <span class="arrowdown"></span>
                              </span>
					    
                        </a>
						<?php  } else { ?>
						<a class="scour"><?php  echo $row['ordernum'];?>					    
                        </a>
						<?php  } ?>
						</td> 
                    </tr>
					<div class="modal fade" id="myModalcc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                      <div class="modal-dialog" role="document" style="min-width: 300px!important;width: 250px;">
                          <form action="" method="post" enctype="multipart/form-data">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                      <h4 class="modal-title" id="myModalLabel" style="font-size: 20px;">选择优惠券</h4>
                                  </div>
                                  <div class="modal-body" style="font-size:20px">
                                      <div class="modal-body" style="font-size:20px;padding:15px;padding-bottom:5px">
                                      <select class="form-control coupon" name="coupon">  
									  <?php  if($juese==1) { ?>
									  <?php  if(is_array($coupons)) { foreach($coupons as $rows) { ?>
										<option value="<?php  echo $rows['id'];?>" selected="selected"><?php  echo $rows['name'];?></option> 
									  <?php  } } ?>
									  <?php  } else { ?>
									  <?php  if(is_array($coupon)) { foreach($coupon as $rows) { ?>
										<option value="<?php  echo $rows['id'];?>" selected="selected"><?php  echo $rows['name'];?></option> 
									  <?php  } } ?>
									  <?php  } ?>
									 </select>
									</div>
									<div class="modal-body" style="font-size:15px;padding:15px;padding-top:5px">
									<span style="float: left;padding: 3.5px 1px;font-size: 13px;border: 1px solid #c6c6c6;border-right: 0;">数量</span>
									 <input type="number" value="1" class="couponnum">
									</div>
                                  </div>
                                  <div class="modal-footer">
                                      <button type="button" class="btn btn-default" data-dismiss="modal">取消赠送</button>
                                      <input type="submit" name="zengsong" class="btn btn-info" id="allshang" value="确定赠送">
                                  </div>
                              </div>
                          </form>
                      </div>
                  </div>
                  

                    <?php  } } ?>
                      <?php  if(empty($list)) { ?>
                    <tr class="yg5_tr2">
                        <td colspan="9">
                          暂无会员信息
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


<!-- <?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?> -->
<script type="text/javascript">
    $(function(){
        // $("#frame-12").addClass("in");
        // $("#frame-12").show();
        $("#yframe-5").addClass("wyactive");
		$(".allcheck").on('click',function(){
            var checked = $(this).get(0).checked;
            $("input[type=checkbox]").prop("checked",checked);
        });
		
		$(".yycode").on('click',function(){
		var userid = $(this).children("input:first-child").val();
		var storeid = $('.storeid').val();
		var _this = $(this);
		$(this).find('img').toggle();
		$.ajax({
                    type:"post",
                    url:"<?php  echo $_W['siteroot'];?>/app/index.php?i=<?php  echo $_W['uniacid'];?>&c=entry&do=YyCoade&m=zh_cjdianc",
                    dataType:"text",
                    data:{userid:userid,storeid:storeid},
                    success:function(data){ 
                     //var htmls = '<img src="data:image/png;base64,'+data+'"  width="130" height="130" />';
					 _this.find('img').attr("src","data:image/png;base64"+data);
                    }
                })
		})
		
		$("#allshang").on('click',function(){
            var check = $("input[name='test']:checked");
			var coupon = $('.coupon').val();
			var couponnum = $('.couponnum').val();
			var id = "";
			
			$("input[name='test']:checked").each(function (index, item) {
        
				if ($("input[name='test']:checked").length-1==index) {
					id += $(this).val();
				} else {
					id += $(this).val() + ",";
				}  
			});
            if(check.length < 1){
                alert('请选择需要赠送的用户!');
                return false;
            }else if(couponnum<=0){
			    alert('优惠券数量不得小于0!');
                return false;
			}else if(confirm("确认赠送优惠券?")){
                var datas = {
				 id:id,
				 coupon:coupon,
				 couponnum:couponnum
				};
                
                $.ajax({
                    type:"post",
                    url:"<?php  echo $_W['siteroot'];?>/app/index.php?i=<?php  echo $_W['uniacid'];?>&c=entry&do=Zsq&m=zh_cjdianc",
                    dataType:"text",
                    data:datas,
                    success:function(data){
                        if(data==1){
						alert('赠送成功!');
						location.reload();
						}else{
						alert('赠送失败!');
						location.reload();
						}  
                        
                    }
                })
               
            }
        });
        
    })
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
