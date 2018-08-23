<?php
namespace Admin\Model;
use Think\Model;
class UserModel extends Model {
	protected $_scope = array(
		'page' => array('order' => 'id DESC'
				,'field' => 'name,age,id'
			)

	);

	protected $id = null;
	// protected $name = null;
	protected $age = null;
}