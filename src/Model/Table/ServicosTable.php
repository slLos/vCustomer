<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\Query;

class ServicosTable extends Table
{
	public function initialize(array $config)
    {
        $this->table('servicos');
        $this->primaryKey('ID_SERVICO_SERV');

        $this->addBehavior('Timestamp', [
            'events' => [
                'Model.beforeSave' => [
                    'DT_INICIO_SERV' => 'new'
                ]
            ]
        ]);

        $this->hasMany('ServicoValores', [
            'joinType' => 'left',
            'foreignKey' => 'ID_SERVICO_SERV',
            'bindingKey' => 'ID_SERVICO_SERV'
        ]);


    }

    public function beforeSave($event, $entity, $options) {
        
    }

    public function validationDefault(Validator $validator)
    {
        return $validator
            ->notEmpty('ST_DESCRICAO_SERV', 'Descrição é necessária');
    }



}