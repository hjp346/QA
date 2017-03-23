<?php
/**
 * 会员中心提问列表模型
 */
Class AskViewModel extends ViewModel {

	Protected $viewFields = array(
		'question' => array(
			'id', 'ask_content', 'ask_time', 'answer', 'money_reward','cid',
			'_type' => 'LEFT'
			),
		'category' => array(
			'name', '_on' => 'question.cid = category.id'
			),
		);
}
?>