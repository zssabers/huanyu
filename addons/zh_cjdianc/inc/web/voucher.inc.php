<?php
global $_GPC, $_W;
$action = 'start';
$storeid=$_COOKIE["storeid"];
$uid=$_COOKIE["uid"];
$cur_store = $this->getStoreById($storeid);
$GLOBALS['frames'] = $this->getNaveMenu($storeid, $action,$uid);
$sql = "select a.*,b.type from" . tablename('cjdc_cjhd') . "a left join " . tablename('cjdc_coupons') . " b on a.coupon_id=b.id  where a.store_id={$storeid}";
$list = pdo_fetchall($sql);
if($_GPC['id']){
	$result = pdo_delete('cjdc_cjhd', array('id'=>$_GPC['id']));
		if($result){
			message('删除成功',$this->createWebUrl('voucher',array()),'success');
		}else{
			message('删除失败','','error');
		}
}
include $this->template('web/voucher');