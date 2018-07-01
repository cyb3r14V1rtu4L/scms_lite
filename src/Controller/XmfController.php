<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Utility\Security;
use Cake\ORM\Entity;

use Cake\Auth\DefaultPasswordHasher;
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
    public function capturaReporte()
    {
      $role_id = $_SESSION['Auth']['User']['role_id'];
      if($role_id == '80687266-6761-43a2-bd98-f42349a9bb63')
      {
        return $this->redirect(['action' => 'index']);
      }
    }

    public function index($type=null,$casilla_id=null)
    {
        $role_id = $_SESSION['Auth']['User']['role_id'];
        $conditions = ($role_id == '80687266-6761-43a2-bd98-f42349a9bb63') ? ['user_id' => $this->Auth->user('id')] :  ['id' => $casilla_id];
        $this->LoadModel('XmfCasillas');
        $user_data = $this->XmfCasillas->find('all',['fields'=>['id','rg_casilla','rg_telefono','name','clave_agrupamiento','urbana','hora_presencia'],'conditions'=> $conditions]);
        $user_data =$user_data->toArray();

        $_SESSION['Casilla']['id'] = $user_data[0]['id'];
        $_SESSION['userCasillas'] =$user_data[0];
        $xmfCasillas = null;
        $this->LoadModel('XmfViewIncidencias');

        $this->LoadModel('XmfCasillas');
        $this->LoadModel('Users');

        #$_SESSION['Casilla'] = ($casilla_id !== 'null') ? $casilla_id : $user_data[0];

        $this->set('userCasillas',$user_data[0]);

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
                switch ($type) {
                  case 'presencia':
                    $status='P';
                    break;
                  case 'instalacion':
                    $status='I';
                    break;
                  case 'inicio':
                    $status='V';
                    break;

                  default:
                    # code...
                    break;
                }
                $this->XmfCasillas->updateAll(
                    ["$field" => date("H:i:s"),"status"=>$status],
                    ['id' => $user_data[0]['id']]
                );
            }

            if($role_id == '80687266-6761-43a2-bd98-f42349a9bb63')
            {
              return $this->redirect(['action' => 'index']);
            }else{
              return $this->redirect(['controller'=>'xmfCasillas','action' => 'monitorCasillas']);
            }
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

            #ELIMINAR DATOS PRESENCIAS CASILLA
            $this->XmfPresencesReferences->deleteAll(['xmf_casillas_id' => $casilla_id ]);

            #DATOS PRIMER REPORTE DE CASILLA
            $this->XmfCasillas->updateAll(
                [
                 "lugar_indicado" =>  ($_POST['lugar_indicado']==false)?0:1,
                 "gente_fila" => ($_POST['gente_fila']==false)?0:1,
                 "nombres_fila" => $_POST['nombres_fila'],
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
        #ELIMINAR DATOS SEGUNDO REPORTE
        $this->LoadModel('XmfReportsSegundoTercero');
        $this->XmfReportsSegundoTercero->deleteAll(['xmf_casillas_id' => $_POST['casilla_id'],'votantes_tercero IS NULL', 'promovidos_tercero IS NULL']);

        $ReportsSegundoTerceroTable = TableRegistry::get('XmfReportsSegundoTercero');
        $ReportsSegundoTercero = $ReportsSegundoTerceroTable->newEntity();

        $createdDate = date('Y-m-d').' 10:00:00';

        $ReportsSegundoTercero->xmf_casillas_id = $_POST['casilla_id'];
        $ReportsSegundoTercero->votantes_segundo = $_POST['votantes_segundo'];
        $ReportsSegundoTercero->promovidos_segundo = $_POST['promovidos_segundo'];
        $ReportsSegundoTercero->created = $createdDate;

        if ($ReportsSegundoTerceroTable->save($ReportsSegundoTercero))
        {
            $id = $ReportsSegundoTercero->id;
        }
    }

    public function addThirdReport()
    {
        #ELIMINAR DATOS TERCER REPORTE
        $this->LoadModel('XmfReportsSegundoTercero');
        $this->XmfReportsSegundoTercero->deleteAll(['xmf_casillas_id' => $_POST['casilla_id'],'votantes_segundo IS NULL', 'promovidos_segundo IS NULL']);

        $ReportsSegundoTerceroTable = TableRegistry::get('XmfReportsSegundoTercero');
        $ReportsSegundoTercero = $ReportsSegundoTerceroTable->newEntity();

        $createdDate = date('Y-m-d').' 14:20:00';
        $ReportsSegundoTercero->xmf_casillas_id = $_POST['casilla_id'];
        $ReportsSegundoTercero->votantes_tercero = $_POST['votantes_tercero'];
        $ReportsSegundoTercero->promovidos_tercero = $_POST['promovidos_tercero'];
        $ReportsSegundoTercero->created = $createdDate;

        if ($ReportsSegundoTerceroTable->save($ReportsSegundoTercero))
        {
            $id = $ReportsSegundoTercero->id;
        }
    }

    public function addForthReport()
    {
        #ELIMINAR DATOS REPORTE CIERRE
        $this->LoadModel('XmfReportsCierre');
        $this->XmfReportsCierre->deleteAll(['xmf_casillas_id' => $_POST['casilla_id']]);

        $ReportsCierreTable = TableRegistry::get('XmfReportsCierre');
        $ReportsCierre = $ReportsCierreTable->newEntity();

        $createdDate = date('Y-m-d').' 16:20:00';
        $ReportsCierre->xmf_casillas_id = $_POST['casilla_id'];
        $ReportsCierre->hr_cierre = $_POST['hr_cierre'];
        $ReportsCierre->habia_gente_fila =  ($_POST['habia_gente_fila']==="false")?0:1;;
        $ReportsCierre->votantes = $_POST['votantes'];
        $ReportsCierre->promovidos = $_POST['promovidos'];
        $ReportsCierre->created = $createdDate;

        if ($ReportsCierreTable->save($ReportsCierre))
        {
            $id = $ReportsCierre->id;

            #UPDATE STATUS CASILLA CIERRE
            $this->LoadModel('XmfCasillas');
            $this->XmfCasillas->updateAll(
                [
                 "hora_cierre" =>  $_POST['hr_cierre'],
                 "status" => "X",
                ],
                ['id' => $_POST['casilla_id']]
            );
        }
    }

    public function addLastReport()
    {
        $this->LoadModel('XmfVotes');
        $this->LoadModel('XmfReportsCierre');

        if($this->request->is('ajax'))
        {
            #DATOS PRIMER REPORTE FINAL
            $casilla_id = $_POST['casilla_id'];

            #ELIMINAR DATOS REPORTE FINAL (POR TIPO)
            $this->XmfVotes->deleteAll([
                                        'xmf_casillas_id' => $casilla_id,
                                        'xmf_tipo_votaciones_id' => $_POST['xmf_tipo_votaciones_id']
                                      ]);
            $id_x = 1;
            for($x=1;$x<=39;$x++)
            {
                if(isset($_POST['xmf_partido_id_'.$x]))
                {
                    if($_POST['xmf_partido_id_'.$x] != 0)
                    {
                        $VotosTable = TableRegistry::get('XmfVotes');
                        $Votos = $VotosTable->newEntity();

                        $Votos->xmf_casillas_id = $casilla_id;
                        $Votos->xmf_tipo_votaciones_id = $_POST['xmf_tipo_votaciones_id'];
                        $Votos->xmf_partidos_id = $_POST['xmf_partido_id_' . $x];
                        $Votos->votes = $_POST['xmf_partido_' . $x];

                        if ($VotosTable->save($Votos))
                        {
                            $id = $Votos->id;
                        }
                    }
                }
            }
        }
    }

    /*public function insertCasillas()
    {

      for($x=1;$x<=60;$x++)
      {
          $CasillasTable = TableRegistry::get('XmfCasillas');
          $Casilla = $CasillasTable->newEntity();
          $name = ($x<10) ? 'CA-0'.$x :'CA-'.$x;
          $Casilla->name = $name;
          $Casilla->description = $name;

          if($CasillasTable->save($Casilla))
          {
              $id = $Casilla->id;
              echo json_encode(compact('Casilla'));
          }else{
            debug($CasillasTable);
          }
      }
    }*/

    public function insertAdminUsers()
    {
      $path = ROOT.'/webroot/migrations/admin_list.csv';
      /*
      668 |	B1  | 1 |MARTINEZ|DENEGRI|ZULIA ZOE|9841317651|ESTRADA MEJIA DAVID ANTONIO|9842791663
      -0- | -1- | X |----3---|---4---|----5----|----6-----|-------------7-------------|------8----
      */

      $html = '';
      $r=0;
      $chunk = array(7,4,4,4);

      $Password='camp18';
      $HashPass = new DefaultPasswordHasher();

      if (($file = fopen($path, "r")) !== FALSE)
      {
        while (($xmf = fgetcsv($file, 1000,';')) !== FALSE)
        {
          $pool = array_merge(range(0,9), range('a', 'z'));
          $key ='';
          foreach ($chunk as $length)
          {
            for($i=0; $i < $length; $i++)
            {
              $key .= $pool[mt_rand(0, count($pool) - 1)];
            }
            $key.='-';
          }

          $UsersTable = TableRegistry::get('Users');
          $User = $UsersTable->newEntity();

          $User->id = rtrim($key,"-");
          $User->role_id= '5197c80d-2d30-4225-a757-b31592c9e0f0';

          $User->password = $HashPass->hash($Password);

          $User->first_name=$xmf[0];
          $User->last_name= $xmf[1];
          $User->username= $xmf[2];

          $User->is_superuser = 1;
          $User->active = 1;

          if(!$UsersTable->save($User))
          {
            debug($UsersTable);
          }
        }
      }
      exit;
    }

    public function insertUsersCasillas()
    {
      $path = ROOT.'/webroot/migrations/rc_list.csv';
      /*
      668 |	B1  | 1 |MARTINEZ|DENEGRI|ZULIA ZOE|9841317651|ESTRADA MEJIA DAVID ANTONIO|9842791663
      -0- | -1- | X |----3---|---4---|----5----|----6-----|-------------7-------------|------8----
      */

      $html = '';
      $r=0;
      $chunk = array(7,4,4,4);

      if (($file = fopen($path, "r")) !== FALSE)
      {
        while (($xmf = fgetcsv($file, 1000,';')) !== FALSE)
        {
          $pool = array_merge(range(0,9), range('a', 'z'));
          $key ='';
          foreach ($chunk as $length)
          {
            for($i=0; $i < $length; $i++)
            {
              $key .= $pool[mt_rand(0, count($pool) - 1)];
            }
            $key.='-';
          }

          $UsersTable = TableRegistry::get('Users');
          $User = $UsersTable->newEntity();

          $User->id = rtrim($key,"-");
          $User->role_id= '80687266-6761-43a2-bd98-f42349a9bb63';
          $User->password= '$2y$10$7Nr7lHpeouo.3Swq.mM.3uNu0zjJmyyEGxgTOA1F9UYq7dXSFfyHK';#123

          $User->username= $xmf[0].$xmf[1];

          $User->last_name= $xmf[3].' '.$xmf[4];
          $User->first_name=$xmf[5];

          $User->is_superuser = 0;
          $User->active = 1;
          $User->rc_telefono = $xmf[6];
          $User->rg_telefono = $xmf[8];

          if($UsersTable->save($User))
          {
            $user_id = $User->id;
            $CasillasTable = TableRegistry::get('XmfCasillas');
            $Casilla = $CasillasTable->newEntity();
            $name = $xmf[0].' '.$xmf[1];
            $Casilla->user_id = $user_id;
            $Casilla->name = $name;
            $Casilla->description = $name;
            $Casilla->rc_telefono = $xmf[6];
            $Casilla->rg_casilla = $xmf[7];
            $Casilla->rg_telefono = $xmf[8];


            if($CasillasTable->save($Casilla))
            {
              $id = $Casilla->id;
              echo json_encode(compact('User'));
              echo json_encode(compact('Casilla'));
            }else{
              debug($CasillasTable);
            }
          }else{
            debug($UsersTable);
          }
        }
      }exit;
    }

    public function insertRGUsers()
    {
      $this->LoadModel('XmfCasillas');
      $casilla_data = $this->XmfCasillas->find('all',['fields'=>['id','name','rg_id']]);
      $casilla_data =$casilla_data->toArray();

      $group_casillas = array_chunk($casilla_data, 34);
      $group_casillas[9] = array_merge($group_casillas[9],$group_casillas[10]);
      unset($group_casillas[10]);

      $x=1;
      $chunk = array(7,4,4,4);

      foreach($group_casillas as $group)
      {
        $pool = array_merge(range(0,9), range('a', 'z'));
        $key ='';
        foreach ($chunk as $length)
        {
          for($i=0; $i < $length; $i++)
          {
            $key .= $pool[mt_rand(0, count($pool) - 1)];
          }
          $key.='-';
        }

        $UsersTable = TableRegistry::get('Users');
        $User = $UsersTable->newEntity();

        $User->id = rtrim($key,"-");
        $User->role_id= 'e687cb91-4cdf-4ab2-992f-e76584199c2e';
        $User->password= '$2y$10$7Nr7lHpeouo.3Swq.mM.3uNu0zjJmyyEGxgTOA1F9UYq7dXSFfyHK';
        $User->username= ($x<10) ? 'M0NIT0R0'.$x : 'M0NIT0R'.$x;

        $User->first_name= 'MONITOR';
        $User->last_name = ($x<10) ? '0'.$x : $x ;

        $User->is_superuser = 0;
        $User->active = 1;

        if($UsersTable->save($User))
        {
            $id = $User->id;
            foreach ($group as $casilla)
            {
              $CasillaUpdated = $this->XmfCasillas->updateAll(["rg_id" => $id],['id' => $casilla['id']]);
            }
            $x++;
        }
      }
      exit;

    }

  /*
  public function insertRGCasillas()
  {
      $path = ROOT.'/webroot/migrations/rc_list.csv';
      $html = '';
      $r=0;
      $chunk = array(7,4,4,4);

      if (($file = fopen($path, "r")) !== FALSE)
      {
        $this->LoadModel('XmfCasillas');
        while (($xmf = fgetcsv($file, 1000,';')) !== FALSE)
        {
          echo $xmf[0].' '.$xmf[1];
          $casilla_data = $this->XmfCasillas->find('all',['fields'=>'id','conditions'=>['name'=>'668 B1']]);
          $casilla_data =$casilla_data->toArray();
          debug($casilla_data);exit;
          $CasillaUpdated = $this->XmfCasillas->updateAll(
                              ["rg_casilla" => $xmf[7],"rg_telefono"=>$xmf[8],"rc_telefono"=>$xmf[6]],
                              ['id' => $casilla_data[0]['id']]
                          );
          debug($CasillaUpdated);
        }
      }exit;
    }
    */


    public function chekHash()
    {
      $Password='camp18';
      $HashPass = new DefaultPasswordHasher();
      $newPassw = $HashPass->hash($Password);

      echo $newPassw;exit;
    }
}
