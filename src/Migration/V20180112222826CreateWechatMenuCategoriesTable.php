<?php

namespace Miaoxing\WechatMenu\Migration;

use Miaoxing\Plugin\BaseMigration;

class V20180112222826CreateWechatMenuCategoriesTable extends BaseMigration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->schema->table('wechatMenuCategories')
            ->id()
            ->int('appId')
            ->string('name', 64)
            ->int('menuId')->comment('微信返回menuid')
            ->bool('isDefault')->comment('是否默认菜单，1为是，0为否')->defaults(true)
            ->int('groupId')->comment('用户分组Id，0为无分组')
            ->tinyInt('sex', 1)->comment('1为男，2为女，0为不匹配')
            ->string('country', 64)
            ->string('province', 64)
            ->string('city', 64)
            ->tinyInt('clientPlatformType', 1)
            ->comment('客户端操作系统类型，0为不匹配，1为ios，2为安卓，3为其他')
            ->string('language', 8)
            ->int('sort')->defaults(50)
            ->bool('enable')->defaults(true)
            ->int('createUser')
            ->datetime('createTime')
            ->int('deleteUser')
            ->datetime('deleteTime')
            ->exec();
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->schema->dropIfExists('wechatMenuCategories');
    }
}
