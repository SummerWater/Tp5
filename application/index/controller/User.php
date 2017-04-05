<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use think\Request;

use app\index\model\User as UserModel;

class User extends Controller
{
	public function index()
	{
		$user = new UserModel;
		$list = $user->select();
		return dump($list);
	}
	
	public function add()
	{
		$user = new UserModel;
		$data = [
			['nickname' => 'slm', 'email' => '1@qq.com', 'birthday' => strtotime('1993-09-20')],
			['nickname' => 'slm2', 'email' => '1@qq.com', 'birthday' => strtotime('1993-09-20')],
			['nickname' => 'slm3', 'email' => '1@qq.com', 'birthday' => strtotime('1993-09-20')],
		];

		if($user->saveAll($data)) {
			return '批量添加成功';
		}else{
			return $user->getError();
		}
	}
}