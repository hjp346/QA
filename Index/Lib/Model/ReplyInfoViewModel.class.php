<?php
class ReplyInfoViewModel extends ViewModel {
	public $viewFields = array(
          'IndexUser' => array('id','username','_type'=>'LEFT'),
          'reply' => array('reply_msg','reply_time','uid','aid','_on'=>'IndexUser.id=reply.uid')
		);
}