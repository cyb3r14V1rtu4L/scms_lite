<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * XmfValidationsLogs Controller
 *
 * @property \App\Model\Table\XmfValidationsLogsTable $XmfValidationsLogs
 *
 * @method \App\Model\Entity\XmfValidationsLog[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class XmfValidationsLogsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['XmfReports', 'XmfValidations', 'XmfValidationsConfigs']
        ];
        $xmfValidationsLogs = $this->paginate($this->XmfValidationsLogs);

        $this->set(compact('xmfValidationsLogs'));
    }

    /**
     * View method
     *
     * @param string|null $id Xmf Validations Log id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $xmfValidationsLog = $this->XmfValidationsLogs->get($id, [
            'contain' => ['XmfReports', 'XmfValidations', 'XmfValidationsConfigs']
        ]);

        $this->set('xmfValidationsLog', $xmfValidationsLog);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $xmfValidationsLog = $this->XmfValidationsLogs->newEntity();
        if ($this->request->is('post')) {
            $xmfValidationsLog = $this->XmfValidationsLogs->patchEntity($xmfValidationsLog, $this->request->getData());
            if ($this->XmfValidationsLogs->save($xmfValidationsLog)) {
                $this->Flash->success(__('The xmf validations log has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The xmf validations log could not be saved. Please, try again.'));
        }
        $xmfReports = $this->XmfValidationsLogs->XmfReports->find('list', ['limit' => 200]);
        $xmfValidations = $this->XmfValidationsLogs->XmfValidations->find('list', ['limit' => 200]);
        $xmfValidationsConfigs = $this->XmfValidationsLogs->XmfValidationsConfigs->find('list', ['limit' => 200]);
        $this->set(compact('xmfValidationsLog', 'xmfReports', 'xmfValidations', 'xmfValidationsConfigs'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Xmf Validations Log id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $xmfValidationsLog = $this->XmfValidationsLogs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $xmfValidationsLog = $this->XmfValidationsLogs->patchEntity($xmfValidationsLog, $this->request->getData());
            if ($this->XmfValidationsLogs->save($xmfValidationsLog)) {
                $this->Flash->success(__('The xmf validations log has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The xmf validations log could not be saved. Please, try again.'));
        }
        $xmfReports = $this->XmfValidationsLogs->XmfReports->find('list', ['limit' => 200]);
        $xmfValidations = $this->XmfValidationsLogs->XmfValidations->find('list', ['limit' => 200]);
        $xmfValidationsConfigs = $this->XmfValidationsLogs->XmfValidationsConfigs->find('list', ['limit' => 200]);
        $this->set(compact('xmfValidationsLog', 'xmfReports', 'xmfValidations', 'xmfValidationsConfigs'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Xmf Validations Log id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $xmfValidationsLog = $this->XmfValidationsLogs->get($id);
        if ($this->XmfValidationsLogs->delete($xmfValidationsLog)) {
            $this->Flash->success(__('The xmf validations log has been deleted.'));
        } else {
            $this->Flash->error(__('The xmf validations log could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
