<?php
class AskInfoViewModel extends ViewModel{
	public $viewFields=array(
		'question' => array(
			'id', 'ask_content', 'money_reward', 'solve', 'ask_time', 'cid', 'answer','uid',
			'_type' => 'LEFT'
			),
		'IndexUser' => array(
			 'username', 'experience',
			'_on' => 'question.uid = IndexUser.id'
			)
		);
}