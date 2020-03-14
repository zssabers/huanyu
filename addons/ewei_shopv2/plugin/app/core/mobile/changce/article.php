<?php
if (!defined('IN_IA')) {
	exit('Access Denied');
}
require EWEI_SHOPV2_PLUGIN . 'app/core/page_mobile.php';
class Article_EweiShopV2Page extends AppMobilePage
{		
	public function get_list()
	{
		global $_W;
		global $_GPC;
		$page = intval($_GPC['page']);
		$article_sys = pdo_fetch('select * from' . tablename('ewei_shop_article_sys') . 'where uniacid=:uniacid', array(':uniacid' => $_W['uniacid']));
		$cates = pdo_fetchall('select * from' . tablename('ewei_shop_article_category') . 'where uniacid=:uniacid', array(':uniacid' => $_W['uniacid']));
		$article_sys['article_image'] = tomedia($article_sys['article_image']);
		$commission = pdo_fetch('select * from' . tablename('ewei_shop_commission_level') . 'where id=7 and uniacid=:uniacid', array(':uniacid' => $_W['uniacid']));
		$pindex = max(1, $page);
		$psize = empty($article_sys['article_shownum']) ? '20' : $article_sys['article_shownum'];

		if ($article_sys['article_temp'] == 0) {
			$articles = pdo_fetchall('SELECT a.*,d.title,d.thumb as goodsimg,d.marketprice,d.productprice,d.nocommission FROM ' . tablename('ewei_shop_article') . ' a left join ' . tablename('ewei_shop_goods') . ' d on d.id = a.goods_id left join' . tablename('ewei_shop_article_category') . ' c on c.id=a.article_category  WHERE a.article_state=1 and article_visit=0 and c.isshow=1 and a.uniacid= :uniacid order by a.displayorder desc, a.article_date desc LIMIT ' . ($pindex - 1) * $psize . ',' . $psize, array(':uniacid' => $_W['uniacid']));
		}
		else if ($article_sys['article_temp'] == 1) {
			$articles = pdo_fetchall('SELECT distinct article_date_v FROM ' . tablename('ewei_shop_article') . ' a left join ' . tablename('ewei_shop_goods') . ' d on d.id = a.goods_id left join' . tablename('ewei_shop_article_category') . ' c on c.id=a.article_category WHERE a.article_state=1 and c.isshow=1 and a.uniacid=:uniacid order by a.article_date_v desc limit ' . (($pindex - 1) * $psize . ',' . $psize), array(':uniacid' => $_W['uniacid']), 'article_date_v');

			foreach ($articles as &$a) {
				$a['articles'] = pdo_fetchall('SELECT id,article_title,article_date_v,resp_img,resp_desc,article_date_v,resp_desc,article_category FROM ' . tablename('ewei_shop_article') . ' WHERE article_state=1 and uniacid=:uniacid and article_date_v=:article_date_v order by article_date desc ', array(':uniacid' => $_W['uniacid'], ':article_date_v' => $a['article_date_v']));
			}

			unset($a);
		}
		else {
			if ($article_sys['article_temp'] == 2) {
				$cate = intval($_GPC['cateid']);
				$where = '';

				if ($cate > 0 ) {
					$where = ' and article_category=' . $cate . ' ';
				}

				$articles = pdo_fetchall('SELECT a.*,d.title,d.thumb as goodsimg,d.marketprice,d.productprice,d.nocommission FROM ' . tablename('ewei_shop_article') . ' a left join ' . tablename('ewei_shop_goods') . ' d on d.id = a.goods_id left join' . tablename('ewei_shop_article_category') . ' c on c.id=a.article_category WHERE a.article_state=1 and c.isshow=1 and a.uniacid=:uniacid ' . $where . ' order by a.displayorder desc, a.article_date_v desc limit ' . (($pindex - 1) * $psize . ',' . $psize), array(':uniacid' => $_W['uniacid']));
			}
		}
		
		foreach($articles as $v=>$key){
			$thumbs = iunserializer($key["thumb_url"]);
			if( empty($thumbs) ) 
			{
				$thumbs = array( $key["thumb"] );
			}
			$articlese[$v]=$key;
			$articlese[$v]['commission'] = $key['marketprice'] * (2 / 100);
			$articlese[$v]['thumbs']=set_medias($thumbs);
			$articlese[$v]["thumbMaxWidth"] = 150;
			$articlese[$v]["thumbMaxHeight"] = 150;
			if( !empty($articlese[$v]["thumbs"]) && is_array($articlese[$v]["thumbs"]) ) 
			{
				$new_thumbs = array( );
				foreach( $articlese[$v]["thumbs"] as $i => $thumb ) 
				{
					$new_thumbs[] = $thumb;
				}
				$articlese[$v]["thumbs"] = $new_thumbs;
			}
		}
			$banner = pdo_fetchall('select * from' . tablename('ewei_shop_articleadv') . 'where uniacid=:uniacid and enabled=1 order by displayorder desc', array(':uniacid' => $_W['uniacid']));
			app_json(array('article_sys' => $article_sys,'list'=>$articlese, 'total' => intval($total), 'pagesize' => intval($psize), 'cates'=>$cates,'banner'=>$banner));
	}
	
	public function get_detail(){
		global $_W;
		global $_GPC;
		$aid = intval($_GPC["aid"]);
		$openid = $_W["openid"];
		if( !empty($openid) ) 
		{
			$followed = m("user")->followed($openid);
		}
		if( empty($aid) ) 
		{
			exit( "url参数错误！" );
		}
		$article = pdo_fetch("SELECT * FROM " . tablename("ewei_shop_article") . " WHERE id=:aid and article_state=1 and uniacid=:uniacid limit 1 ", array( ":aid" => $aid, ":uniacid" => $_W["uniacid"] ));
		pdo_update("ewei_shop_article","article_readnum=article_readnum+1",array("id"=>$aid));
		$thumbs = iunserializer($article["thumb_url"]);
		$article['thumbs']=set_medias($thumbs);
		$new_thumbs = array( );
		foreach( $article["thumbs"] as $i => $thumb ) 
				{
					$new_thumbs[] = $thumb;
				}
		$article["thumbs"] = $new_thumbs;
		
		app_json(array('article' => $article));
	}
	
	public function like() 
	{
		global $_W;
		global $_GPC;
		$aid = intval($_GPC["aid"]);
		$openid = $_W["openid"];
		if( !empty($aid) && !empty($openid) ) 
		{	
				
			$state = pdo_fetch("SELECT * FROM " . tablename("ewei_shop_article_log") . " WHERE openid=:openid and aid=:aid and uniacid=:uniacid", array( ":openid" => $_W["openid"], ":aid" => $aid, ":uniacid" => $_W["uniacid"] ));
			if($state){
				if($state['like']==1){
				pdo_update("ewei_shop_article", "article_likenum=article_likenum-1", array( "id" => $aid ));
				pdo_update("ewei_shop_article_log", array( "like" =>0 ), array( "id" => $state["id"],"openid"=>$openid));
				show_json(0, array( "status" => 0 ));
				}else{
				pdo_update("ewei_shop_article", "article_likenum=article_likenum+1", array( "id" => $aid ));
				pdo_update("ewei_shop_article_log", array( "like" =>1 ), array( "id" => $state["id"],"openid"=>$openid));
				show_json(1, array( "status" =>1 ));
				}
				
			}else{
				pdo_update("ewei_shop_article", "article_likenum=article_likenum+1", array( "id" => $aid ));
				pdo_insert("ewei_shop_article_log",array("aid"=>$aid,"read"=>1,"like"=>1,"openid"=>$openid,"uniacid"=>$_W["uniacid"]));
				show_json(1, array( "status" => 1 ));
			}
		}
	}
}

?>
