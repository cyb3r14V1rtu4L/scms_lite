<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * XmfPartidosIncidencias Controller
 *
 * @property \App\Model\Table\XmfPartidosIncidenciasTable $XmfPartidosIncidencias
 *
 * @method \App\Model\Entity\XmfPartidosIncidencia[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class XmfPartidosIncidenciasController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['XmfCasillas', 'XmfPartidos', 'XmfIncidencias']
        ];
        $xmfPartidosIncidencias = $this->paginate($this->XmfPartidosIncidencias);

        $this->set(compact('xmfPartidosIncidencias'));
    }

    /**
     * View method
     *
     * @param string|null $id Xmf Partidos Incidencia id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $xmfPartidosIncidencia = $this->XmfPartidosIncidencias->get($id, [
            'contain' => ['XmfCasillas', 'XmfPartidos', 'XmfIncidencias']
        ]);

        $this->set('xmfPartidosIncidencia', $xmfPartidosIncidencia);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $xmfPartidosIncidencia = $this->XmfPartidosIncidencias->newEntity();
        if ($this->request->is('post')) {
            $xmfPartidosIncidencia = $this->XmfPartidosIncidencias->patchEntity($xmfPartidosIncidencia, $this->request->getData());
            if ($this->XmfPartidosIncidencias->save($xmfPartidosIncidencia)) {
                $this->Flash->success(__('The xmf partidos incidencia has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The xmf partidos incidencia could not be saved. Please, try again.'));
        }
        $xmfCasillas = $this->XmfPartidosIncidencias->XmfCasillas->find('list', ['limit' => 200]);
        $xmfPartidos = $this->XmfPartidosIncidencias->XmfPartidos->find('list', ['limit' => 200]);
        $xmfIncidencias = $this->XmfPartidosIncidencias->XmfIncidencias->find('list', ['limit' => 200]);
        $this->set(compact('xmfPartidosIncidencia', 'xmfCasillas', 'xmfPartidos', 'xmfIncidencias'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Xmf Partidos Incidencia id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $xmfPartidosIncidencia = $this->XmfPartidosIncidencias->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $xmfPartidosIncidencia = $this->XmfPartidosIncidencias->patchEntity($xmfPartidosIncidencia, $this->request->getData());
            if ($this->XmfPartidosIncidencias->save($xmfPartidosIncidencia)) {
                $this->Flash->success(__('The xmf partidos incidencia has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The xmf partidos incidencia could not be saved. Please, try again.'));
        }
        $xmfCasillas = $this->XmfPartidosIncidencias->XmfCasillas->find('list', ['limit' => 200]);
        $xmfPartidos = $this->XmfPartidosIncidencias->XmfPartidos->find('list', ['limit' => 200]);
        $xmfIncidencias = $this->XmfPartidosIncidencias->XmfIncidencias->find('list', ['limit' => 200]);
        $this->set(compact('xmfPartidosIncidencia', 'xmfCasillas', 'xmfPartidos', 'xmfIncidencias'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Xmf Partidos Incidencia id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $xmfPartidosIncidencia = $this->XmfPartidosIncidencias->get($id);
        if ($this->XmfPartidosIncidencias->delete($xmfPartidosIncidencia)) {
            $this->Flash->success(__('The xmf partidos incidencia has been deleted.'));
        } else {
            $this->Flash->error(__('The xmf partidos incidencia could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
