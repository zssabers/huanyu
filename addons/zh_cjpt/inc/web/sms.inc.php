<?php
global $_GPC, $_W;
// $action = 'ad';
// $title = $this->actions_titles[$action];
$GLOBALS['frames'] = $this->getMainMenu();
$item=pdo_get('cjpt_system',array('uniacid'=>$_W['uniacid']));
    if(checksubmit('submit')){
            $data['appkey']=trim($_GPC['appkey']);
            $data['tpl_id']=trim($_GPC['tpl_id']);
            $data['tpl_id2']=trim($_GPC['tpl_id2']);
            $data['tpl_id3']=trim($_GPC['tpl_id3']);
            $data['tpl_id4']=trim($_GPC['tpl_id4']);
            $data['is_dxyz']=$_GPC['is_dxyz'];
            $data['item']=$_GPC['item'];
            $data['aliyun_appkey']=trim($_GPC['aliyun_appkey']);
            $data['aliyun_appsecret']=trim($_GPC['aliyun_appsecret']);
            $data['aliyun_sign']=$_GPC['aliyun_sign'];
            $data['aliyun_id']=trim($_GPC['aliyun_id']);
            $data['aliyun_id2']=trim($_GPC['aliyun_id2']);
            $data['aliyun_id3']=trim($_GPC['aliyun_id3']);
            $data['aliyun_id4']=trim($_GPC['aliyun_id4']);
            $data['uniacid']=trim($_W['uniacid']);
            if($_GPC['id']==''){                
                $res=pdo_insert('cjpt_system',$data);
                if($res){
                    message('添加成功',$this->createWebUrl('sms',array()),'success');
                }else{
                    message('添加失败','','error');
                }
            }else{
                $res = pdo_update('cjpt_system', $data, array('id' => $_GPC['id']));
                if($res){
                    message('编辑成功',$this->createWebUrl('sms',array()),'success');
                }else{
                    message('编辑失败','','error');
                }
            }
        }
    include $this->template('web/sms');