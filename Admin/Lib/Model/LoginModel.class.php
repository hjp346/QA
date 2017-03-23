<?php
class LoginModel extends Model{
	protected $_validate = array(
		array('username',required,'用户名不能为空',1)
	)
}