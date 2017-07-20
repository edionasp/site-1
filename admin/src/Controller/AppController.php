<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Cookie');
        $this->loadComponent('Auditoria');
        $this->loadComponent('Sender');
        $this->loadComponent('Firewall');
        $this->loadComponent('Monitoria');
    }

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return \Cake\Network\Response|null|void
     */
    public function beforeRender(Event $event)
    {
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
    }

    /**
     * Redireciona para a tela de login com uma mensagem.
     *
     * @param string $mensagem Mensagem a ser exibida na tela de login.
     * @param bool $error Se a mensagem de erro é sucesso.
     */
    protected function redirectLogin(string $mensagem, bool $error = true)
    {
        if ($error)
        {
            $this->Flash->error($mensagem);
        }
        else
        {
            $this->Flash->success($mensagem);
        }

        $this->redirect(['controller' => 'system', 'action' => 'login']);
    }

    protected function configurarAcesso()
    {
        if(!$this->Firewall->verificar())
        {
            $mensagem = "O acesso ao sistema está bloqueado para este endereço de IP. Caso tenha sido bloqueado por engano, entre em contato com administrador.";
            $this->redirect(['controller' => 'system', 'action' => 'fail', base64_encode($mensagem)]);
        }
    }
}
