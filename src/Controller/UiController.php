<?php
/**
 * Created by PhpStorm.
 * User: aymard.pro
 * Date: 15/04/2017
 * Time: 21:44
 */

namespace CakeSwagger\Controller;

use function array_key_exists;
use Cake\Event\Event;
use Cake\Routing\Router;
use CakeSwagger\Controller\AppController;
use function compact;
use OpenApi\Annotations\OpenApi;

class UiController extends AppController
{
	
	/**
	 * @param Event $event
	 * @return \Cake\Http\Response|null|void
	 * @throws \CakeSwagger\Exception\CakeSwaggerException
	 */
	public function beforeFilter(Event $event)
	{
		parent::beforeFilter($event);
		if ($this->request->getParam('action') === 'json') {
			$this->autoRender = false;
		}
	}
	
	/**
	 * @param Event $event
	 *
	 * @return \Cake\Network\Response|null|void
	 */
	public function beforeRender(Event $event)
	{
		parent::beforeRender($event);
		if ($this->request->getParam('action') === 'json') {
			$this->RequestHandler->renderAs($this, 'json');
		}
	}
	
	/**
	 * Index method
	 *
	 * @throws \Cake\Core\Exception\Exception
	 */
	public function index()
	{
		$url = array_key_exists('directory', $this->config) && empty($this->config['directory']) ?
			'http://petstore.swagger.io/v2/swagger.json' :
			Router::url([
				'plugin' => 'CakeSwagger',
				'controller' => 'Ui',
				'action' => 'json'
			], true);
		
		$this->set(compact('url'));
	}
	
	/**
	 * Generate a swagger json
	 *
	 * @throws \CakeSwagger\Exception\CakeSwaggerException
	 */
	public function json()
	{
        error_reporting(0);
        $reponse = $this->response;
        $reponse->body(json_encode($this->_scan()));
        $reponse->withType('application/json');
        
		return $reponse;
	}
	
	/**
	 * Scan directories for build swagger documentation
	 *
	 * @return Swagger
	 * @throws \CakeSwagger\Exception\CakeSwaggerException
	 */
	private function _scan(): OpenApi
	{
		return \OpenApi\scan($this->config['directory'], $this->options);
	}
	
}