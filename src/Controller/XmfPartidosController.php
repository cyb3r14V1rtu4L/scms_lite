<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * XmfPartidos Controller
 *
 * @property \App\Model\Table\XmfPartidosTable $XmfPartidos
 *
 * @method \App\Model\Entity\XmfPartido[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class XmfPartidosController extends AppController
{
    public function isAuthorized ($user) {
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
            'contain' => ['ParentXmfPartidos']
        ];
        $xmfPartidos = $this->paginate($this->XmfPartidos);

        $this->set(compact('xmfPartidos'));
    }

    /**
     * View method
     *
     * @param string|null $id Xmf Partido id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $xmfPartido = $this->XmfPartidos->get($id, [
            'contain' => ['ParentXmfPartidos', 'ChildXmfPartidos']
        ]);

        $this->set('xmfPartido', $xmfPartido);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $xmfPartido = $this->XmfPartidos->newEntity();
        if ($this->request->is('post')) {
            $xmfPartido = $this->XmfPartidos->patchEntity($xmfPartido, $this->request->getData());
            if ($this->XmfPartidos->save($xmfPartido)) {
                $this->Flash->success(__('The xmf partido has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The xmf partido could not be saved. Please, try again.'));
        }
        $parentXmfPartidos = $this->XmfPartidos->ParentXmfPartidos->find('list', ['limit' => 200]);
        $this->set(compact('xmfPartido', 'parentXmfPartidos'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Xmf Partido id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $xmfPartido = $this->XmfPartidos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $xmfPartido = $this->XmfPartidos->patchEntity($xmfPartido, $this->request->getData());
            if ($this->XmfPartidos->save($xmfPartido)) {
                $this->Flash->success(__('The xmf partido has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The xmf partido could not be saved. Please, try again.'));
        }
        $parentXmfPartidos = $this->XmfPartidos->ParentXmfPartidos->find('list', ['limit' => 200]);
        $this->set(compact('xmfPartido', 'parentXmfPartidos'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Xmf Partido id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $xmfPartido = $this->XmfPartidos->get($id);
        if ($this->XmfPartidos->delete($xmfPartido)) {
            $this->Flash->success(__('The xmf partido has been deleted.'));
        } else {
            $this->Flash->error(__('The xmf partido could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
