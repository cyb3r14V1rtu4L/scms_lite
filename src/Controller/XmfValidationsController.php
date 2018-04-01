<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * XmfValidations Controller
 *
 * @property \App\Model\Table\XmfValidationsTable $XmfValidations
 *
 * @method \App\Model\Entity\XmfValidation[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class XmfValidationsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Reports']
        ];
        $xmfValidations = $this->paginate($this->XmfValidations);

        $this->set(compact('xmfValidations'));
    }

    /**
     * View method
     *
     * @param string|null $id Xmf Validation id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $xmfValidation = $this->XmfValidations->get($id, [
            'contain' => ['Reports']
        ]);

        $this->set('xmfValidation', $xmfValidation);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $xmfValidation = $this->XmfValidations->newEntity();
        if ($this->request->is('post')) {
            $xmfValidation = $this->XmfValidations->patchEntity($xmfValidation, $this->request->getData());
            if ($this->XmfValidations->save($xmfValidation)) {
                $this->Flash->success(__('The xmf validation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The xmf validation could not be saved. Please, try again.'));
        }
        $reports = $this->XmfValidations->Reports->find('list', ['limit' => 200]);
        $this->set(compact('xmfValidation', 'reports'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Xmf Validation id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $xmfValidation = $this->XmfValidations->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $xmfValidation = $this->XmfValidations->patchEntity($xmfValidation, $this->request->getData());
            if ($this->XmfValidations->save($xmfValidation)) {
                $this->Flash->success(__('The xmf validation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The xmf validation could not be saved. Please, try again.'));
        }
        $reports = $this->XmfValidations->Reports->find('list', ['limit' => 200]);
        $this->set(compact('xmfValidation', 'reports'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Xmf Validation id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $xmfValidation = $this->XmfValidations->get($id);
        if ($this->XmfValidations->delete($xmfValidation)) {
            $this->Flash->success(__('The xmf validation has been deleted.'));
        } else {
            $this->Flash->error(__('The xmf validation could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
