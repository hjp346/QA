<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
  <head>
    <title>登录页面</title>

    <!-- Bootstrap -->
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="__PUBLIC__/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/css/main.css">
    <script type="text/javascript" src="__PUBLIC__/js/jquery.min.js"></script> 
 <script type='text/javascript'>
      var CONTROL = '__URL__';
      function change_code(obj){
    $("#code").attr("src","<?php echo U('verify');?>"+'/'+Math.random());//verifyURL为验证码地址
    return false;
}
    </script>
  <style type="text/css">
    body{
    
      background-size: 100%;
    }
    .login{
      margin-left: 20%;

      margin-top:150px;
        width: 50%;
    
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="login">
    <form class="form-horizontal" action="<?php echo U('login');?>" method="post"> 
  <fieldset>
    <legend style="color:#523514;">问答系统后台登录</legend>
  <div class="control-group">
    <label class="control-label" >用户名</label>
    <div class="controls">
      <input type="text"  name="username" placeholder="Username">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" >密码</label>
    <div class="controls">
      <input type="password"  name="password" placeholder="Password">
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" >验证码</label>
    <div class="controls">
      <input type="text" name="code" placeholder="VerifyCode" style="width:80px;"><img src="<?php echo U('verify');?>"
       id="code" onclick="javascript:void(change_code(this))">
    </div>
  </div>

  <div class="control-group">
    <div class="controls">
      
       
      <button type="submit" class="btn btn-info" style="width:60px">登录</button>
     
    </div>
  </div>
  </fieldset>
</form>
</div>
  </div>
</body>
</html>