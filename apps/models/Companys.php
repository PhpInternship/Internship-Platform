<?php
namespace Models;
/**
 * Company 模型
 */
class Companys extends Base {
	 public function initialize() {
	 	//Skips only when inserting
	 	$this->skipAttributesOnCreate(array('state','created_at','updated_at'));
	 	
	 	//Skips only when updating
	 	$this->skipAttributesOnUpdate(array('created_at'));
	 }
}
