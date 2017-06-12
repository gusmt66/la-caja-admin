<?php

	namespace App\Controller;

    use App\Controller\AppController;
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

	class UsersAppController extends AppController
	{
        public function initialize()
        {
            parent::initialize();
            $this->loadComponent('RequestHandler');
        }

        public function beforeFilter(Event $event)
        {
            parent::beforeFilter($event);
        }

        public function index($value = null)
        {
            if($value != null)
            {
            $user = $this->UsersApp->find('all', [
                'conditions' => ['active' => $value]
            ]);
            $this->set(compact('user'));
            }
            else
            {
            $user = $this->UsersApp->find('all');
            $this->set(compact('user')); 
            }

        }

       
		/*public function login()
        {
            if ($this->request->is('post')) 
        	{
                $user = $this->Auth->identify();
                if ($user)
            	{
                        $this->Auth->setUser($user);
                        return $this->redirect($this->Auth->redirectUrl());
            	}
                else $this->Flash->error('HA OCURRIDO UN ERROR AL INICIAR SESION, INTENTE NUEVAMENTE');
        	}
        }*/

        /*public function logout()
        {
            return $this->redirect($this->Auth->logout());
        }*/


        public function add()
        {
            $user = $this->UsersApp->newEntity();
            if ($this->request->is('post')) 
            {
                $this->request->data['notification_key']=' ';
                $user = $this->UsersApp->patchEntity($user,$this->request->data());
                if ($result = $this->UsersApp->save($user)) 
                {
                    $this->Flash->success('El usuario fue creado correctamente.');
                    return $this->redirect(['action' => 'index']);
                }
                else
                {
                    $this->Flash->error('El usuario no pudo ser creado correctamente. Intente de nuevo.');      
                }
            }
            $this->set('user', $user);
        }

        public function edit($id = null)
        {
            $user = $this->UsersApp->get($id);
            if ($this->request->is(['patch', 'post', 'put'])) 
            {
                $user = $this->UsersApp->patchEntity($user, $this->request->data);
                if ($this->UsersApp->save($user)) 
                {
                    $this->Flash->success('El usuario fue editado correctamente.');
                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error('El usuario no pudo ser editado correctamente. Intente de nuevo.');
            }
            unset($user['password']);
            unset($user['password_activation']);
            $this->set(compact('user'));
            $this->set('_serialize', ['user']);
        }

        public function delete($id = null)
        {   
                $entity = $this->UsersApp->get($id);
                $result = $this->UsersApp->delete($entity);
                if($result)
                {
                    $this->Flash->success('El usuario fue eliminado correctamente.');
                    return $this->redirect(['action' => 'index']);
                }
                else
                {
                    $this->Flash->error('El usuario no pudo ser eliminado correctamente. Intente de nuevo.');  
                }
        }
    }
?>