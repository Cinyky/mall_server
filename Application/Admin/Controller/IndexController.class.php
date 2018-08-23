<?php
namespace Admin\Controller;
use Think\Controller;
use My\Test;
class IndexController extends Controller {

    public function _empty(){
        $this->index();
    }

    public function index(){
        $this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px }</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>[ 您现在访问的是Admin模块的Index控制器 ]</div><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
    }

    public function getConfig(){
    	// $param1 = I("path.1");
     //    $param2 = I("path.2");
     //    $param3 = I("path.3");

    	$config = array('WEB_SITE_TITLE'=>'ThinkPHP'
    		,'WEB_SITE_DESCRIPTION'=>'开源PHP框架'
    		,'AS' => array('1' => '1', 
    					    '2' => '2'
    				)
    	);
    	// $config['param1'] = $param1;
     //    $config['param2'] = $param2;
     //    $config['param3'] = $param3;
    	echo json_encode($config);
    }

    public function _before_test(){
        echo "_before_test ";
    }

    public function test(){
        $Test = new Test();
        Test::say();
        $Test->sayHello();
        // $this->success('success',U('getConfig','param=1'),5);
        // $this->redirect('Index/getConfig', array('param' => 2), 2, '页面跳转中...');
        // $this->redirect('/Home/Index/index', array(),2, '页面跳转中...');
    }

    public function _after_test(){
         echo "_after_test";
    }

    public function trans(){
       echo U('getConfig','param=1');
    }

    public function ajax(){
       $data = array('WEB_SITE_TITLE'=>'ThinkPHP'
            ,'WEB_SITE_DESCRIPTION'=>'开源PHP框架'
            ,'AJAX' => array('1' => '1', 
                            '2' => '2'
                    )
        );

       $this->ajaxReturn($data);
    }

    public function request(){
       if (IS_POST) {
        echo "IS_POST";
       }elseif (IS_GET) {
        echo "IS_GET";
       }
    }
}