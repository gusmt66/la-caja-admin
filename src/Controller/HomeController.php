<?php

namespace App\Controller;
    
    use Cake\Core\Configure;
    use Cake\Network\Exception\NotFoundException;
    use Cake\View\Exception\MissingTemplateException;
    use Cake\Event\Event;
    use Cake\ORM\TableRegistry;
    use Cake\ORM\Table;
    use Cake\Utility\Hash;
    use Cake\Mailer\Email;
    use Cake\Core\App;
    use Cake\Core\Security;
    use Cake\I18n\Time;
    use Cake\Controller\Component\PaginatorComponent;

class HomeController extends AppController
{

    private function randomPassword() {
     
        $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
     
        $pass = array(); //remember to declare $pass as an array
     
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
     
        for ($i = 0; $i < 8; $i++) {
     
            $n = rand(0, $alphaLength);
     
            $pass[] = $alphabet[$n];
     
        }
     
        //return implode($pass); //turn the array into a string

        return 's7x6bPIjd';

    }

    
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
    }

     public function beforeFilter(Event $event)
        {
            parent::beforeFilter($event);
            $this->Auth->allow(['uploadImage','getusers','getuser','getbooks',
                                'getGeneralInfo','getGallery',
                                'getEvents','getEvent','getTrivia',
                                'getSurvey','activateUser','authenticateUser',
                                'reactivateUser','answerTrivia','setSectionVisited',
                                'sendSurvey','registerToken','unregisterToken','getNewClue',
                                'getAssignedClue','resetPassword','sendEmail','updateUser','updateUserIOS','getParameters']);
        }

    public function beforeRender(Event $event)
    {
        $this->RequestHandler->renderAs($this, 'json');
        $this->response->type('application/json');
        $this->set('_serialize', true);
    }


    public function uploadImage(){

        // $this->viewBuilder()->layout(null);

        $directory='../webroot/img/users';  

        $this->log($this->request->data['file'], LOG_DEBUG);

        //$results = $this->uploadFile($this->request->data['file'],$directory);
        $tmp = $this->request->data['file']['tmp_name'];
        $results = $this->request->data['file']['name'];

        move_uploaded_file($tmp, $directory . '/' . $results);

        $this->set('results',$results);

        $this->log($results, LOG_DEBUG);

    }


    //***********************************************//
                    //Servicios GET//
    //***********************************************//
    
    public function getUsers()
    {
        $this->loadModel('UsersApp');

        // $this->viewBuilder()->layout(null);
        
        $results = $this->UsersApp
                    ->find('all')
                    ->select(['id','username','name','linkedin','email','job_title','company','user_type','picture_url']);
        $this->set('results',$results);

    }

    public function getUser($id)
    {
        $this->loadModel('UsersApp');

        // $this->viewBuilder()->layout(null);
        
        $results = $this->UsersApp
                    ->find('all', ['conditions'=>['id'=>$id]]);

        $this->set('results',$results);

    }

    public function getBooks()
    {
        $this->loadModel('Books');

        $this->viewBuilder()->layout(null);
        
        $results = $this->Books
                    ->find('all');
        $this->set('results',$results);
    }

    public function getGeneralInfo()
    {
        $this->loadModel('GeneralInformation');

        $this->viewBuilder()->layout(null);
        
        $results = $this->GeneralInformation
                    ->find('all');
        $this->set('results',$results);
    }

    public function getGallery()
    {
        $this->loadModel('Pictures');

        $this->viewBuilder()->layout(null);
        
        $results = $this->Pictures
                    ->find('all');
        $this->set('results',$results);
    }


    public function getEvents()
    {
        $this->loadModel('Events');

        $this->viewBuilder()->layout(null);
        
        $results = $this->Events->find('all');
        $this->set('results',$results);
    }

    public function getEvent($id)
    {
        $this->loadModel('Events');

        $this->viewBuilder()->layout(null);

        $results = $this->Events
        ->find('all', ['conditions'=>['id'=>$id]]);
        $this->set('results',$results);
    }

    public function getTrivia($user_id){

        $this->loadModel('TriviaResults');

        $userAnsweredTrivia = $this->TriviaResults->find('all',['conditions'=>['user_id'=>$user_id]])->toArray();
        
        //Si el usuario NO ha respondido la trivia aún, se carga la trivia
        if (!$userAnsweredTrivia){

            $this->loadModel('TriviaQuestions');
            $this->loadModel('TriviaAnswers');
            $results = $this->TriviaQuestions
            //->find('all')
            ->find('all', array('limit'=>75))
                    ->select(['TriviaQuestions.id','TriviaQuestions.question','TriviaQuestions.order','answers.id','answers.question_id','answers.answer','answers.is_correct'])
            ->join([
                'table' => 'trivia_answers',
                'alias' => 'answers',
                'type' => 'INNER',
                'conditions' => 'TriviaQuestions.id = answers.question_id',
            ])
            ->where(['TriviaQuestions.id in (select * from (select id from trivia_questions ORDER BY RAND() limit 25) as tq2)'])
            ->toArray();

            $pos = 1;

            foreach($results as $res) {
                if($pos >= 1 && $pos <= 3) { $res['order'] = 1; }
                if($pos >= 4 && $pos <= 6) { $res['order'] = 2; }
                if($pos >= 7 && $pos <= 9) { $res['order'] = 3; }
                if($pos >= 10 && $pos <= 12) { $res['order'] = 4; }
                if($pos >= 13 && $pos <= 15) { $res['order'] = 5; }
                if($pos >= 16 && $pos <= 18) { $res['order'] = 6; }
                if($pos >= 19 && $pos <= 21) { $res['order'] = 7; }
                if($pos >= 22 && $pos <= 24) { $res['order'] = 8; }
                if($pos >= 25 && $pos <= 27) { $res['order'] = 9; }
                if($pos >= 28 && $pos <= 30) { $res['order'] = 10; }
                if($pos >= 31 && $pos <= 33) { $res['order'] = 11; }
                if($pos >= 34 && $pos <= 36) { $res['order'] = 12; }
                if($pos >= 37 && $pos <= 39) { $res['order'] = 13; }
                if($pos >= 40 && $pos <= 42) { $res['order'] = 14; }
                if($pos >= 43 && $pos <= 45) { $res['order'] = 15; }
                if($pos >= 46 && $pos <= 48) { $res['order'] = 16; }
                if($pos >= 49 && $pos <= 51) { $res['order'] = 17; }
                if($pos >= 52 && $pos <= 54) { $res['order'] = 18; }
                if($pos >= 55 && $pos <= 57) { $res['order'] = 19; }
                if($pos >= 58 && $pos <= 60) { $res['order'] = 20; }
                if($pos >= 61 && $pos <= 63) { $res['order'] = 21; }
                if($pos >= 64 && $pos <= 66) { $res['order'] = 22; }
                if($pos >= 67 && $pos <= 69) { $res['order'] = 23; }
                if($pos >= 70 && $pos <= 72) { $res['order'] = 24; }
                if($pos >= 73 && $pos <= 75) { $res['order'] = 25; }

                $pos++;
            }

            // $this->log(implode(";", $results), LOG_DEBUG);

            $output = array();
            $currentQuestion = "";

            foreach ($results as $result) 
            {

              if ($result->question != $currentQuestion) 
              {
                $output[] = array();

                end($output);
                $currentItem = & $output[key($output)];

                $currentQuestion = $result->question;
                $currentItem['id'] = $result->id;
                $currentItem['question'] = $currentQuestion;
                $currentItem['order'] = $result->order;
                $currentItem['answers'] = array();

              }
              //$currentItem['answers'][] = array("answer" => $result->answers);
              $currentItem['answers'][] = $result->answers;
            }

            //json_encode($results, JSON_UNESCAPED_UNICODE );
        }else{
            $output = null;
        }
        $this->set('results', $output);

    }

    public function getSurvey($user_id){

        $this->loadModel('SurveyResults');

        //Verifico si el usuario ha respondido la encuesta anteriormente
        $userAnsweredSurvey = $this->SurveyResults->find('all',['conditions'=>['user_id'=>$user_id]])->toArray();

        //Si el usuario NO ha respondido la encuesta aún, se carga la encuesta
        if (!$userAnsweredSurvey){

            $this->loadModel('SurveyQuestions');
            $this->loadModel('SurveyAnswers');
            $results = $this->SurveyQuestions
            ->find('all')
                    ->select(['SurveyQuestions.id','SurveyQuestions.question','SurveyQuestions.type','SurveyQuestions.order','answers.id','answers.question_id','answers.answer','answers.order'])
            ->join([
                'table' => 'survey_answers',
                'alias' => 'answers',
                'type' => 'LEFT',
                'conditions' => 'SurveyQuestions.id = answers.question_id',
            ])
            ->toArray();

            $output = array();
            $currentQuestion = "";

            foreach ($results as $result) 
            {

              if ($result->question != $currentQuestion) 
              {
                $output[] = array();

                end($output);
                $currentItem = & $output[key($output)];

                $currentQuestion = $result->question;
                $currentItem['id'] = $result->id;
                $currentItem['question'] = $currentQuestion;
                $currentItem['type'] = $result->type;
                $currentItem['order'] = $result->order;
                $currentItem['answers'] = array();

              }
              //$currentItem['answers'][] = array("answer" => $result->answers);
              $currentItem['answers'][] = $result->answers;
            }

            //json_encode($results, JSON_UNESCAPED_UNICODE );

            //Si el usuario ya habia respondido la encuesta, se envia null
        }else{
            $output = null;
        }
        $this->set('results', $output);

    }

    public function getAssignedClue($user_id){

        $clues_to_win = 4;
        
        $this->loadModel('CluesAssigned');
        
        //Primero buscamos la pista que tenga asignada
        $assigned_clues = $this->CluesAssigned->find('all',['conditions'=>['user_id'=>$user_id]])
                                                ->select(['clue_id'=>'CluesAssigned.clue_id','name'=>'ct.description'])
                                                ->order(['date' => 'DESC'])
                                                ->join([
                                                    'table' => 'clues_treasure',
                                                    'alias' => 'ct',
                                                    'type' => 'INNER',
                                                    'conditions' => 'CluesAssigned.clue_id = ct.id'])
                                                ->toArray();

        //Si no tiene ninguna asignada, entonces le creamos una nueva                                                
        if (empty($assigned_clues)){

            //Llamo a la funcion que genera una nueva pista
            $this->getNewClue($user_id);

            //Y hago otra vez la misma consulta para ver cual fue esa pista que se generó
            $clue = $this->CluesAssigned->find('all',['conditions'=>['user_id'=>$user_id]])
                                                ->select(['clue_id'=>'CluesAssigned.clue_id','name'=>'ct.description'])
                                                ->order(['date' => 'DESC'])
                                                ->join([
                                                    'table' => 'clues_treasure',
                                                    'alias' => 'ct',
                                                    'type' => 'INNER',
                                                    'conditions' => 'CluesAssigned.clue_id = ct.id'])
                                                ->toArray();
            $clue = $clue[0];

            //Esta variable es para llevar la cuenta de cada currentPage de la app móvil
            $total_clues = 1;

        }else{
/*
            $total_clues = sizeof($assigned_clues);

            //Por ahora se establecio una cantidad de 4 pistas para poder ganar
            if ($total_clues == 4){
            
                $clue = 9999; //El usuario ha ganado
            
            }else{

                $clue = $assigned_clues[0];
            }
*/
            $clue = $assigned_clues[0];

            //Esta variable es para llevar la cuenta de cada currentPage de la app móvil
            $total_clues = sizeof($assigned_clues);

        }
        
        $this->set('assigned_clue',$clue);
        $this->set('total_clues',$total_clues);
        $this->set('clues_to_win',$clues_to_win);

    }


    public function getNewClue($user_id){

        //Por ahora se establecio una cantidad de 4 pistas para poder ganar
        $clues_to_win = 4;
        
        $this->loadModel('CluesAssigned');
        $this->loadModel('CluesTreasure');

        $total_clues = 0;

        //Primero validamos si no tiene alguna pista asignada
        $pistas_asignadas = $this->CluesAssigned->find('all',['conditions'=>['user_id'=>$user_id,'ct.id <>'=>9999]])
                                                ->select(['clue_id'])
                                                ->join([
                                                    'table' => 'clues_treasure',
                                                    'alias' => 'ct',
                                                    'type' => 'INNER',
                                                    'conditions' => 'CluesAssigned.clue_id = ct.id'])
                                                ->toArray();

        //Si no tenia nada asignado, agarramos todas las pistas 
        if (empty($pistas_asignadas)){

            //primero obtengo todas las pistas que existen en la BD para luego calcular la aleatoria
            $clues = $this->CluesTreasure->find('all')->toArray();

        }else{

            //Si tenia una pista asignada, generamos un numero aleatorio de las pistas que no han sido asignadas todavia
            $ids_asignadas = array();

            foreach ($pistas_asignadas as $k => $pista) {
                array_push($ids_asignadas,$pista['clue_id']);
                $total_clues++;
            }

            $clues = $this->CluesTreasure->find()->where(['id NOT IN ' => $ids_asignadas,'id <>'=>9999])->toArray();
            
        }


        if ($total_clues < ($clues_to_win)){

            //Obtengo la posicion de la pista aleatoria
            $pos = array_rand($clues,1);

            //Creo el objeto CluesAssigned para guardar la pista nueva asignada
            $result = $this->CluesAssigned->newEntity();
            $result->user_id = $user_id;
            $result->clue_id = $clues[$pos]->id;

            $this->CluesAssigned->save($result);

            $salida = array();
            $salida = ['clue_id'=>$clues[$pos]->id, 'name'=>$clues[$pos]->description];

            $new_clue = $salida;          
        }

        if ($total_clues == ($clues_to_win)){

            if (!$this->CluesAssigned->find('all',['conditions'=>['user_id'=>$user_id,'clue_id'=>9999]])->toArray()){

                $new_clue = 9999; //El usuario ha ganado

                //Creo el objeto CluesAssigned para guardar la pista nueva asignada
                $result = $this->CluesAssigned->newEntity();
                $result->user_id = $user_id;
                $result->clue_id = $new_clue;

                $this->CluesAssigned->save($result);

            }else{
                $new_clue = 9999; //El usuario ha ganado
            }
        
        }

      /*  if ($total_clues > ($clues_to_win)){
        
            $new_clue = 9999; //El usuario ha ganado
        
        }*/

$this->set('total_clues',$total_clues);
$this->set('clues_to_win',$clues_to_win);

 /*       $this->loadModel('CluesFound');
        $this->viewBuilder()->layout(null);

        $user_id = intval($user_id);
        $clue_found_id = intval($clue_found_id);

        //Si no encontró ninguna pista sino que cargó la pantalla de Busqueda del Tesoro, retornamos la próxima pista
        if ($clue_found_id === 0){

            $new_clue = 1;

        }else{

            //Primero chequeamos cuál fue la última pista que había encontrado antes.
            $query = $this->CluesFound->find();
            $max_clue_id = $query
                ->select(['max_clue_id' => $query->func()->max('clue_id')])
                ->group('user_id')
                ->having(['user_id' => $user_id])
                ->toArray();

            //Si el usuario tenia alguna pista encontrada previamente, convierto su ID en entero
            if (!empty($max_clue_id)){
                $max_clue_id = intval($max_clue_id[0]['max_clue_id']);            
            }else{ //Si no tenia ninguna pista encontrada previamente, le asigno 0 para poder hacer la comparación
                $max_clue_id = 0;
            }

            //Luego verificamos que la pista encontrada es la próxima pista
            if(($clue_found_id - 1) == intval($max_clue_id)) {
                $result = $this->CluesFound->newEntity();
                $result->clue_id = $clue_found_id;
                $result->user_id = $user_id;

                $this->CluesFound->save($result);

                $new_clue = ($clue_found_id + 1);

            }else{
                $new_clue = 'Encontraste una pista no válida o ya la habias encontrado';
            }

        }
        */
        $this->set('new_clue',$new_clue);
    }

    //***********************************************//
                    //Servicios POST//
    //***********************************************//
    public function activateUser($id = null)
    {
        $this->loadModel('UsersApp');
        $this->viewBuilder()->layout(null);

        $results = $this->UsersApp->get($id);       

        $this->request->data['active']=1;
        if ($this->request->is(['post'])) 
        {
            $results = $this->UsersApp->patchEntity($results, $this->request->data);
            if ($this->UsersApp->save($results)) 
            {
                $message = 'Saved';
            } 
            else 
            {
                $message = 'Error';
            }
            $this->set([
            '_serialize' => ['results']
        ]);
        }
    }
    
    public function authenticateUser($email = null, $password = null){

        $this->loadModel('UsersApp');
        $this->viewBuilder()->layout(null);

        $userFound = $this->UsersApp
        ->find('all', ['conditions'=>['email'=>$email,'password'=>$password]])
        ->select(['id','username','name','email','picture_url','active']);
        
        if ($userFound){

            //$this->Auth->setUser($userFound);
        } 

        $this->set('user', $userFound);
    }

    public function reactivateUser($id = null){

        $this->loadModel('UsersApp');
        $this->viewBuilder()->layout(null);

        $results = $this->UsersApp->get($id);

        //Aunque se llame Reactivar Usuario, este bit se guarda en 0 porque me va a indicar que se "reseteó" el usuario
        $this->request->data['active']=0;

        if ($this->request->is(['post'])) 
        {
            $results = $this->UsersApp->patchEntity($results, $this->request->data);
            if ($this->UsersApp->save($results)) 
            {
                $message = 'Saved';
            } 
            else 
            {
                $message = 'Error';
            }
            $this->set([
            '_serialize' => ['results']
        ]);
        }
    }

    public function resetPassword($id, $password){

        $this->loadModel('UsersApp');

        $this->viewBuilder()->layout(null);

        $user = $this->UsersApp->get($id);
        
        $user->password = $password;

        //Es solo en este momento que el usuario se considera "activo" ya que tiene su propia contraseña y no una genérica
        $user->active = 1;

        if ($this->request->is(['post'])) {
            
            $this->UsersApp->save($user);

        }

        $this->set('user',$user);
    }


    public function updateUser($id){

        $this->loadModel('UsersApp');

        $data = $this->request->input('json_decode', true );

        $user = $this->UsersApp->get($id);
        
        //debug($data['job_title']);

        //$user['name'] = $data['name'];
        $user['job_title'] = $data['job_title'];
        $user['company'] = $data['company'];
        $user['email'] = $data['email'];
        $user['phone'] = $data['phone'];
        $user['linkedin'] = $data['linkedin'];
        $user['picture_url'] = $data['picture_url'];

        // if($data['base64Img'] != '') {
        //     $nombre_imagen = basename($data['picture_url']).PHP_EOL;
        //     $ruta = "../webroot/img/users";

        //     $image = $this->base64_to_jpeg($data['base64Img'], $nombre_imagen);

        //     file_put_contents($ruta . $nombre_imagen, $image);
        // }

        if ($this->request->is(['post'])) {
        //debug($user);    
            $this->UsersApp->save($user);
//exit;
        }

        $this->set('user',$user);
    }

    public function updateUserIOS($id){

        $this->log('updateuserios', LOG_DEBUG);

        $this->loadModel('UsersApp');

        $data = $this->request->input('json_decode', true );

        $user = $this->UsersApp->get($id);
        
        //debug($data['job_title']);

        //$user['name'] = $data['name'];
        $user['job_title'] = $data['job_title'];
        $user['company'] = $data['company'];
        $user['email'] = $data['email'];
        $user['phone'] = $data['phone'];
        $user['linkedin'] = $data['linkedin'];
        $user['picture_url'] = $data['picture_url'];

        if($data['base_64_img'] != '') {
            $nombre_imagen = basename($data['picture_url']).PHP_EOL;
            $ruta = "../webroot/img/users";

            $image = $this->base64_to_jpeg($data['base_64_img'], $nombre_imagen);

            file_put_contents($ruta . $nombre_imagen, $image);
        }

        if ($this->request->is(['post'])) {
        //debug($user);    
            $this->UsersApp->save($user);
//exit;
        }

        $this->set('user',$user);
    }

    function base64_to_jpeg($base64_string, $output_file) {
        $ifp = fopen($output_file, "wb"); 

        $data = explode(',', $base64_string);

        fwrite($ifp, base64_decode($data[1])); 
        fclose($ifp); 

        return $output_file; 
    }



    public function sendEmail($emailAddress){

        $this->loadModel('UsersApp');

        $user = $this->UsersApp->find('all',['conditions'=>['email'=>$emailAddress]])->toArray();

        if ($user){

            $user[0]['password'] = $this->randomPassword();
            $user[0]['active'] = 0;
            $this->UsersApp->save($user[0]);
        
            $email = new Email('default');
            $email->from(['info@lacaja.com.ar' => 'Foco en el Cliente'])
                    ->to($user[0]['email'])
                    ->subject('Recuperar Contraseña')
                    ->send('Tu clave generada por el sistema es: ' . $user[0]['password']);
            
            $emailSent = true;

        }else{

            $emailSent = false;

        }

        $this->set('emailSent',$emailSent);
        //$this->set('email',$email);

    }

    public function setSectionVisited()
    {
        $this->loadModel('Sections');
        $this->viewBuilder()->layout(null);

        $results = $this->Sections->newEntity($this->request->data);
        if ($this->request->is('post')) 
        {
            $this->request->data['name'] = 'PRUEBA';
            $this->request->data['create_date'] = Time::now();
            $this->request->data['modified_date'] = Time::now();

            if ($this->Sections->save($results)) 
            {
                $message = 'Saved';
            } 
            else 
            {
                $message = 'Error';
            }
        }
        
        $this->set([
            '_serialize' => ['results']
        ]);
    }

    public function sendSurvey($user_id){

        $this->loadModel('SurveyResults');

        //Verifico si el usuario ha respondido la encuesta anteriormente
        $userAnsweredSurvey = $this->SurveyResults->find('all',['conditions'=>['user_id'=>$user_id]])->toArray();

        //Si el usuario NO ha respondido la encuesta aún, entonces se pueden enviar sus respuestas
        if (!$userAnsweredSurvey){
            
            $data=$this->request->input('json_decode', true );
            //echo $data;

            $results = array();

            foreach($data as $k => $question){

                //Para respuestas SIMPLES
                if (isset($question['selected_answer'])) {
                    
                    $result = $this->SurveyResults->newEntity();

                    $result->question_id = $question['id'];
                    $result->answer_id = $question['selected_answer'];
                    $result->user_id = $user_id;
                    //$result['date'] = Time::now();
                    
                    $this->SurveyResults->save($result);
                    array_push($results, $result);

                } else{

                    //Para respuestas MULTIPLES y ABIERTAS
                    foreach ($question['answers'] as $j => $answer) {
                        
                        //MULTIPLES
                        if (isset($answer['selected']) && $answer['selected'] == "true") {
                            
                            $result = $this->SurveyResults->newEntity();

                            $result->question_id = $answer['question_id'];
                            $result->answer_id = $answer['id'];
                            $result->user_id = $user_id;
                            //$result['date'] = Time::now();
                            
                            $this->SurveyResults->save($result);
                            array_push($results, $result);
                        }

                        // ABIERTAS
                        if (isset($answer['text'])) {
                            
                            $result = $this->SurveyResults->newEntity();

                            $result->question_id = $question['id'];
                            $result->answer_id = null;
                            $result->text = $answer['text'];
                            $result->user_id = $user_id;
                            //$result['date'] = Time::now();
                            
                            $this->SurveyResults->save($result);
                            array_push($results, $result);
                        }

                    }

                }

            }
        //Si el usuario ya ha respondido la encuesta, entonces se devuelve null.
        }else{
            $results = null;
        }

        $this->set('results',$results);

    }

    public function answerTrivia($user_id) {

        $this->loadModel('TriviaResults');

        $data = $this->request->input('json_decode', true );

        $result = $this->TriviaResults->newEntity();

        $result->question_id = $data[0]['id'];

        //Verifico si el usuario ha respondido la pregunta de la trivia anteriormente
      /*  $userAnsweredTrivia = $this->TriviaResults->find('all',
                                ['conditions'=>['user_id'=>$user_id]])->toArray();
*/
        //Si el usuario NO ha respondido la pregunta aún, entonces se pueden enviar su respuesta
       // if (!$userAnsweredTrivia){

        if (isset($data[0]['selected_answer'])){ 
            $result->answer_id = $data[0]['selected_answer'];
        }else{ 
            $result->answer_id = null; 
        }
        $result->user_id = $user_id;
        $result->time_elapsed = $data[0]['time_elapsed'];

        $this->TriviaResults->save($result); 
        
        //Si el usuario ya ha respondido la trivia, entonces se devuelve null.
      /* }else{
            $result = null;
        }
       */ 
        $this->set('result',$result);
    }

    //***********************************************//
                //Servicios POST EXTRAS//
    //***********************************************//
    public function registerToken($token)
    {
        $this->loadModel('DeviceTokens');
        $this->viewBuilder()->layout(null);

        if ($this->request->is('post')) {

            $found = $this->DeviceTokens->find('all', ['conditions'=>['token'=>$token]])->toArray();
            
            if(!$found){

                $result = $this->DeviceTokens->newEntity();

                $result['token'] = $token;

                if ($this->DeviceTokens->save($result)) {
                    $message = 'Saved';
                }else{
                    $message = 'Error';
                }

            }else{
                $result = "token ya registrado";
            }

            $this->set('result',$result);

        }   

    }
/*
    public function unregisterToken()
    {
        $this->loadModel('');
        $this->viewBuilder()->layout(null);

        $results = $this-> ->get($id);
        $message = 'Deleted';
        if (!$this-> ->delete($results)) {
            $message = 'Error';
        }
        $this->set([
            'message' => $message,
            '_serialize' => ['message']
        ]);
    }*/

    public function send_push_notification(){

        $data = array();

        $data = $this->request->input('json_decode', true);

    }


    public function getParameters(){

        $this->loadModel('GlobalParameters');

        //$result = $this->GlobalParameters->find('all',['conditions'=>['code'=>$code]]);
        $results = $this->GlobalParameters->find('all');
        
        $this->set('results',$results);

    }

}