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
        $this->getCounterHead();
        $xmfReportsSegundoTercero = $this->paginate($this->XmfReportsSegundoTercero);

        $this->set(compact('xmfReportsSegundoTercero'));
        // $this->viewBuilder()->layout('Paper.pages/reports/SegundoReporte');
    }


    public function PrimerReporte() {
      $this->getCounterHead();

      $role_id = $_SESSION['Auth']['User']['role_id'];
      if($role_id == 'e687cb91-4cdf-4ab2-992f-e76584199c2e')
      {
        $conditions_v = array('XmfCasillas.status'=>'V','rg_id'=>$_SESSION['Auth']['User']['id']);
        $conditions_a = array('XmfCasillas.status IS NULL','rg_id'=>$_SESSION['Auth']['User']['id']);
      }else{
        $conditions_v = ['XmfCasillas.status'=>'V'];
        $conditions_a = ['XmfCasillas.status IS NULL'];
      }

      $this->LoadModel('XmfCasillas');
      $instaladas = $this->XmfCasillas->find('all',['conditions'=> $conditions_v]);
      $instaladas->select([
        'instalacion'    => $instaladas->func()->count('id'),
      ]);
      $instaladas->hydrate(false);
      $instaladas =$instaladas->toArray();

      $cerradas = $this->XmfCasillas->find('all',['conditions'=> $conditions_a]);
      $cerradas->select([
        'cierre'  => $cerradas->func()->count('id')
      ]);
      $cerradas->hydrate(false);
      $cerradas =$cerradas->toArray();
      $graf_data[0] = array_merge($instaladas[0],$cerradas[0]);

      $total= 0;
      foreach ($graf_data as $key => $value)
      {
        $jinstalacion[] = $value['instalacion'];
        $jcierre[] = $value['cierre'];
        $total += $value['instalacion']+$value['cierre'];
      }
      $instalacion = $jinstalacion;
      $cierre = $jcierre;

      //$total = json_encode(array_sum($jinstalacion + $jcierre));

      $tabular = $this->getData();
      $tabular = $tabular->toArray();

      $this->set(compact('instalacion','cierre','total','tabular'));
      // Ancient sentence
      // $this->render('Paper.Pages/reports/SegundoReporte');
      // 3.x form
      $this->viewBuilder()->template('Paper.Pages/reports/PrimerReporte');
    }

    public function getData () {
      // $this->getCounterHead();
      $this->LoadModel('XmfCasillas');
      $tabular = $this->XmfCasillas->find('all'
                                            ,[
                                                'conditions'=>[
                                                  'or' =>[
                                                    'XmfCasillas.hora_instalacion is not null',
                                                    'XmfCasillas.hora_cierre is not null'
                                                  ]
                                                ]
                                             ]
                                           );
      $tabular->select([
        'name'           => 'name',
        'instalacion'    => 'hora_instalacion',
        'inicio'         => 'hora_inicio'
      ]);

      return $tabular;
    }

    public function SegundoReporte() {
      // debug('XmfReportsSegundoTercero::SegundoReporte');
      $this->getCounterHead();

      $this->LoadModel('XmfViewReporteSegundosTerceros');
      $graf_data = $this->XmfViewReporteSegundosTerceros->find('all',['conditions'=>['XmfViewReporteSegundosTerceros.is_twelve' => 1 ]]);
      $graf_data->select([
        'name'                => 'name',
        'votantes_segundo'    => $graf_data->func()->sum('votantes_segundo'),
        'promovidos_segundo'  => $graf_data->func()->sum('promovidos_segundo'),
        'votantes_tercero'    => $graf_data->func()->sum('votantes_tercero'),
        'promovidos_tercero'  => $graf_data->func()->sum('promovidos_tercero'),
      ])
      ->group(['xmf_casillas_id','name']);
      $graf_data->hydrate(false);
      $graf_data =$graf_data->toArray();

      $votantes_s = 0;
      $promovidos_s = 0;
      $jcategories = array('ACUMULADO DE VOTACIONES');
      foreach ($graf_data as $key => $value)
      {
        $votantes_s +=$value['votantes_segundo'];
        $promovidos_s +=$value['promovidos_segundo'];
      }

      $jvotantes[] = $votantes_s;
      $jpromovidos[] = $promovidos_s;

      $categories = json_encode($jcategories);
      $votantes = json_encode($jvotantes);
      $promovidos = json_encode($jpromovidos);
      $this->set(compact('votantes','promovidos','categories','votantes_s','promovidos_s'));
      $this->viewBuilder()->template('Paper.Pages/reports/SegundoReporte');
    }

    public function TercerReporte() {
      $this->getIncidencias();

      $this->LoadModel('XmfViewReporteSegundosTerceros');

      $graf_data = $this->XmfViewReporteSegundosTerceros->find('all',['conditions'=>[ 'XmfViewReporteSegundosTerceros.is_thirdteen' => 1,
                                                                                      #'XmfViewReporteSegundosTerceros.is_twelve' => 1
                                                                                    ]
                                                                    ]
                                                              );
      $graf_data->select([
        'name'                => 'name',
        'votantes_segundo'    => $graf_data->func()->sum('votantes_segundo'),
        'promovidos_segundo'  => $graf_data->func()->sum('promovidos_segundo'),
        'votantes_tercero'    => $graf_data->func()->sum('votantes_tercero'),
        'promovidos_tercero'  => $graf_data->func()->sum('promovidos_tercero'),
      ])
      ->group(['xmf_casillas_id','name']);

      $graf_data->hydrate(false);
      $graf_data =$graf_data->toArray();
      #debug($graf_data);
      $votantes_s = 0;
      $promovidos_s = 0;
      $jcategories = array('FLUJO DE VOTACIONES');

      $votantes_2 = 0;
      $promovidos_2 = 0;
      $votantes_3 = 0;
      $promovidos_3 = 0;
      foreach ($graf_data as $key => $value)
      {
        $votantes_2   += $value['votantes_segundo'];
        $promovidos_2 += $value['promovidos_segundo'];
        $votantes_3   += $value['votantes_tercero'];
        $promovidos_3 += $value['promovidos_tercero'];
      }

      $votantes =$votantes_2+$votantes_3;
      $promovidos =$promovidos_2+$promovidos_3;
      $jvotantes[] = $votantes;
      $jpromovidos[] = $promovidos;

      $votantes_s = $votantes;
      $promovidos_s = $promovidos;

      // debug($graf_data);
      $categories = json_encode($jcategories);
      $votantes = json_encode($jvotantes);
      $promovidos = json_encode($jpromovidos);

      $this->pastelOchoDoce();

      $this->set(compact('votantes','promovidos','categories','votantes_s','promovidos_s'));

      // Ancient sentence
      // $this->render('Paper.Pages/reports/SegundoReporte');
      // 3.x form
      $this->viewBuilder()->template('Paper.Pages/reports/TercerReporte');
    }


    public function CuartoReporte() {
      $this->getCounterHead();
      $this->LoadModel('XmfViewReporteSegundosTerceros');

      $graf_data = $this->XmfViewReporteSegundosTerceros->find('all');
      $graf_data->select([
        'name'                => 'name',
        'votantes_segundo'    => $graf_data->func()->sum('votantes_segundo'),
        'promovidos_segundo'  => $graf_data->func()->sum('promovidos_segundo'),
        'votantes_tercero'    => $graf_data->func()->sum('votantes_tercero'),
        'promovidos_tercero'  => $graf_data->func()->sum('promovidos_tercero'),
      ])
      ->group(['xmf_casillas_id','name']);

      $graf_data->hydrate(false);
      $graf_data =$graf_data->toArray();

      $this->LoadModel('XmfReportsCierre');

      $graf_data_cierre = $this->XmfReportsCierre->find('all');
      $graf_data_cierre->select([
        'id'                => 'xmf_casillas_id',
        'votantes'    => $graf_data_cierre->func()->sum('votantes'),
        'promovidos'  => $graf_data_cierre->func()->sum('promovidos'),
      ])
      ->group(['xmf_casillas_id']);
      $graf_data_cierre->hydrate(false);
      $graf_data_cierre =$graf_data_cierre->toArray();

      #debug($graf_data_cierre);
      $votantes_cierre = 0;
      $promovidos_cierre = 0;
      foreach ($graf_data_cierre as $key => $value)
      {
        $votantes_cierre   += $value['votantes'];
        $promovidos_cierre += $value['promovidos'];
      }

      $votantes_s = 0;
      $promovidos_s = 0;
      $jcategories = array('ACUMULADO DE VOTACIONES');

      $votantes_2 = 0;
      $promovidos_2 = 0;
      $votantes_3 = 0;
      $promovidos_3 = 0;
      foreach ($graf_data as $key => $value)
      {
        $votantes_2   += $value['votantes_segundo'];
        $promovidos_2 += $value['promovidos_segundo'];
        $votantes_3   += $value['votantes_tercero'];
        $promovidos_3 += $value['promovidos_tercero'];
      }

      $votantes =$votantes_2+$votantes_3+$votantes_cierre;
      $promovidos =$promovidos_2+$promovidos_3+$promovidos_cierre;
      $jvotantes[] = $votantes;
      $jpromovidos[] = $promovidos;

      $votantes_s = $votantes;
      $promovidos_s = $promovidos;
      // debug($graf_data);
      $categories = json_encode($jcategories);
      $votantes = json_encode($jvotantes);
      $promovidos = json_encode($jpromovidos);
      $this->pastelOchoDoce();
      $this->pastelOchoKince();
      $this->set(compact('votantes_s','promovidos_s','votantes','promovidos','categories'));

      #HISTÓRICO


      // Ancient sentence
      // $this->render('Paper.Pages/reports/SegundoReporte');
      // 3.x form
      $this->viewBuilder()->template('Paper.Pages/reports/CuartoReporte');
    }


    public function pastelOchoDoce()
    {
      /*
      PASTEL HISTÓRICO 8:12
      */
      $graf_data12 = $this->XmfViewReporteSegundosTerceros->find('all',['conditions'=>['XmfViewReporteSegundosTerceros.is_twelve' => 1 ]]);
      $graf_data12->select([
        'name'                => 'name',
        'votantes_segundo'    => $graf_data12->func()->sum('votantes_segundo'),
        'promovidos_segundo'  => $graf_data12->func()->sum('promovidos_segundo'),
        'votantes_tercero'    => $graf_data12->func()->sum('votantes_tercero'),
        'promovidos_tercero'  => $graf_data12->func()->sum('promovidos_tercero'),
      ])
      ->group(['xmf_casillas_id','name']);
      $graf_data12->hydrate(false);
      $graf_data12 =$graf_data12->toArray();

      $votantes_s12 = 0;
      $promovidos_s12 = 0;

      foreach ($graf_data12 as $key => $value)
      {
        $votantes_s12 +=$value['votantes_segundo'];
        $promovidos_s12 +=$value['promovidos_segundo'];
      }

      /*
      PASTEL HISTÓRICO 8:12
      */
      $this->set(compact('votantes_s12','promovidos_s12'));
    }

    function pastelOchoKince()
    {
      $this->LoadModel('XmfViewReporteSegundosTerceros');

      $graf_data15 = $this->XmfViewReporteSegundosTerceros->find('all',['conditions'=>[ 'XmfViewReporteSegundosTerceros.is_thirdteen' => 1,
                                                                                      #'XmfViewReporteSegundosTerceros.is_twelve' => 1
                                                                                    ]
                                                                    ]
                                                              );
      $graf_data15->select([
        'name'                => 'name',
        'votantes_segundo'    => $graf_data15->func()->sum('votantes_segundo'),
        'promovidos_segundo'  => $graf_data15->func()->sum('promovidos_segundo'),
        'votantes_tercero'    => $graf_data15->func()->sum('votantes_tercero'),
        'promovidos_tercero'  => $graf_data15->func()->sum('promovidos_tercero'),
      ])
      ->group(['xmf_casillas_id','name']);

      $graf_data15->hydrate(false);
      $graf_data15 =$graf_data15->toArray();

      $votantes_s = 0;
      $promovidos_s = 0;
      $jcategories = array('FLUJO DE VOTACIONES');

      $votantes_215 = 0;
      $promovidos_215 = 0;
      $votantes_315 = 0;
      $promovidos_315 = 0;

      foreach ($graf_data15 as $key => $value)
      {
        $votantes_215   += $value['votantes_segundo'];
        $promovidos_215 += $value['promovidos_segundo'];
        $votantes_315   += $value['votantes_tercero'];
        $promovidos_315 += $value['promovidos_tercero'];
      }

      $votantes_s15 =$votantes_215+$votantes_315;
      $promovidos_s15 =$promovidos_215+$promovidos_315;

      $this->set(compact('votantes_s15','promovidos_s15'));
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
