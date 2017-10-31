<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\Query;

class ModelosTable extends Table
{
	public function initialize(array $config)
    {
        $this->table('modelos');
        $this->primaryKey('ID_MODELO_MOD');
    }

    public function beforeSave($event, $entity, $options) {
        
    }

    public function validationDefault(Validator $validator)
    {
        return $validator
            ->notEmpty('ST_DESCRICAO_MOD', 'Descrição é necessária');
    }



}