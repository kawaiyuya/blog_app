<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class Post extends Entity
{

    protected $_accessible = [
        'title' => true,
        'content' => true,
        'user_id' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
    ];
}
