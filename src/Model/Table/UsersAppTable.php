<?php

  namespace App\Model\Table;
  use Cake\ORM\Table;
  use Cake\Validation\Validator;

  class UsersAppTable extends Table
  {
      public function initialize(array $config)
      {
          parent::initialize($config);
      }

  	public function validationDefault(Validator $validator)
    {
        return $validator
          ->notEmpty('username', 'Por favor complete el campo usuario')
          ->notEmpty('name', 'El nombre es requerido')
          ->notEmpty('email', 'El correo es requerido')
          ->notEmpty('password', 'Por favor complete el campo contrase«Ða')
          ->notEmpty('password_activation', 'La verificacion de contrasena es requerida')
          ->add('password', [
          	'length' => [
          		'rule' => ['minLength', 8],
          		'message' => 'La contrase«Ða debe contener al menos 8 caracteres'
          	]
          ])
         ->add('email', 'valid-email', ['rule' => 'email','message'=>'Ingrese una direcci«Ñn de correo v«¡lida']);
    }
  }

?>