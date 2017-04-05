<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use think\Request;

use app\index\model\User as UserModel;

class Index extends Controller
{
	public function index($name = 'World', $city = 'Shanghai')
	{
		// Db::name('data')->execute('TRUNCATE TABLE think_data');
		// Db::name('data')->insert(['data' => 'framework']);
		$data = Db::name('data')->find();
		echo 'Hello ' . $name . ', City: ' . $city . '.<br/>';
		$list = Db::name('data')->select();
		dump($list);
		$this->assign('result', $data);
		return $this->fetch();
	}

	public function hello(Request $request)
	{
		echo 'method ' . $request->method() . '<br/>';
		echo 'url: ' . $request->url() . '<br/>';
		echo 'Hello Think.';
	}

	public function user()
	{
		$user = new UserModel;
		$user->nickname = '香菜有毒';
		$user->email = '364216899@qq.com';
		$user->birthday = strtotime('1993-09-20');

		if($user->save()) {
			return '用户' . $user->nickname . ':' . $user->id . '新增成功！';
		}else{
			return $user->getError();
		}
	}
}