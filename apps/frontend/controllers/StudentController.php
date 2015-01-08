<?php
namespace Frontend\Controllers;

use Models\Users;
/**
 * 简述：学生模块。
 * 
 * <code>StudentController<code/> 继承自 <code>BaseController</code> 类
 * 
 * @author hongker
 * @version 1.0
 * @copyright Powerd by hongker
 * @package Frontend\Controllers
 *
 */
class StudentController extends BaseController {
	/**
	 * 首页
	 */
	public function indexAction() {
		
	}
	
	/**
	 * 个人中心
	 */
	public function homeAction() {
		
	}
	
	/**
	 * 学生信息
	 */
	public function infoAction() {
		$id = $this->dispatcher->getParam(0,'int');
	}
	
	/**
	 * 完善信息
	 */
	public function writeInfoAction() {
		$userinfo = Users::findFirst($this->session->get('id'));
		
		$this->view->setVar('user',$userinfo);
	}
	
	
	
}