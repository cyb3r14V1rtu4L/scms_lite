<div class="col-md-2 col-lg-2"></div>
    <div class="col-md-7 col-lg-7 ">
        <div class="card card-user">
            <div class="content">
                <div class="author">
                    <img class="avatar border-white" src="<?php echo $this->request->webroot?>paper/img/partidos_png/PAN.png" alt="...">
                    <hr/>
                </div>
                <div class="col-md-6 col-lg-6">
                    <h5 class="title"><small>REPRESENTANTE GENERAL</small></h5>
                    <p><a href="tel:9999999999">(999)-999 9999</a></p>
                </div>
                    <div class="col-md-6 col-lg-6">
                        <h5 class="title"><small>NOMBRE ABOGADO</small></h5>
                        <p><a href="tel:9999999999">(999)-999 9999</a></p>
                    </div>
                <br/>
                <hr/>
                <br/>
                <div class="text-center">
                    <div class="row">
                        <h5>FUNCIONES PRINCIPALES - CASILLA</h5>
                        <h3><?=strtoupper($_SESSION['Auth']['User']['first_name'].' '.$_SESSION['Auth']['User']['last_name']);?></h3>
                        <h5><small>FUNCIONARIO DE CASILLA<small></h5>
                        <div class="row">
                            <div style="text-align:center;padding:1em 0;">
                                <iframe src="https://www.zeitverschiebung.net/clock-widget-iframe-v2?language=es&size=medium&timezone=America%2FCancun" width="100%" height="115" frameborder="0" seamless></iframe>
                            </div>
                        </div>
                        <hr/>
                        <div class="row">
                          <?= $this->Form->create(null, array('type' => 'post', 'url' => ['controller' => 'Xmf', 'action' => 'index/presencia'], 'id' => 'submit-form')); ?>
                          <div class="col-md-4 col-lg-4 col-sm-12">
                          <?php
                          $type_btn = (!empty($userCasillas[0]['hora_presencia'])) ? 'button' : 'post' ;
                          ?>
                              <button id="btn_presencia" type="<?=$type_btn;?>" class="btn btn-info" onclick="showNotificationP('top','right')">PRESENCIA</button>
                              <br/>
                              <h5><small>07:00 HRS.</small></h5>
                          </div>
                          <?= $this->Form->end(); ?>
                          <?= $this->Form->create(null, array('type' => 'post', 'url' => ['controller' => 'Xmf', 'action' => 'index/presencia'], 'id' => 'submit-form')); ?>
                          <div class="col-md-4 col-lg-4 col-sm-12">
                          <?php
                          $type_btn = (!empty($userCasillas[0]['hora_presencia'])) ? 'button' : 'post' ;
                          ?>
                              <button id="btn_presencia" type="<?=$type_btn;?>" class="btn btn-info" onclick="showNotificationP('top','right')">INSTALACIÓN</button>
                              <br/>
                          </div>
                          <?= $this->Form->end(); ?>
                          <?= $this->Form->create(null, array('type' => 'post', 'url' => ['controller' => 'Xmf', 'action' => 'index/ini_votacion'], 'id' => 'submit-form')); ?>
                          <div class="col-md-4 col-lg-4 col-sm-12">
                              <?php
                              $type_btn = (!empty($userCasillas[0]['hora_inicio'])) ? 'button' : 'post' ;
                              ?>
                              <button type="<?=$type_btn;?>" class="btn btn-info" onclick="showNotificationI('top','right')">INICIO VOTACIÓN</button>
                              <br/>
                              <h5><small>08:00 HRS.</small></h5>
                          </div>
                          <?= $this->Form->end(); ?>
                        </div>
                        <hr/>
                        <div class="row">


                          <?= $this->Form->create(null, array('type' => 'post', 'url' => ['controller' => 'Xmf', 'action' => 'index/presencia'], 'id' => 'submit-form')); ?>
                          <div class="col-md-12 col-lg-12 col-sm-12">
                          <?php
                          $type_btn = (!empty($userCasillas[0]['hora_presencia'])) ? 'button' : 'post' ;
                          ?>
                              <button id="btn_presencia" type="<?=$type_btn;?>" class="btn btn-warning" onclick="showNotificationP('top','right')">CAPTURA REPORTES</button>
                              <br/>
                          </div>
                          <?= $this->Form->end(); ?>
                        </div>
                    </div>

                </div>
            </div>
            <hr>

            <div class="text-center">
                <div class="row">
                    <h5><?=$userCasillas[0]['name'];?></h5>
                    <div class="col-md-4 ">
                        <h5><small><?=$userCasillas[0]['clave_agrupamiento'];?></small></h5>
                    </div>
                    <div class="col-md-4">
                        <h5><small></small></h5>
                    </div>
                    <div class="col-md-4">
                        <h5><small><?=$userCasillas[0]['urbana'];?></small></h5>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="row">
    </div>

    <script>
    function showNotificationP(from, align){
        $(document).ready(function(){
            $.notify({
                icon: "ti-package",
                message: "<?=$message_p;?>"

            },{
                type: 'warning',
                timer: 4000,
                placement: {
                    from: from,
                    align: align
                }
            });
        });
    }
    function showNotificationI(from, align){
        $(document).ready(function(){
            $.notify({
                icon: "ti-package",
                message: "<?=$message_i;?>"

            },{
                type: 'warning',
                timer: 4000,
                placement: {
                    from: from,
                    align: align
                }
            });
        });
    }
    </script>
