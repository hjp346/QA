var validate = {
	account : false,
	username : false,
	pwd : false,
	pwded : false,
	verify : false,
	loginAccount : false,
	loginPwd : false
};

var msg = '';
$(function () {


	var register = $( 'form[name=register]' );

	register.submit( function () {
		var isOK =validate.username && validate.pwd && validate.pwded;

		if ( isOK ) {
			return true;
		}

		
		$( 'input[name=username]', register ).trigger('blur');
		$( 'input[name=pwd]', register ).trigger('blur');
		$( 'input[name=pwded]', register ).trigger('blur');
		
		return false;
	} );

	

	//验证用户名
	$( 'input[name=username]', register ).blur( function () {
		var username = $( this ).val();
		var span = $( this ).next();

		if ( username == '' ) {
			msg = '用户名不能为空';
			span.html( msg ).addClass('error');
			validate.username = false;
			return;
		}

		if ( !/^[\u4e00-\u9fa5|\w]{2,14}$/g.test(username) ) {
			msg = '必须是2-14个字符：字母，数字，下划线或中文';
			span.html( msg ).addClass('error');
			validate.username = false;
			return;
		}

		$.post(url, {username : username}, function (status) {
			if (status) {
				msg = '';
				span.html( msg ).removeClass('error');
				validate.username = true;
			} else {
				msg = '用户名已存在';
				span.html( msg ).addClass('error');
				validate.username = false;
			}
		}, 'json');
	} );

	//验证密码
	$( 'input[name=pwd]', register ).blur( function () {
		var pwd = $( this ).val();
		var span = $( this ).next();

		if ( pwd == '' ) {
			msg = '密码不能为空';
			span.html( msg ).addClass('error');
			validate.pwd = false;
			return;
		}

		if ( !/^\w{6,20}$/g.test(pwd) ) {
			msg = '密码必须由6-20个字母，数字，下划线组成';
			span.html( msg ).addClass('error');
			validate.pwd = false;
			return;
		}

		msg = '';
		validate.pwd = true;
		span.html( msg ).removeClass('error');
	} );

	//确认密码
	$( 'input[name=pwded]', register ).blur( function () {
		var pwded = $( this ).val();
		var span = $( this ).next();

		if ( pwded == '' ) {
			msg = '请确认密码';
			span.html( msg ).addClass('error');
			validate.pwded = false;
			return;
		}

		if ( pwded != $( 'input[name=pwd]', register ).val() ) {
			msg = '两次密码不一致';
			span.html( msg ).addClass('error');
			validate.pwded = false;
			return;
		}

		msg = '';
		span.html( msg ).removeClass('error');
		validate.pwded = true;
	} );

	
	

	

});