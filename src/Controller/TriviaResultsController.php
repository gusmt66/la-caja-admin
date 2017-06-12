<?php

namespace App\Controller;

	use Cake\Core\Configure;
	use Cake\Network\Exception\NotFoundException;
	use Cake\View\Exception\MissingTemplateException;
	use Cake\Event\Event;
    use Cake\ORM\Query;
	use Cake\ORM\TableRegistry;
	use Cake\ORM\Table;
	use Cake\Utility\Hash;
    use Cake\Utility\Security;
    use Cake\Routing\Router;
	use Cake\Mailer\Email;
	use Cake\Core\App;
	use Cake\I18n\Time;
    use Cake\Validation\Validator;
    use Cake\Utility\String;

class  TriviaResultsController extends AppController
{
}

?>