<?php

defined('IN_IA') or exit('Access Denied');

class Zh_cjptModule extends WeModule {

    public function welcomeDisplay()
    {   
        global $_GPC, $_W;

            $url = $this->createWebUrl('index');
	    	//$url = $this->createWebUrl('gaikuangdata');
	        Header("Location: " . $url);
    	}
    

}