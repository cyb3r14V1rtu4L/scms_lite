<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * XmfBoxesOrders Controller
 *
 * @property \App\Model\Table\XmfBoxesOrdersTable $XmfBoxesOrders
 *
 * @method \App\Model\Entity\XmfBoxesOrder[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class XmfBoxesOrdersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['XmfTipoVotaciones', 'XmfBoxesBlocks']
        ];
        $xmfBoxesOrders = $this->paginate($this->XmfBoxesOrders);

        $this->set(compact('xmfBoxesOrders'));
    }

    /**
     * View method
     *
     * @param string|null $id Xmf Boxes Order id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $xmfBoxesOrder = $this->XmfBoxesOrders->get($id, [
            'contain' => ['XmfTipoVotaciones', 'XmfBoxesBlocks']
        ]);

        $this->set('xmfBoxesOrder', $xmfBoxesOrder);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $xmfBoxesOrder = $this->XmfBoxesOrders->newEntity();
        if ($this->request->is('post')) {
            $xmfBoxesOrder = $this->XmfBoxesOrders->patchEntity($xmfBoxesOrder, $this->request->getData());
            if ($this->XmfBoxesOrders->save($xmfBoxesOrder)) {
                $this->Flash->success(__('The xmf boxes order has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The xmf boxes order could not be saved. Please, try again.'));
        }
        $xmfTipoVotaciones = $this->XmfBoxesOrders->XmfTipoVotaciones->find('list', ['limit' => 200]);
        $xmfBoxesBlocks = $this->XmfBoxesOrders->XmfBoxesBlocks->find('list', ['limit' => 200]);
        $this->set(compact('xmfBoxesOrder', 'xmfTipoVotaciones', 'xmfBoxesBlocks'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Xmf Boxes Order id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $xmfBoxesOrder = $this->XmfBoxesOrders->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $xmfBoxesOrder = $this->XmfBoxesOrders->patchEntity($xmfBoxesOrder, $this->request->getData());
            if ($this->XmfBoxesOrders->save($xmfBoxesOrder)) {
                $this->Flash->success(__('The xmf boxes order has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The xmf boxes order could not be saved. Please, try again.'));
        }
        $xmfTipoVotaciones = $this->XmfBoxesOrders->XmfTipoVotaciones->find('list', ['limit' => 200]);
        $xmfBoxesBlocks = $this->XmfBoxesOrders->XmfBoxesBlocks->find('list', ['limit' => 200]);
        $this->set(compact('xmfBoxesOrder', 'xmfTipoVotaciones', 'xmfBoxesBlocks'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Xmf Boxes Order id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $xmfBoxesOrder = $this->XmfBoxesOrders->get($id);
        if ($this->XmfBoxesOrders->delete($xmfBoxesOrder)) {
            $this->Flash->success(__('The xmf boxes order has been deleted.'));
        } else {
            $this->Flash->error(__('The xmf boxes order could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
