<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * XmfReapers Controller
 *
 * @property \App\Model\Table\XmfReapersTable $XmfReapers
 *
 * @method \App\Model\Entity\XmfReaper[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class XmfReapersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['ParentXmfReapers', 'XmfCasillas', 'XmfTipoVotaciones', 'XmfPartidos']
        ];
        $xmfReapers = $this->paginate($this->XmfReapers);

        $this->set(compact('xmfReapers'));
    }

    /**
     * View method
     *
     * @param string|null $id Xmf Reaper id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $xmfReaper = $this->XmfReapers->get($id, [
            'contain' => ['ParentXmfReapers', 'XmfCasillas', 'XmfTipoVotaciones', 'XmfPartidos', 'ChildXmfReapers']
        ]);

        $this->set('xmfReaper', $xmfReaper);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $xmfReaper = $this->XmfReapers->newEntity();
        if ($this->request->is('post')) {
            $xmfReaper = $this->XmfReapers->patchEntity($xmfReaper, $this->request->getData());
            if ($this->XmfReapers->save($xmfReaper)) {
                $this->Flash->success(__('The xmf reaper has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The xmf reaper could not be saved. Please, try again.'));
        }
        $parentXmfReapers = $this->XmfReapers->ParentXmfReapers->find('list', ['limit' => 200]);
        $xmfCasillas = $this->XmfReapers->XmfCasillas->find('list', ['limit' => 200]);
        $xmfTipoVotaciones = $this->XmfReapers->XmfTipoVotaciones->find('list', ['limit' => 200]);
        $xmfPartidos = $this->XmfReapers->XmfPartidos->find('list', ['limit' => 200]);
        $this->set(compact('xmfReaper', 'parentXmfReapers', 'xmfCasillas', 'xmfTipoVotaciones', 'xmfPartidos'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Xmf Reaper id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $xmfReaper = $this->XmfReapers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $xmfReaper = $this->XmfReapers->patchEntity($xmfReaper, $this->request->getData());
            if ($this->XmfReapers->save($xmfReaper)) {
                $this->Flash->success(__('The xmf reaper has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The xmf reaper could not be saved. Please, try again.'));
        }
        $parentXmfReapers = $this->XmfReapers->ParentXmfReapers->find('list', ['limit' => 200]);
        $xmfCasillas = $this->XmfReapers->XmfCasillas->find('list', ['limit' => 200]);
        $xmfTipoVotaciones = $this->XmfReapers->XmfTipoVotaciones->find('list', ['limit' => 200]);
        $xmfPartidos = $this->XmfReapers->XmfPartidos->find('list', ['limit' => 200]);
        $this->set(compact('xmfReaper', 'parentXmfReapers', 'xmfCasillas', 'xmfTipoVotaciones', 'xmfPartidos'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Xmf Reaper id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $xmfReaper = $this->XmfReapers->get($id);
        if ($this->XmfReapers->delete($xmfReaper)) {
            $this->Flash->success(__('The xmf reaper has been deleted.'));
        } else {
            $this->Flash->error(__('The xmf reaper could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
