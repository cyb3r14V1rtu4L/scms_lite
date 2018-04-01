<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * XmfTipoVotaciones Controller
 *
 * @property \App\Model\Table\XmfTipoVotacionesTable $XmfTipoVotaciones
 *
 * @method \App\Model\Entity\XmfTipoVotacione[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class XmfTipoVotacionesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $xmfTipoVotaciones = $this->paginate($this->XmfTipoVotaciones);

        $this->set(compact('xmfTipoVotaciones'));
    }

    /**
     * View method
     *
     * @param string|null $id Xmf Tipo Votacione id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $xmfTipoVotacione = $this->XmfTipoVotaciones->get($id, [
            'contain' => []
        ]);

        $this->set('xmfTipoVotacione', $xmfTipoVotacione);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $xmfTipoVotacione = $this->XmfTipoVotaciones->newEntity();
        if ($this->request->is('post')) {
            $xmfTipoVotacione = $this->XmfTipoVotaciones->patchEntity($xmfTipoVotacione, $this->request->getData());
            if ($this->XmfTipoVotaciones->save($xmfTipoVotacione)) {
                $this->Flash->success(__('The xmf tipo votacione has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The xmf tipo votacione could not be saved. Please, try again.'));
        }
        $this->set(compact('xmfTipoVotacione'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Xmf Tipo Votacione id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $xmfTipoVotacione = $this->XmfTipoVotaciones->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $xmfTipoVotacione = $this->XmfTipoVotaciones->patchEntity($xmfTipoVotacione, $this->request->getData());
            if ($this->XmfTipoVotaciones->save($xmfTipoVotacione)) {
                $this->Flash->success(__('The xmf tipo votacione has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The xmf tipo votacione could not be saved. Please, try again.'));
        }
        $this->set(compact('xmfTipoVotacione'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Xmf Tipo Votacione id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $xmfTipoVotacione = $this->XmfTipoVotaciones->get($id);
        if ($this->XmfTipoVotaciones->delete($xmfTipoVotacione)) {
            $this->Flash->success(__('The xmf tipo votacione has been deleted.'));
        } else {
            $this->Flash->error(__('The xmf tipo votacione could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
