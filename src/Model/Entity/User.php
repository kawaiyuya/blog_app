<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;
class User extends Entity
{
    protected $_hidden = [
        'password'
    ];

    // passwordの暗号化メソッド
    protected function _setPassword($password)
    {
        return (new DefaultPasswordHasher)->hash($password);
    }

    protected $_accessible = [
        'name' => true,
        'password' => true,
        'created' => true,
        'modified' => true
    ];
}
