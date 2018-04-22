<?php
namespace App\Controller;

use App\Controller\AppController;

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

        //$this->set(compact('casillas_presentes','casillas_ausentes','casillas_abiertas','casillas_cerradas','count_presentes','count_ausentes','count_instalando','count_abiertas','count_cerradas','casillas_incidencias'));

    }

    public function monitorCasillasAbiertas()
   {
     $this->LoadModel('XmfCasillas');
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
        switch ($tab) {
          case '1':
            $active_1='active';
            $active_2='';
            $active_3='';
            $active_4='';
            break;
          case '2':
            $active_1='';
            $active_2='active';
            $active_3='';
            $active_4='';
            $active_5='';
            break;
          case '3':
            $active_1='';
            $active_2='';
            $active_3='active';
            $active_4='';
            $active_5='';
            break;
          case '4':
            $active_1='';
            $active_2='';
            $active_3='';
            $active_4='active';
            $active_5='';
            break;
          case '5':
            $active_1='';
            $active_2='';
            $active_3='';
            $active_4='';
            $active_5='active';
            break;

          default:
              $active_1='active';
              $active_2='';
              $active_3='';
              $active_4='';
              $active_5='';
            break;
        }
        $this->set(compact('active_1','active_2','active_3','active_4','active_5'));
  }
}
