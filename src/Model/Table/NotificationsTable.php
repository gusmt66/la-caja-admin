<?php

  namespace App\Model\Table;
  use Cake\ORM\Table;
  use Cake\Validation\Validator;

  class NotificationsTable extends Table
  {
      public function initialize(array $config)
      {
          parent::initialize($config);
      }

  	public function validationDefault(Validator $validator)
    {
        return $validator
          ->notEmpty('message', 'Por favor complete el campo mensaje')
          ->notEmpty('link', 'Por favor complete el campo link');
    }
  }

?>