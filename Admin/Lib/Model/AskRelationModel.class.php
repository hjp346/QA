<?php
/**
 * 问题关联模型
 */
Class AskRelationModel extends RelationModel {

	Protected $tableName = 'question';

	Protected $_link = array(
		'answer' => array(
			'mapping_type' => HAS_MANY,
			'foreign_key' => 'qid'
			)
		);
}
?>