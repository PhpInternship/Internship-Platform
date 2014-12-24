<?php
namespace Frontend\Controllers;

use Models\Companys;
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
	
	
}