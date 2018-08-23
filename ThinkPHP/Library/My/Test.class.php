<?php
namespace My;
class Test {
	private $v = null;



	function __construct() {
        $this->v = "111";
    }

	public function sayHello(){
		echo "hello ".$this->v;
	}

	public static  function say(){
		echo "static say ";
	}
}