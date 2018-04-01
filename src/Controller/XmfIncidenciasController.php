<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * XmfIncidencias Controller
 *
 * @property \App\Model\Table\XmfIncidenciasTable $XmfIncidencias
 *
 * @method \App\Model\Entity\XmfIncidencia[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class XmfIncidenciasController extends AppController
{

    public function isAuthorized() {
      return true;
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $xmfIncidencias = $this->paginate($this->XmfIncidencias);

        $this->set(compact('xmfIncidencias'));
    }

    /**
     * View method
     *
     * @param string|null $id Xmf Incidencia id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $xmfIncidencia = $this->XmfIncidencias->get($id, [
            'contain' => []
        ]);

        $this->set('xmfIncidencia', $xmfIncidencia);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $xmfIncidencia = $this->XmfIncidencias->newEntity();
        if ($this->request->is('post')) {
            $xmfIncidencia = $this->XmfIncidencias->patchEntity($xmfIncidencia, $this->request->getData());
            if ($this->XmfIncidencias->save($xmfIncidencia)) {
                $this->Flash->success(__('The xmf incidencia has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The xmf incidencia could not be saved. Please, try again.'));
        }
        $this->set(compact('xmfIncidencia'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Xmf Incidencia id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $xmfIncidencia = $this->XmfIncidencias->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $xmfIncidencia = $this->XmfIncidencias->patchEntity($xmfIncidencia, $this->request->getData());
            if ($this->XmfIncidencias->save($xmfIncidencia)) {
                $this->Flash->success(__('The xmf incidencia has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The xmf incidencia could not be saved. Please, try again.'));
        }
        $this->set(compact('xmfIncidencia'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Xmf Incidencia id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $xmfIncidencia = $this->XmfIncidencias->get($id);
        if ($this->XmfIncidencias->delete($xmfIncidencia)) {
            $this->Flash->success(__('The xmf incidencia has been deleted.'));
        } else {
            $this->Flash->error(__('The xmf incidencia could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
