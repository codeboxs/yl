<?php /* Smarty version Smarty-3.1.13, created on 2017-10-12 09:29:21
         compiled from "/www/yl/application/views/admin/system/power/list.html" */ ?>
<?php /*%%SmartyHeaderCode:127655861259dec571e0b634-46959750%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f0d2f1da37e2cb423cefa0f672a86f050f10ddb5' => 
    array (
      0 => '/www/yl/application/views/admin/system/power/list.html',
      1 => 1507576665,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '127655861259dec571e0b634-46959750',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'VIEW_DIR' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_59dec571e53610_08879308',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59dec571e53610_08879308')) {function content_59dec571e53610_08879308($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['VIEW_DIR']->value)."common/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script type="text/javascript">
	function addOne() {
		var power_name = $('#power_name').val();
		var uri = $('#uri').val();
		if(!power_name) {
			$('#power_name').focus();
			return false;
		}
		if(!uri) {
			$('#uri').focus();
			return false;
		}
		//alert(username + '|' + password + '|' + email + '|' + role_ids + '|' + status);
		$.ajax({
	        url:'/system/ajaxPowerAdd',
	        type:'post',
			dataType : 'json',
			data : encodeURI('power_name=' + power_name +  '&uri=' + uri),
	        success:function(data){
	        	if(data['result_code'] == 0) {
	        		//sysAlert("添加成功!", "success");
	        		$('#myModal').modal('hide');
	        		$('#tableId').bootstrapTable('refresh', {
	                    url: '/system/ajaxPowerGetList'
	                });
	        		$('#oneForm')[0].reset();
				} else {
					Calert(data['info']);
				}
	        },
	        error:function(){

	        }

	     });
	}

	function opUpdate(row){
        $('#modalTitle').html('修改权限');
		$('#modalSubmit').attr('onclick', 'updateOne()');
		$('#oneForm')[0].reset();
		$('#id').val(row.id);
		$('#power_name').val(row.power_name);
		$('#uri').val(row.uri);
		$('#myModal').modal('show');
	}



	function updateOne() {
		var id = $('#id').val();
		var power_name = $('#power_name').val();
		var uri = $('#uri').val();
		if(!power_name) {
			$('#power_name').focus();
			return false;
		}
		if(!uri) {
			$('#uri').focus();
			return false;
		}
		$.ajax({
	        url:'/system/ajaxPowerUpdate',
	        type:'post',
			dataType : 'json',
			data : encodeURI('id=' + id + '&power_name=' + power_name + '&uri=' + uri),
			async: false,
			success:function(data){
	        	if(data['result_code'] == 0) {
	        		//sysAlert("修改成功!", "success");
	        		$('#myModal').modal('hide');
	        		$('#tableId').bootstrapTable('refresh', {
	                    url: '/system/ajaxPowerGetList'
	                });
	        		$('#oneForm')[0].reset();
				} else {
					alert(data['info']);
				}
	        },
	        error:function(){

	        }

	     });
	}



	function showModal() {
		$('#modalTitle').html('新增权限');
		$('#modalSubmit').attr('onclick', 'addOne()');
		$('#oneForm')[0].reset();
		$('#myModal').modal('show');
	}
</script>
<body class="page-header-fixed page-quick-sidebar-over-content">
<div class="page-container"> <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['VIEW_DIR']->value)."common/left_menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

  <div class="page-content-wrapper">
    <div class="page-content">
      <div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"> </div>
      <div class="portlet box blue-madison">
        <div class="portlet-title">
          <div class="caption"> <i class="fa fa-globe"></i>账号管理 </div>

        </div>
        <div class="portlet-body">
        	<div id="toolbar1" style="margin-bottom:0px;">
					<button class="btn btn-primary btn-sm" onClick="showModal();">&nbsp;&nbsp;新增&nbsp;&nbsp;
					</button>
		   </div>
          	<table id="tableId" data-toggle="table"  data-url="/system/ajaxPowerGetList"  data-height="auto"
				 data-sort-name="sort_weight" data-sort-order="desc" data-show-toggle="true" data-show-refresh="true" data-show-columns="true" data-search="true" data-toolbar="#toolbar1">
				<thead>
					<tr>
						<th data-field="id">ID</th>
						<th data-field="power_name">权限</th>
						<th data-field="uri">访问URL</th>
						<th data-field="operate" data-formatter="operateFormatter" data-events="operateEvents">操作</th>
					</tr>
				</thead>
				<tbody id="list_body">
				</tbody>
			</table>
        </div>
      </div>
    </div>
  </div>
</div>

	<div class="modal fade" id="myModal" tabindex="-1" role="dialog"
		aria-labelledby="myModalLabel" aria-hidden="true">

		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header"  style="text-align:center;">
					<button type="button" class="close" data-dismiss="modal">×</button>
					<h3 id="modalTitle">新增权限</h3>
				</div>
				<div class="modal-body">
					<form role="form" id="oneForm">
					<input id="id" type="hidden" />
                    <div class="form-group">
                        <label for="power_name">权限名</label>
                        <input type="text" class="form-control" id="power_name" placeholder="权限名">
                    </div>
                    <div class="form-group">
                        <label for="uri">访问URL</label>
                        <input type="text" class="form-control" id="uri" placeholder="访问URL">
                    </div>

                </form>

				</div>
				<div class="modal-footer">
					<a href="#" class="btn btn-default" data-dismiss="modal">取消</a>
					<a href="#" class="btn btn-primary" id="modalSubmit" onclick="addOne();">提交</a>
				</div>
			</div>
		</div>
	</div>
<script type="text/javascript">
function operateFormatter(value, row, index) {
    return [
        '<a class="edit ml10" href="javascript:void(0)" title="Edit">',
            '<i class="glyphicon glyphicon-pencil"></i>',
        '</a> ',
        '<a class="remove ml10" href="javascript:void(0)" title="Remove">',
            '<i class="glyphicon glyphicon-trash"></i>',
        '</a>'
    ].join('');
}

window.operateEvents = {
    'click .edit': function (e, value, row, index) {
        //alert('You click edit icon, row: ' + JSON.stringify(row));
        opUpdate(row);
        //console.log(value, row, index);
    },
    'click .remove': function (e, value, row, index) {
    	Modal.confirm(
				  {
				    msg: "是否删除权限？",
				    title: "删除权限"
				  })
				  .on( function (e) {
				    	//alert("返回结果：" + e);
				    	if(e) {
				    		$.ajax({
				    	        url:'/system/ajaxPowerDelete',
				    	        type:'post',
				    			dataType : 'json',
				    			data : encodeURI('id=' + row.id),
				    			async: false,
				    			success:function(data){
				    	        	if(data['result_code'] == 0) {
				    	        		//sysAlert("删除成功!", "success");
				    	        		$('#myModal').modal('hide');
				    	        		$('#tableId').bootstrapTable('refresh', {
				    	                    url: '/system/ajaxPowerGetList'
				    	                });
				    	        		$('#oneForm')[0].reset();
				    				} else {
				    					alert(data['info']);
				    				}
				    	        },
				    	        error:function(){

				    	        }

				    	     });
				    	}
				  });
    }
};
</script>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['VIEW_DIR']->value)."common/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</body>
</html>
<?php }} ?>