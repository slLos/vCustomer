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


class UnidadesController extends AppController
{

    public function post()
    {
        $unidadesTable = TableRegistry::get('Unidades');
        $agendasTable = TableRegistry::get('Agendas');
        $unidade = $unidadesTable->newEntity();
        if ($this->request->is('post')) {

            $unidade = $unidadesTable->patchEntity($unidade, $this->request->data);
            if ($unidadesTable->save($unidade)) {
                $agenda = $unidadesTable->newEntity();
                $agenda->ID_UNIDADE_AGE = $unidadesTable->ID_UNIDADE_UNI;
                $agenda->FL_TIPO_AGE = 0;

                $unidadesTable->save($agenda);

                $this->Flash->success('Unidade adicionada com sucesso.', [
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
        $unidadesTable = TableRegistry::get('Unidades');

        $id = $this->request->data['ID_UNIDADE_UNI'];
        $unidade = $unidadesTable->get($id);

        if ($this->request->is(['post', 'put'])) {

            $unidade = $unidadesTable->patchEntity($unidade, $this->request->data);

            if ($unidadesTable->save($unidade)) {
                $this->Flash->success('Unidade atualizada com sucesso.', [
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
