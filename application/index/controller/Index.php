<?php
namespace app\index\controller;

use app\index\model\Contacts;
use app\index\model\Image;
use app\index\model\Password;
use think\Request;

class Index
{
    public function index()
    {
        $hostName = exec("hostname");
        $hostIp = gethostbyname($hostName);
        return '你好未来世界：'.$hostIp;
    }

    public function getUserInfo(){
        $user = new Contacts();
        $user->name = '王言龙';
        $user->mobile = '18321152272';
        return json($user);
    }
	
	public function addUser()
	{
		$user = new Contacts();
		$user->name = '王言龙';
		$user->year_of_birth = '1988';
		$user->address = '安徽霍邱';
		$user->school = '周店中学';
		$user->sex = '1';
		$user->mobile = '18321152272';
		$user->ctime = time();
		$user->utime = $user->ctime;
		$user->save();
		return '添加成功：'.$user->id;
	}

	//获取局域网内IP
	public function getLocalIp(){
        $hostName = exec("hostname");
        $hostIp = gethostbyname($hostName);
        return $hostIp;
    }

	public function addPassword(){
        // 取参数
        $request = Request::instance();
        $title = $request->param('title');
        $user = $request->param('user');
        $pwd = $request->param('password');
        $desc = $request->param('desc');
        if(is_null($title)) return '没有内容';

        $password = new Password();
        $password->user = $user;
        $password->title = $title;
        $password->password = $pwd;
        $password->desc = $desc;
        $password->ctime = time();
        $password->save();
        return '1';
    }

    /**
     * 更新密码
     */
    public function updatePassword(){
        // 取参数
        $request = Request::instance();
        $id = $request->param('id');
        $title = $request->param('title');
        $user = $request->param('user');
        $pwd = $request->param('password');
        $desc = $request->param('desc');

        if(is_null($id)) return 'no way';

        $password = Password::get($id);

        if(is_null($password)) return;

        $password->user = $user;
        $password->title = $title;
        $password->password = $pwd;
        $password->desc = $desc;
        $password->save();
        return '1';
    }

    public function queryAllPassword(){
        $list = Password::all();
//        $note = new Note();
//        //$list = $note->limit(5)->order('id','desc')->select();
        return json($list);
    }

    public function allImages(){
        $list=Image::all();
        return json($list);
    }
}
