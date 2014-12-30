<?php
namespace Models;
/**
 * Citys 模型
 */
class Citys extends Base {
	 public function initialize() {
	 	//Skips only when inserting
	 	$this->skipAttributesOnCreate(array('created_at'));
	 	
	 	//Skips only when updating
	 	$this->skipAttributesOnUpdate(array('created_at'));
	 	
	 	//关联
	 	$this->hasMany('id', 'Models\Companys', 'city', array(
	 			'alias' => 'Companys'
	 	));
	 }
}
