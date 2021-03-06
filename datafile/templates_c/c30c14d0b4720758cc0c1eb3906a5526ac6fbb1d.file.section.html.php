<?php /* Smarty version Smarty-3.1.13, created on 2017-10-12 09:33:49
         compiled from "/www/yl/application/views/admin/base/section.html" */ ?>
<?php /*%%SmartyHeaderCode:121679133159dec67d973aa0-17996960%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c30c14d0b4720758cc0c1eb3906a5526ac6fbb1d' => 
    array (
      0 => '/www/yl/application/views/admin/base/section.html',
      1 => 1507576665,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '121679133159dec67d973aa0-17996960',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'VIEW_DIR' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_59dec67d9aad85_30580106',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59dec67d9aad85_30580106')) {function content_59dec67d9aad85_30580106($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['VIEW_DIR']->value)."common/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<script type="text/javascript">
	function showStatus(value,row,index){
		if(row.status == 1){
			return '<font color="green">有效</font>';
		}else{
			return '<font color="red">无效</font>';
		}
	}
</script>

<body class="page-header-fixed page-quick-sidebar-over-content">
	<div class="page-container">
	<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['VIEW_DIR']->value)."common/left_menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	<div class="page-content-wrapper"><div class="page-content">
	<div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>
      <div class="portlet box blue-madison">
        <div class="portlet-title">
          <div class="caption"> <i class="fa fa-globe"></i>科室管理 </div>
        </div>
        <div class="portlet-body">
        	<div id="toolbar1" style="margin-bottom:0px;">
				<button class="btn btn-primary btn-sm" onClick="showModal();">&nbsp;&nbsp;新增&nbsp;&nbsp;</button>
		   	</div>
		   <table id="tableId" data-url="/base/ajaxSectionList" data-sort-name="id" data-sort-order="desc" data-toggle="table"
		   		data-click-to-select="true"  data-pagination="true"  data-show-refresh="true" data-show-columns="true" data-search="true" data-toolbar="#toolbar1">
				<thead>
					<tr>
						<th data-checkbox="true"></th>
						<th data-field="id">ID</th>
						<th data-field="name">科室名</th>
						<th data-field="status" data-formatter="showStatus">是否有效</th>
						<th data-field="operate" data-formatter="operateFormatter" data-events="operateEvents">操作</th>
					</tr>
				</thead>
			</table>
			<div class="row pull-right">
				<ul class="pagination">
				</ul>
			</div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header"  style="text-align:center;">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h3 id="modalTitle">新增</h3>
			</div>
			<div class="modal-body">
				<form role="form" id="oneForm" class="form-horizontal">
					<input id="id" type="hidden" />
					<div class="form-group">
						<label class="col-sm-2 control-label">科室名称</label>
						<div class="col-sm-9">
	                    	<input type="text"  class="form-control" id="name" placeholder="科室名称">
	                    </div>
					</div>
            		<div class="form-group">
						<label class="col-sm-2 control-label">是否有效</label>
						<div class="col-sm-9" style="    margin-top: 7px;">
							<label><input type="radio" name="status" value="0" checked/><font color="red">无效</font></label>
	                    	<label style="margin-left:20px;"><input type="radio" name="status" value="1" /><font color="green">有效</font></label>
	                    </div>
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
        opUpdate(row);
    },
    'click .remove': function (e, value, row, index) {
		Modal.confirm({
			msg: "<div style='text-align: center;'>是否删除记录？</div>",
			title: "删除记录"
		}).on( function (e) {
			if(e) {
				$.ajax({
	    	        url:'/base/ajaxSectionDelete',
	    	        type:'post',
	    			dataType : 'json',
	    			data : encodeURI('id=' + row.id),
	    			async: false,
	    			success:function(data){
	    	        	if(data['success']) {
	    	        		$('#myModal').modal('hide');
	    	        		Calert(data['msg']);
	    	        		refresh()
	    	        		$('#oneForm')[0].reset();
	    				} else {
	    					Calert(data['msg']);
	    				}
	    	        },
	    	        error:function(){}
	    	     });
	    	}
	  });
    }
};

function refresh(){
	$('#tableId').bootstrapTable('refresh', {
        url: '/base/ajaxSectionList'
    });
}

function showModal() {
	$('#modalTitle').html('新增');
	$('#modalSubmit').attr('onclick', 'addOne()');
	$('#oneForm')[0].reset();
	$('#myModal').modal('show').find(".modal-dialog").addClass("modal-lg");
}

function addOne() {
	var str = '';
    	str += '&name=' + $("#name").val();
    	str += '&status=' + $("input[name='status']:checked").val();
	str = str.substr(1);
	$.ajax({
        url:'/base/ajaxSectionAdd',
        type:'post',
		dataType : 'json',
		data : encodeURI(str),
        success:function(data){
        	if(data['success']) {
        		Calert(data['msg']);
        		$('#myModal').modal('hide');
        		refresh();
        		$('#oneForm')[0].reset();
			} else {
				Calert(data['msg']);
			}
        },
        error:function(){

        }

     });
}

function opUpdate(row){
    $('#modalTitle').html('修改');
	$('#modalSubmit').attr('onclick', 'updateOne()');
	$('#oneForm')[0].reset();
	$('#id').val(row.id);
	$("#name").val(row.name);
	$("input[value='"+row.status+"']").prop("checked",true);
    $('#myModal').modal('show').find(".modal-dialog").addClass("modal-lg");
}
function updateOne() {
	var id = $('#id').val();
	var str = '';
	str += '&name=' + $("#name").val();
	str += '&status=' + $("input[name='status']:checked").val();
	$.ajax({
        url:'/base/ajaxSectionUpdate',
        type:'post',
		dataType : 'json',
		data : encodeURI('id=' + id + str),
		async: false,
		success:function(data){
        	if(data['success']) {
        		Calert(data['msg']);
        		$('#myModal').modal('hide');
        		refresh();
        		$('#oneForm')[0].reset();
			} else {
				Calert(data['msg']);
			}
        },
        error:function(){

        }
	});
}
</script>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['VIEW_DIR']->value)."common/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</body>
</html>
<?php }} ?>