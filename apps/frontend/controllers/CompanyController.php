<?php
namespace Frontend\Controllers;

use Models\Companys;
use Models\Managers;
/**
 * 简述：公司模块。
 * 
 * <code>CompanyController<code/> 继承自 <code>BaseController</code> 类
 * 
 * @author hongker
 * @version 1.0
 * @copyright Powerd by hongker
 * @package Frontend\Controllers
 *
 */
class CompanyController extends BaseController {
	/**
	 * (首页模块)
	 * @see \Frontend\Controllers\BaseController::initialize()
	 */
	protected function initialize() {
		parent::initialize();
		\Phalcon\Tag::appendTitle('公司');
	}
	/**
	 * 首页内容显示
	 */
	public function indexAction() {
		$companys = Companys::find();
		$this->view->setVar('companys',$companys);
	}
	
	/**
	 * 公司详情
	 */
	public function detailAction() {
		$id = $this->dispatcher->getParam(0,'int');
		
		$company = Companys::findFirst($id);
		
		$this->view->setVar('company',$company);
	}
	
	/**
	 * 工作详情
	 */
	public function jobAction() {
		$id = $this->dispatcher->getParam(0,'int');
	}
	
	/**
	 * 投递意愿
	 */
	public function intentAction() {
		$id = $this->dispatcher->getParam(0,'int');
		
		$company = Companys::findFirst($id);
		
		$this->view->setVar('company',$company);
	}
	
	/**
	 * 企业中心
	 */
	public function homeAction() {
		$id = $this->session->get('id');
		
		$manager = Managers::findFirst($id);
		$companys = $manager->getCompanys();
		
		$this->view->setVar('companys',$companys);
		$this->view->setVar('manager',$manager);
	}
	
	
}