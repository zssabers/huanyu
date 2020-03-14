<?php
global $_GPC, $_W;
$action = 'start';
$uid=$_COOKIE["uid"];
$storeid=$_COOKIE["storeid"];
$cur_store = $this->getStoreById($storeid);
$GLOBALS['frames'] = $this->getNaveMenu($storeid, $action,$uid);

if($_GPC['keywords']){
	$op=$_GPC['keywords'];
	$where="%$op%";	
}else{
	$where='%%';
}

	$pageindex = max(1, intval($_GPC['page']));
	$pagesize=10;
	$sql="select *  from " . tablename("cjdc_yg") ." WHERE  fw_name LIKE :fw_name and store_id={$storeid} and fw_name!='' order by  id desc";
	$select_sql =$sql." LIMIT " .($pageindex - 1) * $pagesize.",".$pagesize;
	$list = pdo_fetchall($select_sql,array(':fw_name'=>$where));	   
	$total=pdo_fetchcolumn("select count(*) from " . tablename("cjdc_yg") ." WHERE  fw_name LIKE :fw_name and store_id={$storeid} and fw_name!=''",array(':fw_name'=>$where));
	$pager = pagination($total, $pageindex, $pagesize);

	if($_GPC['id']){
		$id = pdo_get('cjdc_yg',array('id'=>$_GPC['id']));
		$res4=pdo_delete("cjdc_yg",array('id'=>$_GPC['id']));
		      pdo_update("cjdc_user",array('store_id'=>0),array('id'=>$id['user_id']));
		if($res4){
		 message('删除成功！', $this->createWebUrl2('test2'), 'success');
		}else{
			  message('删除失败！','','error');
		}
	}

include $this->template('web/test2');