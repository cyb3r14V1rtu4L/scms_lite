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
class XmfController extends AppController
{
    public function isAuthorized ($user) {
      return true;
    }

    public function initialize()
    {
        parent::initialize();
    }


    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */

    public function index($type=null)
    {
        $xmfCasillas = null;
        $this->LoadModel('XmfViewIncidencias');
        $this->LoadModel('XmfCasillas');
        $this->LoadModel('Users');
        $user_data = $this->XmfCasillas->find('all',['conditions'=>['user_id' => $this->Auth->user('id')]]);
        $user_data =$user_data->toArray();
        $_SESSION['Casilla'] = $user_data[0];
        $this->set('userCasillas',$user_data);

        $message_p = (empty($user_data[0]['hora_presencia'])) ? 'Presencia Asignada' : 'Presencia Asignada Previamente';
        $this->set('message_p',$message_p);

        $message_i = (empty($user_data[0]['hora_inicio'])) ? 'Hora de Inicio de Votación Asignada' : 'Hora de Inicio de Votación Asignada Previamente';
        $this->set('message_i',$message_i);

        $message_c = (empty($user_data[0]['hora_instalacion'])) ? 'Hora de Instlación de Casillla Asignada' : 'Hora de Instalación de Casilla Asignada Previamente';
        $this->set('message_c',$message_c);

        $isPost = $this->request->is('post');
        if($isPost == true)
        {
            if( (empty($user_data[0]['hora_presencia'])) || (empty($user_data[0]['hora_inicio'])) || (empty($user_data[0]['hora_instalacion'])) )
            {
                $data=array();
                $field = 'hora_'.$type;
                $this->XmfCasillas->updateAll(
                    ["$field" => date("H:i:s")],
                    ['id' => $user_data[0]['id']]
                );
            }
            return $this->redirect(['action' => 'index']);
        }
    }



    /**
     * View method
     *
     * @param string|null $id Xmf Casilla id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */

     public function setPresencia(){
        $this->viewBuilder()->setLayout('ajax');
        // result can be anything coming from $this->data
        $result =  'Hello Dolly!';
        $this->set("result", $result);exit;

     }

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
        if ($this->request->is('post')){
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


    public function addFirstReport()
    {
        $this->LoadModel('XmfCasillas');
        $this->LoadModel('XmfPresencesReferences');

        if($this->request->is('ajax')) {

            $casilla_id = $_POST['casilla_id'];

            #DATOS PRIMER REPORTE DE CASILLA
            $this->XmfCasillas->updateAll(
                [
                 "lugar_indicado" =>  ($_POST['lugar_indicado']==false)?0:1,
                 "gente_fila" => ($_POST['gente_fila']==false)?0:1,
                ],
                ['id' => $casilla_id]
            );

            #DATOS PRIMER REPORTE REFERENCES PRESENCES
            $id_x = 1;
            for($x=1;$x<=18;$x++)
            {
                $id_x = ($x<10) ? $x:$x+8;
                $PresenceTable = TableRegistry::get('XmfPresencesReferences');
                $Presence = $PresenceTable->newEntity();

                $Presence->xmf_casillas_id = $casilla_id;;
                $Presence->xmf_partidos_id = $id_x;
                $Presence->is_present = ($_POST['funcionario_'.$x]==="false")?0:1;

                if ($PresenceTable->save($Presence)) {
                    $id = $Presence->id;
                }
            }
        }
    }



    public function addSecondReport()
    {
        $ReportsSegundoTerceroTable = TableRegistry::get('XmfReportsSegundoTercero');
        $ReportsSegundoTercero = $ReportsSegundoTerceroTable->newEntity();

        $ReportsSegundoTercero->casilla_id = $_POST['casilla_id'];
        $ReportsSegundoTercero->votantes_segundo = $_POST['votantes_segundo'];
        $ReportsSegundoTercero->promovidos_segundo = $_POST['promovidos_segundo'];

        if ($ReportsSegundoTerceroTable->save($ReportsSegundoTercero))
        {
            $id = $ReportsSegundoTercero->id;
        }
    }

    public function addThirdReport()
    {
        $ReportsSegundoTerceroTable = TableRegistry::get('XmfReportsSegundoTercero');
        $ReportsSegundoTercero = $ReportsSegundoTerceroTable->newEntity();

        $ReportsSegundoTercero->xmf_casillas_id = $_POST['casilla_id'];
        $ReportsSegundoTercero->votantes_tercero = $_POST['votantes_tercero'];
        $ReportsSegundoTercero->promovidos_tercero = $_POST['promovidos_tercero'];

        if ($ReportsSegundoTerceroTable->save($ReportsSegundoTercero))
        {
            $id = $ReportsSegundoTercero->id;
        }
    }

    public function addForthReport()
    {
        $ReportsCierreTable = TableRegistry::get('XmfReportsCierre');
        $ReportsCierre = $ReportsCierreTable->newEntity();
        $ReportsCierre->xmf_casillas_id = $_POST['casilla_id'];
        $ReportsCierre->hr_cierre = $_POST['hr_cierre'];
        $ReportsCierre->habia_gente_fila =  ($_POST['habia_gente_fila']==="false")?0:1;;
        $ReportsCierre->votantes = $_POST['votantes'];
        $ReportsCierre->promovidos = $_POST['promovidos'];

        if ($ReportsCierreTable->save($ReportsCierre))
        {
            $id = $ReportsCierre->id;
        }
    }

    public function addLastReport()
    {
        $this->LoadModel('XmfVotes');

        if($this->request->is('ajax')) {

            $casilla_id = $_POST['casilla_id'];


            #DATOS PRIMER REPORTE FINAL
            $id_x = 1;
            for($x=1;$x<=25;$x++)
            {
                $VotosTable = TableRegistry::get('XmfVotes');
                $Votos = $VotosTable->newEntity();

                $Votos->xmf_casillas_id = $casilla_id;
                $Votos->xmf_tipo_votaciones_id = $_POST['xmf_tipo_votaciones_id'];
                $Votos->xmf_partidos_id = $_POST['xmf_partido_id_'.$x];
                $Votos->votes = $_POST['xmf_partido_'.$x];

                if ($VotosTable->save($Votos)) {
                    $id = $Votos->id;
                }
            }
        }
    }
}
