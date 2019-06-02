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
        $this->LoadModel('XmfCasillas');
        $casilla_id = $_POST['casilla_id'];
        $this->XmfReportsSegundoTercero->deleteAll(['xmf_casillas_id' => $casilla_id,'votantes_tercero IS NULL', 'promovidos_tercero IS NULL']);

        $ReportsSegundoTerceroTable = TableRegistry::get('XmfReportsSegundoTercero');
        $ReportsSegundoTercero = $ReportsSegundoTerceroTable->newEntity();

        $createdDate = date('Y-m-d').' 10:00:00';

        $ReportsSegundoTercero->xmf_casillas_id = $casilla_id;
        $ReportsSegundoTercero->votantes_segundo = $_POST['votantes_segundo'];
        $ReportsSegundoTercero->promovidos_segundo = $_POST['promovidos_segundo'];
        $ReportsSegundoTercero->created = $createdDate;

        if ($ReportsSegundoTerceroTable->save($ReportsSegundoTercero))
        {
            $id = $ReportsSegundoTercero->id;

            $this->XmfCasillas->updateAll(
                [
                    "reporte" => 1
                ],
                ['id' => $casilla_id]
            );

        }
    }

    public function addThirdReport()
    {
        #ELIMINAR DATOS TERCER REPORTE
        $this->LoadModel('XmfReportsSegundoTercero');
        $this->LoadModel('XmfCasillas');

        $casilla_id = $_POST['casilla_id'];

        $this->XmfReportsSegundoTercero->deleteAll(['xmf_casillas_id' => $casilla_id, 'votantes_segundo IS NULL', 'promovidos_segundo IS NULL']);

        $ReportsSegundoTerceroTable = TableRegistry::get('XmfReportsSegundoTercero');
        $ReportsSegundoTercero = $ReportsSegundoTerceroTable->newEntity();

        $createdDate = date('Y-m-d').' 14:20:00';
        $ReportsSegundoTercero->xmf_casillas_id = $casilla_id;
        $ReportsSegundoTercero->votantes_tercero = $_POST['votantes_tercero'];
        $ReportsSegundoTercero->promovidos_tercero = $_POST['promovidos_tercero'];
        $ReportsSegundoTercero->created = $createdDate;

        if ($ReportsSegundoTerceroTable->save($ReportsSegundoTercero))
        {
            $id = $ReportsSegundoTercero->id;

            $this->XmfCasillas->updateAll(
                [
                    "reporte" => 2
                ],
                ['id' => $casilla_id]
            );
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
        /*$ReportsCierre->hr_cierre = $_POST['hr_cierre'];
        $ReportsCierre->habia_gente_fila =  ($_POST['habia_gente_fila']==="false")?0:1;;*/
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
                 "hora_cierre" =>  date("H:m"),
                 "status" => "X",
                 "reporte" => 3,
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
            for($x=1;$x<=40;$x++)
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

            #UPDATE REPORTE CASILLA RESULTADOS FINALES
            $this->LoadModel('XmfCasillas');
            $this->XmfCasillas->updateAll(
                [
                    "reporte" => 4,
                ],
                ['id' => $_POST['casilla_id']]
            );
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
      #$path = ROOT.'/webroot/migrations/mpios.csv';
      $path = ROOT.'/webroot/migrations/morena.csv';
      /*
       * No	MUNICIPIO	DELEGADO POLITICO MUNICIPAL	TELEFONO DELEGADO	LOCAL
       *
            '09vsntt-sfs8-jjls-cyzz',
            '0bfoni4-on41-ygki-puqp',
            '0csyg14-tzz8-p0ty-bbqx',
            '0lgc1y6-rako-jfxg-1uoo',
            '0pws77r-bln8-h5q3-wtaj',
            '0soy225-zwjb-2f3f-cx54',
            '0tr5s6v-ofzx-apr3-p6if',
            '10rq8wz-01hm-vzbz-7rpa',
            '13pk34y-dtne-l7g6-gw22',
            '14qtekj-d9ld-3hvx-f6ee',
            '1enjvce-04vg-f8u1-tgoo',
            '22hgm7v-olqh-7vlg-fkwk',
            '2eukob7-mwii-i0hm-3u78',
            '2qad2z2-oqut-x6na-mz5w',
            '2uz1otf-0khs-aq47-3i0r',
            '2xb49q7-jhm1-udot-mckq',
            '3fc9kyj-f0w6-ovxr-rqs8',
            '3fm3ssk-cxuj-njoj-t12w',
            '3paihyg-50cd-icdc-5fk3',
            '3r4zdwe-im5s-ey7x-xzwy',
            '3rtgha9-jq2h-p5ha-056o',
            '3tltrvm-0rrz-5bsq-scns',
            '49yjdbl-lipk-lu0v-ltev',
            '4kyimuk-iiek-6f7d-2uo4',
            '6dtf8h3-e99r-3cpt-ulfx',
            '6eztmuu-1pqu-cjyu-7q1n',
            '6lsnjvi-tywx-cl74-qw3p',
            '6qupbyk-h33j-5h6i-x5ue',
            '72wh0tu-bu9x-pqxg-3h9a',
            '7j8mld1-0ela-vufs-njju',
            '7l0xgx3-iag8-vwct-u1cm',
            '81w9vgy-6csx-8s7e-3bwh',
            '84jgse1-s2t5-54pz-8br2',
            '8sdfaj7-9a9c-gle0-x9ao',
            '8x76ics-234x-mm87-11gq',
            '8z8e30p-pfno-18d3-ifvp',
            '915pn8b-rjti-rxc1-7dpa',
            '9kqc9bb-0mnc-uh8b-qwl7',
            '9qhc92p-zwuz-jsix-0z3r',
            'a4zxo28-jzsz-92xj-so1j',
            'b0qx105-il1i-3ke7-47ko',
            'bz01n9s-eodk-26ek-w3x2',
            'crmihup-nd0g-4uup-oqf8',
            'cuv4cao-9trz-yjql-h3e5',
            'd3y4kpl-sexi-rjd2-zlxa',
            'dfhh34q-gw9o-of41-gud7',
            'dnwxmkg-awss-tb8x-41r8',
            'dqlxwyd-s7nt-khz9-mwnz',
            'e8pfx15-czfl-9pt9-sgol',
            'f1lfzgt-oz7a-3aod-y6vl',
            'fih8x6k-tqvu-80ot-2u2n',
            'g8718vo-q08u-jm8i-ki2a',
            'gwzpnnb-t04k-tyth-v4pf',
            'gx7kl1w-1ua7-9es3-3ub2',
            'gzrv6zo-7ltw-r7f0-vl33',
            'hkcp0iu-76ub-tbiy-z47o',
            'iraif2r-wkft-yqee-asxk',
            'ito2bog-1al8-t2k0-6zi3',
            'iue5ttj-u2v8-5p6p-62kr',
            'jfa4lab-mbhd-k8nj-4pbi',
            'jmi42ul-et56-n823-qzfc',
            'juer7bk-qbi0-xqds-tmqn',
            'jv9b3e7-2hei-dmwp-qolw',
            'kq12sj8-s1hz-blq0-z89f',
            'kwbe7nm-1t5i-rwlc-n5oy',
            'laf3qlg-tadn-8mx2-djg0',
            'lb3ff90-1ncv-9v1u-y6cp',
            'lhzhh7b-gx6r-uhzx-7r4e',
            'll39dih-5bo2-8ll2-p2mv',
            'llrh64y-0gdm-f3lv-s8rq',
            'lxvdege-k50r-m2hw-ctps',
            'lzll1t5-ydhp-byw0-ipxf',
            'm5qykj6-vbn6-fs8f-izbn',
            'mu9m9cb-ijij-g81x-4dm8',
            'n6rx9hz-c2f3-ribm-mlwz',
            'nlkjr3b-844i-rqwr-poco',
            'nz4mbcq-eh11-6n1l-yi58',
            'p1l1krt-33ea-einj-chh1',
            'plbybhd-2m0o-ooks-q1me',
            'ps0ppmd-97px-01v6-5ifj',
            'q6lutsk-bs4g-vig9-gr24',
            'q92np5h-iflh-zqvh-kp5z',
            'qagnrx3-ddc4-8d80-a356',
            'qybll85-hgr9-9gsf-72js',
            'r160qj9-e4cf-h9p5-ep3k',
            'rdf24cc-ku2m-c179-qrw7',
            'rhdbl5t-7ath-2uzd-pff3',
            'rzr8uuk-0i6y-csip-qn23',
            'sd2vud5-w6pq-fzq2-mohu',
            'se8bnzr-bd9c-tncy-7qvb',
            'suih448-ylgr-syj0-fjg7',
            'ttoiq2d-vqxc-i7k2-rt2x',
            'v1dt28x-k7vk-lal4-kpt9',
            'vecv42m-6sc9-bab9-ehkl',
            'vo42bpk-af2c-iwq6-calw',
            'w1iu50z-hlk0-eggc-3oiu',
            'w6k0xya-3ysu-8hn0-ingj',
            'w6yzkft-bvh7-brfe-946o',
            'w7c1h9t-fm8q-kkx8-59np',
            'wcazbzt-qux5-euor-ho6c',
            'whylo53-vw5k-frdq-ytn2',
            'wi4v9xx-1qzc-rr5t-dk6y',
            'wksckfl-p25p-dm54-811w',
            'wml856m-7lh3-uc03-k4zt',
            'wtaflzu-hslz-b0cm-tb1n',
            'x1gxbrl-3n2g-0jdy-h6k7',
            'xdtfnj9-u0up-ykdm-fa69',
            'xgtuzn6-kelr-u167-sjgu',
            'y30grin-7ut2-1hsm-ksn0',
            'yblw2qy-qhiw-nvi5-r4jw',
            'z4f2gtt-ju4j-n1np-oju5',
            'zdqzy2i-wyxe-59o4-q191',
            'zup4sk5-m22d-av18-4cpp',
            'zvs9qp4-ixmu-pofk-shm5',
            'zvvsycz-q9vk-316e-nmcq'

       * */

      /*
       * Morena
       *
       * Partido Político;RUTA;A;CASILLA;Sección;Campo6;Nombre;Clave de Elector;Calidad representante;TELEFONO;Domicilio;Ubicación;Referencia;Tipo Domicilio
       * */


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
          $User->role_id = '80687266-6761-43a2-bd98-f42349a9bb63';
          $User->password = '$2y$10$7Nr7lHpeouo.3Swq.mM.3uNu0zjJmyyEGxgTOA1F9UYq7dXSFfyHK';#123

          $User->username = str_replace(" ","", $xmf[1]) . $xmf[0];

          $User->first_name=$xmf[2];

          $User->is_superuser = 0;
          $User->active = 1;
          $User->rc_telefono = $xmf[3];
          $User->rg_telefono = $xmf[3];

          if($UsersTable->save($User))
          {
            $user_id = $User->id;
            $CasillasTable = TableRegistry::get('XmfCasillas');
            $Casilla = $CasillasTable->newEntity();
            $name = $xmf[1];
            $Casilla->user_id = $user_id;
            $Casilla->name = $name;
            $Casilla->description = $name;
            $Casilla->rc_telefono = $xmf[3];
            $Casilla->rg_casilla = $xmf[3];
            $Casilla->rg_telefono = $xmf[3];


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
      pr($group_casillas);exit;
      //$group_casillas[9] = array_merge($group_casillas[9],$group_casillas[10]);

      //unset($group_casillas[10]);

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

    #GeneratePassword W/Hash

    public function chekHash()
    {
      $Password='camp19';
      $HashPass = new DefaultPasswordHasher();
      $newPassw = $HashPass->hash($Password);

      echo $newPassw;exit;
    }


    public function leeXML()
    {
        $path = ROOT.'/webroot/migrations/XML-FILE.xml';

        $xml = simplexml_load_file($path);
        $ns = $xml->getNamespaces(true);
        $xml->registerXPathNamespace('c', $ns['cfdi']);
        $xml->registerXPathNamespace('t', $ns['tfd']);

        $CFDI = array(
            'UUID' => null,
            'Nombre' => null,
            'Rfc' => null,
            'Fecha' => null,
            'Tipo' => null,
            'SubTotal' => null,
            'Impuestos' => null,
            'Total' => null
        );

        $CFDI_XLS = array(
            0 => [
                'UUID' => null,
                'Nombre' => null,
                'Rfc' => null,
                'Fecha' => null,
                'Tipo' => null,
                'SubTotal' => null,
                'Impuestos' => null,
                'Total' => null
            ]
        );

        foreach($xml->xpath('//cfdi:Emisor') as $Emisor) {
            $CFDI['Nombre'] = $Emisor['Nombre'];
            $CFDI['Rfc'] = $Emisor['Rfc'];

        }

        foreach($xml->xpath('//cfdi:Comprobante') as $Comprobante) {
            $CFDI['Fecha'] = $Comprobante['Fecha'];
            $CFDI['Tipo'] = $Comprobante['TipoDeComprobante'];
            $CFDI['SubTotal'] = $Comprobante['SubTotal'];
            $CFDI['Total'] = $Comprobante['Total'];
        }

        foreach($xml->xpath('//cfdi:Impuestos') as $Impuestos) {
            $CFDI['Impuestos'] = $Impuestos['TotalImpuestosTrasladados'];
        }


        foreach ($xml->xpath('//t:TimbreFiscalDigital') as $tfd) {
            $CFDI['UUID'] = $tfd['UUID'];
        }

        $fileName = $CFDI['Rfc'] .' - '. date("Hms") . ".xls";
        header("Content-Disposition: attachment; filename=\"$fileName\"");
        header("Content-Type: application/vnd.ms-excel");

        $CFDI_XLS[0]['Nombre'] = $CFDI['Nombre'][0];
        $CFDI_XLS[0]['Rfc'] = $CFDI['Rfc'][0];
        $CFDI_XLS[0]['Fecha'] = $CFDI['Fecha'][0];
        $CFDI_XLS[0]['Tipo'] = $CFDI['Tipo'][0];
        $CFDI_XLS[0]['SubTotal'] = $CFDI['SubTotal'][0];
        $CFDI_XLS[0]['Total'] = $CFDI['Total'][0];
        $CFDI_XLS[0]['Impuestos'] = $CFDI['Impuestos'];
        $CFDI_XLS[0]['UUID'] = $CFDI['UUID'][0];

        $flag = false;
        foreach($CFDI_XLS as $row) {
            if(!$flag) {
                // display column names as first row
                echo implode("\t", array_keys($row)) . "\n";
                $flag = true;
            }

            echo implode("\t", array_values($row)) . "\n";
        }

        exit;
    }


    /*
     * M O R E N A
     * */

    public function insertUsersCasillasMorena()
    {
        $path = ROOT.'/webroot/migrations/morena.csv';

        /*
         * Morena
         *
         * Casilla | Tipo Casilla
         * */


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
                $User->role_id = '80687266-6761-43a2-bd98-f42349a9bb63';
                $User->password = '$2y$10$7Nr7lHpeouo.3Swq.mM.3uNu0zjJmyyEGxgTOA1F9UYq7dXSFfyHK';#123

                $User->username = str_replace(" ","", $xmf[0]) . $xmf[1];

                $User->first_name= 'USUARIO '.$User->username;

                $User->is_superuser = 0;
                $User->active = 1;

                if($UsersTable->save($User))
                {
                    $user_id = $User->id;
                    $CasillasTable = TableRegistry::get('XmfCasillas');
                    $Casilla = $CasillasTable->newEntity();
                    $name = $xmf[0].' '.$xmf[1];
                    $Casilla->user_id = $user_id;
                    $Casilla->name = $name;
                    $Casilla->description = $name;
                    $Casilla->rc_telefono = '9999999999';
                    $Casilla->rg_casilla = '9999999999';
                    $Casilla->rg_telefono = '9999999999';


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

}
