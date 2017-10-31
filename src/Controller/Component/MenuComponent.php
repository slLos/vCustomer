<?php
namespace Cake\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use Exception;

class MenuComponent extends Component
{
    /**
     * Default configuration
     *
     * @var array
     */

    /*
     * Concessionária => 10
     * Corretora => 20
     * Programa => 30
     * Newsletter => 40
     * Sistema => 99
     */
    public $_menu = array();


    public function __construct()
    {   
        // Opções do menu
        $this->_menu[] = [
            'label' => 'Inicio',
            'controller' => 'Dashboard',
            'action' => 'index',
            'permission' => 0,
            'icon' => 'dashboard',
            'class' => '',
            'id' => 'dashboard',
        ];

        $this->_menu[] = [
            'label' => 'Agendamentos',
            'controller' => '',
            'action' => '',
            'permission' => 0,
            'icon' => 'date_range',
            'class' => '',
            'id' => 'agendamentos',
            'options' => [
                0 => [
                    'label' => 'Agenda de serviços',
                    'controller' => 'Agenda',
                    'action' => 'index',
                    'permission' => 0,
                    'class' => ''
                ],

                1 => [
                    'label' => 'Serviços do dia',
                    'controller' => 'Agenda',
                    'action' => 'index',
                    'permission' => 0,
                    'class' => ''
                ],
            ]
        ];

        $this->_menu[] = [
            'label' => 'Clientes',
            'controller' => 'Clientes',
            'action' => 'index',
            'permission' => 0,
            'icon' => 'group',
            'class' => '',
            'id' => 'clientes',
        ];

        $this->_menu[] = [
            'label' => 'Funcionários',
            'controller' => 'Users',
            'action' => 'index',
            'permission' => 0,
            'icon' => 'work',
            'class' => '',
            'id' => 'funcionarios',
        ];

        $this->_menu[] = [
            'label' => 'Configurações',
            'controller' => 'Configuracoes',
            'action' => 'index',
            'permission' => 0,
            'icon' => 'settings',
            'class' => '',
            'id' => 'confs',
        ];
    }

    public function get($permissions = 9999, $accessController = null, $accessAction = null) {    
        // Gerar Menu
        if($permissions && count($permissions) > 0)
        {
            $buildMenu = array();
            $label_index = 0;
            $option_index = 0;

            if(in_array(9999, $permissions)) {
                $grantAll = true;
                //return $this->_menu;
            }
            else
                { $grantAll = false; }


            foreach ($this->_menu as $option) {
                if(in_array($option['permission'], $permissions) || $grantAll) {

                    // Montando menu
                    $buildMenu[$label_index]['label'] = $option['label'];
                    $buildMenu[$label_index]['class'] = $option['class'];
                    $buildMenu[$label_index]['icon'] = $option['icon'];
                    $buildMenu[$label_index]['id'] = $option['id'];

                    if(isset($option['options'])) {
                        foreach ($option['options'] as $sub) {

                            if(in_array($sub['permission'], $permissions) || $grantAll) {
                                $buildMenu[$label_index]['options'][$option_index]['label'] = $sub['label'];
                                $buildMenu[$label_index]['options'][$option_index]['class'] = $sub['class'];
                                $buildMenu[$label_index]['options'][$option_index]['controller'] = $sub['controller'];
                                $buildMenu[$label_index]['options'][$option_index]['action'] = $sub['action'];

                                // Ativa
                                if($sub['controller'] == $accessController && $sub['action'] == $accessAction)
                                { 
                                    $buildMenu[$label_index]['options'][$option_index]['class'] .= ' active'; 
                                    $buildMenu[$label_index]['class'] .= ' active';
                                }

                                // if(!isset($buildMenu[$label_index]['options'][$menu_index]['class']))
                                //     { $buildMenu[$label_index]['options'][$menu_index]['class'] = ''; }

                                $option_index++; // Próxima opção
                            }
                            
                        }
                    }
                    else {
                        $buildMenu[$label_index] = $option;
                        // Ativa
                        if($option['controller'] == $accessController && $option['action'] == $accessAction)
                            { $buildMenu[$label_index]['class'] .= ' active'; }
                    }

                    $label_index++; // Próximo label

                }
            }

            return $buildMenu;
        }
        
        return $this->_menu;
    }

}
