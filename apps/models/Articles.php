<?php
namespace Models;
/**
 * Article 模型
 */
class Articles extends Base {
	 public function initialize() {
	 	//Skips only when inserting
	 	$this->skipAttributesOnCreate(array('state','created_at','updated_at'));
	 	
	 	//Skips only when updating
	 	$this->skipAttributesOnUpdate(array('created_at'));
	 	
	 	$this->belongsTo('authorid', 'Models\Users', 'id', array(
	 			'alias' => 'Users'
	 	));
	 }
}
