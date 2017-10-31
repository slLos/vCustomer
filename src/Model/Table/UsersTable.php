<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\Query;

class UsersTable extends Table
{
	public function initialize(array $config)
    {
        $this->table('usuarios');
        $this->primaryKey('ID_USUARIO_USU');

        $this->addBehavior('Timestamp', [
            'events' => [
                'Model.beforeSave' => [
                    'DT_CADASTRO_USU' => 'new'
                ]
            ]
        ]);


    }

    public function beforeSave($event, $entity, $options) {
        
    }

    public function validationDefault(Validator $validator)
    {
        return $validator
            ->notEmpty('ST_NOME_USU', 'Nome é necessário')
            ->notEmpty('ST_APELIDO_USU', 'Apelido é necessária');
    }



}