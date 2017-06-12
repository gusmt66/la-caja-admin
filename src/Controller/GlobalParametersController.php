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

	class GlobalParametersController extends AppController
	{
        public function index()
        {

            $global = $this->GlobalParameters->find('all');
            $this->set(compact('global'));
        }
        
        public function add()
        {
            $global = $this->GlobalParameters->newEntity();
            if ($this->request->is('post')) 
            {
                $global = $this->GlobalParameters->patchEntity($global,$this->request->data());
                if ($result = $this->GlobalParameters->save($global)) 
                {
                    $this->Flash->success('El Parametro General fue creado correctamente.');
                    return $this->redirect(['action' => 'index']);
                }
                else
                {
                    $this->Flash->error('El Parametro General no pudo ser creado correctamente. Intente de nuevo.');      
                }
            }
            $this->set('global', $global);
        }

        public function edit($id = null)
        {
            $global = $this->GlobalParameters->get($id);
            if ($this->request->is(['patch', 'post', 'put'])) 
            {
                $global = $this->GlobalParameters->patchEntity($global, $this->request->data);
                if ($this->GlobalParameters->save($global)) 
                {
                    $this->Flash->success('El Parametro General fue editado correctamente.');
                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error('El Parametro General no pudo ser editado correctamente. Intente de nuevo.');
            }
            $this->set(compact('global'));
            $this->set('_serialize', ['global']);
        }

        public function delete($id = null)
        {   
                $entity = $this->GlobalParameters->get($id);
                $result = $this->GlobalParameters->delete($entity);
                if($result)
                {
                    $this->Flash->success(__('El Parametro General fue eliminado correctamente.'));
                    return $this->redirect(['action' => 'index']);
                }
                else
                {
                    $this->Flash->error('El Parametro General no pudo ser eliminado correctamente. Intente de nuevo.');  
                }
        }
    }
?>