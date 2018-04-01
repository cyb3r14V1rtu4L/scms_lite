<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * XmfViewIncidencias Controller
 *
 * @property \App\Model\Table\XmfViewIncidenciasTable $XmfViewIncidencias
 *
 * @method \App\Model\Entity\XmfViewIncidencia[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class XmfViewIncidenciasController extends AppController
{
    public function isAuthorized($user) {
      return true;
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['XmfIncidencias']
        ];
        $xmfViewIncidencias = $this->paginate($this->XmfViewIncidencias);

        $this->set(compact('xmfViewIncidencias'));
    }

    /**
     * View method
     *
     * @param string|null $id Xmf View Incidencia id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $xmfViewIncidencia = $this->XmfViewIncidencias->get($id, [
            'contain' => ['XmfIncidencias']
        ]);

        $this->set('xmfViewIncidencia', $xmfViewIncidencia);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $xmfViewIncidencia = $this->XmfViewIncidencias->newEntity();
        if ($this->request->is('post')) {
            $xmfViewIncidencia = $this->XmfViewIncidencias->patchEntity($xmfViewIncidencia, $this->request->getData());
            if ($this->XmfViewIncidencias->save($xmfViewIncidencia)) {
                $this->Flash->success(__('The xmf view incidencia has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The xmf view incidencia could not be saved. Please, try again.'));
        }
        $xmfIncidencias = $this->XmfViewIncidencias->XmfIncidencias->find('list', ['limit' => 200]);
        $this->set(compact('xmfViewIncidencia', 'xmfIncidencias'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Xmf View Incidencia id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $xmfViewIncidencia = $this->XmfViewIncidencias->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $xmfViewIncidencia = $this->XmfViewIncidencias->patchEntity($xmfViewIncidencia, $this->request->getData());
            if ($this->XmfViewIncidencias->save($xmfViewIncidencia)) {
                $this->Flash->success(__('The xmf view incidencia has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The xmf view incidencia could not be saved. Please, try again.'));
        }
        $xmfIncidencias = $this->XmfViewIncidencias->XmfIncidencias->find('list', ['limit' => 200]);
        $this->set(compact('xmfViewIncidencia', 'xmfIncidencias'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Xmf View Incidencia id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $xmfViewIncidencia = $this->XmfViewIncidencias->get($id);
        if ($this->XmfViewIncidencias->delete($xmfViewIncidencia)) {
            $this->Flash->success(__('The xmf view incidencia has been deleted.'));
        } else {
            $this->Flash->error(__('The xmf view incidencia could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
