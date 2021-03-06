<?php
namespace App\Model\Entity;

use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;

class User extends Entity
{

    // Gera conjunto de todos os campos exceto o com a chave primária.
    protected $_accessible = [
        '*' => true
    ];

    // ...

    protected function _setST_SENHA_USU($password)
    {
        return (new DefaultPasswordHasher)->hash($password);
    }

    // ...
}