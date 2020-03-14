<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/header', TEMPLATE_INCLUDEPATH)) : (include template('public/header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/comhead', TEMPLATE_INCLUDEPATH)) : (include template('public/comhead', TEMPLATE_INCLUDEPATH));?>

<style type="text/css">
.footer{
    background:none !important;
    color:#666;
    /*position: fixed;*/
/*    bottom: 0;*/
    /*z-index: -100;*/
    opacity: 1;
    width: 100%;
}
  .panel-default>.wyheader{font-weight: bold;background-color: #F3F3F3;}
  .yg14{margin-top: 30px;}
  .chongzhi{margin-bottom: 10px;height: 35px;}
  .chongzhi>div,.chongzhi>input{
    float: left;
    border:1px solid #eee;
    height: 35px;
    line-height: 35px;
    margin-left: 0px;
    margin-right: 0px;
  }
  .man{
    padding: 0px 12px;
    text-align: center;
  }
  .money{
    width: 75%;
    text-indent: 1em;
  }
  .money2{
    width: 70%;
    text-indent: 1em;
  }
  .shanchu{
    color: white;
    background-color: #ED5565;
    cursor: pointer;
  }
  .tianjia{
    border:1px solid #eee;
    height: 35px;
    line-height: 35px;
    text-align: center;
    width: 110px;
    cursor: pointer;
  }
  .fa-plus{margin-right: 5px;}
  .beizhu{margin-top: 10px;}
  .panel-body{font-size: 13px;}
  /*#frame-13{display: block;visibility: visible;}*/
</style>

  <div class="panel panel-default yg14">

        <div class="panel-heading wyheader">短信套餐设置</div>

        <div class="panel-body">

            <form class="form-horizontal" action="" method="POST">
                <ul class="col-md-12 myul" style="padding: 0px;">
                <?php  if(is_array($list)) { foreach($list as $row) { ?>
                    <li class="col-md-12 czli1" style="padding: 0px;">
                       <div class="col-md-3 chongzhi">
                           <div class="man">充值</div>
                           <input type="number" name="" value="<?php  echo $row['money'];?>" class="money inp1" readonly="readonly">
                       </div>
                       <div class="col-md-3 chongzhi">
                           <div class="man">短信</div>
                           <input type="number" name="" value="<?php  echo $row['num'];?>" class="money2 inp2" readonly="readonly">
                           <div class="man">条</div>
                       </div>
					   <div class="col-md-6 chongzhi">
                           <div class="man">套餐描述</div>
                           <input type="text" name="" value="<?php  echo $row['des'];?>" class="money inp1" readonly="readonly">
						   <div id="del<?php  echo $row['id'];?>" data-id="<?php  echo $row['id'];?>" class="man shanchu shanchu<?php  echo $row['id'];?>"><span class="fa fa-times"></span></div>
                       </div>
                       <script type="text/javascript">
                         $(function(){
                            $(".shanchu<?php  echo $row['id'];?>").click(function(){          
                                  var id = $("#del<?php  echo $row['id'];?>").data('id');
                                  console.log(id);
                                  $.ajax({
                                      type:"post",
                                      url:"<?php  echo $_W['siteroot'];?>/app/index.php?i=<?php  echo $_W['uniacid'];?>&c=entry&do=DelDx&m=zh_cjdianc",
                                      dataType:"text",
                                      data:{id:id},
                                      success:function(data){
                                          // alert(data)
                                          console.log("返回的data数据是："+data);      
                                          location.reload();
                                      }
                                  })
                              })
                         })
                       </script>
                    </li>
                  <?php  } } ?>  
                </ul>
                <div class="col-md-12">
                    <div class="tianjia"><span class="fa fa-plus"></span>增加套餐项</div>
                </div>
                <div class="col-md-12 beizhu">两项都填写才能生效</div>
                <div class="col-md-12 beizhu">例如：充值10，短信1000</div>

            
                <div class="col-md-12"><br/><br/><br/><br/><br/><br/></div>

                <div class="form-group col-md-12">
                    <input type="button" name="button" value="提交" class="btn col-lg-3 col-lg-offset-3" style="color: white;background-color: #44ABF7;"/>
                    
                </div>

            </form>

        </div>

    </div>
<script type="text/javascript">
  var num = $(".addmyli").length;
    $(function(){
        // $("#frame-13").addClass("in");
        $("#frame-13").show();
        $("#yframe-13").addClass("wyactive");
        $(".tianjia").click(function(){
            num ++;
            var addli = $('<li class="col-md-12 addmyli" id="czli'+num+'" style="padding: 0px;"><div class="col-md-3 chongzhi"><div class="man">充值</div><input type="number" name="money" class="money" placeholder="请输入金额"></div><div class="col-md-3 chongzhi"><div class="man">短信</div><input type="number" name="money2" class="money2" placeholder="请输入数量"><div class="man">条</div></div><div class="col-md-6 chongzhi"><div class="man">套餐描述</div><input type="text" name="des" class="money" placeholder="请输入套餐描述"><div class="man shanchu" id="shanchu'+num+'"><span class="fa fa-times"></span></div></div></li>');
            addli.appendTo($(".myul"));
        });
        
        // ———————————点击提交传输数据———————————
        $("input[name='button']").click(function(){
          var list = [];

          for(var i = 0;i<$(".addmyli").length;i++){
            var money1 = $(".addmyli").eq(i).find("input[name='money']").val();
            var money2 = $(".addmyli").eq(i).find("input[name='money2']").val();
			var des = $(".addmyli").eq(i).find("input[name='des']").val();
            // alert(money1+","+money2);
            var obj = {};
            obj.money = money1;
            obj.num = money2;
			obj.des = des;
            list.push(obj);

          }
          console.log(list);
          $.ajax({
              type:"post",
              url:"<?php  echo $_W['siteroot'];?>/app/index.php?i=<?php  echo $_W['uniacid'];?>&c=entry&do=AddDx&m=zh_cjdianc",
              dataType:"text",
              data:{list:list},
              success:function(data){
                  // alert(data)
                  console.log(data);      
                  location.reload();
              }
          })
          
          
        })
        
        
    })

   
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>