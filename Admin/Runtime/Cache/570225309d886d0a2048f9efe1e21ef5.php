<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="__PUBLIC__/css/bootstrap.min.css" />
</head>
<body>
	<form action="<?php echo U('addCate');?>" method='post'>
		<table class="table">
			<tr>
				<th colspan='2'>添加&nbsp;[<?php echo ($cate["cate_name"]); ?>]&nbsp;子分类</th>
			</tr>
			<tr>
				<td width='45%' align='right'>分类名称：</td>
				<td>
					<input type="text" name='cate_name'/>
				</td>
			</tr>
			<tr>
				<td colspan='2' align='center' height='60'>
					<input type="hidden" name='pid' value='<?php echo ($cate["id"]); ?>'/>
					<input type="submit" value='保存添加' class='btn btn-inverse'/>
				</td>
			</tr>
		</table>
	</form>
</body>
</html>