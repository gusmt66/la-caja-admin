<?php

    namespace App\Model\Table;
    use Cake\ORM\Table;
    use Cake\Validation\Validator;

    class TriviaAnswersTable extends Table
    {
    	public function initialize(array $config)
        {
            $this->hasMany('TriviaQuestions');
        }
    }
?>