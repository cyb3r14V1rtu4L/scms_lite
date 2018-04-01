<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * XmfReportsControls Controller
 *
 * @property \App\Model\Table\XmfReportsControlsTable $XmfReportsControls
 *
 * @method \App\Model\Entity\XmfReportsControl[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class XmfReportsControlsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['XmfReports', 'XmfUsers', 'XmfRoles', 'XmfValidations']
        ];
        $xmfReportsControls = $this->paginate($this->XmfReportsControls);

        $this->set(compact('xmfReportsControls'));
    }

    /**
     * View method
     *
     * @param string|null $id Xmf Reports Control id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $xmfReportsControl = $this->XmfReportsControls->get($id, [
            'contain' => ['XmfReports', 'XmfUsers', 'XmfRoles', 'XmfValidations']
        ]);

        $this->set('xmfReportsControl', $xmfReportsControl);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $xmfReportsControl = $this->XmfReportsControls->newEntity();
        if ($this->request->is('post')) {
            $xmfReportsControl = $this->XmfReportsControls->patchEntity($xmfReportsControl, $this->request->getData());
            if ($this->XmfReportsControls->save($xmfReportsControl)) {
                $this->Flash->success(__('The xmf reports control has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The xmf reports control could not be saved. Please, try again.'));
        }
        $xmfReports = $this->XmfReportsControls->XmfReports->find('list', ['limit' => 200]);
        $xmfUsers = $this->XmfReportsControls->XmfUsers->find('list', ['limit' => 200]);
        $xmfRoles = $this->XmfReportsControls->XmfRoles->find('list', ['limit' => 200]);
        $xmfValidations = $this->XmfReportsControls->XmfValidations->find('list', ['limit' => 200]);
        $this->set(compact('xmfReportsControl', 'xmfReports', 'xmfUsers', 'xmfRoles', 'xmfValidations'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Xmf Reports Control id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $xmfReportsControl = $this->XmfReportsControls->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $xmfReportsControl = $this->XmfReportsControls->patchEntity($xmfReportsControl, $this->request->getData());
            if ($this->XmfReportsControls->save($xmfReportsControl)) {
                $this->Flash->success(__('The xmf reports control has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The xmf reports control could not be saved. Please, try again.'));
        }
        $xmfReports = $this->XmfReportsControls->XmfReports->find('list', ['limit' => 200]);
        $xmfUsers = $this->XmfReportsControls->XmfUsers->find('list', ['limit' => 200]);
        $xmfRoles = $this->XmfReportsControls->XmfRoles->find('list', ['limit' => 200]);
        $xmfValidations = $this->XmfReportsControls->XmfValidations->find('list', ['limit' => 200]);
        $this->set(compact('xmfReportsControl', 'xmfReports', 'xmfUsers', 'xmfRoles', 'xmfValidations'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Xmf Reports Control id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $xmfReportsControl = $this->XmfReportsControls->get($id);
        if ($this->XmfReportsControls->delete($xmfReportsControl)) {
            $this->Flash->success(__('The xmf reports control has been deleted.'));
        } else {
            $this->Flash->error(__('The xmf reports control could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
