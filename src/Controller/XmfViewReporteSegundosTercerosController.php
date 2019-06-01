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

    public function isAuthorized ($user) {
      return true;
    }

    public function formulaMunicipios(){
        $this->LoadModel('XmfVotes');

        $data = $this->XmfVotes->find('all');
        $data->select([
            'name' => 'name',
            'id'  => 'xmf_casillas_id',
            'votes'   => $data->newExpr('COALESCE(sum(XmfVotes.votes),0)')
        ])->join([
            'box' => [
                'table' => 'xmf_casillas',
                'type' => 'INNER',
                'conditions' => ['box.id = XmfVotes.xmf_casillas_id'],
            ],

        ])->group(['xmf_casillas_id']);
        return($data);
    }

    public function loadQrys($tipo = null , $graphic = null) {

      $this->LoadModel('XmfReapers');

      if ($tipo != null and $graphic == 'one') {
          $conditions = [
            'XmfReapers.formula is not null',
            'XmfReapers.formula <>' => '',
            'XmfReapers.tipo' => $tipo
          ];
          $data = $this->XmfReapers->find('all',['conditions'=> $conditions,'order'=>'orden ASC' ]);
          $data->select([
            'nombre'  => 'nombre',
            'votes'   => $data->newExpr('COALESCE(sum(XmfReapers.votes),0)')
          ])
          ->group(['nombre'])
          ;
      }

      if ($tipo != null and $graphic == 'two') {
          $conditions = [
            'XmfReapers.formula is not null',
            'XmfReapers.formula <>' => '',
            'XmfReapers.tipo' => $tipo,
            'XmfReapers.is_coalicion' => 1
            // 'XmfReapers.has_parent' => 1
          ];
          $data = $this->XmfReapers->find('all',['conditions'=> $conditions,'order'=>'orden ASC']);
          $data->select([
            // 'nombre'  => 'nombre',
            'name' => 'XmfReapers.formula',
            'data'   => $data->newExpr('COALESCE(sum(XmfReapers.votes),0)')
          ])->group(['XmfReapers.formula']);
      }

      if ($tipo != null and $graphic == 'three') {
          $conditions = [
            'XmfReapers.formula is not null',
            'XmfReapers.formula <>' => '',
            'XmfReapers.tipo' => $tipo,
            'XmfReapers.is_coalicion' => 0,
            'XmfReapers.has_parent' => 0,
            'XmfReapers.is_funcionario' => 1
          ];
          $data = $this->XmfReapers->find('all',['conditions'=> $conditions,'order'=>'orden ASC']);
          $data->select([
            'name' => 'formula',
            'data'   => $data->newExpr('COALESCE(sum(XmfReapers.votes),0)')
          ])
          ->group(['formula']);
      }

      // debug($data);
      return $data;
    }

    /*public function lastReport($tipo=null) {

      if ($tipo != null && $tipo != 'presidente' ) {
        $add_cond = $tipo;
      } else {
        $add_cond = 'presidente';
      }
      $tipo = $add_cond;

      // Graphic one
      $graf_one = $this->loadQrys($tipo,'one');
      $graf_one->hydrate(false)
      ->join([
              'box' => [
                  'table' => 'xmf_boxes_orders',
                  'type' => 'INNER',
                  'conditions' => ['box.name = XmfReapers.nombre','box.xmf_boxes_blocks_id = 1 ','box.status = 1'],
              ],
              'tipo' => [
                  'table' => 'xmf_tipo_votaciones',
                  'type' => 'INNER',
                  'conditions' => ['box.xmf_tipo_votaciones_id = tipo.id','tipo.tipo = XmfReapers.tipo'],
              ]
      ])
      // ->order(['box.order'])
      ;
      $graf_one =$graf_one->toArray();

        if($tipo == 'senador' || $tipo == 'diputado')
      {
        unset($graf_one[3]);
        unset($graf_one[4]);
      }
      $tabular = $graf_one;

      foreach ($graf_one as $key => $value) {
        $jcategories[] = $value['nombre'];
        $jvotos[] = $value['votes'];
      }

      $categories = json_encode($jcategories);
      $votes = json_encode($jvotos);

      // Graphics two
      $graf_two = $this->loadQrys($tipo,'two');
      $graf_two->hydrate(false)
      ->join([
              'box' => [
                  'table' => 'xmf_boxes_orders',
                  'type' => 'INNER',
                  'conditions' => [
                                     'replace(XmfReapers.formula,"-"," ") = upper(replace(box.formula,"_"," "))'
                                    ,'box.xmf_boxes_blocks_id = 2 '
                                    ,'XmfReapers.nombre = box.name'
                                    ,'box.status = 1'
                                  ],
              ],
              'tipo' => [
                  'table' => 'xmf_tipo_votaciones',
                  'type' => 'INNER',
                  'conditions' => ['box.xmf_tipo_votaciones_id = tipo.id','tipo.tipo = XmfReapers.tipo'],
              ]
      ])
      // ->order(['box.order'])
      ;

      $graf_two =$graf_two->toArray();
      $tabular_two = $graf_two;

      foreach ($graf_two as $key => $value) {
        $j2categories[] = $value['name'];
        $j2votos[] = (int)$value['data'];
      }

      $categories_two = json_encode($j2categories);
      $votes_two = json_encode($j2votos);

      // Graphics three

      $graf_three = $this->loadQrys($tipo,'three');
      $graf_three->hydrate(false);
      $graf_three =$graf_three->toArray();

      #FIXING 4 THE MOMENT
      for($x=0;$x<=8;$x++)
      {
        unset($graf_three[$x]);
      }

      for($x=13;$x<=17;$x++)
      {
        unset($graf_three[$x]);
      }


      $tabular_three = $graf_three;

      foreach ($graf_three as $keytr => $valuetr) {
        $j3categories[] = $valuetr['name'];
        $j3votos[] = (int)$valuetr['data'];
      }


      $categories_three = json_encode($j3categories);
      $votes_three = json_encode($j3votos);


      $formulaMunicipios = $this->formulaMunicipios();

      $this->set(compact(
                        'votes','tipo','categories','tabular',
                        'votes_two','categories_two','tabular_two',
                        'votes_three','categories_three','tabular_three',
                        'formulaMunicipios'
                        ));
      $this->viewBuilder()->template('Paper.Pages/reports/ResultadosFinales');

    } // end last_report
    */

    public function lastReport($tipo=null) {

        if ($tipo != null && $tipo != 'presidente' ) {
            $add_cond = $tipo;
        } else {
            $add_cond = 'presidente';
        }
        $tipo = $add_cond;

        // Graphic one
        $graf_one = $this->loadQrys($tipo,'one');
        $graf_one->hydrate(false)
            ->join([
                'box' => [
                    'table' => 'xmf_boxes_orders',
                    'type' => 'INNER',
                    'conditions' => ['box.name = XmfReapers.nombre','box.xmf_boxes_blocks_id = 1 ','box.status = 1'],
                ],
                'tipo' => [
                    'table' => 'xmf_tipo_votaciones',
                    'type' => 'INNER',
                    'conditions' => ['box.xmf_tipo_votaciones_id = tipo.id','tipo.tipo = XmfReapers.tipo'],
                ]
            ])
            // ->order(['box.order'])
        ;
        $graf_one =$graf_one->toArray();
        //pr($graf_one);

        if($tipo == 'senador' || $tipo == 'diputado')
        {
            unset($graf_one[3]);
            unset($graf_one[4]);
        }
        $tabular = $graf_one;

        foreach ($graf_one as $key => $value) {
            $jcategories[] = $value['nombre'];
            $jvotos[] = $value['votes'];
        }

        $categories = json_encode($jcategories);
        $votes = json_encode($jvotos);

        // Graphics two
        $graf_two = $this->loadQrys($tipo,'two');
        $graf_two->hydrate(false)
            ->join([
                'box' => [
                    'table' => 'xmf_boxes_orders',
                    'type' => 'INNER',
                    'conditions' => [
                        'replace(XmfReapers.formula,"-"," ") = upper(replace(box.formula,"_"," "))'
                        ,'box.xmf_boxes_blocks_id = 2 '
                        ,'XmfReapers.nombre = box.name'
                        ,'box.status = 1'
                    ],
                ],
                'tipo' => [
                    'table' => 'xmf_tipo_votaciones',
                    'type' => 'INNER',
                    'conditions' => ['box.xmf_tipo_votaciones_id = tipo.id','tipo.tipo = XmfReapers.tipo'],
                ]
            ])
            // ->order(['box.order'])
        ;

        $graf_two =$graf_two->toArray();
        //pr($graf_two);
        $tabular_two = $graf_two;
        $j2categories=array();
        $j2votos=array();
        foreach ($graf_two as $key => $value) {
            $j2categories[] = $value['name'];
            $j2votos[] = (int)$value['data'];
        }
        $categories_two = json_encode($j2categories);
        $votes_two = json_encode($j2votos);

        // Graphics three

        $graf_three = $this->loadQrys($tipo,'three');
        $graf_three->hydrate(false);
        $graf_three =$graf_three->toArray();

        #FIXING 4 THE MOMENT
        for($x=0;$x<=8;$x++)
        {
            unset($graf_three[$x]);
        }

        $tabular_three = $graf_three;

        foreach ($graf_three as $keytr => $valuetr) {
            $j3categories[] = $valuetr['name'];
            $j3votos[] = (int)$valuetr['data'];
        }

        $categories_three = json_encode($j3categories);
        $votes_three = json_encode($j3votos);
        $formulaMunicipios = $this->formulaMunicipios();
        $this->set(compact(
            'votes','tipo','categories','tabular',
            'votes_two','categories_two','tabular_two',
            'votes_three','categories_three','tabular_three',
            'formulaMunicipios'
        ));
        $this->viewBuilder()->template('Paper.Pages/reports/ResultadosFinales');

    } // end last_report


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
