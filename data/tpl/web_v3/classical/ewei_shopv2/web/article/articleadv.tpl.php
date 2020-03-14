<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<div class="page-header">
    当前位置：
    <span class="text-primary">广告管理</span>
</div>

<div class="page-content">
    <form action="./index.php" method="get" class="form-horizontal form-search" role="form">
        <input type="hidden" name="c" value="site" />
        <input type="hidden" name="a" value="entry" />
        <input type="hidden" name="m" value="ewei_shopv2" />
        <input type="hidden" name="do" value="web" />
        <input type="hidden" name="r"  value="article.articleadv" />
        <div class="page-toolbar  m-b-sm m-t-sm">
            <div class="col-sm-4">
                 <span class=''>
                   
                        <a class='btn btn-primary btn-sm' href="<?php  echo webUrl('article/articleadv/add')?>"><i class='fa fa-plus'></i> 添加广告</a>
  
                </span>
            </div>


            <div class="col-sm-6 pull-right">
                <div class="input-group">
                    <div class="input-group-select">
                        <select name="enabled" class='form-control'>
                            <option value="" <?php  if($_GPC['enabled'] == '') { ?> selected<?php  } ?>>状态</option>
                            <option value="1" <?php  if($_GPC['enabled']== '1') { ?> selected<?php  } ?>>显示</option>
                            <option value="0" <?php  if($_GPC['enabled'] == '0') { ?> selected<?php  } ?>>隐藏</option>
                        </select>
                    </div>
                    <input type="text" class=" form-control" name='keyword' value="<?php  echo $_GPC['keyword'];?>" placeholder="请输入关键词">
                    <span class="input-group-btn">
                        <button class="btn  btn-primary" type="submit"> 搜索</button>
                    </span>
                </div>
            </div>

        </div>
    </form>


    <form action="" method="post">
        <?php  if(count($list)>0) { ?>
        <div class="page-table-header">
            <input type="checkbox">
            <div class="btn-group">
                <?php if(cv('app.shop.banner.edit')) { ?>
                <button class="btn btn-default btn-sm btn-operation" type="button" data-toggle='batch' data-href="<?php  echo webUrl('article/articleadv/enabled',array('enabled'=>1))?>">
                    <i class='icow icow-xianshi'></i> 显示
                </button>
                <button class="btn btn-default btn-sm btn-operation" type="button" data-toggle='batch'  data-href="<?php  echo webUrl('article/articleadv/enabled',array('enabled'=>0))?>">
                    <i class='icow icow-yincang'></i> 隐藏
                </button>
                <?php  } ?>
                <?php if(cv('app.shop.banner.delete')) { ?>
                <button class="btn btn-default btn-sm btn-operation" type="button" data-toggle='batch-remove' data-confirm="确认要删除?" data-href="<?php  echo webUrl('article/articleadv/delete')?>">
                    <i class='icow icow-shanchu1'></i> 删除
                </button>
                <?php  } ?>
            </div>
        </div>
        <table class="table table-responsive table-hover" >
            <thead class="navbar-inner">
                <tr>
                    <th style="width:25px;"></th>
                    <th style='width:50px'>顺序</th>
                    <th style="width: 180px">标题</th>
                    <th>链接</th>
                    <th style='width:60px'>显示</th>
                    <th style="width: 75px;">操作</th>
                </tr>
            </thead>
            <tbody>
                <?php  if(is_array($list)) { foreach($list as $row) { ?>
                <tr>
                    <td>
                        <input type='checkbox'   value="<?php  echo $row['id'];?>"/>
                    </td>
                    <td>
                        <?php if(cv('app.shop.banner.edit')) { ?>
                            <a href='javascript:;' data-toggle='ajaxEdit' data-href="<?php  echo webUrl('article/articleadv/displayorder',array('id'=>$row['id']))?>" ><?php  echo $row['displayorder'];?></a>
                        <?php  } else { ?>
                            <?php  echo $row['displayorder'];?>
                        <?php  } ?>
                    </td>

                    <td><?php  echo $row['advname'];?></td>
                    <td><?php  echo $row['link'];?></td>
                    <td>

                        <span class='label <?php  if($row['enabled']==1) { ?>label-primary<?php  } else { ?>label-default<?php  } ?>'
                              <?php if(cv('app.shop.banner.edit')) { ?>
                                  data-toggle='ajaxSwitch'
                                  data-switch-value='<?php  echo $row['enabled'];?>'
                                  data-switch-value0='0|隐藏|label label-default|<?php  echo webUrl('article/articleadv/enabled',array('enabled'=>1,'id'=>$row['id']))?>'
                                  data-switch-value1='1|显示|label label-primary|<?php  echo webUrl('article/articleadv/enabled',array('enabled'=>0,'id'=>$row['id']))?>'
                              <?php  } ?>>
                              <?php  if($row['enabled']==1) { ?>显示<?php  } else { ?>隐藏<?php  } ?></span>


                        </td>
                        <td style="text-align:left;">
                            <?php if(cv('app.shop.banner.view|app.shop.banner.edit')) { ?>
                                <a href="<?php  echo webUrl('article/articleadv/edit', array('id' => $row['id']))?>" class="btn btn-default btn-sm  btn-op btn-operation">
                                    <span data-toggle="tooltip" data-placement="top" title="" data-original-title=" <?php if(cv('app.shop.banner.edit')) { ?>修改<?php  } else { ?>查看<?php  } ?>">
                                      <?php if(cv('app.shop.banner.edit')) { ?>
                                        <i class="icow icow-bianji2"></i>
                                        <?php  } else { ?>
                                        <i class="icow icow-chakan-copy"></i>
                                        <?php  } ?>
                                     </span>
                                </a>
                            <?php  } ?>
                            <?php if(cv('app.shop.banner.delete')) { ?>
                                <a data-toggle='ajaxRemove' href="<?php  echo webUrl('article/articleadv/delete', array('id' => $row['id']))?>"class="btn btn-default btn-sm btn-op btn-operation" data-confirm='确认要删除此广告吗?'>
                                    <span data-toggle="tooltip" data-placement="top" title="" data-original-title="删除">
                                        <i class="icow icow-shanchu1"></i>
                                     </span>
                                </a>
                            <?php  } ?>
                        </td>
                    </tr>
                    <?php  } } ?>
                </tbody>
            <tfoot>
                <tr>
                    <td>
                        <input type="checkbox">
                    </td>
                    <td colspan="2">
                        <div class="btn-group">
                            <?php if(cv('app.shop.banner.edit')) { ?>
                            <button class="btn btn-default btn-sm btn-operation" type="button" data-toggle='batch' data-href="<?php  echo webUrl('article/articleadv/enabled',array('enabled'=>1))?>">
                                <i class='icow icow-xianshi'></i> 显示
                            </button>
                            <button class="btn btn-default btn-sm btn-operation" type="button" data-toggle='batch'  data-href="<?php  echo webUrl('article/articleadv/enabled',array('enabled'=>0))?>">
                                <i class='icow icow-yincang'></i> 隐藏
                            </button>
                            <?php  } ?>
                            <?php if(cv('app.shop.banner.delete')) { ?>
                            <button class="btn btn-default btn-sm btn-operation" type="button" data-toggle='batch-remove' data-confirm="确认要删除?" data-href="<?php  echo webUrl('article/articleadv/delete')?>">
                                <i class='icow icow-shanchu1'></i> 删除
                            </button>
                            <?php  } ?>
                        </div>
                    </td>
                    <td colspan="3" class="text-right"> <?php  echo $pager;?></td>
                </tr>
            </tfoot>
            </table>
            <?php  } else { ?>
            <div class='panel panel-default'>
                <div class='panel-body' style='text-align: center;padding:30px;'>
                    暂时没有任何广告!
                </div>
            </div>
            <?php  } ?>

        </form>
</div>

    <?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>
<!--OTEzNzAyMDIzNTAzMjQyOTE0-->