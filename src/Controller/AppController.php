<?php

    namespace App\Controller;

    use Cake\Controller\Controller;
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

    class AppController extends Controller
    {

        public function initialize()
        {
            parent::initialize();

            $this->loadComponent('RequestHandler');
            $this->loadComponent('Flash');
            $this->loadComponent('Auth', [
                'loginRedirect' => [
                    'controller' => 'UsersApp',
                    'action' => 'index'
                ],
                'logoutRedirect' => [
                    'controller' => 'UsersAdmin',
                    'action' => '/'
                ]
            ]);
        }

        public function beforeFilter(Event $event)
        {
            //$this->set('user_id', $this->Auth->user()['id']);
            $this->set('user_id', $this->Auth->user('id'));
            $this->Auth->config('authenticate', [
                'Basic' => ['userModel' => 'UsersAdmin'],
                'Form' => ['userModel' => 'UsersAdmin']
            ]);
        }


        public function uploadFile(&$fileObject,$folder,$thumbnail = 'no',$thumb_width = 480, $thumb_height = 320, $keepName = 'yes')
        {

            if (!empty($fileObject['tmp_name']) && is_uploaded_file($fileObject['tmp_name']))
            {
                
                $prefix = '';
                if ($thumbnail == 'thumbnail')
                {
                    $prefix = 'original_';
                }

                $ext = pathinfo($fileObject['name']);

                if ($keepName == 'yes')
                {
                    $filename = mt_rand(1000000000,9999999999) . $fileObject['name'];    
                }
                else
                {
                    $filename = mt_rand(1000000000,9999999999) . '.' . $ext['extension'];
                }

                /* ******* If you want to use timeStamp for random filename, uncomment this *******
                $date = new DateTime();
                $filename = $date->getTimestamp() . $fileObject['size'].'.'.$ext['extension'];
                *********************************************************************************** */
                if(file_exists($folder) && is_dir($folder))
                {
                    move_uploaded_file($fileObject['tmp_name'], $folder.'/'.$prefix.$filename);
                }
                elseif(mkdir($folder,0777))
                {
                    move_uploaded_file($fileObject['tmp_name'], $folder.'/'.$prefix.$filename);                         
                }

                if ($thumbnail == 'thumbnail')
                {
                    $this->GenerateThumbnail($folder.'/'.$prefix.$filename,$folder.'/'.$filename,$thumb_width,$thumb_height,0.80);
                    //Deletes the original image, leaving only the thumbnail saved.
                    unlink($folder.'/'.$prefix.$filename);
                }
                $fileObject = $filename;
                return $fileObject;
            }
            else
            {
                $fileObject = '';
                return null;
            }
        }


        public function beforeRender(Event $event)
        {
            /*if (!array_key_exists('_serialize', $this->viewVars) &&
                in_array($this->response->type(), ['application/json', 'application/xml'])
            )
            {
                $this->set('_serialize', true);
            }*/
        }


        public function findUser($id){

            $this->loadModel('UsersApp');

            return $this->UsersApp->find('all', ['conditions'=>['id'=>$id]]);

        }

    }
?>
