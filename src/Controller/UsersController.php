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
 * @author    Leitao
 */
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;


class UsersController extends AppController
{
    public $paginate = [
        'limit' => 1,
        'order' => [
            'Users.ID_USUARIO_USU' => 'desc'
        ]
    ];




	public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Paginator');

        $this->set('sectionName', 'Usuários');
        $this->set('sectionSubtitle', '');

        $this->set("acessos", $this->Access->getAcessosLista());
    }

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow('post');
    }

    public function login() {
    	$this->viewBuilder()->layout('login');

        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);

                // Ultima visita
                $codUser = $this->Auth->User('ID_USUARIO_USU');
                $userEntity = $this->Users->get($codUser);
                $userEntity->DT_ULTIMOLOGIN_USU = date("Y-m-d H:i:s");

                $this->Users->save($userEntity);

                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error('Usuário ou senha ínvalido, tente novamente', [
                    'key' => 'call'
                ]);
        }
    }

    public function index()
    {  
        $users = $this->Users->find('all');

        $this->set('users', $this->paginate($users));
    }

    public function view($id)
    {
        $user = $this->Users->get($id);
        $this->set(compact('user'));
    }

    public function post()
    {
        $opcoesTable = TableRegistry::get('UsuariosAcessos');

        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {

            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {

                if(count($this->request->data['ACESSSOS']) > 0) {
                    foreach ($this->request->data['ACESSSOS'] as $acesso) {
                        $opcao = $opcoesTable->newEntity();

                        $opcao->ID_USUARIO_USU = $user->ID_USUARIO_USU;
                        $opcao->NM_ACESSO_ACE = $acesso;

                        $opcoesTable->save($opcao);
                    }
                }
                $this->Flash->success('Usuário adicionado com sucesso.', [
                    'key' => 'call'
                ]);
                return $this->redirect(['action' => 'post']);
            }
            $this->Flash->error('Não foi possível adicionar usuário.', [
                    'key' => 'call'
                ]);
        }

        $this->set('userData', $user);
    }

    public function put($id = null)
    {
        $this->set('sectionSubtitle', 'Atualizar Usuário');

        $opcoesTable = TableRegistry::get('UsuariosAcessos');
        $opcoes = $opcoesTable ->find()
            ->select('NM_ACESSO_ACE')
            ->where("ID_USUARIO_USU = $id")
            ->toArray();

        foreach ($opcoes as $key => $value) {
            $arOpcoes[$key] = $value['NM_ACESSO_ACE'];
        }

        $user = $this->Users->get($id);

        if ($this->request->is(['post', 'put'])) {

            $user = $this->Users->patchEntity($user, $this->request->data);

            if ($this->Users->save($user)) {
                $this->Log->newLog('change', 'Usuário '. $user->username . ' alterado.');
                $this->Flash->success('Usuário atualizado com sucesso.', [
                    'key' => 'call'
                ]);
                return $this->redirect(['action' => "put/$id"]);
            }
            $this->Flash->error('Não foi possível atualizar usuário.', [
                    'key' => 'call'
                ]);
        }

        

        $this->set('userData', $user);
        $this->set('userAccess', $arOpcoes);
    }

    public function delete()
    {
        $this->autoRender = false;


        if ($this->request->is(['post', 'put'])) 
        {
            $id =  $this->request->data['id'];

            $query = $this->Users->query();
            $query->delete()
                ->where(['codUser' => $id])
                ->execute();
            
            if($query) {
                $this->Log->newLog('delete', 'Usuário '. $id . ' excluido.');
                echo 1;
            } else {
                echo "Erro ao excluir.";
            }

        }

    }

    public function perfis() {
        $perfisTable = TableRegistry::get('Perfil');
        $perfis = $perfisTable->find('all');

        $this->set('perfis', $this->paginate($perfis));
    }

    public function postPerfil() {
    	$acessos = $this->Access->getAcessosLista();

    	$perfisTable = TableRegistry::get('Perfil');
    	$opcoesTable = TableRegistry::get('PerfilOpcao');

        $perfil = $perfisTable->newEntity();

    	if ($this->request->is('post')) {

    		$perfil = $perfisTable->newEntity();
    		$perfil = $perfisTable->patchEntity($perfil, $this->request->data);

    		try {
                $perfisTable->save($perfil);

                $this->Flash->success('Perfil adicionado com sucesso.', [
                    'key' => 'call'
                ]);

               	$codPerfil = $perfil->codPerfil;

               	foreach ($this->request->data['acessos'] as $acesso) {
               		$opcao = $opcoesTable->newEntity();

               		$opcao->codPerfil = $codPerfil;
               		$opcao->codOpcao = $acesso;

               		$opcoesTable->save($opcao);
               	}
               	

            } catch (\PDOException $e) {
                $this->Flash->error('Erro: '.$e->getMessage(), [
                    'key' => 'call'
                ]);
            }

            return $this->redirect($this->here);
    	}

    	$this->set('acessos', $acessos);
        $this->set('acessosUsuario', $perfil);
    }

    public function putPerfil($id = null)
    {
        $this->set('sectionSubtitle', 'Atualizar Perfil');

        $perfisTable = TableRegistry::get('Perfil');
    	$opcoesTable = TableRegistry::get('PerfilOpcao');

        $perfil = $perfisTable->get($id);

        if ($this->request->is(['post', 'put'])) 
        {
            $perfisTable->patchEntity($perfil, $this->request->data);


            try {
                $perfisTable->save($perfil);

                $codPerfil = $id;

                foreach ($this->request->data['acessos'] as $codOpc) {
                    // Adicionar Opcionais
                    $nOpcs = $opcoesTable
                        ->find('all')
                        ->where("codPerfil = $codPerfil AND codOpcao = $codOpc")
                        ->count();

                    if($nOpcs == 0) {
                        $opcao = $opcoesTable->newEntity();
                        $opcao->codPerfil = $codPerfil;
                        $opcao->codOpcao = $codOpc;

                        $opcoesTable->save($opcao);
                    }

                }

                // Deletar os opcionais que foram removidos
                $deleteOpc = $opcoesTable->query();
                $deleteOpc
                    ->delete()
                    ->where("codPerfil = $codPerfil AND codOpcao NOT IN (".implode(',', $this->request->data['acessos']).")")
                    ->execute();


                $this->Flash->success('Perfil atualizado com sucesso.', [
                    'key' => 'call'
                ]);


            } catch (\PDOException $e) {
                $this->Flash->error('Erro: '.$e->getMessage(), [
                    'key' => 'call'
                ]);
            }

        }        

        $opcoes = $opcoesTable
            ->find('all')
            ->where("codPerfil = $id")
            ->toArray();

        $perfil->acessos = $opcoes;

        $acessos = $this->Access->getAcessosLista();

        $this->set('acessosUsuario', $perfil);
        $this->set('acessos', $acessos);
    }
}
