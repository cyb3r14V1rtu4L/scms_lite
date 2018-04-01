<?php
/**
 * Copyright 2010 - 2017, Cake Development Corporation (https://www.cakedc.com)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright 2010 - 2017, Cake Development Corporation (https://www.cakedc.com)
 * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

use Cake\Core\Configure;

?>

<div class="row">

<div class="col-sm-6 col-md-6 col-lg-6 text-center">
        <div class="users form">
            <?= $this->Flash->render('auth') ?>
            <?= $this->Form->create() ?>

        <div class="card card-user">

            <div class="content">
                <legend><?= 'INCIO SESIÓN - PROCESO ELECTORAL LOCAL' ?></legend>
                <img class="img-responsive" src="<?php echo $this->request->webroot?>paper/img/partidos/frentexqroo.jpg">
                <hr/>
                <?= $this->Form->control('username', ['label' => FALSE, 'required' => true,'placeholder'=>'USUARIO']) ?>
                <?= $this->Form->control('password', ['label' => FALSE, 'required' => true,'placeholder'=>'CLAVE']) ?>
            <hr/><br/>

            <?= $this->Form->button('INGRESAR',['class'=>'btn btn-success']); ?>
            <?= $this->Form->end() ?>
            </div>
        </div>

        </div>
    </div>
</div>
