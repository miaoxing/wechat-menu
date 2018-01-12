<?php

namespace Miaoxing\WechatMenu\Migration;

use Miaoxing\Plugin\BaseMigration;

class V20180112222511CreateWechatMenuTable extends BaseMigration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->schema->table('weChatMenu')
            ->id()
            ->int('accountId')
            ->string('name', 32)
            ->int('categoryId')
            ->int('parentId')
            ->string('act', 32)
            ->string('click', 32)
            ->string('view', 2048)
            ->string('oauth2BaseView', 2048)
            ->string('oauth2UserInfoView', 2048)
            ->int('sort')
            ->bool('enable')->defaults(true)
            ->text('linkTo')
            ->datetime('createTime')
            ->int('createUser')
            ->datetime('updateTime')
            ->int('updateUser')
            ->int('deleted')
            ->int('deleteUser')
            ->exec();
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->schema->dropIfExists('weChatMenu');
    }
}
