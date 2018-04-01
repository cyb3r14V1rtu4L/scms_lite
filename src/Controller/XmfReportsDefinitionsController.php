<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * XmfReportsDefinitions Controller
 *
 * @property \App\Model\Table\XmfReportsDefinitionsTable $XmfReportsDefinitions
 *
 * @method \App\Model\Entity\XmfReportsDefinition[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class XmfReportsDefinitionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $xmfReportsDefinitions = $this->paginate($this->XmfReportsDefinitions);

        $this->set(compact('xmfReportsDefinitions'));
    }

    /**
     * View method
     *
     * @param string|null $id Xmf Reports Definition id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $xmfReportsDefinition = $this->XmfReportsDefinitions->get($id, [
            'contain' => []
        ]);

        $this->set('xmfReportsDefinition', $xmfReportsDefinition);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $xmfReportsDefinition = $this->XmfReportsDefinitions->newEntity();
        if ($this->request->is('post')) {
            $xmfReportsDefinition = $this->XmfReportsDefinitions->patchEntity($xmfReportsDefinition, $this->request->getData());
            if ($this->XmfReportsDefinitions->save($xmfReportsDefinition)) {
                $this->Flash->success(__('The xmf reports definition has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The xmf reports definition could not be saved. Please, try again.'));
        }
        $this->set(compact('xmfReportsDefinition'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Xmf Reports Definition id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $xmfReportsDefinition = $this->XmfReportsDefinitions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $xmfReportsDefinition = $this->XmfReportsDefinitions->patchEntity($xmfReportsDefinition, $this->request->getData());
            if ($this->XmfReportsDefinitions->save($xmfReportsDefinition)) {
                $this->Flash->success(__('The xmf reports definition has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The xmf reports definition could not be saved. Please, try again.'));
        }
        $this->set(compact('xmfReportsDefinition'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Xmf Reports Definition id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $xmfReportsDefinition = $this->XmfReportsDefinitions->get($id);
        if ($this->XmfReportsDefinitions->delete($xmfReportsDefinition)) {
            $this->Flash->success(__('The xmf reports definition has been deleted.'));
        } else {
            $this->Flash->error(__('The xmf reports definition could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
