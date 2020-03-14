<?php
global $_GPC, $_W;
$action = 'start';
$uid=$_COOKIE["uid"];
$storeid=$_COOKIE["storeid"];
$cur_store = $this->getStoreById($storeid);
$GLOBALS['frames'] = $this->getNaveMenu($storeid, $action,$uid);
$operation = !empty($_GPC['op']) ? $_GPC['op'] : 'display';
$system=pdo_get('cjdc_system',array('uniacid'=>$_W['uniacid']),array('is_wx','is_yhk'));
$type=isset($_GPC['type'])?$_GPC['type']:'today';
$pageindex = max(1, intval($_GPC['page']));
$pagesize=10;
//$sys=pdo_get('cjdc_system',array('uniacid'=>$_W['uniacid']),array('is_wx','is_yhk'));
$data[':uniacid']=$_W['uniacid'];
$data[':store_id']=$storeid;
//获取商家手续费
$list4=$this->storePoundage($storeid);
$where=" where a.uniacid=:uniacid and a.type=1 and a.store_id=:store_id and a.pay_type in (1,2,5) and a.state in (4,5,10)" ;
//总数统计
$sql2="select sum(money) as 'total_money',sum(ps_money) as ps_money,sum(ptps_money) as ptps_money,sum(commission) as commission,sum(yycommission) as yycommission,sum(fwycommission) as fwycommission from" . tablename("cjdc_order") ." as a".$where;
$list2=pdo_fetch($sql2,$data);
//店内订单金额统计
$dnwmcost=pdo_get('cjdc_order', array('store_id'=>$storeid,'dn_state '=>2,'pay_type'=>array(1,2,5),'type'=>2), array('sum(money) as total_money','sum(commission) as commission','sum(yycommission) as yycommission','sum(fwycommission) as fwycommission'));
//当面付订单金额统计
$dmcost=pdo_get('cjdc_order', array('store_id'=>$storeid,'dm_state '=>2,'pay_type'=>array(1,2,5),'type'=>4), array('sum(money) as total_money','sum(commission) as commission','sum(yycommission) as yycommission','sum(fwycommission) as fwycommission'));
//预约订单金额
$yycost=pdo_get('cjdc_order', array('store_id'=>$storeid,'yy_state '=>3,'pay_type'=>array(1,2,5),'type'=>3), array('sum(money) as total_money','sum(commission) as commission','sum(yycommission) as yycommission','sum(fwycommission) as fwycommission'));
//已申请金额
$total=pdo_get('cjdc_withdrawal', array('store_id'=>$storeid,'state '=>1), array('sum(tx_cost) as tx_cost'));
//已提现金额
$total2=pdo_get('cjdc_withdrawal', array('store_id'=>$storeid,'state '=>2), array('sum(tx_cost) as tx_cost'));
//运费服务费
$sys=pdo_get('cjdc_store',array('id'=>$storeid));

$ps_money=number_format($list2['ps_money']*$sys['ps_poundage']/100,1);
//抢购金额
$qg_money=pdo_get('cjdc_qgorder', array('store_id'=>$storeid,'state'=>array(2,3)), array('sum(money) as total_money'));
//拼团金额
$pt_money=pdo_get('cjdc_grouporder', array('store_id'=>$storeid,'state'=>array(3,5)), array('sum(money) as total_money'));
$tuan=$qg_money['total_money']+$pt_money['total_money']-$list4['dn_poundage']*($qg_money['total_money']+$pt_money['total_money'])/100;

//可提现金额
$commission = $list2['ptps_money']+$list2['commission']+$list2['yycommission']+$list2['fwycommission']+$dnwmcost['commission']+$dnwmcost['yycommission']+$dnwmcost['fwycommission']+$dmcost['commission']+$dmcost['yycommission']+$dmcost['fwycommission']+$yycost['commission']+$yycost['yycommission']+$yycost['fwycommission'];
$ktxcost=number_format(($list2['total_money']+$dnwmcost['total_money']+$dmcost['total_money']+$yycost['total_money'])-$commission-$total['tx_cost']-$total2['tx_cost']-$ps_money+$tuan,2);

$shytx='0.00';
$shtxz='0.00';
if($total2['tx_cost']){
    $shytx=$total2['tx_cost'];
}
if($total['tx_cost']){
    $shtxz=$total['tx_cost'];
}


//未入账
$sql3="select sum(money) as 'total_money',sum(ps_money) as ps_money,sum(ptps_money) as ptps_money,sum(yhq_money2) as hb_money,sum(commission) as commission,sum(yycommission) as yycommission,sum(fwycommission) as fwycommission from" . tablename("cjdc_order") ." where  type=1 and store_id={$storeid} and pay_type in (1,2,5) and state in (2,3,8)";
$list3=pdo_fetch($sql3,$data);
$commissionwrz = $list3['commission']+$list3['yycommission']+$list3['fwycommission'];
$drzyycost=pdo_get('cjdc_order', array('store_id'=>$storeid,'yy_state '=>2,'pay_type'=>1,'type'=>3), array('sum(money) as total_money'));
$wrz_money=$list3['total_money']+$list3['yhq_money2']+$drzyycost['total_money']-$commissionwrz-$list3['ptps_money']-(($list3['ps_money']+($sys['ps_poundage']/100*$item['ps_money'])+($drzyycost['total_money']*($list4['yd_poundage']+$list4['tg_ydpoundage'])/100)));

$where2=" where a.store_id={$storeid} ";
if($_GPC['time']){
 $start=strtotime($_GPC['time']['start']);
  $end=strtotime($_GPC['time']['end']);
  $where2.=" and UNIX_TIMESTAMP(a.time) >='{$start}' and UNIX_TIMESTAMP(a.time)<='{$end}'";
}

//提现记录
$sql="SELECT a.*,b.name,b.user_id FROM ".tablename('cjdc_withdrawal') .  " a"  . " left join " . tablename("cjdc_store") . " b on a.store_id=b.id".$where2." ORDER BY a.time DESC";
$total=pdo_fetchcolumn("SELECT count(*) FROM ".tablename('cjdc_withdrawal') .  " a"  . " left join " . tablename("cjdc_store") . " b on a.store_id=b.id ".$where2);
$list=pdo_fetchall($sql);
$select_sql =$sql." LIMIT " .($pageindex - 1) * $pagesize.",".$pagesize;
$list=pdo_fetchall($select_sql,$data);
$pager = pagination($total, $pageindex, $pagesize);

if(checksubmit('submit2')){
  $poundage = $_GPC['tx_cost']*(($list4['tg_poundage']+$list4['poundage'])/100);
  $sjcost = $_GPC['tx_cost']-$poundage;
  $data2['name']=$_GPC['name'];
  $data2['type']=$_GPC['orderby'];
  $data2['time']=date('Y-m-d H:i:s');
  $data2['state']=1;
  $data2['type']=$_GPC['is_brand'];
  $data2['tx_cost']=$_GPC['tx_cost'];
  $data2['sj_cost']=$sjcost;
  $data2['store_id']=$storeid;
  $data2['uniacid']=$_W['uniacid'];
  $data2['yhk_num']=$_GPC['yhk_num'];
  $data2['tel']=$_GPC['tel'];
  $data2['yh_info']=$_GPC['yh_info'];
  $res=pdo_insert('cjdc_withdrawal',$data2);
  if($res){
   message('申请成功！', $this->createWebUrl2('dlfinance'), 'success');
 }else{
   message('申请失败！','','error');
 }


}
if($operation=='adopt'){//审核通过

    $id=$_GPC['id'];
    $list=pdo_get('cjdc_withdrawal',array('id'=>$_GPC['id']));
    $user=pdo_get('cjdc_user',array('id'=>$list['user_id']));
    $res=pdo_update('cjdc_withdrawal',array('state'=>2,'sh_time'=>date('Y-m-d H:i:s')),array('id'=>$id));  
    if($res){
        message('审核成功',$this->createWebUrl('finance',array()),'success');
    }else{
        message('审核失败','','error');
    }
  
}


if($operation=='adopt2'){
    $id=$_GPC['id'];
    $list=pdo_get('cjdc_withdrawal',array('id'=>$_GPC['id']));
    $store=pdo_get('cjdc_store',array('id'=>$list['store_id']));
    $user=pdo_get('cjdc_user',array('id'=>$store['user_id']));

////////////////打款//////////////////////
function arraytoxml($data){
        $str='<xml>';
        foreach($data as $k=>$v) {
            $str.='<'.$k.'>'.$v.'</'.$k.'>';
        }
        $str.='</xml>';
        return $str;
    }
    function xmltoarray($xml) { 
        //禁止引用外部xml实体 
        libxml_disable_entity_loader(true); 
        $xmlstring = simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA); 
        $val = json_decode(json_encode($xmlstring),true); 
        return $val;
    } 
    function curl($param="",$url) {
        global $_GPC, $_W;
        $postUrl = $url;
        $curlPost = $param;
        $ch = curl_init();                                      //初始化curl
        curl_setopt($ch, CURLOPT_URL,$postUrl);                 //抓取指定网页
        curl_setopt($ch, CURLOPT_HEADER, 0);                    //设置header
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);            //要求结果为字符串且输出到屏幕上
        curl_setopt($ch, CURLOPT_POST, 1);                      //post提交方式
        curl_setopt($ch, CURLOPT_POSTFIELDS, $curlPost);           // 增加 HTTP Header（头）里的字段 
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);        // 终止从服务端进行验证
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch,CURLOPT_SSLCERT,IA_ROOT . "/addons/zh_cjdianc/cert/".'apiclient_cert_' . $_W['uniacid'] . '.pem'); //这个是证书的位置绝对路径
        curl_setopt($ch,CURLOPT_SSLKEY,IA_ROOT . "/addons/zh_cjdianc/cert/".'apiclient_key_' . $_W['uniacid'] . '.pem'); //这个也是证书的位置绝对路径
        $data = curl_exec($ch);                                 //运行curl
        curl_close($ch);
        return $data;
    }  
    $system=pdo_get('cjdc_system',array('uniacid'=>$_W['uniacid']));
    $psystem=pdo_get('cjdc_pay',array('uniacid'=>$_W['uniacid']));
    $data=array(
        'mch_appid'=>$system['appid'],//商户账号appid
        'mchid'=>$psystem['mchid'],//商户号
        'nonce_str'=>rand(1111111111,9999999999),//随机字符串
        'partner_trade_no'=>time().rand(11111,99999),//商户订单号
        'openid'=>$user['openid'],//用户openid
        'check_name'=>'NO_CHECK',//校验用户姓名选项,
        're_user_name'=>$list['name'],//收款用户姓名
        'amount'=>$list['sj_cost']*100,//金额
        'desc'=>'提现打款',//企业付款描述信息
        'spbill_create_ip'=>$psystem['ip'],//Ip地址
    );
  
    $key=$psystem['wxkey'];///这个就是个API密码。32位的。。随便MD5一下就可以了
   // $key=md5($key);
 //var_dump($data);die;
    $data=array_filter($data);
    ksort($data);
    $str='';
    foreach($data as $k=>$v) {
        $str.=$k.'='.$v.'&';
    }
    $str.='key='.$key;
    $data['sign']=md5($str);
    $xml=arraytoxml($data);
    $url='https://api.mch.weixin.qq.com/mmpaymkttransfers/promotion/transfers';
    $res=curl($xml,$url);
    $return=xmltoarray($res);
    if($return['result_code']=='SUCCESS'){
      pdo_update('cjdc_withdrawal',array('state'=>2,'sh_time'=>time()),array('id'=>$id));
      message('审核成功',$this->createWebUrl('finance',array()),'success');
    }else{
        if($return['err_code_des']){
            $message=$return['err_code_des'];
        }else{
            $message='请检查证书是否上传正确!';
        }
      message($return['err_code_des'],'','error');
    }
    // print_r($return);
  
////////////////打款//////////////////////

}



if($operation=='reject'){
     $id=$_GPC['id'];
    $res=pdo_update('cjdc_withdrawal',array('state'=>3,'sh_time'=>date('Y-m-d H:i:s')),array('id'=>$id));
     if($res){
        message('拒绝成功',$this->createWebUrl('finance',array()),'success');
    }else{
        message('拒绝失败','','error');
    }
}

include $this->template('web/dlfinance');
