<?php
global $_GPC, $_W;
$action = 'start';
if($_GPC['id']){
setcookie("storeid",$_GPC['id']);
$cur_store = $this->getStoreById($_GPC['id']);  

$storeid=$_GPC['id'];

}else{
$storeid=$_COOKIE["storeid"];
$cur_store = $this->getStoreById($storeid); 
}
if($_GPC['uid']){
setcookie("uid",$_GPC['uid']);
$uid=$_GPC['uid'];
}else{
  $uid=$_COOKIE["uid"];
}
$GLOBALS['frames'] = $this->getNaveMenu($storeid, $action, $uid);
//运费服务费
$sys=pdo_get('cjdc_store',array('id'=>$storeid));
//外卖部分
//商家收益
$time=date("Y-m-d",time());
$where.=" where a.uniacid={$_W['uniacid']} and a.type=1 and a.store_id={$storeid}   and a.state in (4,5,10) and time LIKE '%{$time}%'";
//总数统计
$sql2="select sum(money) as 'total_money',sum(ps_money) as ps_money,sum(yhq_money2) as hb_money,sum(commission) as commission,sum(yycommission) as yycommission,sum(fwycommission) as fwycommission,sum(ptps_money) as ptps_money from" . tablename("cjdc_order") ." as a".$where." and pay_type=1";
$list2=pdo_fetch($sql2);
$sql3="select sum(money) as 'total_money',sum(ps_money) as ps_money,sum(yhq_money2) as hb_money,sum(commission) as commission,sum(yycommission) as yycommission,sum(fwycommission) as fwycommission,sum(ptps_money) as ptps_money from" . tablename("cjdc_order") ." as a".$where." and pay_type=4";
$list3=pdo_fetch($sql3);
$sql5="select sum(money) as 'total_money',sum(ps_money) as ps_money,sum(yhq_money2) as hb_money,sum(commission) as commission,sum(yycommission) as yycommission,sum(fwycommission) as fwycommission,sum(ptps_money) as ptps_money from" . tablename("cjdc_order") ." as a".$where." and (pay_type=2 or pay_type=5)";
$list5=pdo_fetch($sql5);

//获取商家手续费
// $list4=pdo_get('cjdc_storeset',array('store_id'=>$storeid),'poundage');
// if($list4['poundage']==0){
// $sql="select b.poundage,b.dn_poundage,b.dm_poundage,b.yd_poundage from".tablename('cjdc_store')."a  left join ".tablename('cjdc_storetype')." b on a.md_type=b.id where a.id={$storeid}";
//   $list4=pdo_fetch($sql);
  $list4=$this->storePoundage($storeid);
//}

//$jr_wxmoney=$list2['total_money']+$list2['hb_money']-$list2['commission']-$list2['yycommission']-$list2['fwycommission']-(($list2['total_money']+$list2['hb_money']-$list2['ps_money'])*($list4['poundage']+$list4['tg_poundage'])/100)-($list2['ps_money']*$sys['ps_poundage']/100);
//$jr_ddmoney=$list3['total_money']+$list3['hb_money']-$list3['commission']-$list3['yycommission']-$list3['fwycommission']-(($list3['total_money']+$list3['hb_money']-$list3['ps_money'])*($list4['poundage']+$list4['tg_poundage'])/100)-($list3['ps_money']*$sys['ps_poundage']/100);
//$jr_yemoney=$list5['total_money']+$list5['hb_money']-$list5['commission']-$list5['yycommission']-$list5['fwycommission']-(($list5['total_money']+$list5['hb_money']-$list5['ps_money'])*($list4['poundage']+$list4['tg_poundage'])/100)-($list5['ps_money']*$sys['ps_poundage']/100);

$jr_wxmoney=$list2['total_money']+$list2['hb_money']-$list2['commission']-$list2['yycommission']-$list2['fwycommission']-$list2['ptps_money']-($list2['ps_money']*$sys['ps_poundage']/100);
$jr_ddmoney=$list3['total_money']+$list3['hb_money']-$list3['commission']-$list3['yycommission']-$list3['fwycommission']-$list3['ptps_money']-($list3['ps_money']*$sys['ps_poundage']/100);
$jr_yemoney=$list5['total_money']+$list5['hb_money']-$list5['commission']-$list5['yycommission']-$list5['fwycommission']-$list5['ptps_money']-($list5['ps_money']*$sys['ps_poundage']/100);

//今日订单统计
$time=date("Y-m-d",time());
$where2=" where  store_id={$storeid} and type=1 and time LIKE '%{$time}%'";
//自提订单
$ztorder=" select count(id) as total_order from".tablename('cjdc_order').$where2."  and order_type=2 and state in (2,3,4,5,8,10)  ";
$jrzt=pdo_fetch($ztorder);
//有效订单
$yxorder=" select count(id) as total_order from".tablename('cjdc_order').$where2."  and state in (2,3,4,5,8,10)  ";
$jryx=pdo_fetch($yxorder);
//待退款
$dtkorder=" select count(id) as total_order from".tablename('cjdc_order').$where2."  and state=8  ";
$jrdtk=pdo_fetch($dtkorder);
//货到付款
$fdfkorder=" select count(id) as total_order from".tablename('cjdc_order').$where2."  and pay_type=4 and state in (2,3,4,5,8,10)  ";
$jrfdfk=pdo_fetch($fdfkorder);
//有效订单总数
$totalorder=" select count(id) as total_order from".tablename('cjdc_order')." where store_id={$storeid} and type=1 and state in (2,3,4,5,8,10) and time LIKE '%{$time}%' ";
$total=pdo_fetch($totalorder);
//var_dump($total);die;

//外卖菜品总览
$goods="select count( case when is_show=1 then 1 end) as sj, count( case when is_show=2 then 1 end) as xj from  ".tablename('cjdc_goods')." where uniacid={$_W['uniacid']}  and store_id={$storeid}  and (type=1 or type=3)";
$goods=pdo_fetch($goods);
//店内菜品总览
$dngoods="select count( case when is_show=1 then 1 end) as sj, count( case when is_show=2 then 1 end) as xj from  ".tablename('cjdc_goods')." where uniacid={$_W['uniacid']}  and store_id={$storeid}  and (type=2 or type=3)";
$dngoods=pdo_fetch($dngoods);

//店内订单统计
$where3.=" where a.uniacid={$_W['uniacid']} and a.type=2 and a.store_id={$storeid}   and a.dn_state=2 and time LIKE '%{$time}%'";


//总数统计
$sql21="select sum(money) as 'total_money',sum(yhq_money2) as hb_money,sum(commission) as commission,sum(yycommission) as yycommission,sum(fwycommission) as fwycommission from" . tablename("cjdc_order") ." as a".$where3." and pay_type=1";
$list21=pdo_fetch($sql21);
$sql31="select sum(money) as 'total_money',sum(yhq_money2) as hb_money,sum(commission) as commission,sum(yycommission) as yycommission,sum(fwycommission) as fwycommission from" . tablename("cjdc_order") ." as a".$where3." and pay_type=5";
$list31=pdo_fetch($sql31);
$sql51="select sum(money) as 'total_money',sum(yhq_money2) as hb_money,sum(commission) as commission,sum(yycommission) as yycommission,sum(fwycommission) as fwycommission from" . tablename("cjdc_order") ." as a".$where3." and (pay_type=2 or pay_type=5)";
$list51=pdo_fetch($sql51);


//var_dump($list2);die;
//$dnjr_wxmoney=$list21['total_money']+$list21['hb_money']-$list21['commission']-$list21['yycommission']-$list21['fwycommission']-(($list21['total_money']+$list21['hb_money'])*($list4['dn_poundage']+$list4['tg_dnpoundage'])/100);
//$dnjr_ddmoney=$list31['total_money']+$list31['hb_money']-$list31['commission']-$list31['yycommission']-$list31['fwycommission']-(($list31['total_money']+$list31['hb_money'])*($list4['dn_poundage']+$list4['tg_dnpoundage'])/100);
//$dnjr_yemoney=$list51['total_money']+$list51['hb_money']-$list51['commission']-$list51['yycommission']-$list51['fwycommission']-(($list51['total_money']+$list51['hb_money'])*($list4['dn_poundage']+$list4['tg_dnpoundage'])/100);

$dnjr_wxmoney=$list21['total_money']+$list21['hb_money']-$list21['commission']-$list21['yycommission']-$list21['fwycommission'];
$dnjr_ddmoney=$list31['total_money']+$list31['hb_money']-$list31['commission']-$list31['yycommission']-$list31['fwycommission'];
$dnjr_yemoney=$list51['total_money']+$list51['hb_money']-$list51['commission']-$list51['yycommission']-$list51['fwycommission'];
//今日订单统计
$where4=" where  store_id={$storeid} and type=2 and time LIKE '%{$time}%'";
//有效订单
$dnyxorder=" select count(id) as total_order from".tablename('cjdc_order').$where4."  and dn_state in (1,2)  ";
$dnjryx=pdo_fetch($dnyxorder);
//在线付订单
$dnztorder=" select count(id) as total_order from".tablename('cjdc_order').$where4."   and dn_state=2  and pay_type=1 ";
$dnjrzxf=pdo_fetch($dnztorder);
//餐后付订单
$dndtkorder=" select count(id) as total_order from".tablename('cjdc_order').$where4."  and dn_state=1  and pay_type=6";
$dnjrchf=pdo_fetch($dndtkorder);
//关闭订单
$dnfdfkorder=" select count(id) as total_order from".tablename('cjdc_order').$where4."  and dn_state=3  ";
$dnjrgb=pdo_fetch($dnfdfkorder);
//有效订单总数
$dntotalorder=" select count(id) as total_order from".tablename('cjdc_order')." where store_id={$storeid} and type=2 and dn_state in (1,2) and time LIKE '%{$time}%'  ";
$dntotal=pdo_fetch($dntotalorder);
//当面付订单金额统计
//今日在线当面付订单金额
$dmzxsql=" select sum(money) as total_money,sum(fwycommission) as fwycommission,sum(commission) as commission,sum(yycommission) as yycommission from".tablename('cjdc_order')."where store_id={$storeid} and type=4 and dm_state=2 and pay_type=1 and time LIKE '%{$time}%'";
$dmjr_zxmoney=pdo_fetch($dmzxsql);

//今日总当面付订单金额
$dmsql=" select sum(money) as total_money,sum(fwycommission) as fwycommission,sum(commission) as commission,sum(yycommission) as yycommission from".tablename('cjdc_order')."where store_id={$storeid} and type=4 and dm_state=2 and time LIKE '%{$time}%'";
$dmjr_money=pdo_fetch($dmsql);

//$dmjr_zxmoney=number_format($dmjr_zxmoney['total_money']-$dmjr_zxmoney['commission']-$dmjr_zxmoney['yycommission']-$dmjr_zxmoney['fwycommission']-($dmjr_zxmoney['total_money']*($list4['dm_poundage']+$list4['tg_dmpoundage'])/100),2,".", "");
//$dmjr_money=number_format($dmjr_money['total_money']-$dmjr_money['commission']-$dmjr_money['yycommission']-$dmjr_money['fwycommission']-($dmjr_money['total_money']*($list4['dm_poundage']+$list4['tg_dmpoundage'])/100),2,".", "");
$dmjr_zxmoney=number_format($dmjr_zxmoney['total_money']-$dmjr_zxmoney['commission']-$dmjr_zxmoney['yycommission']-$dmjr_zxmoney['fwycommission'],2,".", "");
$dmjr_money=number_format($dmjr_money['total_money']-$dmjr_money['commission']-$dmjr_money['yycommission']-$dmjr_money['fwycommission'],2,".", "");

$dmjr_yemoney=number_format($dmjr_money-$dmjr_zxmoney,2,".", "");
//总营业额
$dmcost=pdo_get('cjdc_order', array('store_id'=>$storeid,'dm_state '=>2,'pay_type'=>1,'type'=>4), array('sum(money) as total_money'));
//今日当面付订单
$dmorder=" select count(*) as total_order from ".tablename('cjdc_order')."where store_id={$storeid} and type=4 and dm_state=2 and time LIKE '%{$time}%'";
$dmordernum=pdo_fetch($dmorder);


//今日订单统计
$where6=" where  store_id={$storeid} and type=4 and time LIKE '%{$time}%'";
//有效订单总数
$dmyxorder=" select count(id) as total_order from".tablename('cjdc_order').$where6."  and dm_state=2  ";
$dmjryx=pdo_fetch($dmyxorder);
//在线付订单
$dmztorder=" select count(id) as total_order from".tablename('cjdc_order').$where6."   and dm_state=2  and pay_type=1 ";
$dmjrzxf=pdo_fetch($dmztorder);
//余额付订单
$dmdtkorder=" select count(id) as total_order from".tablename('cjdc_order').$where6."  and dm_state=2  and (pay_type=2 or pay_type=5)";
$dmjrchf=pdo_fetch($dmdtkorder);
//今日有效订单总数
$dmtotalorder=" select count(id) as total_order from".tablename('cjdc_order')." where store_id={$storeid} and type=4 and dm_state=2 and time LIKE '%{$time}%'  ";
$dmtotal=pdo_fetch($dmtotalorder);

//今日预定订单统计
$where5=" where  store_id={$storeid} and type=3 and time LIKE '%{$time}%'";
//有效订单
$ydyxorder=" select count(id) as total_order from".tablename('cjdc_order').$where5."  and yy_state in (2,3,4)  ";
$ydjryx=pdo_fetch($ydyxorder);
//在线付订单
$ydztorder=" select count(id) as total_order from".tablename('cjdc_order').$where5."   and yy_state>1  and pay_type=1 ";
$ydjrzxf=pdo_fetch($ydztorder);
//余额付订单
$yddtkorder=" select count(id) as total_order from".tablename('cjdc_order').$where5."  and yy_state>1  and (pay_type=2 or pay_type=5)";
$ydjrchf=pdo_fetch($yddtkorder);
//关闭订单
$ydfdfkorder=" select count(id) as total_order from".tablename('cjdc_order').$where5."  and yy_state=4  ";
$ydjrgb=pdo_fetch($ydfdfkorder);
//有效订单总数
$ydtotalorder=" select count(id) as total_order from".tablename('cjdc_order')." where store_id={$storeid} and type=3 and yy_state>1 and time LIKE '%{$time}%'  ";
$ydtotal=pdo_fetch($ydtotalorder);
$sql61="select sum(money) as 'total_money',sum(commission) as 'commission',sum(yycommission) as 'yycommission',sum(fwycommission) as 'fwycommission' from" . tablename("cjdc_order") ." as a".$where5." and pay_type=1 and yy_state=3";
$list61=pdo_fetch($sql61);
$sql71="select sum(money) as 'total_money',sum(commission) as 'commission',sum(yycommission) as 'yycommission',sum(fwycommission) as 'fwycommission' from" . tablename("cjdc_order") ." as a".$where5." and (pay_type=2 or pay_type=5) and yy_state=3";
$list71=pdo_fetch($sql71);
//$ydjr_wxmoney=$list61['total_money']-$list61['commission']-$list61['yycommission']-$list61['fwycommission']-($list61['total_money']*($list4['dn_poundage']+$list4['tg_ydpoundage'])/100);
$ydjr_wxmoney=$list61['total_money']-$list61['commission']-$list61['yycommission']-$list61['fwycommission'];
//$ydjr_yemoney=$list71['total_money']-$list71['commission']-$list71['yycommission']-$list71['fwycommission']-($list71['total_money']*($list4['dn_poundage']+$list4['tg_ydpoundage'])/100);
$ydjr_yemoney=$list71['total_money']-$list71['commission']-$list71['yycommission']-$list71['fwycommission'];

//今日营业额
$jryye=number_format($jr_wxmoney+$jr_ddmoney+$dnjr_wxmoney+$dnjr_ddmoney+$dmjr_money+$jr_yemoney+$dnjr_yemoney+$ydjr_wxmoney+$ydjr_yemoney,2,".", "");//今日营业额
$jrzxyye=number_format($jr_wxmoney+$dnjr_wxmoney+$dmjr_zxmoney+$ydjr_wxmoney,2,".", "");//今日在线营业
$jryezf=number_format($jr_yemoney+$dnjr_yemoney+$dmjr_money-$dmjr_zxmoney+$ydjr_yemoney,2,".", "");//今日余额支付营业
$jrddzf=$jr_ddmoney+$dnjr_ddmoney;//今日到店支付营业

//今日总订单
$jrordernum=$total['total_order']+$dntotal['total_order']+$dmordernum['total_order'];

//总营业额统计
//外卖在线总金额
$wmcost=pdo_get('cjdc_order', array('store_id'=>$storeid,'state '=>array(4,5,10),'pay_type'=>1,'type'=>1), array('sum(money) as total_money','sum(ps_money) as ps_money','sum(yhq_money2) as hb_money','sum(commission) as commission','sum(yycommission) as yycommission','sum(fwycommission) as fwycommission','sum(ptps_money) as ptps_money'));
//外卖线下支付总金额
$xxcost=pdo_get('cjdc_order', array('store_id'=>$storeid,'state '=>array(4,5,10),'pay_type'=>4,'type'=>1), array('sum(money) as total_money','sum(ps_money) as ps_money','sum(yhq_money2) as hb_money','sum(commission) as commission','sum(yycommission) as yycommission','sum(fwycommission) as fwycommission','sum(ptps_money) as ptps_money'));
//外卖余额支付总金额
$wmyecost=pdo_get('cjdc_order', array('store_id'=>$storeid,'state '=>array(4,5,10),'pay_type'=>array(2,5),'type'=>1), array('sum(money) as total_money','sum(ps_money) as ps_money','sum(yhq_money2) as hb_money','sum(commission) as commission','sum(yycommission) as yycommission','sum(fwycommission) as fwycommission','sum(ptps_money) as ptps_money'));

//店内在线总金额
$dnwmcost=pdo_get('cjdc_order', array('store_id'=>$storeid,'dn_state '=>2,'pay_type'=>1,'type'=>2), array('sum(money) as total_money','sum(yhq_money2) as hb_money','sum(commission) as commission','sum(yycommission) as yycommission','sum(fwycommission) as fwycommission'));
//店内线下支付总金额
$dnxxcost=pdo_get('cjdc_order', array('store_id'=>$storeid,'dn_state '=>2,'pay_type'=>6,'type'=>2), array('sum(money) as total_money','sum(yhq_money2) as hb_money','sum(commission) as commission','sum(yycommission) as yycommission','sum(fwycommission) as fwycommission'));
//店内余额支付总金额
$dnyecost=pdo_get('cjdc_order', array('store_id'=>$storeid,'dn_state '=>2,'pay_type'=>array(2,5),'type'=>2), array('sum(money) as total_money','sum(yhq_money2) as hb_money','sum(commission) as commission','sum(yycommission) as yycommission','sum(fwycommission) as fwycommission'));

//当面在线总金额
$dmfkcost=pdo_get('cjdc_order', array('store_id'=>$storeid,'dm_state '=>2,'pay_type'=>1,'type'=>4), array('sum(money) as total_money','sum(commission) as commission','sum(yycommission) as yycommission','sum(fwycommission) as fwycommission'));
//当面余额总金额
$dmxxcost=pdo_get('cjdc_order', array('store_id'=>$storeid,'dm_state '=>2,'pay_type '=>array(2,5),'type'=>4), array('sum(money) as total_money','sum(commission) as commission','sum(yycommission) as yycommission','sum(fwycommission) as fwycommission'));

//预定在线
$ydcost=pdo_get('cjdc_order', array('store_id'=>$storeid,'yy_state '=>3,'pay_type '=>1,'type'=>3), array('sum(money) as total_money','sum(commission) as commission','sum(yycommission) as yycommission','sum(fwycommission) as fwycommission'));
//预定余额支付
$ydyecost=pdo_get('cjdc_order', array('store_id'=>$storeid,'yy_state '=>3,'pay_type'=>array(2,5),'type'=>3), array('sum(money) as total_money','sum(commission) as commission','sum(yycommission) as yycommission','sum(fwycommission) as fwycommission'));

//在线支付总配送费
$zxps=pdo_get('cjdc_order', array('store_id'=>$storeid,'state '=>array(4,5,10),'type'=>1,'pay_type'=>1), array('sum(ps_money) as ps_money'));
$zxps=$zxps['ps_money']*$sys['ps_poundage']/100;
//余额支付总配送费
$yeps=pdo_get('cjdc_order', array('store_id'=>$storeid,'state '=>array(4,5,10),'type'=>1,'pay_type'=>array(2,5)), array('sum(ps_money) as ps_money'));
$yeps=$yeps['ps_money']*$sys['ps_poundage']/100;
//货到付款
$hdfk=pdo_get('cjdc_order', array('store_id'=>$storeid,'state '=>array(4,5,10),'type'=>1,'pay_type'=>4), array('sum(ps_money) as ps_money'));
$hdfk=$hdfk['ps_money']*$sys['ps_poundage']/100;

//在线总数
$zxcommission=$wmcost['commission']+$wmcost['yycommission']+$wmcost['fwycommission']+$dnwmcost['commission']+$dnwmcost['yycommission']+$dnwmcost['fwycommission']+$dmfkcost['commission']+$dmfkcost['yycommission']+$dmfkcost['fwycommission']+$ydcost['commission']+$ydcost['yycommission']+$ydcost['fwycommission'];
$zxcost=$wmcost['total_money']+$wmcost['hb_money']+$dnwmcost['total_money']+$dnwmcost['hb_money']+$dmfkcost['total_money']+$ydcost['total_money']-$zxcommission;
//$zxsxf=(($wmcost['total_money']+$wmcost['hb_money']-$wmcost['ps_money'])*($list4['poundage']+$list4['tg_poundage'])+$wmcost['ps_money']*$sys['ps_poundage']+($dnwmcost['total_money']+$dnwmcost['hb_money'])*($list4['dn_poundage']+$list4['tg_dnpoundage'])+$dmfkcost['total_money']*($list4['dm_poundage']+$list4['tg_dmpoundage'])+$ydcost['total_money']*($list4['yd_poundage']+$list4['tg_ydpoundage']))/100;
$zxsxf=$wmcost['ptps_money']+$wmcost['ps_money']*($sys['ps_poundage']/100);


$zxcost=$zxcost-$zxsxf;
$zxcost=number_format($zxcost,2,".", "");

//余额支付总数
$yecommission=$wmyecost['commission']+$wmyecost['yycommission']+$wmyecost['fwycommission']+$dnyecost['commission']+$dnyecost['yycommission']+$dnyecost['fwycommission']+$dmxxcost['commission']+$dmxxcost['yycommission']+$dmxxcost['fwycommission']+$ydyecost['commission']+$ydyecost['yycommission']+$ydyecost['fwycommission'];
$yecost=$wmyecost['total_money']+$wmyecost['hb_money']+$dnyecost['total_money']+$dnyecost['hb_money']+$dmxxcost['total_money']+$ydyecost['total_money']-$yecommission;
$yesxf=$wmyecost['ptps_money']+$wmyecost['ps_money']*($sys['ps_poundage']/100);

$yecost=$yecost-$yesxf;
$yecost=number_format($yecost,2,".", "");

//到店支付总数
$xxcommission=$xxcost['commission']+$xxcost['yycommission']+$xxcost['fwycommission']+$dnxxcost['commission']+$dnxxcost['yycommission']+$dnxxcost['fwycommission'];
$xxcost=$xxcost['total_money']+$xxcost['hb_money']+$dnxxcost['total_money']+$dnxxcost['hb_money']-$xxcommission;
$xxsxf=$xxcost['ptps_money']+$xxcost['ps_money']*($sys['ps_poundage']/100);

$xxcost=$xxcost-$xxsxf;
$xxcost=number_format($xxcost-$hdfk,2,".", "");

//总数
$cost=$zxcost+$yecost+$xxcost;

//二维码
function storecode($storeid){
function  getCoade($storeid){
    $tz_src=pdo_get('cjdc_storeset',array('store_id'=>$storeid),'tz_src');
    if($tz_src['tz_src']==1){
        $src="zh_cjdianc/pages/seller/index";
    }else{
        $src="zh_cjdianc/pages/takeout/takeoutindex";
    }

    function getaccess_token(){
      global $_W, $_GPC;
         $res=pdo_get('cjdc_system',array('uniacid' => $_W['uniacid']));
         $appid=$res['appid'];
         $secret=$res['appsecret'];
         
       $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".$appid."&secret=".$secret;
       $ch = curl_init();
       curl_setopt($ch, CURLOPT_URL,$url);
       curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
       curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,0);
       $data = curl_exec($ch);
       curl_close($ch);
       $data = json_decode($data,true);
       return $data['access_token'];
}
     function set_msg($storeid,$src){
       $access_token = getaccess_token();
        $data2=array(
        "scene"=>$storeid,
        "page"=>$src,
        "width"=>100
               );
    $data2 = json_encode($data2);
        $url = "https://api.weixin.qq.com/wxa/getwxacodeunlimit?access_token=".$access_token."";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,0);
        curl_setopt($ch, CURLOPT_POST,1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$data2);
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
         }
        $img=set_msg($storeid,$src);
        $img=base64_encode($img);
		return $img;
  }
	$base64_image_content = "data:image/jpeg;base64," . getCoade($storeid);
		if (preg_match('/^(data:\s*image\/(\w+);base64,)/', $base64_image_content, $result)) {
			$type = $result[2];
			$new_file = IA_ROOT . "/addons/zh_cjdianc/storeimg/";
			if (!file_exists($new_file)) {
				//检查是否有该文件夹，如果没有就创建，并给予最高权限
				mkdir($new_file, 0777);
			}
			$wname = "{$storeid}" . ".{$type}";
			//$wname="1511.jpeg";
			$new_file = $new_file . $wname;
			file_put_contents($new_file, base64_decode(str_replace($result[1], '', $base64_image_content)));
		}
		return  "https://huanyucanguan.com/addons/zh_cjdianc/storeimg/" . $wname;
		
    
}
$img=storecode($storeid);
$account=pdo_get('cjdc_account',array('storeid'=>$storeid,'uid'=>$uid));
$arr=explode(',',$account['authority']);
$type=false;
if(in_array('dlstatistics',$arr)){
  $type=true;
}
$users = user_single($account['uid']);
if($account['role']==2 && !$type){
  include $this->template('web/dlstoreindex');
}
if($account['role']==1 or $type){
  include $this->template('web/dlindex');
}


//include $this->template('web/dlindex');