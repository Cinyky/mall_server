<?php
namespace Admin\Controller;
use Think\Controller;
class UserController extends Controller {
    public function index(){
        $this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px }</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>[ 您现在访问的是Admin模块的User控制器 ]</div><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
    }

    public function select(){
    	$User = D('User');
    	// $users = $User->field('name,age')->limit(10)->select();

    	$users = $User->scope('page')->order('id ASC')->select();
		
		// $ids = $User->order('name DESC,age ASC')->getField('id,name,age');

		// dump($ids);

		// dump($User->data());

    	// echo json_encode($users);
    	$users['time'] = date("Y/m/d");

    	dump($users);
    }

    public function selectById(){
    	$User = D('User');

    	$users = $User->select('1,3,2');
		
    	$users['time'] = date("Y/m/d h:i:sa");

    	echo json_encode($users);
    }

    public function selectByName(){
    	$User = D('User');

    	$user = $User->getByName("withoutName");
		
    	$user['time'] = date("Y/m/d h:i:sa");

    	echo json_encode($user);
    }

    public function update(){
    	$User = M('User');
    	$data['name'] = "update";
    	$data['age'] = 2222;
    	$User->where('id = 1')->save($data);

    	$this->redirect('select', array(),2, '页面跳转中...');
    }

    public function updateAll(){
    	$User = M('User');
    	$age = I('get.age');
    	$data['age'] = $age;
    	$User->where('1')->save($data);

    	$this->redirect('select', array(),2, '页面跳转中...');
    }
    
     public function findUpdate(){
    	$User = M('User');
    	$User->find(2);
    	$User->name = 'TOPThink';
    	$User->save();
    	$this->redirect('select', array(),2, '页面跳转中...');
    }

    public function updateByModel(){
    	$User = M('User');
    	$User->create();
    	$User->name = "withoutName";
    	$User->age = 33333;
    	$User->id = '2';
    	$User->save();

    	$this->redirect('select', array(),2, '页面跳转中...');
    }

    public function delete(){
    	$id = I('get.id');
    	$User = M('User');
    	$User->where('id = '.$id )->delete();
    	$this->redirect('select', array(),2, '页面跳转中...');
    }

    public function insert(){
    	$User = D('User');
    	$data['name'] = "cyyyy";
    	$data['id'] = '7';
    	$data['age'] = 24;
    	// $data = $User->data($data)->add();

    	$data = $User->add($data);

    	$this->redirect('select', array(),2, '页面跳转中...');
    }
}