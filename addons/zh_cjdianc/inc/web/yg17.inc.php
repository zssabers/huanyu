<?php
global $_GPC, $_W;
$action = 'start';
$uid=$_COOKIE["uid"];
$storeid=$_COOKIE["storeid"];
$cur_store = $this->getStoreById($storeid);
$GLOBALS['frames'] = $this->getNaveMenu($storeid, $action,$uid);
$fwid=$_GPC["id"];
$store=pdo_getall('cjdc_store',array('uniacid'=>$_W['uniacid']),'user_id');
$system=pdo_get('cjdc_system',array('uniacid'=>$_W['uniacid']));

function i_array_column($input, $columnKey, $indexKey=null){
	if(!function_exists('array_column')){ 
		$columnKeyIsNumber  = (is_numeric($columnKey))?true:false; 
		$indexKeyIsNull            = (is_null($indexKey))?true :false; 
		$indexKeyIsNumber     = (is_numeric($indexKey))?true:false; 
		$result                         = array(); 
		foreach((array)$input as $key=>$row){ 
			if($columnKeyIsNumber){ 
				$tmp= array_slice($row, $columnKey, 1); 
				$tmp= (is_array($tmp) && !empty($tmp))?current($tmp):null; 
			}else{ 
				$tmp= isset($row[$columnKey])?$row[$columnKey]:null; 
			} 
			if(!$indexKeyIsNull){ 
				if($indexKeyIsNumber){ 
					$key = array_slice($row, $indexKey, 1); 
					$key = (is_array($key) && !empty($key))?current($key):null; 
					$key = is_null($key)?0:$key; 
				}else{ 
					$key = isset($row[$indexKey])?$row[$indexKey]:0; 
				} 
			} 
			$result[$key] = $tmp; 
		} 
		return $result; 
	}else{
		return array_column($input, $columnKey, $indexKey);
	}
}
$yuser=i_array_column($store, 'user_id');
$user=pdo_getall('cjdc_user',array('uniacid'=>$_W['uniacid'],'id !='=>$yuser,'name !='=>''));

function i_array_column2($input, $columnKey, $indexKey=null){
	if(!function_exists('array_column')){ 
		$columnKeyIsNumber  = (is_numeric($columnKey))?true:false; 
		$indexKeyIsNull            = (is_null($indexKey))?true :false; 
		$indexKeyIsNumber     = (is_numeric($indexKey))?true:false; 
		$result                         = array(); 
		foreach((array)$input as $key=>$row){ 
			if($columnKeyIsNumber){ 
				$tmp= array_slice($row, $columnKey, 1); 
				$tmp= (is_array($tmp) && !empty($tmp))?current($tmp):null; 
			}else{ 
				$tmp= isset($row[$columnKey])?$row[$columnKey]:null; 
			} 
			if(!$indexKeyIsNull){ 
				if($indexKeyIsNumber){ 
					$key = array_slice($row, $indexKey, 1); 
					$key = (is_array($key) && !empty($key))?current($key):null; 
					$key = is_null($key)?0:$key; 
				}else{ 
					$key = isset($row[$indexKey])?$row[$indexKey]:0; 
				} 
			} 
			$result[$key] = $tmp; 
		} 
		return $result; 
	}else{
		return array_column($input, $columnKey, $indexKey);
	}
}
$info=pdo_get('cjdc_yg',array('id'=>$_GPC['id']));
$userinfo=pdo_get('cjdc_user',array('id'=>$info['user_id']));
if(checksubmit('submit')){

	$data['fw_name']=$_GPC['name'];
	$data['user_id']=$_GPC['user_id'];
	$data['phone']=$_GPC['phone'];
	$data['store_id']=$storeid;
	if($infoset['picture']!=$_GPC['picture'] and $_GPC['picture']){
		$data['picture']=$_W['attachurl'].$_GPC['picture'];
	}else{
		$data['picture']=$_GPC['picture'];
	}

	if(!$_GPC['name']){
		message('请填员工姓名!','','error'); 
	}
	if(!$_GPC['picture']){
		message('请选择员工照片','','error'); 
	}
	if($_GPC['user_id']==0){
		message('请选择用户','','error'); 
	}
	if($_GPC['id']==''){  
		$res = pdo_insert('cjdc_yg',$data);
		pdo_update('cjdc_user',array('store_id'=>$storeid),array('id'=>$_GPC['user_id']));
		if($res){
			message('添加成功！', $this->createWebUrl2('test2'), 'success');
		}else{
			message('添加失败！','','error');
		}
	}else{
		if($info['state']==4){
			$data2['state']=2;
		}

		$res=pdo_update('cjdc_yg',$data,array('id'=>$_GPC['id']));
		if($res){
			message('编辑成功！', $this->createWebUrl2('test2'), 'success');
		}else{
			message('编辑失败！','','error');
		}
	}
}

function storecode($storeid,$fwid){
	function  getCoade($storeid,$fwid){
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
			function set_msg($storeid,$fwid){
				$access_token = getaccess_token();
				$data2=array(
					"scene"=>$storeid.'-'. $fwid,
				"page"=>"zh_cjdianc/pages/seller/fukuan",
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
			$img=set_msg($storeid,$fwid);
			$img=base64_encode($img);
			return $img;
		}
	
		
        $base64_image_content = "data:image/jpeg;base64," . getCoade($storeid,$fwid);
		if (preg_match('/^(data:\s*image\/(\w+);base64,)/', $base64_image_content, $result)) {
			$type = $result[2];
			$new_file = IA_ROOT . "/addons/zh_cjdianc/ygimg/";
			if (!file_exists($new_file)) {
				//检查是否有该文件夹，如果没有就创建，并给予最高权限
				mkdir($new_file, 0777);
			}
			$wname = "{$storeid}" . "{$fwid}" . ".{$type}";
			//$wname="1511.jpeg";
			$new_file = $new_file . $wname;
			file_put_contents($new_file, base64_decode(str_replace($result[1], '', $base64_image_content)));
		}
		return  "https://huanyucanguan.com/addons/zh_cjdianc/ygimg/" . $wname;
}

		$img2=storecode($storeid,$fwid);

include $this->template('web/yg17');