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

	class UsersAdminController extends AppController
	{
        public function beforeFilter(Event $event)
        {
            parent::beforeFilter($event);
            $this->Auth->allow(['login','add','edit']);
            $this->Auth->config('authenticate', [
                'Basic' => ['userModel' => 'UsersAdmin'],
                'Form' => ['userModel' => 'UsersAdmin']
            ]);
        }

        public function index()
        {
            $user = $this->UsersAdmin->find('all');
            $this->set(compact('user'));
        }
        
		public function login()
        {
            if ($this->request->is('post')) 
        	{
                $user = $this->Auth->identify();
                if ($user)
            	{
                    $this->Auth->setUser($user);
                    //return $this->redirect($this->Auth->redirectUrl());
                    return $this->redirect(['controller'=>'UsersApp','action'=>'index']);
            	}
                else $this->Flash->error('Ha ocurrido un error al iniciar sesión, intente nuevamente.');
        	}
        }

        public function logout()
        {
            //return $this->redirect($this->Auth->logout());
            return $this->redirect(['controller'=>'UsersAdmin','action'=>'login']);
        }


        public function add()
        {
            $user = $this->UsersAdmin->newEntity();
            if ($this->request->is('post')) 
            {
                $this->request->data['activate']=1;
                $user = $this->UsersAdmin->patchEntity($user,$this->request->data());
                if ($result = $this->UsersAdmin->save($user)) 
                {
                    $this->Flash->success('El usuario fue creado correctamente.');
                    return $this->redirect(['action' => 'login']);
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
            $user = $this->UsersAdmin->get($id);
            if ($this->request->is(['patch', 'post', 'put'])) 
            {
                $user = $this->UsersAdmin->patchEntity($user, $this->request->data);
                if ($this->UsersAdmin->save($user)) 
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
            if ($id==$this->Auth->user('id'))
            {
                $entity = $this->Users->get($id);
                $result = $this->Users->delete($entity);
                if($result)
                {
                    $this->Flash->success('El usuario fue eliminado correctamente.');
                    return $this->redirect(['action' => 'all']);
                }
                else
                {
                    $this->Flash->error('El usuario no pudo ser eliminado correctamente. Intente de nuevo.');  
                }
            }
        }
    }
?>