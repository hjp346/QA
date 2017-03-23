<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	  <meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="__PUBLIC__/css/bootstrap.min.css" />
	<script type="text/javascript" src='__PUBLIC__/js/jquery.min.js'></script>
	<script type="text/javascript">
		window.onload = function () {
			$( '.del' ).click( function () {
				return confirm('确认删除？');
			} );
		}
	</script>
</head>
<body>
	<table class="table table-bordered">
		<tr height='60'>
			<th>ID</th>
			<th>用户名</th>
			<th>回答数</th>
			<th>提问数</th>
			<th>被采纳数</th>
			<th>金币</th>
			<th>经验值</th>
			<th>状态</th>
			<th>操作</th>
		</tr>
		<?php if(is_array($user)): foreach($user as $key=>$v): ?><tr height='50'>
				<td  align='center'><?php echo ($v["id"]); ?></td>
				<td><?php echo ($v["username"]); ?></td>
				<td align='center'><?php echo ($v["answer"]); ?></td>
				<td align='center' ><?php echo ($v["ask"]); ?></td>
				<td align='center' ><?php echo ($v["adopt"]); ?></td>
				<td align='center' ><?php echo ($v["money"]); ?></td>
				<td align='center' ><?php echo ($v["experience"]); ?></td>
				<td align='center'>
					<?php if($v["lock"]): ?>锁定<?php endif; ?>
				</td>
				<td align='center'>
					<?php if($v["lock"]): ?><a href="<?php echo U('lockUser', array('id' => $v['id'], 'lock' => 0));?>" class="btn btn-warning">解除锁定</a>
					<?php else: ?>
						<a href="<?php echo U('lockUser', array('id' => $v['id'], 'lock' => 1));?>" class="btn btn-inverse">锁定用户</a><?php endif; ?>
				</td>
			</tr><?php endforeach; endif; ?>
		<tr height='60'>
			<td colspan='6' align='center'>
				<?php echo ($page); ?>
			</td>
		</tr>
	</table>
</body>
</html>