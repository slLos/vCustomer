<?php
namespace Cake\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use Exception;

class AccessComponent extends Component
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

    protected $acessos = [
        ['key'  =>  'all',                  
        'controller' => [], 
        'action' => [],
        'alias' =>  'Todos os Privilégios',         'cod'   =>  9999],
        
        ['key'  =>  'users',          
        'controller' => ['Users'], 
        'action' => ['index', 'put', 'post'],
        'alias' =>  'Controle de usuários',           'cod'   =>  9910],

        ['key'  =>  'agenda',          
        'controller' => ['Agenda'], 
        'action' => ['index'],
        'alias' =>  'Ver agenda',           'cod'   =>  1000],

        ['key'  =>  'agenda_alterar',          
        'controller' => ['Agenda'], 
        'action' => ['post', 'put'],
        'alias' =>  'Adicionar/alterar agendamentos',           'cod'   =>  1001],

        ['key'  =>  'agenda_excluir',          
        'controller' => ['Agenda'], 
        'action' => ['delete'],
        'alias' =>  'Excluir agendamentos',           'cod'   =>  1002],

        ['key'  =>  'clientes',          
        'controller' => ['Clientes'], 
        'action' => ['index', 'post', 'put', 'delete'],
        'alias' =>  'Gerenciar clientes',           'cod'   =>  2000],

        ['key'  =>  'configuracoes',          
        'controller' => ['Configuracoes'], 
        'action' => ['index'],
        'alias' =>  'Configurações de sistema',           'cod'   =>  9000],
    ];

    public function getAcesso($accessController = null, $accessAction = null) {
        $acessos = $this->acessos;

        if(isset($_SESSION["permissoes"])) 
        {
            if(in_array(9999, $_SESSION["permissoes"])) {
                return true;
            }
            // Procurar ocorrências do controller
            $countController = 0;
            foreach ($acessos as $key => $acesso) {
                foreach ($acesso['controller'] as $controller) {
                    //return $controller .'=='. $accessController;
                    if($controller == $accessController) {
                        $arControllers[$countController] = $acessos[$key];
                        $countController++;
                    }                
                }
            }

            if(!isset($arControllers)) {
                return false;
            }

            foreach ($arControllers as $key => $acesso) {

                if(in_array($accessAction, $acesso['action'])) {
                    //return $_SESSION["permissoes"];
                    if(in_array($arControllers[$key]['cod'], $_SESSION["permissoes"]))
                        { return true; }
               
                }
            }

            return false;
        }
        else 
            { return false; }

    }

    public function getPermissao($permissao = 0) {
        if(in_array(9999, $_SESSION["permissoes"]) || in_array($permissao, $_SESSION["permissoes"])) {
            return true;
        }

        return false;
    }

    public function getAcessosLista() {
        return $this->acessos;
    }
    

}
