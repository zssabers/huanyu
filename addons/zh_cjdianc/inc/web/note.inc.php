<?php
global $_GPC, $_W;
$GLOBALS['frames'] = $this->getMainMenu();
$operation = !empty($_GPC['op']) ? $_GPC['op'] : 'display';
$type=empty($_GPC['type']) ? 'all' :$_GPC['type'];
$state=$_GPC['state'];
$pageindex = max(1, intval($_GPC['page']));
$pagesize=20;
$where=' WHERE  a.uniacid=:uniacid';
$data[':uniacid']=$_W['uniacid'];
if($_GPC['keywords']){
    $op=$_GPC['keywords'];
    $where.=" and b.name LIKE  concat('%', :name,'%') ";    
    $data[':name']=$op;
}
if($type !='all'){
     $where.= " and a.state=".$state;
}
$sql="select a.* ,b.name,b.link_name,b.link_tel from " . tablename("cjdc_userzh") . " a"  . " left join" . tablename("cjdc_store") . " b on b.id=a.store_id  " . $where." ORDER BY id DESC";
$total=pdo_fetchcolumn("SELECT count(*) FROM ".tablename('cjdc_userzh') . " a"  . " left join " . tablename("cjdc_store") . " b on b.id=a.store_id ".  "".$where,$data);
$select_sql =$sql." LIMIT " .($pageindex - 1) * $pagesize.",".$pagesize;
$list=pdo_fetchall($select_sql,$data);
foreach ($list as $key => $value){
 $sql="select name,tel  from " . tablename("cjdc_user") ." WHERE  id in ({$value['user_id']}) and uniacid=:uniacid";
 $list[$key]['lists'] = pdo_fetchall($sql,array(':uniacid'=>$_W['uniacid']));
}

$pager = pagination($total, $pageindex, $pagesize);

if($operation=='adopt'){//审核通过 
    $id=$_GPC['id'];
	$res=pdo_update('cjdc_userzh',array('state'=>2,'sh_time'=>time()),array('id'=>$id));  
    if($res){
       ///////////////模板消息拒绝///////////////////
 /*function getaccess_token($_W){
         $res=pdo_get('cjdc_system',array('uniacid'=>$_W['uniacid']));
         $appid=$res['appid'];
         $secret=$res['appsecret'];
         $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".$appid."&secret=".$secret."";
         $ch = curl_init();
         curl_setopt($ch, CURLOPT_URL,$url);
         curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
         curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,0);
         $data = curl_exec($ch);
         curl_close($ch);
         $data = json_decode($data,true);
         return $data['access_token'];
       }
      //设置与发送模板信息
       function set_msg($_W)
            {
                $access_token = getaccess_token($_W);
                $res = pdo_get('cjdc_message', array('uniacid' => $_W['uniacid']));
                $res2 = pdo_get('cjdc_store', array('id' => $_GET['id']));
                $user = pdo_get('cjdc_user', array('id' => $res2['sq_id']));
                if ($res2['state'] == 2) {
                    $state = "审核通过";
                    $note = "审核通过,请尽快完善信息";
                }
                if ($res2['state'] == 3) {
                    $state = "审核拒绝";
                    $note = "审核拒绝,请核对信息后再次提交";
                }	
				$formwork =[
					'touser'=>$user['openid'],
					'template_id'=>$res["rzcg_tid"],
					'page'=>"zh_cjdianc/pages/Liar/loginindex",
					'data'=>[
						'phrase2'=>array('value'=>$state), 
						'date3'=>array('value'=>$res2['sq_time']), 
						'thing1'=>array('value'=>$res2['name']), 
						'thing4'=>array('value'=>$note),  
							]
						];						
					$url = "https://api.weixin.qq.com/cgi-bin/message/subscribe/send?access_token=" . $access_token . "";
					$formworks = json_encode($formwork);
					$ch = curl_init();
					curl_setopt($ch, CURLOPT_URL, $url);
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
					curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
					curl_setopt($ch, CURLOPT_POST, 1);
					curl_setopt($ch, CURLOPT_POSTFIELDS, $formworks);
					$data = curl_exec($ch);
					curl_close($ch);
            }
       echo set_msg($_W);*/
        message('审核成功',$this->createWebUrl('note',array()),'success');
    }else{
        message('审核失败','','error');
    }
}
if($operation=='reject'){
     $id=$_GPC['id'];
    $res=pdo_update('cjdc_userzh',array('state'=>3),array('id'=>$id));
     if($res){  
       ///////////////模板消息拒绝///////////////////
 /*function getaccess_token($_W){
         $res=pdo_get('cjdc_system',array('uniacid'=>$_W['uniacid']));
         $appid=$res['appid'];
         $secret=$res['appsecret'];
         $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".$appid."&secret=".$secret."";
         $ch = curl_init();
         curl_setopt($ch, CURLOPT_URL,$url);
         curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
         curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,0);
         $data = curl_exec($ch);
         curl_close($ch);
         $data = json_decode($data,true);
         return $data['access_token'];
       }
      //设置与发送模板信息
       function set_msg($_W)
            {
                $access_token = getaccess_token($_W);
                $res = pdo_get('cjdc_message', array('uniacid' => $_W['uniacid']));
                $res2 = pdo_get('cjdc_store', array('id' => $_GET['id']));
                $user = pdo_get('cjdc_user', array('id' => $res2['sq_id']));
                if ($res2['state'] == 2) {
                    $state = "审核通过";
                    $note = "审核通过,请尽快完善信息";
                }
                if ($res2['state'] == 3) {
                    $state = "审核拒绝";
                    $note = "审核拒绝,请核对信息后再次提交";
                }	
				$formwork =[
					'touser'=>$user['openid'],
					'template_id'=>$res["rzcg_tid"],
					'page'=>"zh_cjdianc/pages/Liar/loginindex",
					'data'=>[
						'phrase2'=>array('value'=>$state), 
						'date3'=>array('value'=>$res2['sq_time']), 
						'thing1'=>array('value'=>$res2['name']), 
						'thing4'=>array('value'=>$note),  
							]
						];						
					$url = "https://api.weixin.qq.com/cgi-bin/message/subscribe/send?access_token=" . $access_token . "";
					$formworks = json_encode($formwork);
					$ch = curl_init();
					curl_setopt($ch, CURLOPT_URL, $url);
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
					curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
					curl_setopt($ch, CURLOPT_POST, 1);
					curl_setopt($ch, CURLOPT_POSTFIELDS, $formworks);
					$data = curl_exec($ch);
					curl_close($ch);
            }*/
      // echo set_msg($_W);
        message('拒绝成功',$this->createWebUrl('note',array()),'success');
    }else{
        message('拒绝失败','','error');
    }
}
if($operation=='delete'){
     $id=$_GPC['id'];
     $res=pdo_delete('cjdc_userzh',array('id'=>$id));
     if($res){
        message('删除成功',$this->createWebUrl('note',array()),'success');
    }else{
        message('删除失败','','error');
    }

}

include $this->template('web/note');