<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Auth',[
              'loginAction' => [
                  'plugin' => false,
                  'controller' => 'Users',
                  'action' => 'login',
                  'prefix' => false
              ],
              'authenticate' => [
                  'Form'=> [
                          'fields'=>[
                            'username'=>'username',
                            'password'=>'password'
                          ]
                  ],
              ],
              'authorize' => [
                  'Controller',
              ],
              'authError' => 'Necesita Autorizacion para acceder a este sitio.',
              'loginRedirect' => [
                'controller' => 'Pages',
                'action'  => 'welcome'
              ]
          ]);


    }

    public function getCounterHead(){
      #COUNTER HEAD
      $role_id = $_SESSION['Auth']['User']['role_id'];
      if($role_id == 'e687cb91-4cdf-4ab2-992f-e76584199c2e')
      {
        $conditions = array('rg_id'=>$_SESSION['Auth']['User']['id']);
      }else{
          $conditions = null;
      }

      $this->LoadModel('XmfViewCountHeader');
      $XmfViewCountHeader = $this->XmfViewCountHeader->find('all',array('conditions'=>$conditions));
      $XmfViewCountHeader->select([
        'presencias' => $XmfViewCountHeader->func()->sum('presencias'),
        'ausencias' => $XmfViewCountHeader->func()->sum('ausencias'),
        'instaladas' => $XmfViewCountHeader->func()->sum('instaladas'),
        'abiertas' => $XmfViewCountHeader->func()->sum('abiertas'),
        'cerradas' => $XmfViewCountHeader->func()->sum('cerradas'),
      ]);

      $XmfViewCountHeader->hydrate(false);
      $XmfViewCountHeader =$XmfViewCountHeader->toArray();

      $this->LoadModel('XmfCasillas');
      $casillas_presentes = $this->XmfCasillas->find('all',array('fields'=>array('id','name'),'conditions' => array('XmfCasillas.hora_presencia  IS NOT NULL','XmfCasillas.status'=>'P',$conditions)));
      $casillas_presentes->hydrate(false);
      $casillas_presentes =$casillas_presentes->toArray();
      $count_presentes = (!empty($XmfViewCountHeader[0]['precencias']))?$XmfViewCountHeader[0]['precencias']:0;
      $casillas_ausentes = $this->XmfCasillas->find('all', array('fields'=>array('id','name'),'conditions' => array('XmfCasillas.hora_presencia IS NULL',$conditions)));
      $casillas_ausentes->hydrate(false);
      $casillas_ausentes =$casillas_ausentes->toArray();
      $count_ausentes = (!empty($XmfViewCountHeader[0]['ausencias']))?$XmfViewCountHeader[0]['ausencias']:0;

      $casillas_instalando = $this->XmfCasillas->find('all', array('fields'=>array('id','name'),'conditions' => array('XmfCasillas.hora_instalacion  IS NOT NULL','XmfCasillas.status'=>'I',$conditions)));
      $casillas_instalando->hydrate(false);
      $casillas_instalando =$casillas_instalando->toArray();
      $count_instalando = (!empty($XmfViewCountHeader[0]['instaladas']))?$XmfViewCountHeader[0]['instaladas']:0;

      $casillas_abiertas = $this->XmfCasillas->find('all', array('fields'=>array('id','name'),'conditions' => array('XmfCasillas.hora_inicio IS NOT NULL','XmfCasillas.status'=>'V',$conditions)));
      $casillas_abiertas->hydrate(false);
      $casillas_abiertas =$casillas_abiertas->toArray();
      $count_abiertas = (!empty($XmfViewCountHeader[0]['abiertas']))?$XmfViewCountHeader[0]['abiertas']:0;

      $casillas_cerradas = $this->XmfCasillas->find('all', array('fields'=>array('id','name'),'conditions' => array('XmfCasillas.hora_cierre IS NOT NULL','XmfCasillas.status'=>'X',$conditions)));
      $casillas_cerradas->hydrate(false);
      $casillas_cerradas =$casillas_cerradas->toArray();
      $count_cerradas = (!empty($XmfViewCountHeader[0]['cerradas']))?$XmfViewCountHeader[0]['cerradas']:0;

      $this->LoadModel('XmfCasillasIncidencias');
      $casillas_incidencias = $this->XmfCasillasIncidencias->find('all');
      $casillas_incidencias->select(['count' => $casillas_incidencias->func()->count('*')]);
      $casillas_incidencias = $casillas_incidencias->toArray();
      $casillas_incidencias = $casillas_incidencias[0]->count;
      $this->set(compact('casillas_presentes','casillas_ausentes','casillas_abiertas','casillas_cerradas','count_presentes','count_ausentes','count_instalando','count_abiertas','count_cerradas','casillas_incidencias'));

    }

    public function getIncidencias(){
      $this->LoadModel('XmfCasillasIncidencias');
      $this->LoadModel('XmfCasillas');
      $CasillasIncidencias = $this->XmfCasillasIncidencias->find('all');
      $CasillasIncidencias->select([
        'xmf_casillas_id' => 'xmf_casillas_id',
        'xmf_total_incidencias' => $CasillasIncidencias->func()->sum('xmf_total_incidencias'),
      ])
      ->group(['xmf_casillas_id']);
      $CasillasIncidencias->hydrate(false);
      $CasillasIncidencias =$CasillasIncidencias->toArray();

      foreach ($CasillasIncidencias as $k => $ci)
      {
        $casilla_datos = $this->XmfCasillas->find('all',['conditions'=>['XmfCasillas.id' => $ci['xmf_casillas_id'] ]]);
        $casilla_datos->hydrate(false);
        $casilla_datos =$casilla_datos->toArray();
        $CasillasIncidencias[$k]['CasillaDatos'] = $casilla_datos[0];
      }
      $this->set(compact('CasillasIncidencias'));
    }

    public function createdDate()
    {
      $current_date = date('Y-m-d H:i:s');
      $created_date = strtotime('-2 hour',strtotime( $current_date ));
      $created_date = date('Y-m-d H:i:s',$created_date );
      return $created_date;
    }

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return void
     */
    public function beforeRender(Event $event)
    {
      // Enable theme Paper as Global
        $this->viewBuilder()->theme('Paper');

        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
    }

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return void
     */

    public function beforeFilter(Event $event) {
      ini_set('memory_limit', '-1');
      ini_set('max_execution_time', '300');

    } // end beforeFilter
}
