<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * XmfCasillas Controller
 *
 * @property \App\Model\Table\XmfCasillasTable $XmfCasillas
 *
 * @method \App\Model\Entity\XmfCasilla[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class XmfController extends AppController
{
    public function isAuthorized ($user) {
      return true;
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index($type=null)
    {
        $xmfCasillas = null;
        $this->LoadModel('XmfViewIncidencias');
        $this->LoadModel('XmfCasillas');
        $this->LoadModel('Users');
        $user_data = $this->XmfCasillas->find('all',['conditions'=>['user_id' => $this->Auth->user('id')]]);
        $user_data =$user_data->toArray();
        #pr($user_data);
        $this->set('userCasillas',$user_data);
        
        $message_p = (empty($user_data[0]['hora_presencia'])) ? 'Presencia Asignada' : 'Presencia Asignada Previamente';
        $this->set('message_p',$message_p);

        $message_i = (empty($user_data[0]['hora_inicio'])) ? 'Hora de Inicio de Votación Asignada' : 'Hora de Inicio de Votación Asignada Previamente';
        $this->set('message_i',$message_i);
        
        $isPost = $this->request->is('post');
        if($isPost == true)
        {
            if((empty($user_data[0]['hora_presencia']) ) || (empty($user_data[0]['hora_inicio'])))
            {
                $data=array();
                $field = ($type == 'presencia') ? 'hora_presencia' : 'hora_inicio'; 
                $this->XmfCasillas->updateAll(
                    ["$field" => date("Y-m-d H:i:s")], 
                    ['id' => $user_data[0]['id']]
                );
            }
            return $this->redirect(['action' => 'index']);
        }
    }
    


    /**
     * View method
     *
     * @param string|null $id Xmf Casilla id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */

     public function setPresencia(){
        $this->viewBuilder()->setLayout('ajax');
        // result can be anything coming from $this->data
        $result =  'Hello Dolly!';
        $this->set("result", $result);exit;

     }

    public function view($id = null)
    {
        $xmfCasilla = $this->XmfCasillas->get($id, [
            'contain' => []
        ]);

        $this->set('xmfCasilla', $xmfCasilla);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $xmfCasilla = $this->XmfCasillas->newEntity();
        if ($this->request->is('post')){
            $xmfCasilla = $this->XmfCasillas->patchEntity($xmfCasilla, $this->request->getData());
            if ($this->XmfCasillas->save($xmfCasilla)) {
                $this->Flash->success(__('The xmf casilla has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The xmf casilla could not be saved. Please, try again.'));
        }
        $this->set(compact('xmfCasilla'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Xmf Casilla id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $xmfCasilla = $this->XmfCasillas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $xmfCasilla = $this->XmfCasillas->patchEntity($xmfCasilla, $this->request->getData());
            if ($this->XmfCasillas->save($xmfCasilla)) {
                $this->Flash->success(__('The xmf casilla has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The xmf casilla could not be saved. Please, try again.'));
        }
        $this->set(compact('xmfCasilla'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Xmf Casilla id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $xmfCasilla = $this->XmfCasillas->get($id);
        if ($this->XmfCasillas->delete($xmfCasilla)) {
            $this->Flash->success(__('The xmf casilla has been deleted.'));
        } else {
            $this->Flash->error(__('The xmf casilla could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
