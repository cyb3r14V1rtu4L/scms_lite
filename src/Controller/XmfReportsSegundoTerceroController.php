<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * XmfReportsSegundoTercero Controller
 *
 * @property \App\Model\Table\XmfReportsSegundoTerceroTable $XmfReportsSegundoTercero
 *
 * @method \App\Model\Entity\XmfReportsSegundoTercero[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class XmfReportsSegundoTerceroController extends AppController
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
        $xmfReportsSegundoTercero = $this->paginate($this->XmfReportsSegundoTercero);

        $this->set(compact('xmfReportsSegundoTercero'));
        // $this->viewBuilder()->layout('Paper.pages/reports/SegundoReporte');
    }

    public function SegundoReporte() {
      // debug('XmfReportsSegundoTercero::SegundoReporte');
      $this->LoadModel('XmfViewReporteSegundosTerceros');

      $graf_data = $this->XmfViewReporteSegundosTerceros->find('all');
      $graf_data->hydrate(false);
      $graf_data =$graf_data->toArray();
      // $graf_data =$graf_data->toList();
      // debug($graf_data);

      // debug(json_encode($graf_data));

      foreach ($graf_data as $key => $value) {
        $jcategories[] = $value['name'];
        $jvotantes[] = $value['votantes_segundo'];;
        $jpromovidos[] = $value['promovidos_segundo'];

        $pie['name'][] = $value['name'];
        $pie['y'][] = $value['votantes_segundo'];

      }

      // debug(json_encode($pie));
      $categories = json_encode($jcategories);
      $votantes = json_encode($jvotantes);
      $promovidos = json_encode($jpromovidos);

      $this->set(compact('votantes','promovidos','categories'));

      // Ancient sentence
      // $this->render('Paper.Pages/reports/SegundoReporte');
      // 3.x form
      $this->viewBuilder()->template('Paper.Pages/reports/SegundoReporte');
    }

    public function TercerReporte() {
      // debug('XmfReportsSegundoTercero::SegundoReporte');
      $this->LoadModel('XmfViewReporteSegundosTerceros');

      $graf_data = $this->XmfViewReporteSegundosTerceros->find('all');
      $graf_data->hydrate(false);
      $graf_data =$graf_data->toArray();
      // $graf_data =$graf_data->toList();
      // debug($graf_data);
      foreach ($graf_data as $key => $value) {
        $jcategories[] = $value['name'];
        $jvotantes[] = $value['votantes_tercero'];;
        $jpromovidos[] = $value['promovidos_tercero'];
      }

      $categories = json_encode($jcategories);
      $votantes = json_encode($jvotantes);
      $promovidos = json_encode($jpromovidos);

      $this->set(compact('votantes','promovidos','categories'));

      // Ancient sentence
      // $this->render('Paper.Pages/reports/SegundoReporte');
      // 3.x form
      $this->viewBuilder()->template('Paper.Pages/reports/TercerReporte');
    }
    /**
     * View method
     *
     * @param string|null $id Xmf Reports Segundo Tercero id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $xmfReportsSegundoTercero = $this->XmfReportsSegundoTercero->get($id, [
            'contain' => []
        ]);

        $this->set('xmfReportsSegundoTercero', $xmfReportsSegundoTercero);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $xmfReportsSegundoTercero = $this->XmfReportsSegundoTercero->newEntity();
        if ($this->request->is('post')) {
            $xmfReportsSegundoTercero = $this->XmfReportsSegundoTercero->patchEntity($xmfReportsSegundoTercero, $this->request->getData());
            if ($this->XmfReportsSegundoTercero->save($xmfReportsSegundoTercero)) {
                $this->Flash->success(__('The xmf reports segundo tercero has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The xmf reports segundo tercero could not be saved. Please, try again.'));
        }
        $this->set(compact('xmfReportsSegundoTercero'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Xmf Reports Segundo Tercero id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $xmfReportsSegundoTercero = $this->XmfReportsSegundoTercero->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $xmfReportsSegundoTercero = $this->XmfReportsSegundoTercero->patchEntity($xmfReportsSegundoTercero, $this->request->getData());
            if ($this->XmfReportsSegundoTercero->save($xmfReportsSegundoTercero)) {
                $this->Flash->success(__('The xmf reports segundo tercero has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The xmf reports segundo tercero could not be saved. Please, try again.'));
        }
        $this->set(compact('xmfReportsSegundoTercero'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Xmf Reports Segundo Tercero id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $xmfReportsSegundoTercero = $this->XmfReportsSegundoTercero->get($id);
        if ($this->XmfReportsSegundoTercero->delete($xmfReportsSegundoTercero)) {
            $this->Flash->success(__('The xmf reports segundo tercero has been deleted.'));
        } else {
            $this->Flash->error(__('The xmf reports segundo tercero could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
