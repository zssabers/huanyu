<?php
global $_GPC, $_W;
$action = 'start';
$uid=$_COOKIE["uid"];
$store_id=$_COOKIE["storeid"];
$cur_store = $this->getStoreById($store_id);
$GLOBALS['frames'] = $this->getNaveMenu($store_id, $action,$uid);

$list=pdo_getall('cjdc_userzh',array('uniacid' => $_W['uniacid'],'store_id'=>$store_id));
foreach ($list as $key => $value){
 $sql="select name,tel  from " . tablename("cjdc_user") ." WHERE  id in ({$value['user_id']}) and uniacid=:uniacid";
 $list[$key]['lists'] = pdo_fetchall($sql,array(':uniacid'=>$_W['uniacid']));
}
include $this->template('web/dlinzhlist');