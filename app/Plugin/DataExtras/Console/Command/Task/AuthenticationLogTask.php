<?php
/**
 * Insert AuthenticationLog Task
 *
 * @copyright    copyright 2012 Passbolt.com
 * @license      http://www.passbolt.com/license
 * @package      app.plugins.DataExtras.Console.Command.Task.AuthenticationLogTask
 * @since        version 2.13.03
 */

require_once(APP_DIR . DS  . 'Plugin' . DS . 'DataExtras' . DS . 'Console' . DS . 'Command' . DS . 'Task' . DS . 'ModelTask.php');

App::uses('User', 'Model');

class AuthenticationLogTask extends ModelTask {

	public $model = 'AuthenticationLog';

	protected function getData() {
		$User = ClassRegistry::init('User');
		$users = array();
		$users['test'] = $User->findByUsername('test@passbolt.com');
		
		$rs[] = array('AuthenticationLog' => array(
			'id' => Common::uuid(),
			'user_id' => $users['test']['User']['id'],
			'username' => $users['test']['User']['username'],
			'ip' => '127.0.0.1',
			'status' => false,
			'created' => '2012-07-04 13:39:25',
		));
		$rs[] = array('AuthenticationLog' => array(
			'id' => Common::uuid(),
			'user_id' => $users['test']['User']['id'],
			'username' => $users['test']['User']['username'],
			'ip' => '127.0.0.1',
			'status' => true,
			'created' => '2012-07-04 13:40:25',
		));
		return $rs;
	}
}