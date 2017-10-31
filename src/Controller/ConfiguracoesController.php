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


class ConfiguracoesController extends AppController
{


	public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Paginator');

        $this->set('sectionName', 'Configurações');
        $this->set('sectionSubtitle', '');

        $this->set("acessos", $this->Access->getAcessosLista());
    }

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow('post');
    }


    public function index()
    {  
        $modelosTable = TableRegistry::get('Modelos');
        $modelos = $modelosTable->find('all');

        $servicosTable = TableRegistry::get('Servicos');
        $servicos = $servicosTable->find('all');

        $unidadesTable = TableRegistry::get('Unidades');
        $unidades = $unidadesTable->find('all');

        $this->set("modelos", $modelos);
        $this->set("servicos", $servicos);
        $this->set("unidades", $unidades);

    }
}
