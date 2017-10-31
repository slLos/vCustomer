<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\Query;

class AgendasTable extends Table
{
	public function initialize(array $config)
    {
        $this->table('agenda');
        $this->primaryKey('ID_AGENDA_AGE');

    }



}