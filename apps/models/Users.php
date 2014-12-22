<?php
namespace Models;
/**
 * User 模型
 */
class Users extends Base {
	 public function initialize() {
	 	//Skips only when inserting
	 	$this->skipAttributesOnCreate(array('created_at','age','sex','school','education','grade','updated_at'));
	 	
	 	//Skips only when updating
	 	$this->skipAttributesOnUpdate(array('created_at','username','email'));
	 }
}
