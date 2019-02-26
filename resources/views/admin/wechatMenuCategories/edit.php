<?php

$view->layout();
?>

<div class="page-header">
  <a class="btn btn-secondary float-right" href="<?= $url('admin/wechat-menu-categories') ?>">返回列表</a>

  <h1>
    新建菜单分类
  </h1>
</div>
<!-- /.page-header -->

<div class="row">
  <div class="col-12">
    <!-- PAGE detail BEGINS -->
    <form class="menu-category-form form form-horizontal" method="post" role="form">
      <fieldset>
        <legend class="text-muted text-xl">基本信息</legend>
        <input type="hidden" name="id" id="id">

        <div class="form-group">
          <label class="col-lg-2 control-label" for="name">
            <span class="text-warning">*</span>
            菜单分类名称
          </label>

          <div class="col-lg-4">
            <input type="text" class="form-control" name="name" id="name" data-rule-required="true">
          </div>
        </div>

        <div class="form-group">
          <label class="col-lg-2 control-label" for="is-default">
            <span class="text-warning">*</span>
            类型
          </label>

          <div class="col-lg-4">
            <label class="radio-inline">
              <input type="radio" name="isDefault" value="1" data-rule-required="true" checked> 默认菜单
            </label>
            <label class="radio-inline">
              <input type="radio" name="isDefault" value="0" data-rule-required="true"> 个性化菜单
            </label>
          </div>

          <label class="col-lg-6 help-text" for="isDefault">
            创建个性化菜单之前必须先创建默认菜单，默认菜单只能有一个
            <a href="http://mp.weixin.qq.com/wiki/0/c48ccd12b69ae023159b4bfaa7c39c20.html" target="_blank">
              <i class="fa fa-external-link text-xs"></i>
            </a>
          </label>
        </div>

        <div class="form-group">
          <label class="col-lg-2 control-label" for="enable">
            <span class="text-warning">*</span>
            启用
          </label>

          <div class="col-lg-4">
            <label class="radio-inline">
              <input type="radio" name="enable" value="1" data-rule-required="true" checked> 启用
            </label>
            <label class="radio-inline">
              <input type="radio" name="enable" value="0" data-rule-required="true"> 不启用
            </label>
          </div>
        </div>

        <div class="form-group">
          <label class="col-lg-2 control-label" for="sort">
            <span class="text-warning">*</span>
            排序
          </label>

          <div class="col-lg-4">
            <input type="text" class="form-control" name="sort" id="sort" data-rule-required="true">
          </div>

          <label class="col-lg-6 help-text" for="isDefault">
            个性化菜单在匹配用户过程中按照从大到小开始匹配
            <a href="http://mp.weixin.qq.com/wiki/0/c48ccd12b69ae023159b4bfaa7c39c20.html" target="_blank">
              <i class="fa fa-external-link text-xs"></i>
            </a>
          </label>
        </div>


      </fieldset>

      <fieldset>
        <legend class="text-muted text-xl">筛选条件</legend>

        <?php if (wei()->plugin->isInstalled('user-tag')) { ?>
          <div class="form-group">
            <label class="col-lg-2 control-label" for="tag-id">
              标签
            </label>
            <div class="col-lg-4">
              <select id="tag-id" name="tagId" class="js-tag-id form-control">
                <option value="0">无</option>
              </select>
            </div>
          </div>
        <?php } else { ?>
          <div class="form-group">
            <label class="col-lg-2 control-label" for="group-id">
              分组
            </label>

            <div class="col-lg-4">
              <select id="group-id" name="groupId" class="js-group-id form-control">
                <option value="0">无</option>
              </select>
            </div>
          </div>
        <?php } ?>

        <div class="form-group">
          <label class="col-lg-2 control-label" for="sex">
            性别
          </label>

          <div class="col-lg-4">
            <label class="radio-inline">
              <input type="radio" name="sex" value="0" checked> 全部
            </label>
            <label class="radio-inline">
              <input type="radio" name="sex" value="1" > 男
            </label>
            <label class="radio-inline">
              <input type="radio" name="sex" value="2"> 女
            </label>
          </div>
        </div>

        <div class="form-group">
          <label class="col-lg-2 control-label" for="country">
            国家
          </label>

          <div class="col-lg-4 col-control">
            <select id="country" name="country" class="js-cascading-item form-control">
              <option value="">请选择</option>
            </select>
            <a href="javascript:;" class="bm-angle-right form-control-feedback"></a>
          </div>
        </div>

        <div class="form-group">
          <label for="province" class="col-lg-2 control-label">
            省份
          </label>

          <div class="col-lg-4 col-control">
            <select id="province" name="province" class="js-cascading-item form-control">
              <option value="">请选择</option>
            </select>
            <a href="javascript:;" class="bm-angle-right form-control-feedback"></a>
          </div>
        </div>

        <div class="form-group">
          <label for="city" class="col-lg-2 control-label">
            城市
          </label>

          <div class="col-lg-4 col-control">
            <select id="city" name="city" class="js-cascading-item form-control">
              <option value="">请选择</option>
            </select>
            <a href="javascript:;" class="bm-angle-right form-control-feedback"></a>
          </div>
        </div>

        <div class="form-group">
          <label for="language" class="col-lg-2 control-label">
            语言
          </label>

          <div class="col-lg-4 col-control">
            <select id="language" name="language" class="js-language form-control">
              <option value="">请选择</option>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label for="client-platform-type" class="col-lg-2 control-label">
            客户端操作系统
          </label>

          <div class="col-lg-4 col-control">
            <select id="client-platform-type" name="clientPlatformType" class="js-client-platform-type form-control">
            </select>
          </div>
        </div>

      </fieldset>

      <div class="clearfix form-actions form-group">
        <div class="offset-lg-2">
          <button class="btn btn-primary" type="submit">
            <i class="fa fa-check bigger-110"></i>
            提交
          </button>

          &nbsp; &nbsp; &nbsp;
          <a class="btn btn-secondary" href="<?= $url('admin/wechat-menu-categories') ?>">
            <i class="fa fa-undo"></i>
            返回列表
          </a>
        </div>
      </div>
    </form>
  </div>
  <!-- PAGE detail ENDS -->
</div><!-- /.col -->
<!-- /.row -->

<?= $block->js() ?>
<script>
  require(['form', 'plugins/app/js/validation', 'comps/jquery-cascading/jquery-cascading'], function (form) {
    form.toOptions($('.js-group-id'), <?= json_encode($groups) ?>, 'id', 'name');
    form.toOptions($('.js-tag-id'), <?= json_encode($userTags) ?>, 'id', 'name');
    form.toOptions($('.js-language'), <?= json_encode($languages) ?>, 'id', 'name');
    form.toOptions($('.js-client-platform-type'), <?= json_encode($clientPlatformTypes) ?>, 'id', 'name');

    var category = <?= $menuCategory->toJson() ?>;
    $('.js-cascading-item').cascading({
      url: $.url('regions.json'),
      valueKey: 'label',
      valueDataKey: 'value',
      values:[category.country, category.province, category.city]
    });

    $('.menu-category-form')
      .loadJSON(category)
      .loadParams()
      .ajaxForm({
        url: '<?= $url('admin/wechat-menu-categories/update') ?>',
        dataType: 'json',
        beforeSubmit: function (arr, $form, options) {
          return $form.valid();
        },
        success: function (result) {
          $.msg(result, function () {
            if (result.code > 0) {
              window.location = $.url('admin/wechat-menu-categories');
            }
          });
        }
      }).validate();

  });
</script>
<?= $block->end() ?>
