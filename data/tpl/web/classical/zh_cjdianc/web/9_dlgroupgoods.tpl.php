<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/header', TEMPLATE_INCLUDEPATH)) : (include template('public/header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/comhead', TEMPLATE_INCLUDEPATH)) : (include template('public/comhead', TEMPLATE_INCLUDEPATH));?>
<link rel="stylesheet" type="text/css" href="../addons/zh_cjdianc/template/public/ygcsslist.css">
<style type="text/css">
    .ygrow{margin-top: 20px;font-size: 12px;}
    .ygmartop{margin-top: 30px;font-size: 12px;}
    .ygmartop2{margin-bottom: 10px;}
    .yg5_key>div{float: left;line-height: 34px;}
    .store_td1{height: 45px;}
    .store_list_img{width: 60px;height: 60px;}
    .yg5_tabel{border-color: #e5e5e5;outline: 1px solid #e5e5e5;}
    .yg5_tr2>td{padding: 15px;border: 1px solid #e5e5e5;text-align: center;background-color: white;}
    .yg5_tr1>td{
        border: 1px solid #e5e5e5;
        padding-left: 15px;
        background-color: #FAFAFA;
        font-weight: bold;
        text-align: center;
    }
    .yg5_btn{background-color: #EEEEEE;color: #333;border: 1px solid #E4E4E4;border-radius: 6px;width: 100px;height: 34px;}
    .yg5_btn2{background-color: white;color: #333;border: 1px solid white;border-radius: 6px;width: 100px;height: 34px;}
    .yg13_img{width: 50px;height: 50px;border-radius: 4px;}
    .yg_name{width: 30%;height: 34px;line-height: 34px;color: #333;float: left;background-color: white;border: 1px solid #E4E4E4;text-align: center;}
    .yg_left{float: left;}
    .form-control{width: 70%;}
    .ygseledi{width: 60%;}
    .dishes{display: flex;align-items: center;}
    .dishes_font{font-size: 20px;}
    .dishes_inp{width: 195px;height: 23px;border: none;}
    .dishes_inp2{margin-right: 20px;}
    .input_box{border: 2px solid #5bc0de;border-radius: 4px;padding: 5px;margin-right: 10px;background-color: #5bc0de;color: white;}
    .store_inp{margin-left: 5px;}
    .dish_left{margin-right: 20px;}
    .dish_btn>button,.dish_btn>a{margin-bottom: 10px;}
    .ygboxl{margin-bottom: 15px;}
    /*.ygboxl>.input-group{border:1px solid green;}*/
</style>
<ul class="nav nav-tabs">
    <span class="ygxian"></span>
    <div class="ygdangq">当前位置:</div>    
    <li class="active"><a href="<?php  echo $this->createWebUrl2('dlgroupgoods')?>">商品管理</a></li>
    <li><a href="<?php  echo $this->createWebUrl2('dladdgroupgoods')?>">添加商品</a></li>
</ul> 
   	<div class="row ygmartop">
        <form action="" method="get" class="col-md-12" style="padding: 0px;">
            <div class="col-md-12 ygboxl">
               <input type="hidden" name="c" value="site" />
               <input type="hidden" name="a" value="entry" />
               <input type="hidden" name="m" value="zh_cjdianc" />
               <input type="hidden" name="do" value="dlgroupgoods" />
                <div class="col-md-2" style="padding: 0px;">
                    <div class="yg_name">商品名称</div>
                    <input type="text" name="keywords" class="yg_left form-control" placeholder="请输入商品名称"> 
                </div>
              
                <div class="col-md-3">
                    <div class="yg_name">
                        商品状态
                    </div>
                    <select class="ygseledi" style="color: #333;" name="is_shelves2">
                      <option value="">不限</option>
                      <option value="1">已上架</option>
                      <option value="2">已下架</option>
                    </select>                
                </div>
                <div class="col-md-3">
                    <div class="yg_name">
                        商品分类
                    </div>
                    <select class="ygseledi" style="color: #333;" name="type_id">
                    <option value="">不限</option>
                    <?php  if(is_array($type)) { foreach($type as $item2) { ?>
                      <option value="<?php  echo $item2['id'];?>"><?php  echo $item2['name'];?></option>
                      <?php  } } ?>
                    </select>                
                </div>
                <div class="col-md-1">
                    <input type="submit" value="搜索" name="submit" class="btn btn-primary btn-sm"/>
                    <input type="hidden" name="token" value="<?php  echo $_W['token'];?>"/>
                </div>
            </div>
        </form>
  </div>
<div class="dishes">
	<button class="btn ygyouhui2  dish_left" id="allshang">批量上架</button>
	<button class="btn storegrey2  dish_left" id="alldown">批量下架</button>
  	<button class="btn ygshouqian2 dish_left" id="allselect">批量删除</button>
</div>
<div class="main">
    <div class="panel panel-default">
        <div class="panel-heading">
            商品列表
        </div>
        <div class="panel-body" style="padding: 0px 15px;">
            <div class="row">
                <table class="yg5_tabel col-md-12">
                    <tr class="yg5_tr1">
                    	<td class="store_td1 col-md-1">
                            <input type="checkbox" class="allcheck" />
                            <span class="store_inp">全选</span>
                        </td>
                        <td class="">序号</td>
                   		<td class="">商品图片</td>
                        <td class="">商品名称</td>
                        <td class="col-md-1">分类</td>
                        <td class="col-md-1">拼团价格</td>
                        <td class="col-md-1">单独够价格</td>
                        <td class="col-md-1">开团人数</td>
                        <td class="col-md-1">库存</td>
                        <td class="col-md-1">总销量</td>
                        <td class="col-md-1">是否上架</td>
                        <td class="col-md-2">操作</td>
                    </tr>
                     <?php  if(is_array($list)) { foreach($list as $key => $item) { ?>
                    <tr class="yg5_tr2">
                    	<td>
                            <input type="checkbox" name="test" value="<?php  echo $item['id'];?>">
                        </td>

                        <td class="store_td1 col-md-1"> <?php  echo $item['id'];?></td>
                         <td class="store_td1 col-md-1"> <img class="store_list_img" src="<?php  echo $item['logo'];?>" alt=""/></td>
                        <td class="col-md-1 cainame<?php  echo $item['id'];?>">
                            <span class="caispan<?php  echo $item['id'];?>"><?php  echo $item['name'];?></span>
                            <input style="display: none;width: 100%;" name="inp<?php  echo $item['id'];?>" type="text" value="<?php  echo $item['name'];?>" class="caininp<?php  echo $item['id'];?>"/>
                            <script type="text/javascript">
							    $(function(){
							    	$(".cainame<?php  echo $item['id'];?>").each(function(index){
							             $(this).dblclick(function(){
							                $(".caininp<?php  echo $item['id'];?>").eq(index).show().focus();
							                $(".caispan<?php  echo $item['id'];?>").eq(index).hide();							                
							            });
							        });
							        $(".caininp<?php  echo $item['id'];?>").each(function(index){
							            $(this).blur(function(){            
							                $(".caininp<?php  echo $item['id'];?>").eq(index).hide();
							                $(".caispan<?php  echo $item['id'];?>").eq(index).show();
							                var text = $(".caispan<?php  echo $item['id'];?>").html();
							                var inp = $(" input[ name='inp<?php  echo $item['id'];?>' ] ").val();
							                $(".caispan<?php  echo $item['id'];?>").html(inp);
							                // console.log(inp);
							                id = <?php  echo $item['id'];?>;
									        name = inp;
									    	$.ajax({
									    		type:"post",
									    		url:"<?php  echo $_W['siteroot'];?>/app/index.php?i=<?php  echo $_W['uniacid'];?>&c=entry&do=groupupdate&m=zh_cjdianc",
									    		dataType:"text",
										        data:{id:id,name:name},
										        success:function(data){
										        	console.log(data);
											    }
									    	})
							        
							            });
							        });
							    })
							</script>
                        </td>
                         <td class="col-md-1"> <?php  echo $item['type_name'];?></td>
                        <td class="col-md-1 money<?php  echo $item['id'];?>">
                        	<span class="moneyspan<?php  echo $item['id'];?>"><?php  echo $item['pt_price'];?></span>
                        	<input style="display: none;width: 100%;" type="text" name="money<?php  echo $item['id'];?>" class="moneyinp<?php  echo $item['id'];?>" value="<?php  echo $item['money'];?>" />
                        	<script type="text/javascript">
							    $(function(){
							    	$(".money<?php  echo $item['id'];?>").each(function(index){
							             $(this).dblclick(function(){
							                $(".moneyinp<?php  echo $item['id'];?>").eq(index).show().focus();
							                $(".moneyspan<?php  echo $item['id'];?>").eq(index).hide();							                
							            });
							        });
							        $(".moneyinp<?php  echo $item['id'];?>").each(function(index){
							            $(this).blur(function(){            
							                $(".moneyinp<?php  echo $item['id'];?>").eq(index).hide();
							                $(".moneyspan<?php  echo $item['id'];?>").eq(index).show();
							                var text = $(".moneyspan<?php  echo $item['id'];?>").html();
							                var inp = $(" input[ name='money<?php  echo $item['id'];?>' ] ").val();
							                $(".moneyspan<?php  echo $item['id'];?>").html(inp);
							                // console.log(inp);
							                id = <?php  echo $item['id'];?>;
									        money = inp;
									    	$.ajax({
									    		type:"post",
									    		url:"<?php  echo $_W['siteroot'];?>/app/index.php?i=<?php  echo $_W['uniacid'];?>&c=entry&do=groupupdate&m=zh_cjdianc",
									    		dataType:"text",
										        data:{id:id,money:money},
										        success:function(data){
										        	console.log(data);
											    }
									    	})
							        
							            });
							        });
							    })
							</script>
                        </td>
                        <td class="col-md-1 wm_money<?php  echo $item['id'];?>">
                        	<span class="wmspan<?php  echo $item['id'];?>"><?php  echo $item['dd_price'];?></span>
                        	<input style="display: none;width: 100%;" type="text" name="wmoney<?php  echo $item['id'];?>" class="wmoney<?php  echo $item['id'];?>" value="<?php  echo $item['wm_money'];?>">
                        
                    		<script type="text/javascript">
							    $(function(){
							    	$(".wm_money<?php  echo $item['id'];?>").each(function(index){
							             $(this).dblclick(function(){
							                $(".wmoney<?php  echo $item['id'];?>").eq(index).show().focus();
							                $(".wmspan<?php  echo $item['id'];?>").eq(index).hide();							                
							            });
							        });
							        $(".wmoney<?php  echo $item['id'];?>").each(function(index){
							            $(this).blur(function(){            
							                $(".wmoney<?php  echo $item['id'];?>").eq(index).hide();
							                $(".wmspan<?php  echo $item['id'];?>").eq(index).show();
							                var text = $(".wmspan<?php  echo $item['id'];?>").html();
							                var inp = $(" input[ name='wmoney<?php  echo $item['id'];?>' ] ").val();
							                $(".wmspan<?php  echo $item['id'];?>").html(inp);
							                // console.log(inp);
							                id = <?php  echo $item['id'];?>;
									        wm_money = inp;
									    	$.ajax({
									    		type:"post",
									    		url:"<?php  echo $_W['siteroot'];?>/app/index.php?i=<?php  echo $_W['uniacid'];?>&c=entry&do=groupupdate&m=zh_cjdianc",
									    		dataType:"text",
										        data:{id:id,wm_money:wm_money},
										        success:function(data){
										        	console.log(data);
											    }
									    	})
							        
							            });
							        });
							    })
							</script>
                        </td>
                        <td class="col-md-1 box_fee<?php  echo $item['id'];?>">
                        	<span class="boxspan<?php  echo $item['id'];?>"><?php  echo $item['people'];?></span>
                        	<input style="display: none;width: 100%;" type="text" name="boxinp<?php  echo $item['id'];?>" class="boxinp<?php  echo $item['id'];?>" value="<?php  echo $item['people'];?>">
                        
                    		<script type="text/javascript">
							    $(function(){
							    	$(".box_fee<?php  echo $item['id'];?>").each(function(index){
							             $(this).dblclick(function(){
							                $(".boxinp<?php  echo $item['id'];?>").eq(index).show().focus();
							                $(".boxspan<?php  echo $item['id'];?>").eq(index).hide();							                
							            });
							        });
							        $(".boxinp<?php  echo $item['id'];?>").each(function(index){
							            $(this).blur(function(){            
							                $(".boxinp<?php  echo $item['id'];?>").eq(index).hide();
							                $(".boxspan<?php  echo $item['id'];?>").eq(index).show();
							                var text = $(".boxspan<?php  echo $item['id'];?>").html();
							                var inp = $(" input[ name='boxinp<?php  echo $item['id'];?>' ] ").val();
							                $(".boxspan<?php  echo $item['id'];?>").html(inp);
							                // console.log(inp);
							                id = <?php  echo $item['id'];?>;
									        box_fee = inp;
									    	$.ajax({
									    		type:"post",
									    		url:"<?php  echo $_W['siteroot'];?>/app/index.php?i=<?php  echo $_W['uniacid'];?>&c=entry&do=groupupdate&m=zh_cjdianc",
									    		dataType:"text",
										        data:{id:id,box_fee:box_fee},
										        success:function(data){
										        	console.log(data);
											    }
									    	})
							        
							            });
							        });
							    })
							</script>
                        </td>
                        <td class="col-md-1 num<?php  echo $item['id'];?>"> 
                        	<span class="numspan<?php  echo $item['id'];?>"><?php  echo $item['inventory'];?></span>
                        	<input style="display: none;width: 100%;" type="text" name="numinp<?php  echo $item['id'];?>" class="numinp<?php  echo $item['id'];?>" value="<?php  echo $item['num'];?>">
                        
                    		<script type="text/javascript">
							    $(function(){
							    	$(".num<?php  echo $item['id'];?>").each(function(index){
							             $(this).dblclick(function(){
							                $(".numinp<?php  echo $item['id'];?>").eq(index).show().focus();
							                $(".numspan<?php  echo $item['id'];?>").eq(index).hide();							                
							            });
							        });
							        $(".numinp<?php  echo $item['id'];?>").each(function(index){
							            $(this).blur(function(){            
							                $(".numinp<?php  echo $item['id'];?>").eq(index).hide();
							                $(".numspan<?php  echo $item['id'];?>").eq(index).show();
							                var text = $(".numspan<?php  echo $item['id'];?>").html();
							                var inp = $(" input[ name='numinp<?php  echo $item['id'];?>' ] ").val();
							                $(".numspan<?php  echo $item['id'];?>").html(inp);
							                // console.log(inp);
							                id = <?php  echo $item['id'];?>;
									        num = inp;
									    	$.ajax({
									    		type:"post",
									    		url:"<?php  echo $_W['siteroot'];?>/app/index.php?i=<?php  echo $_W['uniacid'];?>&c=entry&do=groupupdate&m=zh_cjdianc",
									    		dataType:"text",
										        data:{id:id,num:num},
										        success:function(data){
										        	console.log(data);
											    }
									    	})
							        
							            });
							        });
							    })
							</script>
                        </td>
                        <td class="col-md-1 xs_num<?php  echo $item['id'];?>"> 
                            <span class="xspan<?php  echo $item['id'];?>"><?php  echo $item['ysc_num'];?></span>
                            <input style="display: none;width: 100%;" type="text" name="xinp<?php  echo $item['id'];?>" class="xinp<?php  echo $item['id'];?>" value="<?php  echo $item['xs_num'];?>">
                        
                            <script type="text/javascript">
                                $(function(){
                                    $(".xs_num<?php  echo $item['id'];?>").each(function(index){
                                         $(this).dblclick(function(){
                                            $(".xinp<?php  echo $item['id'];?>").eq(index).show().focus();
                                            $(".xspan<?php  echo $item['id'];?>").eq(index).hide();                                            
                                        });
                                    });
                                    $(".xinp<?php  echo $item['id'];?>").each(function(index){
                                        $(this).blur(function(){            
                                            $(".xinp<?php  echo $item['id'];?>").eq(index).hide();
                                            $(".xspan<?php  echo $item['id'];?>").eq(index).show();
                                            var text = $(".xspan<?php  echo $item['id'];?>").html();
                                            var inp = $(" input[ name='xinp<?php  echo $item['id'];?>' ] ").val();
                                            $(".xspan<?php  echo $item['id'];?>").html(inp);
                                            // console.log(inp);
                                            id = <?php  echo $item['id'];?>;
                                            xs_num = inp;
                                            $.ajax({
                                                type:"post",
                                                url:"<?php  echo $_W['siteroot'];?>/app/index.php?i=<?php  echo $_W['uniacid'];?>&c=entry&do=groupupdate&m=zh_cjdianc",
                                                dataType:"text",
                                                data:{id:id,xs_num:xs_num},
                                                success:function(data){
                                                    console.log(data);
                                                }
                                            })
                                    
                                        });
                                    });
                                })
                            </script>
                        </td>
                         <td class="col-md-1 dish_btn">
                            <?php  if($item['is_shelves']==1) { ?>
                              <button  type="button"  data-toggle="modal" data-target="#myModalc<?php  echo $item['id'];?>" class="btn btn-xs storeblue">点击下架</button>
                            <?php  } else if($item['is_shelves']==2) { ?>
                            <button type="button"  data-toggle="modal" data-target="#myModalb<?php  echo $item['id'];?>" class="btn btn-xs storegrey">点击上架</button>
                            <?php  } ?>
                            <input type="hidden" value="<?php  echo $item['is_shelves'];?>" name="updtype"/>
                            </td>
                                
                            <td class="col-md-2 dish_btn">
                                <a href="<?php  echo $this->createWebUrl2('dladdgroupgoods', array('id' => $item['id']))?>" class="storespan btn btn-xs">
                                    <span class="fa fa-pencil"></span>
                                    <span class="bianji">编辑
                                        <span class="arrowdown"></span>
                                    </span>                                
                                </a>
            
                                <a href="javascript:void(0);" class="storespan btn btn-xs" data-toggle="modal" data-target="#myModal<?php  echo $item['id'];?>">
                                    <span class="fa fa-trash-o"></span>
                                    <span class="bianji">删除
                                        <span class="arrowdown"></span>
                                    </span>
                                </a>
                            </td>
                        </tr>                          
                     
                    <div class="modal fade" id="myModal<?php  echo $item['id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
                            <a href="<?php  echo $this->createWebUrl2('dlgroupgoods', array('op' => 'delete', 'delid' => $item['id']))?>" type="button" class="btn btn-info" >确定</a>
                        </div>
                    </div>
                </div>
            </div>
            
                <div class="modal fade" id="myModalb<?php  echo $item['id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel" style="font-size: 20px;">提示</h4>
                        </div>
                        <div class="modal-body" style="font-size: 20px">
                            确定上架么？
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                            <a href="<?php  echo $this->createWebUrl2('dlgroupgoods',array('id'=>$item['id'],'is_shelves'=>1,'page'=>$_GPC['page'],'keywords'=>$_GPC['keywords'],'dishes_type'=>$_GPC['dishes_type'],'type_id'=>$_GPC['type_id'],'is_shelves2'=>$_GPC['is_shelves2']));?>" type="button" class="btn btn-info" >确定</a>
                        </div>
                    </div>
                </div>
            </div>

             <div class="modal fade" id="myModalc<?php  echo $item['id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel" style="font-size: 20px;">提示</h4>
                        </div>
                        <div class="modal-body" style="font-size: 20px">
                            确定下架么？
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                            <a href="<?php  echo $this->createWebUrl2('dlgroupgoods',array('id'=>$item['id'],'is_shelves'=>2,'page'=>$_GPC['page'],'keywords'=>$_GPC['keywords'],'dishes_type'=>$_GPC['dishes_type'],'type_id'=>$_GPC['type_id'],'is_shelves2'=>$_GPC['is_shelves2']));?>" type="button" class="btn btn-info" >确定</a>
                        </div>
                    </div>
                </div>
            </div>

                <?php  } } ?>
                <?php  if(empty($list)) { ?>
                <tr class="yg5_tr2">
                    <td colspan="12">
                      暂无商品信息
                    </td>
                </tr>
                <?php  } ?>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="text-right we7-margin-top"><?php  echo $pager;?></div>

<script type="text/javascript">
    $(function(){
    	// $("#frame-2").addClass("in");
        $("#frame-11").show();
        $("#yframe-11").addClass("wyactive");
    	// —————批量上架—————
    	$("#allshang").on('click',function(){
            var check = $("input[type=checkbox][class!=allcheck]:checked");
            if(check.length < 1){
                alert('请选择要上架的商品!');
                return false;
            }else if(confirm("确认要上架此商品?")){
                var id = new Array();
                check.each(function(i){
                    id[i] = $(this).val();
                });
               console.log(id)
                $.ajax({
                    type:"post",
                    url:"<?php  echo $_W['siteroot'];?>/app/index.php?i=<?php  echo $_W['uniacid'];?>&c=entry&do=groupsj&m=zh_cjdianc",
                    dataType:"text",
                    data:{id:id},
                    success:function(data){
                        console.log(data);      
                        location.reload();
                    }
                })
               
            }
        });

    	// 批量下架
        $("#alldown").on('click',function(){
            var check = $("input[type=checkbox][class!=allcheck]:checked");
            if(check.length < 1){
                alert('请选择要下架的商品!');
                return false;
            }else if(confirm("确认要下架此商品?")){
                var id = new Array();
                check.each(function(i){
                    id[i] = $(this).val();
                });
               console.log(id)
                $.ajax({
                    type:"post",
                    url:"<?php  echo $_W['siteroot'];?>/app/index.php?i=<?php  echo $_W['uniacid'];?>&c=entry&do=groupxj&m=zh_cjdianc",
                    dataType:"text",
                    data:{id:id},
                    success:function(data){
                        console.log(data);      
                        location.reload();
                    }
                })
               
            }
        });

        $(".allcheck").on('click',function(){
            var checked = $(this).get(0).checked;
            $("input[type=checkbox]").prop("checked",checked);
        });

        $("#allselect").on('click',function(){
            var check = $("input[type=checkbox][class!=allcheck]:checked");
            if(check.length < 1){
                alert('请选择要删除的商品!');
                return false;
            }else if(confirm("确认要删除此商品?")){
                var id = new Array();
                check.each(function(i){
                    id[i] = $(this).val();
                });
               // console.log(id)
                $.ajax({
                    type:"post",
                    url:"<?php  echo $_W['siteroot'];?>/app/index.php?i=<?php  echo $_W['uniacid'];?>&c=entry&do=delgroup&m=zh_cjdianc",
                    dataType:"text",
                    data:{id:id},
                    success:function(data){
                        console.log(data);      
                        location.reload();
                    }
                })
               
            }
        });
        $(".allcheck").on('click',function(){
            var checked = $(this).get(0).checked;
            $("input[type=checkbox]").prop("checked",checked);
        });
        
    })
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>

