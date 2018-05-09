<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{

    public function isAuthorized ($user) {
      return true;
    }
  /**
   * Login method
   *
   * @return \Cake\Http\Response|void
   */

   public function login() {

     if ($this->request->is('post')) {
       $user = $this->Auth->identify();
       #debug($user);
       if ($user) {
         $this->Auth->setUser($user);

         if ($this->Auth->user('is_superuser'))
         {
           #ADMIN MONITOR
            return $this->redirect(['controller'=>'XmfCasillas','action'=>'MonitorCasillas']);
         }else{

           if ($this->Auth->user('role_id') == 'e687cb91-4cdf-4ab2-992f-e76584199c2e')
           #USER MINITOR
           {
             #return $this->redirect(['controller'=>'Pages','action'=>'home']);
             return $this->redirect(['controller'=>'XmfCasillas','action'=>'MonitorCasillas']);
           }
           else if ($this->Auth->User('role_id') == '80687266-6761-43a2-bd98-f42349a9bb63')
           #USER CAPTURA
           {
               //$this->redirect(['controller' => 'Pages', 'action' => 'reports/CapturaReporte']);
               $this->redirect(['controller' => 'Xmf', 'action' => 'index']);

           } else {
             return $this->redirect($this->Auth->redirectUrl());
           }
         }

       } else {
         //$this->Flash->error('Wrong',['key'=>'auth']);
       }

     }
     $this->viewBuilder()->setLayout('core/login_core');
     // $this->viewBuilder()->setLayout('core/login');

   } // NOTE  end Login method

   public function logout() {
     return $this->redirect($this->Auth->logout());
   }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Roles']
        ];
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Roles', 'Articles', 'SocialAccounts']
        ]);

        $this->set('user', $user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $this->set(compact('user', 'roles'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $this->set(compact('user', 'roles'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }



}
