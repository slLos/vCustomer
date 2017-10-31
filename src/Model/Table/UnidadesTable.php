<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\Query;

class UnidadesTable extends Table
{
	public function initialize(array $config)
    {
        $this->table('unidades');
        $this->primaryKey('ID_UNIDADE_UNI');

        $this->addBehavior('Timestamp', [
            'events' => [
                'Model.beforeSave' => [
                    'DT_CADASTRO_UNI' => 'new'
                ]
            ]
        ]);


    }

    public function beforeSave($event, $entity, $options) {
        
    }

    public function validationDefault(Validator $validator)
    {
        return $validator
            ->notEmpty('ST_CIDADE_UNI', 'Cidade é necessário')
            ->notEmpty('ST_TELEFONE_UNI', 'Telefone é necessária');
    }



}