<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * XmfFuncionariosPresenceStatus Controller
 *
 * @property \App\Model\Table\XmfFuncionariosPresenceStatusTable $XmfFuncionariosPresenceStatus
 *
 * @method \App\Model\Entity\XmfFuncionariosPresenceStatus[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class XmfFuncionariosPresenceStatusController extends AppController
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
            'contain' => ['XmfPresencesReferences', 'XmfCasillas', 'XmfPartidos']
        ];
        $xmfFuncionariosPresenceStatus = $this->paginate($this->XmfFuncionariosPresenceStatus);

        $this->set(compact('xmfFuncionariosPresenceStatus'));
    }

    /**
     * View method
     *
     * @param string|null $id Xmf Funcionarios Presence Status id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $xmfFuncionariosPresenceStatus = $this->XmfFuncionariosPresenceStatus->get($id, [
            'contain' => ['XmfPresencesReferences', 'XmfCasillas', 'XmfPartidos']
        ]);

        $this->set('xmfFuncionariosPresenceStatus', $xmfFuncionariosPresenceStatus);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $xmfFuncionariosPresenceStatus = $this->XmfFuncionariosPresenceStatus->newEntity();
        if ($this->request->is('post')) {
            $xmfFuncionariosPresenceStatus = $this->XmfFuncionariosPresenceStatus->patchEntity($xmfFuncionariosPresenceStatus, $this->request->getData());
            if ($this->XmfFuncionariosPresenceStatus->save($xmfFuncionariosPresenceStatus)) {
                $this->Flash->success(__('The xmf funcionarios presence status has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The xmf funcionarios presence status could not be saved. Please, try again.'));
        }
        $xmfPresencesReferences = $this->XmfFuncionariosPresenceStatus->XmfPresencesReferences->find('list', ['limit' => 200]);
        $xmfCasillas = $this->XmfFuncionariosPresenceStatus->XmfCasillas->find('list', ['limit' => 200]);
        $xmfPartidos = $this->XmfFuncionariosPresenceStatus->XmfPartidos->find('list', ['limit' => 200]);
        $this->set(compact('xmfFuncionariosPresenceStatus', 'xmfPresencesReferences', 'xmfCasillas', 'xmfPartidos'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Xmf Funcionarios Presence Status id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $xmfFuncionariosPresenceStatus = $this->XmfFuncionariosPresenceStatus->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $xmfFuncionariosPresenceStatus = $this->XmfFuncionariosPresenceStatus->patchEntity($xmfFuncionariosPresenceStatus, $this->request->getData());
            if ($this->XmfFuncionariosPresenceStatus->save($xmfFuncionariosPresenceStatus)) {
                $this->Flash->success(__('The xmf funcionarios presence status has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The xmf funcionarios presence status could not be saved. Please, try again.'));
        }
        $xmfPresencesReferences = $this->XmfFuncionariosPresenceStatus->XmfPresencesReferences->find('list', ['limit' => 200]);
        $xmfCasillas = $this->XmfFuncionariosPresenceStatus->XmfCasillas->find('list', ['limit' => 200]);
        $xmfPartidos = $this->XmfFuncionariosPresenceStatus->XmfPartidos->find('list', ['limit' => 200]);
        $this->set(compact('xmfFuncionariosPresenceStatus', 'xmfPresencesReferences', 'xmfCasillas', 'xmfPartidos'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Xmf Funcionarios Presence Status id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $xmfFuncionariosPresenceStatus = $this->XmfFuncionariosPresenceStatus->get($id);
        if ($this->XmfFuncionariosPresenceStatus->delete($xmfFuncionariosPresenceStatus)) {
            $this->Flash->success(__('The xmf funcionarios presence status has been deleted.'));
        } else {
            $this->Flash->error(__('The xmf funcionarios presence status could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
