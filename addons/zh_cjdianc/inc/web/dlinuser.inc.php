<?php
global $_GPC, $_W;
$action = 'start';
$uid=$_COOKIE["uid"];
$storeid=$_COOKIE["storeid"];
$cur_store = $this->getStoreById($storeid);
$GLOBALS['frames'] = $this->getNaveMenu($storeid, $action,$uid);
$time = strtotime(date("Y-m-d"));
$juese = $_GPC['juese'];
if($_GPC['keywords']){
	$op=$_GPC['keywords'];
	$where="%$op%";	
}else{
	$where='%%';
}
	$pageindex = max(1, intval($_GPC['page']));
	$pagesize=10;
  $usersql="select distinct user_id  from " . tablename("cjdc_order") ." WHERE  store_id={$storeid}  order by  id desc";
  $inuser=pdo_fetchall($usersql);
  function array_column2($arr2, $column_key) {
		$data = [];
		foreach ($arr2 as $key => $value) {
			$data[] = $value[$column_key];
		}
		return $data;
}
    if($inuser){
    $inuser=join(",",array_column2($inuser,'user_id'));
	if($_GPC['juese']){
	$sql="select *  from " . tablename("cjdc_user") ." WHERE  yy_id LIKE :storeid and name LIKE :name  and uniacid=:uniacid and name!=''";	
	}else{
	$sql="select *  from " . tablename("cjdc_user") ." WHERE  id in ({$inuser}) and name LIKE :name  and uniacid=:uniacid and name!=''";
	}

	$select_sql =$sql." LIMIT " .($pageindex - 1) * $pagesize.",".$pagesize;
	if($_GPC['juese']){
		$list = pdo_fetchall($select_sql,array(':uniacid'=>$_W['uniacid'],':name'=>$where,':storeid'=>"%$storeid%"));	
	}else{
		$list = pdo_fetchall($select_sql,array(':uniacid'=>$_W['uniacid'],':name'=>$where));
	}
	
	
	$sqls = "select * from " . tablename("cjdc_coupons") . "WHERE  UNIX_TIMESTAMP(start_time)<={$time} and  UNIX_TIMESTAMP(end_time)>={$time} and store_id={$storeid} and category=1";
	$coupon = pdo_fetchall($sqls);	
	
	$sqlc = "select * from " . tablename("cjdc_coupons") . "WHERE  UNIX_TIMESTAMP(start_time)<={$time} and  UNIX_TIMESTAMP(end_time)>={$time} and store_id={$storeid} and category=2 and is_dj=1";
	$coupons = pdo_fetchall($sqlc);
	if($_GPC['juese']){
	$total=pdo_fetchcolumn("select count(*) from " . tablename("cjdc_user") ." WHERE  yy_id LIKE :storeid and name LIKE :name  and name!=''",array(':name'=>$where,':storeid'=>"%$storeid%"));
	}else{
	$total=pdo_fetchcolumn("select count(*) from " . tablename("cjdc_user") ." WHERE  id in ({$inuser}) and name LIKE :name  and name!=''",array(':name'=>$where));	
	}
	$pager = pagination($total, $pageindex, $pagesize);
	if($juese==1){
	 for($i=0;$i<count($list);$i++){
			  $ordersql = "select count(a.id) as count from " . tablename("cjdc_order") . " a " . " left join " . tablename("cjdc_usercoupons") . " b on b.id=a.coupon_id   WHERE a.store_id=" . $storeid . " and b.uid=" . $list[$i]['id'] . " and (a.state in (4,5,10) || a.dn_state=2 || a.dm_state=2 || a.yy_state=3)";
			  $order = pdo_fetch($ordersql);
			  $list[$i]['ordernum']=$order['count'];
			}	
	}else{
	 for($i=0;$i<count($list);$i++){
	  $userorder=pdo_fetchcolumn("select count(*)  from " . tablename("cjdc_order") ." WHERE  store_id={$storeid} and user_id={$list[$i]['id']}  and (state in (4,5,10) || dn_state=2 || dm_state=2 || yy_state=3)");
	  $ordertime=pdo_getall('cjdc_order',array('user_id'=>$list[$i]['id'],'store_id'=>$storeid), array(), '', 'id DESC');
	  $list[$i]['ordernum']=$userorder;
	  $list[$i]['ordertime']=$ordertime[0]['time'];
	 }
	}
	
}
	
include $this->template('web/dlinuser');