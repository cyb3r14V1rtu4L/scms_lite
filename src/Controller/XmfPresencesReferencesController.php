<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * XmfPresencesReferences Controller
 *
 * @property \App\Model\Table\XmfPresencesReferencesTable $XmfPresencesReferences
 *
 * @method \App\Model\Entity\XmfPresencesReference[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class XmfPresencesReferencesController extends AppController
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
            'contain' => ['XmfCasillas', 'XmfPartidos']
        ];
        $xmfPresencesReferences = $this->paginate($this->XmfPresencesReferences);

        $this->set(compact('xmfPresencesReferences'));
    }

    /**
     * View method
     *
     * @param string|null $id Xmf Presences Reference id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $xmfPresencesReference = $this->XmfPresencesReferences->get($id, [
            'contain' => ['XmfCasillas', 'XmfPartidos']
        ]);

        $this->set('xmfPresencesReference', $xmfPresencesReference);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $xmfPresencesReference = $this->XmfPresencesReferences->newEntity();
        if ($this->request->is('post')) {
            $xmfPresencesReference = $this->XmfPresencesReferences->patchEntity($xmfPresencesReference, $this->request->getData());
            if ($this->XmfPresencesReferences->save($xmfPresencesReference)) {
                $this->Flash->success(__('The xmf presences reference has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The xmf presences reference could not be saved. Please, try again.'));
        }
        $xmfCasillas = $this->XmfPresencesReferences->XmfCasillas->find('list', ['limit' => 200]);
        $xmfPartidos = $this->XmfPresencesReferences->XmfPartidos->find('list', ['limit' => 200]);
        $this->set(compact('xmfPresencesReference', 'xmfCasillas', 'xmfPartidos'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Xmf Presences Reference id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $xmfPresencesReference = $this->XmfPresencesReferences->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $xmfPresencesReference = $this->XmfPresencesReferences->patchEntity($xmfPresencesReference, $this->request->getData());
            if ($this->XmfPresencesReferences->save($xmfPresencesReference)) {
                $this->Flash->success(__('The xmf presences reference has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The xmf presences reference could not be saved. Please, try again.'));
        }
        $xmfCasillas = $this->XmfPresencesReferences->XmfCasillas->find('list', ['limit' => 200]);
        $xmfPartidos = $this->XmfPresencesReferences->XmfPartidos->find('list', ['limit' => 200]);
        $this->set(compact('xmfPresencesReference', 'xmfCasillas', 'xmfPartidos'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Xmf Presences Reference id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $xmfPresencesReference = $this->XmfPresencesReferences->get($id);
        if ($this->XmfPresencesReferences->delete($xmfPresencesReference)) {
            $this->Flash->success(__('The xmf presences reference has been deleted.'));
        } else {
            $this->Flash->error(__('The xmf presences reference could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
