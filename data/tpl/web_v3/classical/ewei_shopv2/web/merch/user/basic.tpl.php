<?php defined('IN_IA') or exit('Access Denied');?>
<div class="form-group">
    <label class="col-lg control-label must">商户名称</label>
    <div class="col-sm-8">
        <?php if( ce('merch.user' ,$item) ) { ?>
        <input type="text" class="form-control" name="merchname" value="<?php  echo $item['merchname'];?>" data-rule-required="true"/>
        <?php  } else { ?>
        <div class="form-control-static"><?php  echo $item['merchname'];?></div>
        <?php  } ?>
    </div>
</div>

<?php  if(!empty($member)) { ?>
<div class="form-group">
    <label class="col-lg control-label">昵称</label>
    <div class="col-sm-8">
        <div class="form-control-static"><a target="_blank" href="<?php  echo webUrl('member/list/detail',array('id'=>$member['id']))?>"> <?php  echo $member['nickname'];?></a></div>
    </div>
</div>

<div class="form-group">
    <label class="col-lg control-label">openid</label>
    <div class="col-sm-8">
        <div class="form-control-static"><?php  echo $item['openid'];?></div>
    </div>
</div>
<?php  } ?>

<div class="form-group">
    <label class="col-lg control-label">商户logo</label>
    <div class="col-sm-9 col-xs-12">
        <?php if(cv('merch.user.edit')) { ?>
        <?php  echo tpl_form_field_image2('logo',$item['logo'],'../addons/ewei_shopv2/static/images/nopic.jpg')?>
        <span class="help-block">商户logo 建议尺寸 300 * 300</span>
        <?php  } else { ?>
        <?php  if(empty($item['logo'])) { ?>
        <img src="../addons/ewei_shopv2/static/images/nopic.jpg" onerror="this.src='../addons/ewei_shopv2/static/images/nopic.jpg'; this.title='图片未找到.'" class="img-responsive img-thumbnail" width="150">
        <?php  } else { ?>
        <img src="<?php  echo tomedia($item['logo'])?>" onerror="this.src='../addons/ewei_shopv2/static/images/nopic.jpg'; this.title='图片未找到.'" class="img-responsive img-thumbnail" width="150">
        <?php  } ?>
        <?php  } ?>
    </div>
</div>

<div class="form-group">
    <label class="col-lg control-label must">主营项目</label>
    <div class="col-sm-8">
        <?php if( ce('merch.user' ,$item) ) { ?>
        <input type="text" class="form-control" name="salecate" value="<?php  echo $item['salecate'];?>" data-rule-required="true"/>
        <?php  } else { ?>
        <div class="form-control-static"><?php  echo $item['merchname'];?></div>
        <?php  } ?>
    </div>
</div>

<div class="form-group">
    <label class="col-lg control-label must">商户分类</label>
    <div class="col-sm-8">
        <?php if( ce('merch.user' ,$item) ) { ?>
        <select class="form-control" name="cateid" required>
            <?php  if(is_array($category)) { foreach($category as $c) { ?>
            <option value="<?php  echo $c['id'];?>" <?php  if($item['cateid']==$c['id']) { ?>selected<?php  } ?>><?php  echo $c['catename'];?></option>
            <?php  } } ?>
        </select>

        <?php  } else { ?>
        <div class="form-control-static">
            <?php  if(is_array($category)) { foreach($category as $c) { ?>
            <?php  if($item['cateid']==$c['id']) { ?><?php  echo $c['catename'];?><?php  } ?>
            <?php  } } ?>
        </div>
        <?php  } ?>
    </div>
</div>

<div class="form-group">
    <label class="col-lg control-label must">联系人</label>
    <div class="col-sm-8">
        <?php if( ce('merch.user' ,$item) ) { ?>
        <input type="text" class="form-control" name="realname" value="<?php  echo $item['realname'];?>" data-rule-required="true"/>
        <?php  } else { ?>
        <div class="form-control-static"><?php  echo $item['realname'];?></div>
        <?php  } ?>
    </div>
</div>
<div class="form-group">
    <label class="col-lg control-label must">联系电话</label>
    <div class="col-sm-8">
        <?php if( ce('merch.user' ,$item) ) { ?>
        <input type="tel" class="form-control" name="mobile" value="<?php  echo $item['mobile'];?>" data-rule-required="true"/>
        <?php  } else { ?>
        <div class="form-control-static"><?php  echo $item['mobile'];?></div>
        <?php  } ?>
    </div>
</div>

<div class="form-group">
    <label class="col-lg control-label">商户简介</label>
    <div class="col-sm-8">
        <?php if( ce('merch.user' ,$item) ) { ?>
        <textarea name="desc1" class="form-control textarea"><?php  echo $item['desc'];?></textarea>
        <?php  } else { ?>
        <div class="form-control-static"><?php  echo $item['desc'];?></div>
        <?php  } ?>
    </div>
</div>

<div class="form-group">
    <label class="col-lg control-label">商户地址</label>
    <div class="col-sm-9 col-xs-12">
        <?php if( ce('merch.user' ,$item) ) { ?>
        <input type="text" name="address" class="form-control" value="<?php  echo $item['address'];?>" />
        <?php  } else { ?>
        <div class='form-control-static'><?php  echo $item['address'];?></div>
        <?php  } ?>
    </div>
</div>

<div class="form-group">
    <label class="col-lg control-label">商户电话</label>
    <div class="col-sm-9 col-xs-12">
        <?php if( ce('merch.user' ,$item) ) { ?>
        <input type="text" name="tel" class="form-control" value="<?php  echo $item['tel'];?>" />
        <?php  } else { ?>
        <div class='form-control-static'><?php  echo $item['tel'];?></div>
        <?php  } ?>
    </div>
</div>

<div class="form-group">
    <label class="col-lg control-label">商户位置</label>
    <div class="col-sm-9 col-xs-12">
        <?php if( ce('merch.user' ,$item) ) { ?>
        <?php  echo tpl_form_field_position('map',array('lng'=>$item['lng'],'lat'=>$item['lat']))?>
        <?php  } else { ?>
        <div class='form-control-static'>lng=<?php  echo $item['lng'];?>,lat=<?php  echo $item['lat'];?></div>
        <?php  } ?>
    </div>
</div>

<div class="form-group">
    <label class="col-lg control-label">是否推荐</label>
    <div class="col-sm-9 col-xs-12">
        <?php if( ce('merch.user' ,$item) ) { ?>
        <label class="radio-inline">
            <input type="radio" name='isrecommand' value="1" <?php  if($item['isrecommand']==1) { ?>checked<?php  } ?> /> 是
        </label>
        <label class="radio-inline">
            <input type="radio" name='isrecommand' value="0" <?php  if(empty($item['isrecommand'])) { ?>checked<?php  } ?> /> 否
        </label>
        <?php  } else { ?>
        <div class='form-control-static'><?php  if(empty($item['isrecommand'])) { ?>否<?php  } else { ?>是<?php  } ?></div>
        <?php  } ?>
    </div>
</div>

<?php  if($diyform_flag) { ?>
<div class="form-group-title">追加资料</div>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('diyform/diyform_input', TEMPLATE_INCLUDEPATH)) : (include template('diyform/diyform_input', TEMPLATE_INCLUDEPATH));?>
<?php  } else { ?>
<?php  } ?>

<div class="form-group-title">帐号信息</div>

<div class="form-group">
    <label class="col-lg control-label">主账户名</label>
    <div class="col-sm-8">
        <?php if( ce('merch.user' ,$item) ) { ?>
        <input type="text" class="form-control" name="username" value="<?php  if(!empty($account['username'])) { ?><?php  echo $account['username'];?><?php  } else { ?><?php  echo $show_name;?><?php  } ?>" />
        <?php  } else { ?>
        <div class="form-control-static"><?php  echo $item['username'];?></div>
        <?php  } ?>
    </div>
</div>
<div class="form-group">
    <label class="col-lg control-label">主账户密码</label>
    <div class="col-sm-8">
        <?php if( ce('merch.user' ,$item) ) { ?>
        <input type="text" class="form-control" name="pwd" value="<?php  if(!empty($account['pwd'])) { ?><?php  } else { ?><?php  echo $show_pass;?><?php  } ?>"/>
        <?php  } else { ?>
        <div class="form-control-static">******</div>
        <?php  } ?>
    </div>
</div>
<div class="form-group">
    <label class="col-lg control-label">子账户数量</label>
    <div class="col-sm-8">
        <?php if( ce('merch.user' ,$item) ) { ?>
        <input type="num" class="form-control" name="accounttotal" value="<?php  echo $item['accounttotal'];?>"/>
        <span class="help-block">商户可以创建的子管理帐号个数，默认不能创建</span>
        <?php  } else { ?>
        <div class="form-control-static"><?php  echo $item['accounttotal'];?> 个子账户</div>
        <?php  } ?>
    </div>
</div>

<div class="form-group">
    <label class="col-lg control-label">商品数量</label>
    <div class="col-sm-8">
        <?php if( ce('merch.user' ,$item) ) { ?>
        <input type="num" class="form-control" name="maxgoods" value="<?php  echo $item['maxgoods'];?>"/>
        <span class="help-block">商户可以创建的商品个数</span>
        <?php  } else { ?>
        <div class="form-control-static"><?php  echo $item['maxgoods'];?> 个子账户</div>
        <?php  } ?>
    </div>
</div>
<div class="form-group">
    <label class="col-lg control-label">服务到期时间</label>
    <div class="col-sm-8">
        <?php if( ce('merch.user' ,$item) ) { ?>
        <?php  echo tpl_form_field_date('accounttime',$accounttime)?>
        <span class="help-block">商户账户有效期限</span>
        <?php  } else { ?>
        <div class="form-control-static"><?php  echo date('Y-m-d',$accounttime)?> 到期</div>
        <?php  } ?>
    </div>
</div>

<div class="form-group-title">商户权限组</div>
<div class="form-group">
    <label class="col-lg control-label must">商户组</label>
    <div class="col-sm-8">
        <?php if( ce('merch.user' ,$item) ) { ?>
        <select class="form-control" name="groupid" required>
            <?php  if(is_array($groups)) { foreach($groups as $g) { ?>
            <option value="<?php  echo $g['id'];?>" <?php  if($item['groupid']==$g['id']) { ?>selected<?php  } ?>><?php  echo $g['groupname'];?></option>
            <?php  } } ?>
        </select>

        <?php  } else { ?>
        <div class="form-control-static">
            <?php  if(is_array($groups)) { foreach($groups as $g) { ?>
               <?php  if($item['groupid']==$g['id']) { ?><?php  echo $g['groupname'];?><?php  } ?>
            <?php  } } ?>
        </div>
        <?php  } ?>
    </div>
</div>

<div class="form-group-title">商户备注</div>
<div class="form-group">
    <label class="col-lg control-label">商户备注</label>
    <div class="col-sm-8">
        <?php if( ce('merch.user' ,$item) ) { ?>
        <textarea name="remark" class="form-control textarea"><?php  echo $item['remark'];?></textarea>
        <?php  } else { ?>
        <div class="form-control-static"><?php  echo $item['remark'];?></div>
        <?php  } ?>
    </div>
</div>
<div class="form-group-title">入驻状态</div>
<div class="form-group">
    <label class="col-lg control-label">状态</label>
    <div class="col-sm-8">
        <?php if( ce('merch.user' ,$item) ) { ?>
        <?php  if(!empty($item) && $item['status']<=0) { ?>
        <label class="radio-inline">
            <input type="radio" name="status" value="0" <?php  if($item['status']==0) { ?>checked<?php  } ?> /> 待入驻
        </label>
        <?php  } ?>

        <label class="radio-inline">
            <input type="radio" name="status" value="1" <?php  if($item['status']==1) { ?>checked<?php  } ?> />允许入驻
        </label>
        <label class="radio-inline">
            <input type="radio" name="status" value="2" <?php  if($item['status']==2) { ?>checked<?php  } ?>/> 暂停中
        </label>
        <?php  } else { ?>
        <div class="form-control-static">
            <?php  if($item['status']==0) { ?>
            待入驻
            <?php  } else if($item['stauts']==1) { ?>
            允许入驻
            <?php  } else if($item['stauts']==2) { ?>
            暂停中
            <?php  } ?>
        </div>
        <?php  } ?>
    </div>
</div>

<div class="form-group-title">商户结算</div>
<div class="form-group">
    <label class="col-lg control-label">兑换比例</label>
    <div class="col-sm-8">
        <?php if( ce('merch.user' ,$item) ) { ?>
        <div class="input-group">
            <input type="text" class="form-control" name="payrate" value="<?php  echo $item['payrate'];?>" /><span class="input-group-addon">%</span>
        </div>
        <?php  } else { ?>
        <div class="form-control-static"><?php  echo $item['payrate'];?></div>
        <?php  } ?>
    </div>
</div>

<div class="form-group">
    <label class="col-lg control-label must">收款人</label>
    <div class="col-sm-8">
        <?php if( ce('merch.user' ,$item) ) { ?>
        <?php  echo tpl_selector('payopenid',array('required'=>false,'preview'=>false,'key'=>'openid','text'=>'nickname','type'=>'text','placeholder'=>'昵称/姓名/手机号','buttontext'=>'选择收款人 ', 'items'=>$user,'url'=>webUrl('member/query') ))?>
        <?php  } else { ?>
        <div class="form-control-static"><?php  echo $item['payopenid'];?></div>
        <?php  } ?>
    </div>
</div>

<div class="form-group-title">多商户积分商城积分订单提现</div>
<div class="form-group">
    <label class="col-lg control-label">积分商城提现</label>
    <div class="col-sm-8">
        <div class="input-group">
            <label class="radio-inline">
                <input type="radio" name="iscredit" value="0" <?php  if(empty($item['iscredit'])) { ?>checked<?php  } ?> /> 开启
            </label>
            <label class="radio-inline">
                <input type="radio" name="iscredit" value="1" <?php  if(!empty($item['iscredit'])) { ?>checked<?php  } ?> />禁用
            </label>
        </div>
        <span class="help-block">如果开启积分商城提现功能，商户积分商城的订单将可以通过余额进行提现。</span>
    </div>
</div>
<div class="form-group">
    <label class="col-lg control-label">积分兑换</label>
    <div class="col-sm-8">
        <div class="input-group">
            <label class="radio-inline">
                <input type="radio" name="iscreditmoney" value="0" <?php  if(empty($item['iscreditmoney'])) { ?>checked<?php  } ?> /> 开启
            </label>
            <label class="radio-inline">
                <input type="radio" name="iscreditmoney" value="1" <?php  if(!empty($item['iscreditmoney'])) { ?>checked<?php  } ?> />禁用
            </label>
        </div>
        <span class="help-block">如果开启积分兑换功能，商户积分商城的订单中的积分将可以通过积分兑换余额进行提现。</span>
    </div>
</div>


<!--    -->
<div id="seecredit">
<div class="form-group">
    <label class="col-lg control-label">兑换比例</label>
    <div class="col-sm-8">
        <?php if( ce('merch.user' ,$item) ) { ?>
        <div class="input-group">
            <input type="text" class="form-control" name="creditrate" value="<?php  echo $item['creditrate'];?>" /><span class="input-group-addon">积分：1元</span>
        </div>
        <?php  } else { ?>
        <div class="form-control-static"><?php  echo $item['creditrate'];?></div>
        <?php  } ?>
    </div>
</div>

<div class="form-group">
    <label class="col-lg control-label must">收款人</label>
    <div class="col-sm-8">
        <div class="form-control-static">与商户结算收款人为同一人</div>
    </div>
</div>
</div>