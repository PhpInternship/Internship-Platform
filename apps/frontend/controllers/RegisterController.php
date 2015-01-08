<?php
namespace Frontend\Controllers;

use Models\Users;
use Models\Passwords;
use Models\Managers;
/**
 * 简述：用户注册模块。
 * 
 * <code>RegisterController<code/> 继承自 <code>BaseController</code> 类
 * 
 * @author hongker
 * @version 1.0
 * @copyright Powerd by hongker
 * @package Frontend\Controllers
 *
 */
class RegisterController extends BaseController {
	/**
	 * (首页模块)
	 * @see \Frontend\Controllers\BaseController::initialize()
	 */
	protected function initialize() {
		parent::initialize();
		\Phalcon\Tag::appendTitle('注册');
	}
	
	/**
	 * 显示注册页面
	 */
	public function indexAction() {
		
	}
	
	/**
	 * 接收学生注册表单数据，注册
	 */
	public function addStudentAction() {
		if($this->request->isPost()) {
			if ($this->security->checkToken()) {
				$username = $this->request->getPost('name','string');
				$email = $this->request->getPost('email','email');
				$password = $this->request->getPost('pass','string');
				
				if($this->_checkUser($username)&&$this->_checkPass($password)&&$this->_addUser($username, $email, $password)) {
					$user = Users::findFirst("username='$username'");
					$this->session->set('id',$user->id); //将用户id存入session
					$this->session->set('type',0);
					$this->session->set('username',$user->username); //用户名
					
					//刚注册的用户需要完善信息
					if($user->update_at == '0000-00-00 00:00:00') {
						$this->response->redirect('/student/writeInfo',true);
					}else {
						$this->response->redirect('/index',true);
					}
					
				}else {
					$this->response->redirect('/register',true);
				}
				
			}else {
            	$this->flashSession->error("请勿重复注册");
            	
            	$this->response->redirect('/register',true);
            }
            
		}
	}
	
	/**
	 * 接收企业管理人注册表单数据，注册
	 */
	public function addManagerAction() {
		if($this->request->isPost()) {
			if ($this->security->checkToken()) {
				$username = $this->request->getPost('name','string');
				$email = $this->request->getPost('email','email');
				$password = $this->request->getPost('pass','string');
	
				if($this->_checkUser($username)&&$this->_checkPass($password)&&$this->_addManager($username, $email, $password)) {
					$manager = Managers::findFirst("username='$username'");
					$this->session->set('id',$manager->id); //将用户id存入session
					$this->session->set('type',1);
					$this->session->set('username',$manager->username); //用户名
					$this->response->redirect('/index',true);
				}else {
					$this->response->redirect('/register',true);
				}
	
			}else {
				$this->flashSession->error("请勿重复注册");
				 
				$this->response->redirect('/register',true);
			}
	
		}
	}
	
	
	
	/**
	 * 检测用户名
	 * @param string $username 用户名
	 * @return boolean 合格返回true，否则返回false
	 */
	private function _checkUser($username) {
		//要求用户名字段长度为6~20
		if(strlen($username)<6||strlen($username)>20) {
			//不合格
			$this->flashSession->error("要求用户名字段长度为6~20");
			return false;
		}else {
			//检查用户名是否存在
			$user = Passwords::findFirst("username='$username'");
			
			if($user) {
				$this->flashSession->error("该用户名已被使用，请重新选择一个用户名");
				return false;
			}else {
				return true;
			}
		}
	}
	
	/**
	 * 检查密码字段
	 * @param string $password
	 * @return boolean 合格返回true，否则返回false
	 */
	private function _checkPass($password) {
		//要求密码字段长度为6~20
		if(strlen($password)<6||strlen($password)>20) {
			//不合格
			$this->flashSession->error("要求密码名字段长度为6~20");
			return false;
		}
		
		return true;
	}
	
	/**
	 * 添加学生用户
	 * @param string $username
	 * @param email $email
	 * @param string $password
	 * @return boolean 成功返回true,否则返回false
	 */
	private function _addUser($username,$email,$password) {
		$user = new Users();
		$user->username = $username;
		$user->email = $email;
		
		if($user->save()) {
			if($this->_addPass($username, $password,1)) {
				return true;
			}
		}else {
			$this->flashSession->error("创建用户失败，请稍后再试");
		}
		
		return false;
	}
	
	/**
	 * 添加企业用户
	 * @param unknown $username
	 * @param unknown $email
	 * @param unknown $password
	 * @return boolean 成功返回true,否则返回false
	 */
	private function _addManager($username,$email,$password) {
		$manager = new Managers();
		$manager->username = $username;
		$manager->email = $email;

		if($manager->save()) {
			if($this->_addPass($username, $password,2)) {
				return true;
			}
		}else {
			$this->flashSession->error("创建用户失败，请稍后再试");
		}
		
		return false;
	}
	
	/**
	 * 记录密码
	 * @param string $username
	 * @param string $password
	 * @param int $type 用户类型
	 * @return boolean 成功返回true,否则返回false
	 */
	private function _addPass($username,$password,$type) {
		$pass = new Passwords();
		$pass->username = $username;
		$pass->password = $this->security->hash($password);
		$pass->type = $type;
		if($pass->save()) {
			return true;
		}else {
			$this->flashSession->error("密码记录失败，请稍后再试");
			return false;
		}
	}
}