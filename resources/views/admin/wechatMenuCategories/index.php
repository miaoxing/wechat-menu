<?php $view->layout() ?>

<!-- /.page-header -->
<div class="page-header">
  <div class="pull-right">
    <a class="btn btn-success" href="<?= $url('admin/wechat-menu-categories/new') ?>">添加个性化菜单</a>
    <a class="btn btn-warning publish-wechat-menu" href="javascript:;">发布微信菜单</a>
    <a class="btn btn-default delete-wechat-menu" href="javascript:;">删除微信菜单</a>
  </div>
  <h1>
    菜单管理
  </h1>
</div>

<div class="row">
  <div class="col-xs-12">
    <!-- PAGE CONTENT BEGINS -->
    <div class="table-responsive">
      <table id="record-table" class="table table-bordered table-hover table-center">
        <thead>
        <tr>
          <th>名称</th>
          <th>类型</th>
          <th>用户分组</th>
          <th>性别</th>
          <th>地区</th>
          <th>语言</th>
          <th>手机操作系统</th>
          <th>排序</th>
          <th>启用</th>
          <th style="width: 160px">操作</th>
        </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>

  </div>
</div>


<script id="menu-enabled-col-tpl" type="text/html">
  <label><input type="checkbox" class="ace table-input" data-id="<%= id %>" value="1" name="enable" <% if (enable == "1") { %>checked<% } %>><span class="lbl"></span></label>
</script>

<script id="table-actions-tpl" type="text/html">
  <div class="action-buttons">
    <a href="<%= $.url('admin/wechat-menu/index', {categoryId: id}) %>" target="_blank" title="查看">
      <i class="fa fa-search-plus bigger-130"></i>
    </a>
    <a href="<%= $.url('admin/wechat-menu-categories/edit', {id: id}) %>" title="编辑">
      <i class="fa fa-edit bigger-130"></i>
    </a>
    <a class="text-danger delete-record" href="javascript:;" data-href="<%= $.url('admin/wechat-menu-categories/destroy', {id: id}) %>" title="删除">
      <i class="fa fa-trash-o bigger-130"></i>
    </a>
  </div>
</script>

<?= $block('js') ?>
<script>
  require(['dataTable', 'form', 'jquery-deparam'], function () {
    var recordTable = $('#record-table').dataTable({
      ajax: {
        url: $.queryUrl('admin/wechat-menu-categories.json')
      },
      columns: [
        {
          data: 'name'
        },
        {
          data: 'type'
        },
        {
          data: 'group'
        },
        {
          data: 'sexName'
        },
        {
          data: 'region'
        },
        {
          data: 'languageName'
        },
        {
          data: 'clientPlatform'
        },
        {
          data: 'sort'
        },
        {
          data: 'id',
          render: function (data, type, full) {
            return template.render('menu-enabled-col-tpl', full);
          }
        },
        {
          data: 'id',
          render: function (data, type, full) {
            return template.render('table-actions-tpl', full);
          }
        }
      ]
    });

    recordTable.deletable();

    // 启用/禁用奖励
    recordTable.on('change', '.table-input', function () {
      var data = {};
      data['id'] = $(this).data('id');
      data[$(this).attr('name')] = +$(this).is(':checked');

      $.ajax({
        url: $.url('admin/wechat-menu-categories/update'),
        data: data,
        dataType: 'json',
        success: function (result) {
          $.msg(result);
          recordTable.reload();
        }
      });
    });

    $('.publish-wechat-menu').click(function () {
      $.ajax({
        url: $.queryUrl('admin/wechat-menu/publishWechatMenu'),
        type: 'post',
        dataType: 'json'
      });
    });

    $('.delete-wechat-menu').click(function () {
      $.confirm('删除微信菜单将无法还原,确认删除?', function () {
        $.ajax({
          url: $.queryUrl('admin/wechat-menu/deleteWechatMenu'),
          type: 'post',
          dataType: 'json'
        });
      });
    });

  });
</script>
<?= $block->end() ?>
