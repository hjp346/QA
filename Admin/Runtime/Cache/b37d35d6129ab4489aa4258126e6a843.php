<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	  <meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="__PUBLIC__/css/bootstrap.min.css" />
</head>
<body>
	<form action="<?php echo U('edit');?>" method='post'>
		
		<table >
			<tr>
				<th colspan='8'>各等级所需经验设置</th>
			</tr>
			<tr>
				<td>LV1:</td>
				<td>
					<input type="text" name='lv1' value='<?php echo (C("lv1")); ?>' />
				</td>
				<td>LV2:</td>
				<td>
					<input type="text" name='lv2' value='<?php echo (C("lv2")); ?>' />
				</td>
				<td>LV3:</td>
				<td>
					<input type="text" name='lv3' value='<?php echo (C("lv3")); ?>' />
				</td>
				<td>LV4:</td>
				<td>
					<input type="text" name='lv4' value='<?php echo (C("lv4")); ?>' />
				</td>
			</tr>
			<tr>
				<td>LV5:</td>
				<td>
					<input type="text" name='lv5' value='<?php echo (C("lv5")); ?>'/>
				</td>
				<td>LV6:</td>
				<td>
					<input type="text" name='lv6' value='<?php echo (C("lv6")); ?>' />
				</td>
				<td>LV7:</td>
				<td>
					<input type="text" name='lv7' value='<?php echo (C("lv7")); ?>' />
				</td>
				<td>LV8:</td>
				<td>
					<input type="text" name='lv8' value='<?php echo (C("lv8")); ?>'/>
				</td>
			</tr>
			<tr>
				<td>LV9:</td>
				<td>
					<input type="text" name='lv9' value='<?php echo (C("lv9")); ?>' />
				</td>
				<td>LV10:</td>
				<td>
					<input type="text" name='lv10' value='<?php echo (C("lv10")); ?>'/>
				</td>
				<td>LV11:</td>
				<td>
					<input type="text" name='lv11' value='<?php echo (C("lv11")); ?>'/>
				</td>
				<td>LV12:</td>
				<td>
					<input type="text" name='lv12' value='<?php echo (C("lv12")); ?>'/>
				</td>
			</tr>
			<tr>
				<td>LV13:</td>
				<td>
					<input type="text" name='lv13' value='<?php echo (C("lv13")); ?>'/>
				</td>
				<td>LV14:</td>
				<td>
					<input type="text" name='lv14' value='<?php echo (C("lv14")); ?>' />
				</td>
				<td>LV15:</td>
				<td>
					<input type="text" name='lv15' value='<?php echo (C("lv15")); ?>'/>
				</td>
				<td>LV16:</td>
				<td>
					<input type="text" name='lv16' value='<?php echo (C("lv16")); ?>' />
				</td>
			</tr>
			<tr>
				<td>LV17:</td>
				<td>
					<input type="text" name='lv17' value='<?php echo (C("lv17")); ?>' />
				</td>
				<td>LV18:</td>
				<td>
					<input type="text" name='lv18' value='<?php echo (C("lv18")); ?>'/>
				</td>
				<td>LV19:</td>
				<td>
					<input type="text" name='lv19' value='<?php echo (C("lv19")); ?>' />
				</td>
				<td>LV20:</td>
				<td>
					<input type="text" name='lv20' value='<?php echo (C("lv20")); ?>'/>
				</td>
			</tr>
			<tr>
				<td colspan='8' align='center' height='60'>
					<input type="submit" class='btn btn-inverse' value='保存修改' />
				</td>
			</tr>
		</table>
	</form>
</body>
</html>