<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * XmfPresences Controller
 *
 * @property \App\Model\Table\XmfPresencesTable $XmfPresences
 *
 * @method \App\Model\Entity\XmfPresence[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class XmfPresencesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $xmfPresences = $this->paginate($this->XmfPresences);

        $this->set(compact('xmfPresences'));
    }

    /**
     * View method
     *
     * @param string|null $id Xmf Presence id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $xmfPresence = $this->XmfPresences->get($id, [
            'contain' => []
        ]);

        $this->set('xmfPresence', $xmfPresence);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $xmfPresence = $this->XmfPresences->newEntity();
        if ($this->request->is('post')) {
            $xmfPresence = $this->XmfPresences->patchEntity($xmfPresence, $this->request->getData());
            if ($this->XmfPresences->save($xmfPresence)) {
                $this->Flash->success(__('The xmf presence has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The xmf presence could not be saved. Please, try again.'));
        }
        $this->set(compact('xmfPresence'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Xmf Presence id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $xmfPresence = $this->XmfPresences->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $xmfPresence = $this->XmfPresences->patchEntity($xmfPresence, $this->request->getData());
            if ($this->XmfPresences->save($xmfPresence)) {
                $this->Flash->success(__('The xmf presence has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The xmf presence could not be saved. Please, try again.'));
        }
        $this->set(compact('xmfPresence'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Xmf Presence id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $xmfPresence = $this->XmfPresences->get($id);
        if ($this->XmfPresences->delete($xmfPresence)) {
            $this->Flash->success(__('The xmf presence has been deleted.'));
        } else {
            $this->Flash->error(__('The xmf presence could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
