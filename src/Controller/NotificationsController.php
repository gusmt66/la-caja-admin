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
    use Cake\Network\Http\Client;
    use Cake\Utility\String;

	class NotificationsController extends AppController
	{
       public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
    }

        public function index()
        {
            $noti = $this->Notifications->find('all');
            $this->set(compact('noti'));
        }

        public function add()
        {

            $this->loadModel('DeviceTokens');
            $noti = $this->Notifications->newEntity();

            if ($this->request->is('post')) {

                $noti = $this->Notifications->patchEntity($noti,$this->request->data());

                if ($result = $this->Notifications->save($noti)) {

                    //Este token es el generado en Ionic Platform (the box)
                    //$accessToken = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJqdGkiOiJkYTVmOGNmOS1iMzAxLTRlODAtYWY3ZC1kZGU4NjYzNmRlY2EifQ.TbIsGWJykqh62ll5PyAstXiOdVYulpKMlYQw88q-6Eo';
                    //Este token es el generado en Ionic Platform (la caja mobile)
                    $accessToken = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJqdGkiOiI3NjBkNzIyYi1jZTQzLTRlNzMtYjIwMy1jOGRkN2Q0NDAzMjIifQ.B3e6x2QcTHO66zORDys8n95e2betlLN3K1QzBMNlTIE';


                    //El URL del webservice de Ionic que envía notificaciones PUSH
                    $url = 'https://api.ionic.io/push/notifications';

                    //Procedemos a armar toda la data para enviar las notificaciones
                    $data = array();
                    $tokensToSend = array();
                    $deviceTokens = $this->DeviceTokens->find('all')->toArray();

                    //Recojo todos los tokens registrados
                    foreach ($deviceTokens as $key => $token) {
                        $tokensToSend[$key] = $token['token'];
                    }

                    //Primero construyo el objeto message porque es igual para iOS que para Android
                    $messageObj = array();
                    $messageObj['message'] = $this->request->data['message'];
                    $messageObj['title'] = 'Foco en el Cliente';
                    $messageObj['image'] = 'http://deltatech.com.ve/demos/lacaja/img/logo-push.png'; //https://pbs.twimg.com/profile_images/617058765167329280/9BkeDJlV.png
                    $messageObj['payload'] = array(); 
                    $messageObj['payload']['state'] = 'app.' . strtolower($this->request->data['link']);
                    //$messageObj['payload']['customVar'] = 'algun valor adicional que se quiera enviar';

                    //Construyendo ahora la data final a enviar
                    $data['tokens'] = $tokensToSend;
                    $data['profile'] = 'dev';
                    $data['notification'] = array();
                    $data['notification']['ios'] = $messageObj;
                    $data['notification']['android'] = $messageObj;

                    //se codifica en formato JSON
                    $datajson = json_encode($data,JSON_UNESCAPED_SLASHES);

                    //Se crea y prepara el objeto http con el header requerido por Ionic
                    $http = new Client([
                        'headers' => ['Authorization' => 'Bearer ' . $accessToken]
                    ]);

                    //Importante que el Content-type sea json porque asi lo requiere Ionic
                    $response = $http->post($url, $datajson, ['type' => 'json']);
                    //debug($response->json);

                    $this->Flash->success('La Notificacion Push fue creada correctamente.');
                    return $this->redirect(['action' => 'index']);
                }
                else
                {
                    $this->Flash->error('La Notificacion Push no pudo ser creada correctamente. Intente de nuevo.');      
                }
            }

            $this->set('noti', $noti);
        }

        public function edit($id = null)
        {
            $noti = $this->Notifications->get($id);
            if ($this->request->is(['patch', 'post', 'put'])) 
            {
                $noti = $this->Notifications->patchEntity($noti, $this->request->data);
                if ($this->Notifications->save($noti)) 
                {
                    $this->Flash->success('La Notificacion Push fue editada correctamente.');
                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error('La Notificacion Push no pudo ser editada correctamente. Intente de nuevo.');
            }
            $this->set(compact('noti'));
            $this->set('_serialize', ['noti']);
        }
        
        public function delete($id = null)
        {   
                $entity = $this->Notifications->get($id);
                $result = $this->Notifications->delete($entity);
                if($result)
                {
                    $this->Flash->success('La Notificacion Push fue eliminada correctamente.');
                    return $this->redirect(['action' => 'index']);
                }
                else
                {
                    $this->Flash->error('La Notificacion Push no pudo ser eliminada correctamente. Intente de nuevo.');  
                }
        }
    }
?>