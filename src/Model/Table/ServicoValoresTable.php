<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\Query;

class ServicoValoresTable extends Table
{
	public function initialize(array $config)
    {
        $this->table('servico_valores');
        $this->primaryKey('ID_VALOR_SRV');

        $this->addBehavior('Timestamp', [
            'events' => [
                'Model.beforeSave' => [
                    'DT_CADASTRO_SRV' => 'new'
                ]
            ]
        ]);


    }

    public function beforeSave($event, $entity, $options) {
        
    }

    public function validationDefault(Validator $validator)
    {
        return $validator
            ->notEmpty('VL_VALOR_SRV', 'Valor é necessário');
    }



}