<?php
namespace Models;
/**
 * Replies 模型
 */
class Replies extends Base {
	 public function initialize() {
	 	//Skips only when inserting
	 	$this->skipAttributesOnCreate(array('created_at','updated_at'));
	 	
	 	//Skips only when updating
	 	$this->skipAttributesOnUpdate(array('created_at'));
	 	
	 	$this->belongsTo('authorid', 'Models\Users', 'id', array(
	 			'alias' => 'Users'
	 	));
	 	
	 	$this->belongsTo('targetid', 'Models\Users', 'id', array(
	 			'alias' => 'Replies'
	 	));
	 	
	 	$this->belongsTo('root_id', 'Models\Comments', 'id', array(
	 			'alias' => 'Comments'
	 	));
	 }
}
