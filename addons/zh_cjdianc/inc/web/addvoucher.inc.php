<?php
global $_GPC, $_W;
$action = 'start';
$storeid=$_COOKIE["storeid"];
$uid=$_COOKIE["uid"];
$cur_store = $this->getStoreById($storeid);
$GLOBALS['frames'] = $this->getNaveMenu($storeid, $action,$uid);
$list = pdo_get('cjdc_cjhd',array('id'=>$_GPC['id']));
$hdsz = pdo_get('cjdc_hdsz',array('id'=>1));
$coupon = pdo_get('cjdc_coupons',array('id'=>$list['coupon_id']));
		if(checksubmit('submit')){
				if(!$_GPC['czname']){
					message('请填写套餐名称!','','error'); 
				}
				if(!$_GPC['name']){
					message('请填写优惠券名称!','','error'); 
				}
				if(!$_GPC['full']){
					message('请填写优惠条件!','','error'); 
				}else if($_GPC['full']<$hdsz['yhq_full']){
					
				}
				if(!$_GPC['reduce']){
					message('请填写优惠金额!','','error'); 
				}else if($_GPC['reduce']<$hdsz['yhq_reduce']){
					message('优惠金额不得低于'.$hdsz['yhq_reduce'],'','error'); 
				}
				if(!$_GPC['czjenum']){
					message('请填写充值金额!','','error'); 
				}else if($_GPC['czjenum']<$hdsz['zd_czjenum']){
					message('充值金额不得低于'.$hdsz['zd_czjenum'],'error'); 
				}
				if(!$_GPC['yhqnum']){
					message('请填写赠送优惠券数量!','','error'); 
				}else if($_GPC['yhqnum']<$hdsz['zd_yhqnum']){
					message('赠送优惠券数量不得低于'.$hdsz['zd_yhqnum'],'error'); 
				}
				 if(!$_GPC['des']){
					message('请填写充值描述!','','error'); 
				} 
				
				$data['name']=$_GPC['name'];
				$data['full']=$_GPC['full'];
				$data['reduce']=$_GPC['reduce'];
				$data['number']=999999999;
				$data['start_time']=$_GPC['time']['start'];
				$data['end_time']=$_GPC['time']['end'];
				$data['uniacid']=$_W['uniacid'];
				$data['type']=$_GPC['type'];
				$data['category']=3;
				$data['is_hd']=1;
				$data['commission']=$_GPC['commission'];
				$data['store_id']=$storeid;
				$data['instruction']=$_GPC['instruction'];
				if($_GPC['coupon_id']==''){
				$coupons = pdo_insert('cjdc_coupons',$data);
				$coupon_id = pdo_insertid();
				}else{
				pdo_update('cjdc_coupons', $data, array('id' => $_GPC['coupon_id']));
				}
				
				$data1['czname']=$_GPC['czname'];
				$data1['state']=$_GPC['state'];
				$data1['yhqnum']=$_GPC['yhqnum'];
				$data1['full']=$_GPC['full'];
				$data1['reduce']=$_GPC['reduce'];
				$data1['czjenum']=$_GPC['czjenum'];
				$data1['des']=$_GPC['des'];
				$data1['store_id']=$storeid;
				
				$data1['uniacid']=$_W['uniacid'];
				
			if($_GPC['id']==''){
				$data1['coupon_id']=$coupon_id;
				$res=pdo_insert('cjdc_cjhd',$data1);
				     
				if($res){
					message('添加成功',$this->createWebUrl2('voucher',array()),'success');
				}else{
					message('添加失败','','error');
				}
			}else{
				$res = pdo_update('cjdc_cjhd', $data1, array('id' => $_GPC['id']));
				if($res){
					message('编辑成功',$this->createWebUrl2('voucher',array()),'success');
				}else{
					message('编辑失败','','error');
				}
			}
		}
include $this->template('web/addvoucher');