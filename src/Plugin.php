<?php

namespace Miaoxing\WechatMenu;

class Plugin extends \Miaoxing\Plugin\BasePlugin
{
    protected $name = '菜单分类';

    protected $description = '包含个性菜单和默认菜单';

    protected $adminNavId = 'wechat';

    public function onAdminNavGetNavs(&$navs, &$categories, &$subCategories)
    {
        $navs[] = [
            'parentId' => 'wechat-account',
            'url' => 'admin/wechat-menu-categories',
            'name' => '菜单管理',
            'sort' => 800,
        ];
    }
}
