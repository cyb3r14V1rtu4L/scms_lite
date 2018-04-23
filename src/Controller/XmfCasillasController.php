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
      #pr($CasillasIncidencias);exit;

        /*$this->LoadModel('XmfViewReporteSegundosTerceros');

        foreach($casillas_presentes as $k=>$cp)
        {
          $casilla_votos = $this->XmfViewReporteSegundosTerceros->find('all',['conditions'=>['XmfViewReporteSegundosTerceros.xmf_casillas_id' => $cp['id'] ]]);
          $casilla_votos->select([
            'name'                => 'name',
            'votantes_segundo'    => $casilla_votos->func()->sum('votantes_segundo'),
            'promovidos_segundo'  => $casilla_votos->func()->sum('promovidos_segundo'),
            'votantes_tercero'    => $casilla_votos->func()->sum('votantes_tercero'),
            'promovidos_tercero'  => $casilla_votos->func()->sum('promovidos_tercero'),
          ])
          ->group(['xmf_casillas_id','name']);

          $casilla_votos->hydrate(false);
          $casilla_votos =$casilla_votos->toArray();
          $casillas_presentes[$k]['votos'] = $casilla_votos[0];
        }*/



    }

    public function monitorCasillasAbiertas()
    {
     $this->getCounterHead();
     $this->getIncidencias();
     $this->LoadModel('XmfViewReporteSegundosTerceros');
     $this->LoadModel('XmfReportsCierre');
     $casillas_segundo_reporte = $this->XmfCasillas->find('all', array('conditions' => array('XmfCasillas.hora_inicio  IS NOT NULL','XmfCasillas.status'=>'V')));
     $casillas_segundo_reporte->hydrate(false);
     $casillas_segundo_reporte =$casillas_segundo_reporte->toArray();

     $casillas_tercer_reporte = $this->XmfCasillas->find('all', array('conditions' => array('XmfCasillas.hora_inicio  IS NOT NULL','XmfCasillas.status'=>'V')));
     $casillas_tercer_reporte->hydrate(false);
     $casillas_tercer_reporte =$casillas_tercer_reporte->toArray();

     $casillas_cuarto_reporte = $this->XmfReportsCierre->find('all');
     $casillas_cuarto_reporte->hydrate(false);
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

     $this->set(compact('casillas_segundo_reporte','casillas_tercer_reporte','casillas_cuarto_reporte'));
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

  public function monitorCerradas()
  {
    $this->getCounterHead();
    $this->getIncidencias();
  }
}
