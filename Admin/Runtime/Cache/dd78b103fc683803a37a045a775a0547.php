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
			<th width="500">问题内容</th>
			<th>提问时间</th>
			<th>悬赏金币</th>
			<th>回答数</th>
			<th>操作</th>
		</tr>
		<?php if(is_array($ask)): foreach($ask as $key=>$v): ?><tr height='50'>
				<td width='8%' align='center'><?php echo ($v["id"]); ?></td>
				<td><?php echo ($v["ask_content"]); ?></td>
				<td align='center' width='12%'><?php echo (date('Y-m-d H:i', $v["ask_time"])); ?></td>
				<td align='center' width='8%'><?php if($v["money_reward"] > 0): echo ($v["money_reward"]); endif; ?></td>
				<td align='center' width='8%'><?php echo ($v["answer"]); ?></td>
				<td align='center' width='15%'>
					<a href="<?php echo U('delAsk', array('id' => $v['id']));?>" class='del btn btn-danger'>删除</a>
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