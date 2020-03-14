<?php
global $_GPC, $_W;
$GLOBALS['frames'] = $this->getMainMenu();
$item=pdo_get('cjdc_hdsz',array('uniacid'=>$_W['uniacid']));
    if(checksubmit('submit')){        
            $data['hd_notice']=html_entity_decode($_GPC['hd_notice']);
			$data['hd_title']=$_GPC['hd_title'];
            $data['hd_state']=$_GPC['hd_state'];
			$data['zd_yhqnum']=$_GPC['zd_yhqnum'];
			$data['yhq_full']=$_GPC['yhq_full'];
			$data['yhq_reduce']=$_GPC['yhq_reduce'];
			$data['zd_czjenum']=$_GPC['zd_czjenum'];
            $data['uniacid']=$_W['uniacid'];          
            if($_GPC['id']==''){                
                $res=pdo_insert('cjdc_hdsz',$data);
                if($res){
                    message('添加成功',$this->createWebUrl('hdsz',array()),'success');
                }else{
                    message('添加失败','','error');
                }
            }else{
                $res = pdo_update('cjdc_hdsz', $data, array('id' => $_GPC['id']));
                if($res){
                    message('编辑成功',$this->createWebUrl('hdsz',array()),'success');
                }else{
                    message('编辑失败','','error');
                }
            }
        }
include $this->template('web/hdsz');