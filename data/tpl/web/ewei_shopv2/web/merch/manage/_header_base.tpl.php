<?php defined('IN_IA') or exit('Access Denied');?><?php  $copyright = m('common')->getCopyright(true)?>
<!DOCTYPE html>
<html lang="zh-cn">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title></title>
        <link rel="shortcut icon" href="<?php  echo $_W['siteroot'];?><?php  echo $_W['config']['upload']['attachdir'];?>/<?php  if(!empty($_W['setting']['copyright']['icon'])) { ?><?php  echo $_W['setting']['copyright']['icon'];?><?php  } else { ?>images/global/wechat.jpg<?php  } ?>" />
        <link href="<?php  echo EWEI_SHOPV2_LOCAL?>static/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
        <link href="<?php  echo EWEI_SHOPV2_LOCAL?>static/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">
        <link href="<?php  echo EWEI_SHOPV2_LOCAL?>static/css/animate.css" rel="stylesheet">
        <link href="<?php  echo EWEI_SHOPV2_LOCAL?>static/css/v2.css?v=4.1.0" rel="stylesheet">
        <link href="<?php  echo EWEI_SHOPV2_LOCAL?>static/css/common.css?v=2.0.0" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="//at.alicdn.com/t/font_1460799380_9653542.css">
        <script src="./resource/js/lib/jquery-1.11.1.min.js"></script>
        <script src="<?php  echo EWEI_SHOPV2_LOCAL?>static/js/dist/jquery/jquery.gcjs.js"></script>
        <script src="./resource/js/app/util.js"></script>

        <script>
            window.sysinfo = {
            <?php  if(!empty($_W['uniacid'])) { ?>'uniacid': '<?php  echo $_W['uniacid'];?>',<?php  } ?>
            <?php  if(!empty($_W['acid'])) { ?>'acid': '<?php  echo $_W['acid'];?>',<?php  } ?>
            <?php  if(!empty($_W['openid'])) { ?>'openid': '<?php  echo $_W['openid'];?>',<?php  } ?>
            <?php  if(!empty($_W['uid'])) { ?>'uid': '<?php  echo $_W['uid'];?>',<?php  } ?>
            'isfounder': <?php  if(!empty($_W['isfounder'])) { ?>1<?php  } else { ?>0<?php  } ?>,
            'siteroot': '<?php  echo $_W['siteroot'];?>',
                    'siteurl': '<?php  echo $_W['siteurl'];?>',
                    'attachurl': '<?php  echo $_W['attachurl'];?>',
                    'attachurl_local': '<?php  echo $_W['attachurl_local'];?>',
                    'attachurl_remote': '<?php  echo $_W['attachurl_remote'];?>',
                    'module' : {'url' : '<?php  if(defined('MODULE_URL')) { ?><?php echo MODULE_URL;?><?php  } ?>', 'name' : '<?php  if(defined('IN_MODULE')) { ?><?php echo IN_MODULE;?><?php  } ?>'},
            'cookie' : {'pre': '<?php  echo $_W['config']['cookie']['pre'];?>'},
            'account' : <?php  echo json_encode($_W['account'])?>,
            };
        </script>

        <!-- 兼容微擎1.5.3 -->
        <?php  if(IMS_VERSION >= 1.5) { ?>
        <link href="<?php  echo EWEI_SHOPV2_LOCAL?>static/css/we7.common.css?v=1.0.0" rel="stylesheet">
        <script type="text/javascript" src="./resource/js/lib/bootstrap.min.js"></script>
        <script type="text/javascript" src="./resource/js/app/common.min.js?v=20170802"></script>
        <script type="text/javascript">if(util){util.clip = function(){}}</script>
        <?php  } ?>


        <script src="<?php  echo EWEI_SHOPV2_LOCAL?>static/js/require.js"></script>


        <!--<script src="./resource/js/app/config.js"></script>-->
        <?php  if(IMS_VERSION > 0.8 && IMS_VERSION != '1.0.0') { ?>
        <script src="<?php  echo EWEI_SHOPV2_LOCAL?>static/js/config1.0.js"></script>
        <?php  } else { ?>
        <script src="./resource/js/app/config.js"></script>
        <?php  } ?>

        <script>
            require.config({
                waitSeconds: 0
            });
        </script>

        <script src="<?php  echo EWEI_SHOPV2_LOCAL?>static/js/myconfig.js?2017515"></script>
        <script>myconfig.path=  '../addons/ewei_shopv2/static/js/';</script>
        <script type="text/javascript">
                if (navigator.appName == 'Microsoft Internet Explorer') {
                    if (navigator.userAgent.indexOf("MSIE 5.0") > 0 || navigator.userAgent.indexOf("MSIE 6.0") > 0 || navigator.userAgent.indexOf("MSIE 7.0") > 0) {
                        alert('您使用的 IE 浏览器版本过低, 推荐使用 Chrome 浏览器或 IE8 及以上版本浏览器.');
                    }
                }
                myrequire.systemVersion = '<?php  echo IMS_VERSION?>';
        </script>
</head>
