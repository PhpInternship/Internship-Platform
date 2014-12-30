<?php
namespace Models;
/**
 * Jobs 模型
 */
class Jobs extends Base {
	 public function initialize() {
	 	//Skips only when inserting
	 	$this->skipAttributesOnCreate(array('created_at','updated_at'));
	 	
	 	//Skips only when updating
	 	$this->skipAttributesOnUpdate(array('created_at'));
	 	
	 	//关联
	 	$this->belongsTo('company_id', 'Models\Companys', 'id', array(
	 			'alias' => 'Companys'
	 	));
	 }
}
