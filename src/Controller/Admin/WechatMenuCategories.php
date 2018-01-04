<?php

namespace Miaoxing\WechatMenu\Controller\Admin;

class WechatMenuCategories extends \Miaoxing\Plugin\BaseController
{
    protected $controllerName = '微信菜单分类管理';

    protected $actionPermissions = [
        'index' => '列表',
        'create' => '添加',
        'update,add,edit' => '编辑',
        'destroy' => '删除',
    ];

    protected $adminNavId = 'wechat';

    public function indexAction($req)
    {
        switch ($req['_format']) {
            case 'json':
                $menuCategories = wei()->wechatMenuCategory()->curApp();
                $menuCategories->limit($req['rows'])->page($req['page']);
                $menuCategories->desc('sort');

                $data = [];
                foreach ($menuCategories->findAll() as $menuCategory) {
                    $data[] = $menuCategory->toArray() + [
                            'type' => $menuCategory->getMenuTypeName(),
                            'group' => $menuCategory->getGroupName(),
                            'sexName' => $menuCategory->getSexName(),
                            'region' => $menuCategory->getRegion(),
                            'languageName' => $menuCategory->getLanguageName(),
                            'clientPlatform' => $menuCategory->getClientPlatformName(),
                        ];
                }

                return $this->json('读取列表成功', 1, [
                    'data' => $data,
                    'page' => $req['page'],
                    'rows' => $req['rows'],
                    'records' => $menuCategories->count(),
                ]);

            default:
                return get_defined_vars();
        }
    }

    public function newAction($req)
    {
        return $this->editAction($req);
    }

    public function editAction($req)
    {
        $menuCategory = wei()->wechatMenuCategory()->curApp()->findId($req['id']);

        $groups = wei()->group()->where('wechatId != 0')->desc('sort')->fetchAll();
        $languages = wei()->wechatMenuCategory->getLanguagesForOptions();
        $clientPlatformTypes = wei()->wechatMenuCategory->getClientPlatformTypesForOptions();

        return get_defined_vars();
    }

    public function updateAction($req)
    {
        if (isset($req['isDefault'])) {
            if ($req['isDefault']) {
                $category = wei()->wechatMenuCategory()->curApp()->find(['isDefault' => 1]);
                if ($category && $category['id'] != $req['id']) {
                    return $this->err('已经有默认菜单了');
                }
            } else {
                $conditionKeys = wei()->wechatMenuCategory->getConditionKeys();
                $has = false;
                foreach ($conditionKeys as $i => $key) {
                    if ($req[$key]) {
                        $has = true;
                        break;
                    }
                }

                if (!$has) {
                    return $this->err('个性化菜单必须要有筛选条件');
                }
            }
        }

        $menuCategory = wei()->wechatMenuCategory()->curApp()->findId($req['id']);
        $menuCategory->save($req);

        return $this->suc();
    }

    public function destroyAction($req)
    {
        $menuCategory = wei()->wechatMenuCategory()->curApp()->findOneById($req['id']);
        $menuCategory->destroy();

        return $this->suc();
    }
}
