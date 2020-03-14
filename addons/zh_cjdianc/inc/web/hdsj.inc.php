<?php
global $_GPC, $_W;
$GLOBALS['frames'] = $this->getMainMenu();
$pageindex = max(1, intval($_GPC['page']));
$pagesize=15;
$sql="select a.*,b.type_name from " . tablename("cjdc_store") . " a"  . " left join " . tablename("cjdc_storetype") . " b on b.id=a.md_type"." where a.is_czhd = 1 and a.uniacid = :uniacid order by a.id DESC";
  //$sql="select * from " . tablename("cjdc_store") . "where uniacid = :uniacid and is_czhd = 1 order by id DESC";
$select_sql =$sql." LIMIT " .($pageindex - 1) * $pagesize.",".$pagesize;
$list = pdo_fetchall($select_sql,array(':uniacid'=>$_W['uniacid']));     
$total=pdo_fetchcolumn("select count(*) from " . tablename("cjdc_store") . " where uniacid = :uniacid and is_czhd = 1",array(':uniacid'=>$_W['uniacid']));

$pager = pagination($total, $pageindex, $pagesize);

include $this->template('web/hdsj');