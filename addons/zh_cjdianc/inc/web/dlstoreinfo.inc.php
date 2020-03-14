<?php
global $_GPC, $_W;
$action = 'start';
$uid=$_COOKIE["uid"];
$storeid=$_COOKIE["storeid"];
$cur_store = $this->getStoreById($storeid);
$GLOBALS['frames'] = $this->getNaveMenu($storeid, $action,$uid);
$info=pdo_get('cjdc_store',array('id'=>$storeid));

$info2=pdo_get('cjdc_storeset',array('store_id'=>$storeid));

		//print_r($img);die;
		if($info['environment']){
			if(strlen($info['environment'])>51){
			$environment= explode(',',$info['environment']);
		}else{
			$environment=array(
				0=>$info['environment']
				);
		}
		}
		if($info['yyzz']){
		if(strlen($info['yyzz'])>51){
			$yyzz= explode(',',$info['yyzz']);
		}else{
			$yyzz=array(
				0=>$info['yyzz']
				);
		}	
		}
if(checksubmit('submit')){
	if(!$_GPC['logo']){
		message('请选择店铺LOGO','','error');
	}
	if(!$_GPC['name']){
		message('商家名称不能为空','','error');
	}
	if(!$_GPC['tel']){
		message('商家电话不能为空','','error');
	}
	if(!$_GPC['address']){
		message('商家地址不能为空','','error');
	}
	if(!$_GPC['coordinates']){
		message('商家坐标不能为空','','error');
	}
	if(!$_GPC['announcement']){
		message('门店公告不能为空','','error');
	}
	if(!$_GPC['environment']){
		message('请选择商家环境','','error');
	}
	if(!$_GPC['yyzz']){
		message('请选择营业资质','','error');
	}
	if(!$_GPC['details']){
		message('商家简介不能为空','','error');
	}
	if($_GPC['coupon_money']<=0||$_GPC['coupon_money']==''){
		message('异业推广佣金不能为空或小于1','','error');
	}
			
		if($_GPC['yyzz']){
			$data['yyzz']=implode(",",$_GPC['yyzz']);
		}else{
			$data['yyzz']='';
		}
		if($_GPC['environment']){
			$data['environment']=implode(",",$_GPC['environment']);
		}else{
			$data['environment']='';
		}
			$data['name']=$_GPC['name'];
			$data['address']=$_GPC['address'];
			$data['tel']=$_GPC['tel'];
			$data['is_czhd']=$_GPC['is_czhd'];
			$data['announcement']=$_GPC['announcement'];
			$data['start_at']=$_GPC['start_at'];
			$data['capita']=$_GPC['capita'];
			 if($info['logo']!=$_GPC['logo']){
            $data['logo']=$_W['attachurl'].$_GPC['logo'];
        }
			//$data['logo']=$_GPC['logo'];
			// if($_GPC['color']){
			// 	$data['color']=$_GPC['color'];
			// }else{
			// 	$data['color']="#34AAFF";
			// }
			$data['uniacid']=$_W['uniacid'];
			$data['staff_money']=$_GPC['staff_money'];
			$data['coordinates']=$_GPC['coordinates'];

			$data['details']=html_entity_decode($_GPC['details']);


			$data2['xyh_money']=$_GPC['xyh_money'];
			$data2['xyh_open']=$_GPC['xyh_open'];
			$data2['top_style']=1;
			$data2['info_style']=1;
			$data['staff_money']=$_GPC['staff_money'];
			$data['coupon_money']=$_GPC['coupon_money'];
			$res = pdo_update('cjdc_store', $data, array('id' => $storeid));
			 $res2 =pdo_update('cjdc_storeset', $data2, array('store_id' => $storeid));
			if($res || $res2){
				message('编辑成功',$this->createWebUrl2('dlstoreinfo',array()),'success');
			}else{
				message('编辑失败','','error');
			}
		}




function storecode($storeid){
	function  getCoade($storeid){
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
			function set_msg($storeid){
				$access_token = getaccess_token();
				$data2=array(
					"scene"=>$storeid,
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
			$img=set_msg($storeid);
			$img=base64_encode($img);
			return $img;
		}
	
		
    $base64_image_content = "data:image/jpeg;base64," . getCoade($storeid);
		if (preg_match('/^(data:\s*image\/(\w+);base64,)/', $base64_image_content, $result)) {
			$type = $result[2];
			$new_file = IA_ROOT . "/addons/zh_cjdianc/storeimgs/";
			if (!file_exists($new_file)) {
				//检查是否有该文件夹，如果没有就创建，并给予最高权限
				mkdir($new_file, 0777);
			}
			$wname = "{$storeid}" . ".{$type}";
			//$wname="1511.jpeg";
			$new_file = $new_file . $wname;
			file_put_contents($new_file, base64_decode(str_replace($result[1], '', $base64_image_content)));
		}
		return  "https://huanyucanguan.com/addons/zh_cjdianc/storeimgs/" . $wname;
}

		

		$img2=storecode($storeid);
		// /print_r($img);die;
include $this->template('web/dlstoreinfo');