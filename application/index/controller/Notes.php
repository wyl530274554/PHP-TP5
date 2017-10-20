<?php
namespace app\index\controller;

use app\index\model\Note;
use think\Request;

class Notes
{
	public function addNote(){
		// 取参数
		$request = Request::instance();
		$content = $request->param('content');
		$user = $request->param('user');
		if(is_null($content)) return '没有内容';

		$note = new Note();
		$note->user = $user;
		$note->content = $content;
		$note->ctime = time();
		$note->utime = $note->ctime;
		$note->save();
		return $note->id;
	}
	public function delNote(){
		// 取参数
		$request = Request::instance();
		$sid = $request->param('sid');
		if(is_null($sid)) return '没有此消息';

		$result = Note::destroy($sid);
		if ($result) {
			return '删除成功';
		}else{
			return '删除失败';
		}
	}

	public function updateNote(){
		$request = Request::instance();
		$sid = $request->param('sid');
		$content = $request->param('content');
		$note = Note::update(['id' => $sid, 'content' => $content, 'utime'=>time()]);
		if($note){
			return '更新成功';
		}else{
			return '更新失败';
		}
	}

	public function queryNote(){
//        $list = Note::all();
		$note = new Note();
		$list = $note->limit(5)->order('id','desc')->select();
		return json($list);
	}
}