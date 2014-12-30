<?php
namespace Models;
/**
 * company_manager 模型
 */
class Managers extends Base {
	
	/**
	 * 映射到表 course_languages
	 * @return string
	 */
	public function getSource(){
		return "company_manager";
	}
	
	 public function initialize() {
	 	//Skips only when inserting
	 	$this->skipAttributesOnCreate(array('created_at','updated_at','true_name','id_card_no','tel'));
	 	
	 	//Skips only when updating
	 	$this->skipAttributesOnUpdate(array('created_at'));
	 	
	 	//关联
	 	$this->hasMany('id', 'Models\Companys', 'manager', array(
	 			'alias' => 'Companys'
	 	));
	 }
}
