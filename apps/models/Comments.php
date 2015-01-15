<?php
namespace Models;
/**
 * Comments 模型
 */
class Comments extends Base {
	 public function initialize() {
	 	//Skips only when inserting
	 	$this->skipAttributesOnCreate(array('type','created_at','updated_at'));
	 	
	 	//Skips only when updating
	 	$this->skipAttributesOnUpdate(array('created_at'));
	 	
	 	$this->belongsTo('authorid', 'Models\Users', 'id', array(
	 			'alias' => 'Users'
	 	));
	 	
	 	$this->belongsTo('targetid', 'Models\Articles', 'id', array(
	 			'alias' => 'Articles'
	 	));
	 }
}
