<?php
defined('IN_IA') or exit('Access Denied');
$config = array();
$config['db']['master']['host'] = '127.0.0.1';
$config['db']['master']['username'] = 'root';
$config['db']['master']['password'] = 'huanyu123.';
$config['db']['master']['port'] = '3306';
$config['db']['master']['database'] = 'midian';
$config['db']['master']['charset'] = 'utf8';
$config['db']['master']['pconnect'] = 0;
$config['db']['master']['tablepre'] = 'ims_';
$config['db']['slave_status'] = false;
$config['db']['slave']['1']['host'] = '';
$config['db']['slave']['1']['username'] = '';
$config['db']['slave']['1']['password'] = '';
$config['db']['slave']['1']['port'] = '3307';
$config['db']['slave']['1']['database'] = '';
$config['db']['slave']['1']['charset'] = 'utf8';
$config['db']['slave']['1']['pconnect'] = 0;
$config['db']['slave']['1']['tablepre'] = 'ims_';
$config['db']['slave']['1']['weight'] = 0;
$config['db']['common']['slave_except_table'] = array('core_sessions');
$config['cookie']['pre'] = '53d5_';
$config['cookie']['domain'] = '';
$config['cookie']['path'] = '/';
$config['setting']['charset'] = 'utf-8';
$config['setting']['cache'] = 'redis';
$config['setting']['timezone'] = 'Asia/Shanghai';
$config['setting']['memory_limit'] = '256M';
$config['setting']['filemode'] = 0644;
$config['setting']['authkey'] = '28488d01';
$config['setting']['founder'] = '1';
$config['setting']['development'] = 0;
$config['setting']['referrer'] = 0;
$config['upload']['image']['extentions'] = array('gif', 'jpg', 'jpeg', 'png');
$config['upload']['image']['limit'] = 5000;
$config['upload']['attachdir'] = 'attachment';
$config['upload']['audio']['extentions'] = array('mp3');
$config['upload']['audio']['limit'] = 5000;
$config['setting']['memcache']['server'] = '';
$config['setting']['memcache']['port'] = 11211;
$config['setting']['memcache']['pconnect'] = 1;
$config['setting']['memcache']['timeout'] = 30;
$config['setting']['memcache']['session'] = 1;
$config['setting']['redis']['server'] = '127.0.0.1';
//$config['setting']['redis']['port'] = 15469;
$config['setting']['redis']['port'] = 6379;
$config['setting']['redis']['pconnect'] = 0;
$config['setting']['redis']['timeout'] = 1;
$config['setting']['redis']['auth'] = '';
$config['setting']['proxy']['host'] = '';
$config['setting']['proxy']['auth'] = '';