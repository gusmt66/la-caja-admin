<?php

    namespace App\Model\Table;
    use Cake\ORM\Table;
    use Cake\Validation\Validator;

    class TriviaQuestionsTable extends Table
    {
    	public function initialize(array $config)
    {
        $this->hasMany('TriviaAnswers');
    }
    	 
    	
    }
?>