<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * XmfViewReporteSegundosTerceros Controller
 *
 * @property \App\Model\Table\XmfViewReporteSegundosTercerosTable $XmfViewReporteSegundosTerceros
 *
 * @method \App\Model\Entity\XmfViewReporteSegundosTercero[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class XmfViewReporteSegundosTercerosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['XmfCasillas']
        ];
        $xmfViewReporteSegundosTerceros = $this->paginate($this->XmfViewReporteSegundosTerceros);

        $this->set(compact('xmfViewReporteSegundosTerceros'));
    }

    /**
     * View method
     *
     * @param string|null $id Xmf View Reporte Segundos Tercero id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $xmfViewReporteSegundosTercero = $this->XmfViewReporteSegundosTerceros->get($id, [
            'contain' => ['XmfCasillas']
        ]);

        $this->set('xmfViewReporteSegundosTercero', $xmfViewReporteSegundosTercero);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $xmfViewReporteSegundosTercero = $this->XmfViewReporteSegundosTerceros->newEntity();
        if ($this->request->is('post')) {
            $xmfViewReporteSegundosTercero = $this->XmfViewReporteSegundosTerceros->patchEntity($xmfViewReporteSegundosTercero, $this->request->getData());
            if ($this->XmfViewReporteSegundosTerceros->save($xmfViewReporteSegundosTercero)) {
                $this->Flash->success(__('The xmf view reporte segundos tercero has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The xmf view reporte segundos tercero could not be saved. Please, try again.'));
        }
        $xmfCasillas = $this->XmfViewReporteSegundosTerceros->XmfCasillas->find('list', ['limit' => 200]);
        $this->set(compact('xmfViewReporteSegundosTercero', 'xmfCasillas'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Xmf View Reporte Segundos Tercero id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $xmfViewReporteSegundosTercero = $this->XmfViewReporteSegundosTerceros->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $xmfViewReporteSegundosTercero = $this->XmfViewReporteSegundosTerceros->patchEntity($xmfViewReporteSegundosTercero, $this->request->getData());
            if ($this->XmfViewReporteSegundosTerceros->save($xmfViewReporteSegundosTercero)) {
                $this->Flash->success(__('The xmf view reporte segundos tercero has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The xmf view reporte segundos tercero could not be saved. Please, try again.'));
        }
        $xmfCasillas = $this->XmfViewReporteSegundosTerceros->XmfCasillas->find('list', ['limit' => 200]);
        $this->set(compact('xmfViewReporteSegundosTercero', 'xmfCasillas'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Xmf View Reporte Segundos Tercero id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $xmfViewReporteSegundosTercero = $this->XmfViewReporteSegundosTerceros->get($id);
        if ($this->XmfViewReporteSegundosTerceros->delete($xmfViewReporteSegundosTercero)) {
            $this->Flash->success(__('The xmf view reporte segundos tercero has been deleted.'));
        } else {
            $this->Flash->error(__('The xmf view reporte segundos tercero could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
