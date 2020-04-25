<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class PostsTable extends Table{
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
        
        // UsersTableとの紐付け(1側)
        $this->belongsTo('Users');
    }

    // バリデーションメソッド
    public function validationDefault(Validator $validator)
    {
        $validator
            ->notEmpty('body')
            ->requirePresence('body')
            ->add('body', [
                'length' => [
                    'rule' => ['minLength', 10],
                    'message' => 'body length must be 10+'
                ]
            ]);
        return $validator;
    }

}
