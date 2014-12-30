<?php
/**
 * Password 模型
 */
namespace Models;
class Passwords extends Base {
	public function initialize() {
		//Skips only when inserting
		$this->skipAttributesOnCreate(array('updated_at'));
		 
		//Skips only when updating
		$this->skipAttributesOnUpdate(array('updated_at'));
	}
}
