<?php
global $_GPC, $_W;
$GLOBALS['frames'] = $this->getMainMenu();
$list=pdo_getall('cjdc_storenote',array('uniacid'=>$_W['uniacid']));
include $this->template('web/dxcz');