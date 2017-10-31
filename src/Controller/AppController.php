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
use Cake\ORM\TableRegistry;

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
        $this->loadComponent('Menu');
        $this->loadComponent('Access');
        $this->loadComponent('Csrf');

        $this->set('groupName', 'Oficina de Serviços');

        $this->loadComponent('Auth', [
            'authorize' => ['Controller'], // Adicione está linha
            'loginRedirect' => [
                'controller' => 'Pages',
                'action' => 'test'
            ],
            'logoutRedirect' => [
                'controller' => 'Users',
                'action' => 'login'
            ],
            'authError' => 'Você não está autorizado a acessar essa página.',
            'authenticate' => [
            'Form' => [
                'fields' => ['username' => 'ST_EMAIL_USU', 'password' => 'ST_SENHA_USU']
            ]
        ],
        ]);

        
        $this->set('usuario', $this->Auth->user());
        
        $this->set('menu', $this->Menu->get(array(9999), $this->request->controller, $this->request->action));

        date_default_timezone_set('America/Sao_Paulo');
        setlocale( LC_ALL, 'pt_BR', 'pt_BR.iso-8859-1', 'pt_BR.utf-8', 'portuguese' );
    }

    public function beforeFilter(Event $event)
    {
        $this->Auth->allow(['login', 'logout']);
    }


    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return void
     */
    public function beforeRender(Event $event)
    {
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
    }


    public function isAuthorized($user)
    {
        if($user) {
            if(!isset($_SESSION["permissoes"])) {
                $opcoesTable = TableRegistry::get('UsuariosAcessos');

                $codUsuario = $this->Auth->User('ID_USUARIO_USU');

                $opcoes = $opcoesTable ->find()
                    ->select('NM_ACESSO_ACE')
                    ->where("ID_USUARIO_USU = $codUsuario")
                    ->toArray();

                foreach ($opcoes as $key => $value) {
                    $arOpcoes[$key] = $value['NM_ACESSO_ACE'];
                }
                $_SESSION["permissoes"] = $arOpcoes;
            }

            if($this->request->controller == "Main") {
                $this->set('menu', $this->Menu->get($_SESSION["permissoes"], $this->request->controller, $this->request->action));
                return true;
            }
        }
        $this->set('menu', $this->Menu->get($_SESSION["permissoes"], $this->request->controller, $this->request->action));
        $accessGranted = $this->Access->getAcesso($this->request->controller, $this->request->action);

        if($accessGranted)
            { return true; }
        else
            { return false; }
    }

    public function logout()
    {
        unset($_SESSION["permissoes"]);
        return $this->redirect($this->Auth->logout());
    }
}
