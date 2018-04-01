<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * XmfVotes Controller
 *
 * @property \App\Model\Table\XmfVotesTable $XmfVotes
 *
 * @method \App\Model\Entity\XmfVote[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class XmfVotesController extends AppController
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
        $this->paginate = [
            'contain' => ['XmfCasillas', 'XmfTipoVotaciones', 'XmfPartidos']
        ];
        $xmfVotes = $this->paginate($this->XmfVotes);

        $this->set(compact('xmfVotes'));
    }

    /**
     * View method
     *
     * @param string|null $id Xmf Vote id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $xmfVote = $this->XmfVotes->get($id, [
            'contain' => ['XmfCasillas', 'XmfTipoVotaciones', 'XmfPartidos']
        ]);

        $this->set('xmfVote', $xmfVote);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $xmfVote = $this->XmfVotes->newEntity();
        if ($this->request->is('post')) {
            $xmfVote = $this->XmfVotes->patchEntity($xmfVote, $this->request->getData());
            if ($this->XmfVotes->save($xmfVote)) {
                $this->Flash->success(__('The xmf vote has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The xmf vote could not be saved. Please, try again.'));
        }
        $xmfCasillas = $this->XmfVotes->XmfCasillas->find('list', ['limit' => 200]);
        $xmfTipoVotaciones = $this->XmfVotes->XmfTipoVotaciones->find('list', ['limit' => 200]);
        $xmfPartidos = $this->XmfVotes->XmfPartidos->find('list', ['limit' => 200]);
        $this->set(compact('xmfVote', 'xmfCasillas', 'xmfTipoVotaciones', 'xmfPartidos'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Xmf Vote id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $xmfVote = $this->XmfVotes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $xmfVote = $this->XmfVotes->patchEntity($xmfVote, $this->request->getData());
            if ($this->XmfVotes->save($xmfVote)) {
                $this->Flash->success(__('The xmf vote has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The xmf vote could not be saved. Please, try again.'));
        }
        $xmfCasillas = $this->XmfVotes->XmfCasillas->find('list', ['limit' => 200]);
        $xmfTipoVotaciones = $this->XmfVotes->XmfTipoVotaciones->find('list', ['limit' => 200]);
        $xmfPartidos = $this->XmfVotes->XmfPartidos->find('list', ['limit' => 200]);
        $this->set(compact('xmfVote', 'xmfCasillas', 'xmfTipoVotaciones', 'xmfPartidos'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Xmf Vote id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $xmfVote = $this->XmfVotes->get($id);
        if ($this->XmfVotes->delete($xmfVote)) {
            $this->Flash->success(__('The xmf vote has been deleted.'));
        } else {
            $this->Flash->error(__('The xmf vote could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
