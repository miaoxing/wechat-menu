<?php

namespace Miaoxing\WechatMenu\Service;

use Miaoxing\Wechat\Service\WeChatMenu;

class WechatMenuCategory extends \miaoxing\plugin\BaseModel
{
    protected $table = 'wechatMenuCategories';

    protected $providers = [
        'db' => 'app.db',
    ];

    protected $conditionKeys = [
        'groupId',
        'sex',
        'country',
        'province',
        'city',
        'clientPlatformType',
        'language',
    ];

    protected $menuTypes = [
        '0' => '个性化菜单',
        '1' => '默认菜单',
    ];

    protected $sexes = [
        '0' => '全部',
        '1' => '男',
        '2' => '女',
    ];

    protected $languages = [
        'zh_CN' => '简体中文', 'zh_TW' => '繁体中文TW', 'zh_HK' => '繁体中文HK',
        'en' => '英文', 'id' => '印尼', 'ms' => '马来',
        'es' => '西班牙', 'ko' => '韩国', 'it' => '意大利',
        'ja' => '日本', 'pl' => '波兰', 'pt' => '葡萄牙',
        'ru' => '俄国', 'th' => '泰文', 'vi' => '越南',
        'ar' => '阿拉伯语', 'hi' => '北印度', 'he' => '希伯来',
        'tr' => '土耳其', 'de' => '德语', 'fr' => '法语',
    ];

    protected $clientPlatformTypes = [
        '0' => '请选择',
        '1' => 'ios',
        '2' => 'android',
        '3' => '其他',
    ];

    protected $group;

    /**
     * @var WeChatMenu|WeChatMenu[]
     */
    protected $menus;

    public function getSexName()
    {
        return $this->sexes[$this['sex']];
    }

    public function getLanguageName()
    {
        return $this['language'] ? $this->languages[$this['language']] : '';
    }

    public function getGroupName()
    {
        $this->group || $this->group = wei()->group()->findById($this['groupId']);

        return $this->group['name'];
    }

    public function getClientPlatformName()
    {
        return $this['clientPlatformType'] ? $this->clientPlatformTypes[$this['clientPlatformType']] : '';
    }

    public function getGroup()
    {
        return wei()->group()->findById($this['groupId']);
    }

    public function getLanguagesForOptions()
    {
        $data = [];
        foreach ($this->languages as $key => $language) {
            $data[] = ['id' => $key, 'name' => $language];
        }

        return $data;
    }

    public function getClientPlatformTypesForOptions()
    {
        $data = [];
        foreach ($this->clientPlatformTypes as $key => $clientPlatformType) {
            $data[] = ['id' => $key, 'name' => $clientPlatformType];
        }

        return $data;
    }

    public function getMenuTypeName()
    {
        return $this->menuTypes[$this['isDefault']];
    }

    public function getRegion()
    {
        return $this['country'] . ' ' . $this['province'] . ' ' . $this['city'];
    }

    /**
     * @return WeChatMenu|WeChatMenu[]
     */
    public function getFirstLevelMenus()
    {
        $this->menus || $this->menus = wei()->weChatMenu()
            ->where(['categoryId' => $this['id']])
            ->enabled()
            ->asc('sort')
            ->findAll(['parentId' => 0]);

        return $this->menus;
    }

    public function getConditionKeys()
    {
        return $this->conditionKeys;
    }
}
