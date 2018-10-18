<?php

namespace Miaoxing\WechatMenu\Migration;

use Miaoxing\Plugin\BaseMigration;

class V20181018093953AddTagIdToWechatMenuCategoriesTable extends BaseMigration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->schema->table('wechatMenuCategories')
            ->int('tagId')->after('groupId')->comment('标签')
            ->exec();
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->schema->table('wechatMenuCategories')
            ->dropColumn('tagId')
            ->exec();
    }
}
