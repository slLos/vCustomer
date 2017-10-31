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


class ModelosController extends AppController
{

    public function post()
    {
        $modelosTable = TableRegistry::get('Modelos');
        $modelo = $modelosTable->newEntity();
        if ($this->request->is('post')) {

            $modelo = $modelosTable->patchEntity($modelo, $this->request->data);
            if ($modelosTable->save($modelo)) {
                $this->Flash->success('Modelo adicionado com sucesso.', [
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
        $modelosTable = TableRegistry::get('Modelos');

        $id = $this->request->data['ID_MODELO_MOD'];
        $modelo = $modelosTable->get($id);

        if ($this->request->is(['post', 'put'])) {

            $modelo = $modelosTable->patchEntity($modelo, $this->request->data);

            if ($modelosTable->save($modelo)) {
                $this->Flash->success('Modelo atualizado com sucesso.', [
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
