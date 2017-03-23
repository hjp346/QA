<?php
/**
 * 页员中心我的回答视图模型
 */
Class AnswerViewModel extends ViewModel {

	Protected $viewFields = array(
		'question' => array(
			'id', 'ask_content', 'answer','ask_time', 
			'_type' => 'LEFT'
			),
		'answer' => array(
			'answer_time', 'uid','adopt', '_on' => 'question.id = answer.qid',
			'_type' => 'LEFT'
			),
		'category' => array(
			'name', '_on' => 'question.cid = category.id'
			)
		);
}
?>