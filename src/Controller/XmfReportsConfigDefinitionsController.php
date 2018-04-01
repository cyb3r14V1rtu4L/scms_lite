<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * XmfReportsConfigDefinitions Controller
 *
 * @property \App\Model\Table\XmfReportsConfigDefinitionsTable $XmfReportsConfigDefinitions
 *
 * @method \App\Model\Entity\XmfReportsConfigDefinition[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class XmfReportsConfigDefinitionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['XmfReportsDefinitions']
        ];
        $xmfReportsConfigDefinitions = $this->paginate($this->XmfReportsConfigDefinitions);

        $this->set(compact('xmfReportsConfigDefinitions'));
    }

    /**
     * View method
     *
     * @param string|null $id Xmf Reports Config Definition id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $xmfReportsConfigDefinition = $this->XmfReportsConfigDefinitions->get($id, [
            'contain' => ['XmfReportsDefinitions']
        ]);

        $this->set('xmfReportsConfigDefinition', $xmfReportsConfigDefinition);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $xmfReportsConfigDefinition = $this->XmfReportsConfigDefinitions->newEntity();
        if ($this->request->is('post')) {
            $xmfReportsConfigDefinition = $this->XmfReportsConfigDefinitions->patchEntity($xmfReportsConfigDefinition, $this->request->getData());
            if ($this->XmfReportsConfigDefinitions->save($xmfReportsConfigDefinition)) {
                $this->Flash->success(__('The xmf reports config definition has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The xmf reports config definition could not be saved. Please, try again.'));
        }
        $xmfReportsDefinitions = $this->XmfReportsConfigDefinitions->XmfReportsDefinitions->find('list', ['limit' => 200]);
        $this->set(compact('xmfReportsConfigDefinition', 'xmfReportsDefinitions'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Xmf Reports Config Definition id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $xmfReportsConfigDefinition = $this->XmfReportsConfigDefinitions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $xmfReportsConfigDefinition = $this->XmfReportsConfigDefinitions->patchEntity($xmfReportsConfigDefinition, $this->request->getData());
            if ($this->XmfReportsConfigDefinitions->save($xmfReportsConfigDefinition)) {
                $this->Flash->success(__('The xmf reports config definition has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The xmf reports config definition could not be saved. Please, try again.'));
        }
        $xmfReportsDefinitions = $this->XmfReportsConfigDefinitions->XmfReportsDefinitions->find('list', ['limit' => 200]);
        $this->set(compact('xmfReportsConfigDefinition', 'xmfReportsDefinitions'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Xmf Reports Config Definition id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $xmfReportsConfigDefinition = $this->XmfReportsConfigDefinitions->get($id);
        if ($this->XmfReportsConfigDefinitions->delete($xmfReportsConfigDefinition)) {
            $this->Flash->success(__('The xmf reports config definition has been deleted.'));
        } else {
            $this->Flash->error(__('The xmf reports config definition could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
