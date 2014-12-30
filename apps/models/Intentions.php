<?php
namespace Models;
/**
 * Intentions 模型
 */
class Intentions extends Base {
	 public function initialize() {
	 	//Skips only when inserting
	 	$this->skipAttributesOnCreate(array('state','created_at','updated_at'));
	 	
	 	//Skips only when updating
	 	$this->skipAttributesOnUpdate(array('created_at'));
	 	
	 	$this->belongsTo('user_id', 'Models\Users', 'id', array(
	 			'alias' => 'Users'
	 	));
	 	
	 	$this->belongsTo('job_id', 'Models\Jobs', 'id', array(
	 			'alias' => 'Jobs'
	 	));
	 }
}
