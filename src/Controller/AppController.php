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

          #COUNTER HEAD
          $this->LoadModel('XmfCasillas');
          $casillas_presentes = $this->XmfCasillas->find('all', array('conditions' => array('XmfCasillas.hora_presencia  IS NOT NULL','XmfCasillas.status'=>'P')));
          $casillas_presentes->hydrate(false);
          $casillas_presentes =$casillas_presentes->toArray();
          $count_presentes = count($casillas_presentes);

          $casillas_ausentes = $this->XmfCasillas->find('all', array('conditions' => array('XmfCasillas.hora_presencia IS NULL','XmfCasillas.status IS NULL')));
          $casillas_ausentes->hydrate(false);
          $casillas_ausentes =$casillas_ausentes->toArray();
          $count_ausentes = count($casillas_ausentes);


          $casillas_instalando = $this->XmfCasillas->find('all', array('conditions' => array('XmfCasillas.hora_instalacion  IS NOT NULL','XmfCasillas.status'=>'I')));
          $casillas_instalando->hydrate(false);
          $casillas_instalando =$casillas_instalando->toArray();
          $count_instalando = count($casillas_instalando);

          $casillas_abiertas = $this->XmfCasillas->find('all', array('conditions' => array('XmfCasillas.hora_inicio IS NOT NULL','XmfCasillas.status'=>'V')));
          $casillas_abiertas->hydrate(false);
          $casillas_abiertas =$casillas_abiertas->toArray();
          $count_abiertas = count($casillas_abiertas);

          $casillas_cerradas = $this->XmfCasillas->find('all', array('conditions' => array('XmfCasillas.hora_cierre IS NOT NULL','XmfCasillas.status'=>'X')));
          $casillas_cerradas->hydrate(false);
          $casillas_cerradas =$casillas_cerradas->toArray();
          $count_cerradas = count($casillas_cerradas);

          $this->LoadModel('XmfCasillasIncidencias');
          $casillas_incidencias = $this->XmfCasillasIncidencias->find('all');
          $casillas_incidencias->select(['count' => $casillas_incidencias->func()->count('*')]);
          $casillas_incidencias = $casillas_incidencias->toArray();
          $casillas_incidencias = $casillas_incidencias[0]->count;
          $this->set(compact('casillas_presentes','casillas_ausentes','casillas_abiertas','casillas_cerradas','count_presentes','count_ausentes','count_instalando','count_abiertas','count_cerradas','casillas_incidencias'));

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



}
