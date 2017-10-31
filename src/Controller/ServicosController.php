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


class ServicosController extends AppController
{

    public function post()
    {
        $servicosTable = TableRegistry::get('Servicos');
        $servico = $servicosTable->newEntity();
        if ($this->request->is('post')) {

            $servico = $servicosTable->patchEntity($servico, $this->request->data);
            if ($servicosTable->save($servico)) {
                $this->Flash->success('Servico adicionado com sucesso.', [
                    'key' => 'call'
                ]);

                return $this->redirect(['controller' => 'Configuracoes','action' => "index"]);
            }

            $this->Flash->error('Não foi possível realizar operação.', [
                'key' => 'call'
            ]);
            
            return $this->redirect(['controller' => 'Configuracoes','action' => "index"]);
        }
    }

    public function put($id = null)
    {
        $servicosTable = TableRegistry::get('Servicos');

        $id = $this->request->data['ID_SERVICO_SERV'];
        $servico = $servicosTable->get($id);

        if ($this->request->is(['post', 'put'])) {

            $servico = $servicosTable->patchEntity($servico, $this->request->data);

            if ($servicosTable->save($servico)) {
                $this->Flash->success('Serviço atualizado com sucesso.', [
                    'key' => 'call'
                ]);

                return $this->redirect(['controller' => 'Configuracoes','action' => "index"]);
            }

            $this->Flash->error('Não foi possível realizar operação.', [
                'key' => 'call'
            ]);
            return $this->redirect(['controller' => 'Configuracoes','action' => "index"]);
        }

    }

    public function delete()
    {
        $this->autoRender = false;
    }
}
