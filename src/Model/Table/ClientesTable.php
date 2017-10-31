<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\Query;

class ClientesTable extends Table
{
	public function initialize(array $config)
    {
        $this->table('clientes');
        $this->primaryKey('ID_CLIENTE_CLI');

        $this->hasMany('ClienteContatos', [
            'joinType' => 'left',
            'foreignKey' => 'ID_CLIENTE_CLI',
            'bindingKey' => 'ID_CLIENTE_CLI'
        ]);


    }

    public function beforeSave($event, $entity, $options) {
        
    }

    public function validationDefault(Validator $validator)
    {
        return $validator
            ->notEmpty('ST_NOME_CLI', 'Nome é necessário');
    }



}