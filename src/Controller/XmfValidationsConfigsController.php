<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * XmfValidationsConfigs Controller
 *
 * @property \App\Model\Table\XmfValidationsConfigsTable $XmfValidationsConfigs
 *
 * @method \App\Model\Entity\XmfValidationsConfig[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class XmfValidationsConfigsController extends AppController
{

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
        $xmfValidationsConfigs = $this->paginate($this->XmfValidationsConfigs);

        $this->set(compact('xmfValidationsConfigs'));
    }

    /**
     * View method
     *
     * @param string|null $id Xmf Validations Config id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $xmfValidationsConfig = $this->XmfValidationsConfigs->get($id, [
            'contain' => ['Roles']
        ]);

        $this->set('xmfValidationsConfig', $xmfValidationsConfig);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $xmfValidationsConfig = $this->XmfValidationsConfigs->newEntity();
        if ($this->request->is('post')) {
            $xmfValidationsConfig = $this->XmfValidationsConfigs->patchEntity($xmfValidationsConfig, $this->request->getData());
            if ($this->XmfValidationsConfigs->save($xmfValidationsConfig)) {
                $this->Flash->success(__('The xmf validations config has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The xmf validations config could not be saved. Please, try again.'));
        }
        $roles = $this->XmfValidationsConfigs->Roles->find('list', ['limit' => 200]);
        $this->set(compact('xmfValidationsConfig', 'roles'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Xmf Validations Config id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $xmfValidationsConfig = $this->XmfValidationsConfigs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $xmfValidationsConfig = $this->XmfValidationsConfigs->patchEntity($xmfValidationsConfig, $this->request->getData());
            if ($this->XmfValidationsConfigs->save($xmfValidationsConfig)) {
                $this->Flash->success(__('The xmf validations config has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The xmf validations config could not be saved. Please, try again.'));
        }
        $roles = $this->XmfValidationsConfigs->Roles->find('list', ['limit' => 200]);
        $this->set(compact('xmfValidationsConfig', 'roles'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Xmf Validations Config id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $xmfValidationsConfig = $this->XmfValidationsConfigs->get($id);
        if ($this->XmfValidationsConfigs->delete($xmfValidationsConfig)) {
            $this->Flash->success(__('The xmf validations config has been deleted.'));
        } else {
            $this->Flash->error(__('The xmf validations config could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
