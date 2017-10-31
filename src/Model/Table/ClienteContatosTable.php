<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\Query;

class ClienteContatosTable extends Table
{
	public function initialize(array $config)
    {
        $this->table('cliente_contatos');
        $this->primaryKey('ID_CONTATO_CONT');

    }

}