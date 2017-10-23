<?php
namespace app\index\controller;

use app\index\model\Contacts;

class Index
{
    public function index()
    {
        return 'Hello PHP! I am Java';
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
    
}
