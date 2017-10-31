<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\Query;

class UsuariosAcessosTable extends Table
{
	public function initialize(array $config)
    {
        $this->table('usuario_acessos');


    }

}