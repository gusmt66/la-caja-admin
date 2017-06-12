<?php

  namespace App\Model\Table;
  use Cake\ORM\Table;
  use Cake\Validation\Validator;

  class UsersAdminTable extends Table
  {
      public function initialize(array $config)
      {
          parent::initialize($config);
      }

  	public function validationDefault(Validator $validator)
    {
        return $validator
          ->notEmpty('username', 'Por favor complete el campo usuario')
          ->notEmpty('password', 'Por favor complete el campo contraseña')
          ->notEmpty('password_confirmation', 'La verificacion de contrasena es requerida')
          ->add('password', [
          	'length' => [
          		'rule' => ['minLength', 8],
          		'message' => 'La contrasena debe contener al menos 8 caracteres'
          	],
          	'compare' => [
          		'rule' => ['compareWith', 'password_confirmation'],
          		'message' => 'Contrasena y Confirmacion de Contrasena deben ser iguales'
          	]
          ]);
    }
  }

?>