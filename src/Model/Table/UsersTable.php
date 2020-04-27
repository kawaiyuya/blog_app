<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class UsersTable extends Table{

    public function initialize(array $config){

        parent::initialize($config);

        $this->setTable('users');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        // CommentsTableとの紐付け(n側)
        $this->hasMany('Posts', [
            // Userが削除された時紐付づいた投稿を削除
            'dependent'=>ture
        ]);
    }

    // バリデーションメソッド
    public function validationDefault(Validator $validator)
    {
        return $validator
            ->notEmpty('name', 'A name is required')
            ->notEmpty('password', 'A password is required')
            ->notEmpty('role', 'A role is required')
            ->add('role', 'inList', [
                'rule' => ['inList', ['admin', 'author']],
                'message' => 'Please enter a valid role'
            ]);

        return $validator;
    }

    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['name']));

        return $rules;
    }
}