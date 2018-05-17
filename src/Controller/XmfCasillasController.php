<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/**
 * XmfCasillas Controller
 *
 * @property \App\Model\Table\XmfCasillasTable $XmfCasillas
 *
 * @method \App\Model\Entity\XmfCasilla[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class XmfCasillasController extends AppController
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
        $xmfCasillas = $this->paginate($this->XmfCasillas);
        $this->getCounterHead();
        $this->set(compact('xmfCasillas'));
    }

    /**
     * View method
     *
     * @param string|null $id Xmf Casilla id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $xmfCasilla = $this->XmfCasillas->get($id, [
            'contain' => []
        ]);

        $this->set('xmfCasilla', $xmfCasilla);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $xmfCasilla = $this->XmfCasillas->newEntity();
        if ($this->request->is('post')) {
            $xmfCasilla = $this->XmfCasillas->patchEntity($xmfCasilla, $this->request->getData());
            if ($this->XmfCasillas->save($xmfCasilla)) {
                $this->Flash->success(__('The xmf casilla has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The xmf casilla could not be saved. Please, try again.'));
        }
        $this->set(compact('xmfCasilla'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Xmf Casilla id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $xmfCasilla = $this->XmfCasillas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $xmfCasilla = $this->XmfCasillas->patchEntity($xmfCasilla, $this->request->getData());
            if ($this->XmfCasillas->save($xmfCasilla)) {
                $this->Flash->success(__('The xmf casilla has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The xmf casilla could not be saved. Please, try again.'));
        }
        $this->set(compact('xmfCasilla'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Xmf Casilla id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $xmfCasilla = $this->XmfCasillas->get($id);
        if ($this->XmfCasillas->delete($xmfCasilla)) {
            $this->Flash->success(__('The xmf casilla has been deleted.'));
        } else {
            $this->Flash->error(__('The xmf casilla could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function monitorCasillas()
    {
      $this->getCounterHead();
      $this->getIncidencias();

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
      #$this->viewBuilder()->template('Paper.Element/xmf/monitor');

    }

    public function monitorCasillasAbiertas()
    {
      $role_id = $_SESSION['Auth']['User']['role_id'];

     $this->getCounterHead();
     $this->getIncidencias();
     $this->LoadModel('XmfViewReporteSegundosTerceros');
     $this->LoadModel('XmfReportsCierre');

     if($role_id == 'e687cb91-4cdf-4ab2-992f-e76584199c2e')
     {
       $conditions = array('XmfCasillas.hora_inicio  IS NOT NULL','XmfCasillas.status'=>'V','XmfCasillas.rg_id'=>$_SESSION['Auth']['User']['id']);
     }else{
         $conditions = array('XmfCasillas.hora_inicio  IS NOT NULL','XmfCasillas.status'=>'V');
     }


     $casillas_segundo_reporte = $this->XmfCasillas->find('all', array('conditions' => $conditions));
     $casillas_segundo_reporte->hydrate(false);
     $casillas_segundo_reporte =$casillas_segundo_reporte->toArray();

     $casillas_tercer_reporte = $this->XmfCasillas->find('all', array('conditions' => $conditions));
     $casillas_tercer_reporte->hydrate(false);
     $casillas_tercer_reporte =$casillas_tercer_reporte->toArray();


     $casillas_cuarto_reporte = $this->XmfReportsCierre->find('all');
     $casillas_cuarto_reporte->hydrate(false)->join([
        'table' => 'xmf_casillas',
        'alias' => 'c',
        'type' => 'INNER',
        'conditions' => 'c.id = XmfReportsCierre.xmf_casillas_id',
    ])->where(['c.rg_id'=>$_SESSION['Auth']['User']['id']]);
     $casillas_cuarto_reporte =$casillas_cuarto_reporte->toArray();

     foreach($casillas_segundo_reporte as $k=>$cp)
     {
       $casilla_votos = $this->XmfViewReporteSegundosTerceros->find('all',['conditions'=>['XmfViewReporteSegundosTerceros.xmf_casillas_id' => $cp['id'] ]]);
       $casilla_votos->select([
         'name'                => 'name',
         'votantes_segundo'    => $casilla_votos->func()->sum('votantes_segundo'),
         'promovidos_segundo'  => $casilla_votos->func()->sum('promovidos_segundo'),
       ])
       ->group(['xmf_casillas_id','name']);

       $casilla_votos->hydrate(false);
       $casilla_votos =$casilla_votos->toArray();
       $casillas_segundo_reporte[$k]['votos'] = ($casilla_votos) ? $casilla_votos[0]: 0;
     }


     foreach($casillas_tercer_reporte as $k=>$cp)
     {
       $casilla_votos = $this->XmfViewReporteSegundosTerceros->find('all',['conditions'=>['XmfViewReporteSegundosTerceros.xmf_casillas_id' => $cp['id'] ]]);
       $casilla_votos->select([
         'name'                => 'name',
         'votantes_tercero'    => $casilla_votos->func()->sum('votantes_tercero'),
         'promovidos_tercero'  => $casilla_votos->func()->sum('promovidos_tercero'),
       ])
       ->group(['xmf_casillas_id','name']);

       $casilla_votos->hydrate(false);
       $casilla_votos =$casilla_votos->toArray();
       $casillas_tercer_reporte[$k]['votos'] = ($casilla_votos) ? $casilla_votos[0]: 0;
     }

     foreach($casillas_cuarto_reporte as $k=>$cp)
     {
       $casilla_datos = $this->XmfCasillas->find('all',['conditions'=>['XmfCasillas.id' => $cp['xmf_casillas_id'] ]]);
       $casilla_datos->hydrate(false);
       $casilla_datos =$casilla_datos->toArray();
       $casillas_cuarto_reporte[$k]['CasillaDatos'] = $casilla_datos[0];
     }

     $this->paginate = array('limit'=>35,
                             'page' => 1,
                             'order' => array('XmfCasillas.name' => 'asc')
                            );
     $this->LoadModel('XmfCasillas');


     $role_id = $_SESSION['Auth']['User']['role_id'];
     if($role_id == 'e687cb91-4cdf-4ab2-992f-e76584199c2e')
     {
        $conditions =  array('XmfCasillas.hora_cierre'=>'IS NOT NULL','XmfCasillas.status'=>'X','XmfCasillas.rg_id'=>$_SESSION['Auth']['User']['id']);
     }else{
          $conditions =  array('XmfCasillas.hora_cierre'=> 'IS NOT NULL','XmfCasillas.status'=>'X');
     }
     pr($conditions);
     $casillas_cerradas = $this->XmfCasillas->find('all', array('fields'=>array('id','name'),'conditions' => $conditions));
     $casillas_cerradas->hydrate(false);

     $casillas_cerradas =$casillas_cerradas->toArray();

     $this->set(compact('casillas_segundo_reporte','casillas_tercer_reporte','casillas_cuarto_reporte','casillas_cerradas'));
   }

  public function capturaResultados($id=null,$tab)
  {
      switch ($tab)
      {
        case '1':$active_1='active';$active_2='';$active_3='';$active_4='';$active_5='';break;
        case '2':$active_1='';$active_2='active';$active_3='';$active_4='';$active_5='';break;
        case '3':$active_1='';$active_2='';$active_3='active';$active_4='';$active_5='';break;
        case '4':$active_1='';$active_2='';$active_3='';$active_4='active';$active_5='';break;
        case '5':$active_1='';$active_2='';$active_3='';$active_4='';$active_5='active';break;
        default: $active_1='active';$active_2='';$active_3='';$active_4='';$active_5='';break;
      }

      #REPORTE I
      $this->LoadModel('XmfCasillas');
      $this->LoadModel('XmfPresencesReferences');
      $casilla_datos = $this->XmfCasillas->find('all',['conditions'=>['XmfCasillas.id' => $id ]]);
      $casilla_datos->hydrate(false);
      $casilla_datos =$casilla_datos->toArray();
      $casillas_primer_reporte = $casilla_datos[0];

      $casilla_presencias = $this->XmfPresencesReferences->find('all',['conditions'=>['XmfPresencesReferences.xmf_casillas_id' => $id ]]);
      $casilla_presencias->hydrate(false);
      $casilla_presencias =$casilla_presencias->toArray();
      #REPORTE I

      $this->LoadModel('XmfViewReporteSegundosTerceros');

      #REPORTE II
      $casilla_votos = $this->XmfViewReporteSegundosTerceros->find('all',['conditions'=>['XmfViewReporteSegundosTerceros.xmf_casillas_id' => $id ]]);
      $casilla_votos->select([
        'name'                => 'name',
        'votantes_segundo'    => $casilla_votos->func()->sum('votantes_segundo'),
        'promovidos_segundo'  => $casilla_votos->func()->sum('promovidos_segundo'),
      ])
      ->group(['xmf_casillas_id','name']);

      $casilla_votos->hydrate(false);
      $casilla_votos =$casilla_votos->toArray();
      $casillas_segundo_reporte = ($casilla_votos) ? $casilla_votos[0]: 0;
      #REPORTE II

      #REPORTE III
      $casilla_votos_3 = $this->XmfViewReporteSegundosTerceros->find('all',['conditions'=>['XmfViewReporteSegundosTerceros.xmf_casillas_id' => $id ]]);
      $casilla_votos_3->select([
        'name'                => 'name',
        'votantes_tercero'    => $casilla_votos_3->func()->sum('votantes_tercero'),
        'promovidos_tercero'  => $casilla_votos_3->func()->sum('promovidos_tercero'),
      ])
      ->group(['xmf_casillas_id','name']);

      $casilla_votos_3->hydrate(false);
      $casilla_votos_3 =$casilla_votos_3->toArray();
      $casillas_tercero_reporte = ($casilla_votos_3) ? $casilla_votos_3[0]: 0;
      #REPORTE III

      #REPORTE IV
      $this->LoadModel('XmfReportsCierre');
      $casillas_cuarto_reporte = $this->XmfReportsCierre->find('all',['conditions'=>['XmfReportsCierre.xmf_casillas_id' => $id ]]);
      $casillas_cuarto_reporte->hydrate(false);
      $casillas_cuarto_reporte = $casillas_cuarto_reporte->toArray();
      #REPORTE IV

      $this->set(compact('active_1','active_2','active_3','active_4','active_5',
      'casillas_primer_reporte',
      'casillas_segundo_reporte',
      'casillas_tercero_reporte',
      'casillas_cuarto_reporte',
      'id'));
  }


  public function enviarIncidencia()
  {
    if($this->request->is('ajax'))
    {
      $CasillasIncidenciasTable = TableRegistry::get('XmfCasillasIncidencias');
      $CasillasIncidencias = $CasillasIncidenciasTable->newEntity();

      $CasillasIncidencias->xmf_casillas_id = $_POST['xmf_casillas_id'];
      $CasillasIncidencias->xmf_total_incidencias =$_POST['xmf_total_incidencias'];

      if ($CasillasIncidenciasTable->save($CasillasIncidencias))
      {
          $id = $CasillasIncidencias->id;
      }
    }
  }

  public function monitorIncidencias()
  {
    $this->getCounterHead();
    $this->getIncidencias();
  }



  public function monitorPresencias($page=1)
  {
    $this->getCounterHead();
    /*
    +----------+--------------------------------------+
    | name     | id                                   |
    +----------+--------------------------------------+
    | Admin    | 5197c80d-2d30-4225-a757-b31592c9e0f0 |
    | Captura  | 80687266-6761-43a2-bd98-f42349a9bb63 |
    | Monitor* | e687cb91-4cdf-4ab2-992f-e76584199c2e |
    +----------+--------------------------------------+
    */
    $role_id = $_SESSION['Auth']['User']['role_id'];
    if($role_id == 'e687cb91-4cdf-4ab2-992f-e76584199c2e')
    {
      $conditions = array('rg_id'=>$_SESSION['Auth']['User']['id']);
    }else{
      $conditions = null;
    }
    $this->paginate = array('limit'=>35,
                            'page' => $page,
                            'order' => array('XmfCasillas.name' => 'asc')
                           );

    $this->LoadModel('XmfCasillas');
    $casillas_presentes = $this->paginate($this->XmfCasillas->find('all',array('fields'=>array('id','name'),'conditions' => array('XmfCasillas.hora_presencia  IS NOT NULL','XmfCasillas.status'=>'P',$conditions))));
    $casillas_presentes =$casillas_presentes->toArray();

    $this->getIncidencias();
    $this->set(compact('casillas_presentes'));
  }

  public function monitorAusentes($page=1)
  {
    $this->getCounterHead();
    /*
    +----------+--------------------------------------+
    | name     | id                                   |
    +----------+--------------------------------------+
    | Admin    | 5197c80d-2d30-4225-a757-b31592c9e0f0 |
    | Captura  | 80687266-6761-43a2-bd98-f42349a9bb63 |
    | Monitor* | e687cb91-4cdf-4ab2-992f-e76584199c2e |
    +----------+--------------------------------------+
    */
    $role_id = $_SESSION['Auth']['User']['role_id'];
    if($role_id == 'e687cb91-4cdf-4ab2-992f-e76584199c2e')
    {
      $conditions = array('rg_id'=>$_SESSION['Auth']['User']['id']);
    }else{
      $conditions = null;
    }
    $this->paginate = array('limit'=>35,
                            'page' => $page,
                            'order' => array('XmfCasillas.name' => 'asc')
                           );


    $this->LoadModel('XmfCasillas');
    $casillas_ausentes = $this->paginate($this->XmfCasillas->find('all', array('fields'=>array('id','name'),'conditions' => array('XmfCasillas.hora_presencia IS NULL',$conditions))));
    $casillas_ausentes =$casillas_ausentes->toArray();
    $this->getIncidencias();
    $this->set(compact('casillas_ausentes'));
  }

  public function monitorInstalando($page=1)
  {
    $this->getCounterHead();
    /*
    +----------+--------------------------------------+
    | name     | id                                   |
    +----------+--------------------------------------+
    | Admin    | 5197c80d-2d30-4225-a757-b31592c9e0f0 |
    | Captura  | 80687266-6761-43a2-bd98-f42349a9bb63 |
    | Monitor* | e687cb91-4cdf-4ab2-992f-e76584199c2e |
    +----------+--------------------------------------+
    */
    $role_id = $_SESSION['Auth']['User']['role_id'];
    if($role_id == 'e687cb91-4cdf-4ab2-992f-e76584199c2e')
    {
      $conditions = array('rg_id'=>$_SESSION['Auth']['User']['id']);
    }else{
      $conditions = null;
    }
    $this->paginate = array('limit'=>35,
                            'page' => $page,
                            'order' => array('XmfCasillas.name' => 'asc')
                           );


    $this->LoadModel('XmfCasillas');
    $casillas_instalando = $this->paginate($this->XmfCasillas->find('all', array('fields'=>array('id','name'),'conditions' => array('XmfCasillas.hora_instalacion  IS NOT NULL','XmfCasillas.status'=>'I',$conditions))));
    $casillas_instalando =$casillas_instalando->toArray();
    $this->getIncidencias();
    $this->set(compact('casillas_instalando'));
  }


  public function monitorCerradas($page=1)
  {
    $this->getCounterHead();
    /*
    +----------+--------------------------------------+
    | name     | id                                   |
    +----------+--------------------------------------+
    | Admin    | 5197c80d-2d30-4225-a757-b31592c9e0f0 |
    | Captura  | 80687266-6761-43a2-bd98-f42349a9bb63 |
    | Monitor* | e687cb91-4cdf-4ab2-992f-e76584199c2e |
    +----------+--------------------------------------+
    */
    $role_id = $_SESSION['Auth']['User']['role_id'];
    if($role_id == 'e687cb91-4cdf-4ab2-992f-e76584199c2e')
    {
      $conditions = array('rg_id'=>$_SESSION['Auth']['User']['id']);
    }else{
      $conditions = null;
    }
    $this->paginate = array('limit'=>35,
                            'page' => $page,
                            'order' => array('XmfCasillas.name' => 'asc')
                           );

    $this->LoadModel('XmfCasillas');

    $casillas_cerradas = $this->paginate($this->XmfCasillas->find('all', array('fields'=>array('id','name'),'conditions' => array('XmfCasillas.hora_cierre IS NOT NULL','XmfCasillas.status'=>'X',$conditions))));
    $casillas_cerradas =$casillas_cerradas->toArray();
    $this->getIncidencias();
    $this->set(compact('casillas_cerradas'));
    #$this->viewBuilder()->template('Paper.Element/xmf/pagination/casillas_status');
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
}
