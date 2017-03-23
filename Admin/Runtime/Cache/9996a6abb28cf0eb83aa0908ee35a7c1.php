<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	  <meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="__PUBLIC__/css/bootstrap.min.css" />
	<style>
		.open {
			display: block;
			width: 16px;
			height: 16px;
			line-height: 16px;
			text-align: center;
			border: 1px solid #670768;
			font-weight: bold;
			cursor: pointer;
		}
	</style>
	<script type="text/javascript" src='__PUBLIC__/js/jquery.min.js'></script>
	<script type="text/javascript">
		$(function () {
			

			$( '.del' ).click( function () {
				return confirm('确认删除该分类？');
			} );
		});
	</script>
</head>
<body>
	<table class="table table-bordered">
		<tr pid='0'>
		
			<th>ID</th>
			<th>分类名称</th>
			<th>操作</th>
		</tr>
		<?php if(is_array($cate)): foreach($cate as $key=>$v): ?><tr id='<?php echo ($v["id"]); ?>' pid='<?php echo ($v["pid"]); ?>'>
			
				<td  width='8%' align='center'><?php echo ($v["id"]); ?></td>
				<td><?php echo str_repeat('&nbsp;&nbsp;', $v['level']); if($v["level"] > 0): ?>|<?php endif; echo ($v["html"]); echo ($v["cate_name"]); ?></td>
				<td width='28%'>
					<a href="<?php echo U('addChild', array('pid' => $v['id']));?>" class='btn btn-success'>添加子分类</a>
					<a href="<?php echo U('update', array('id' => $v['id']));?>" class='btn btn-info' >修改</a>
					<a href="<?php echo U('del', array('id' => $v['id']));?>" class='btn btn-danger del'>删除</a>
				</td>
			</tr><?php endforeach; endif; ?>
	</table>
</body>
</html>