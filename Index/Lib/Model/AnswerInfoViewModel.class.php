<?php
class AnswerInfoViewModel extends ViewModel{
	public $viewFields=array(
		'answer' => array(
			'id','answer_content','answer_time',
			'_type' => 'LEFT'
			),
		'IndexUser' => array(
			'id'=>'uid','username','experience', 'answer', 'adopt',
			'_on' => 'answer.uid=IndexUser.id'
			)
		);
}