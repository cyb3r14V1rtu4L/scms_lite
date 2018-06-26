<div class="col-md-2 col-lg-2"></div>
    <div class="col-md-7 col-lg-7 ">
        <div class="card card-user">
            <div class="content">
                <div class="author">
                    <img class="avatar border-white" src="<?php echo $this->request->webroot?>paper/img/partidos_png/PAN.png" alt="...">
                    <hr/>

                </div>
                <div class="col-md-6 col-lg-6">
                    <h5 class="title"><small><?=$userCasillas['rg_casilla'];?></small></h5>
                    <h6 class="title"><small>REPRESENTANTE GENERAL</small></h6>
                    <p><a href="tel:<?=$userCasillas['rg_telefono'];?>"><?=$userCasillas['rg_telefono'];?></a></p>
                </div>
                    <div class="col-md-6 col-lg-6">
                        <h5 class="title"><small>RAÚL RUIZ</small></h5>
                        <h6 class="title"><small>NOMBRE ABOGADO</small></h6>
                        <p><a href="tel:9848018319">9848018319</a></p>
                    </div>
                <br/>
                <hr/>
                <br/>
                <div class="text-center">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                          <hr/>
                          <h4><small>FUNCIONES PRINCIPALES - CASILLA</small></h5>
                        </div>
                        <h5><?=strtoupper($_SESSION['Auth']['User']['first_name'].'<br/>'.$_SESSION['Auth']['User']['last_name']);?></h5>
                        <h6><small>FUNCIONARIO DE CASILLA<small></h6>
                          <input type="hidden" id="xmf_casillas_id" value="<?=$_SESSION['Casilla']['id']?>">
                        <div class="row">
                            <div id="clocker" style="text-align:center;padding:1em 0;">
                                <iframe src="https://www.zeitverschiebung.net/clock-widget-iframe-v2?language=es&size=medium&timezone=America%2FCancun" width="100%" height="115" frameborder="0" seamless></iframe>
                            </div>
                            <!--
                            <div class="contenedor">
                              <div class="widget">
                                <div class="fecha">
                                  <p id="diaSemana" class="diaSemana"></p>
                                  <p id="dia" class="dia"></p>
                                  <p>de</p>
                                  <p id="mes" class="mes"></p>
                                  <p>del</p>
                                  <p id="anio" class="<a href="#"></a>nio"></p>
                                </div>
                                <div class="reloj">
                                  <p id="horas" class="horas"></p>
                                  <p>:</p>
                                  <p id="minutos" class="minutos"></p>
                                  <p>:</p>
                                  <div class="cajaSegundos">
                                    <p id="ampm" class="ampm"></p>
                                    <p id="segundos" class="segundos"></p>
                                  </div>
                                </div>
                              </div>
                            </div>
                            -->
                        </div>
                        <hr/><br/>

                        <div class="row">
                          <?= $this->Form->create(null, array('type' => 'post', 'url' => ['controller' => 'Xmf', 'action' => 'index/presencia'], 'id' => 'submit-form')); ?>
                          <div class="col-md-4 col-lg-4 col-sm-12">
                          <?php
                          $type_btn = (!empty($userCasillas[0]['hora_presencia'])) ? 'button' : 'post' ;
                          ?>
                              <button id="btn_presencia" type="<?=$type_btn;?>" class="btn btn-info" onclick="showNotificationP('top','right')"><small>PRESENCIA <i class="ti-check"></i></small></button>
                              <br/>
                              <h5><small>07:00 HRS.</small></h5>
                          </div>
                          <?= $this->Form->end(); ?>
                          <?= $this->Form->create(null, array('type' => 'post', 'url' => ['controller' => 'Xmf', 'action' => 'index/instalacion'], 'id' => 'submit-form')); ?>
                          <div class="col-md-4 col-lg-4 col-sm-12">
                          <?php
                          $type_btn = (!empty($userCasillas[0]['hora_instalacion'])) ? 'button' : 'post' ;
                          ?>
                              <button id="btn_instalacion" type="<?=$type_btn;?>" class="btn btn-warning" onclick="showNotificationC('top','right')"><small>INSTALACIÓN <i class="ti-package"></i></small></button>
                              <br/>
                              <h5><small>Instalar Casilla</small></h5>
                          </div>
                          <?= $this->Form->end(); ?>
                          <?= $this->Form->create(null, array('type' => 'post', 'url' => ['controller' => 'Xmf', 'action' => 'index/inicio'], 'id' => 'submit-form')); ?>
                          <div class="col-md-4 col-lg-4 col-sm-12">
                              <?php
                              $type_btn = (!empty($userCasillas[0]['hora_inicio'])) ? 'button' : 'post' ;
                              ?>
                              <button type="<?=$type_btn;?>" class="btn btn-danger" onclick="showNotificationI('top','right')"><small>INICIO VOTACIÓN <i class="ti-user"></i></small></button>
                              <br/>
                              <h5><small>08:00 HRS.</small></h5>
                          </div>
                          <?= $this->Form->end(); ?>
                        </div>
                        <hr/>
                        <!--<div class="row">
                          <br/>
                          <div class="col-md-6 col-lg-6 col-sm-12">
                            <?php
                            #$type_btn = (!empty($userCasillas['hora_presencia'])) ? 'button' : 'post' ;
                            ?>
                                <button id="btn_presencia" type="button" class="btn btn-warning" onclick="window.location='<?php echo $this->Url->build('/Xmf/CapturaReporte'); ?>'"><small>ENVIAR REPORTES <i class="ti-stats-up"></i></small></button>
                                <br/>
                                <h5><small>Generar Reportes</small></h5>
                          </div>
                        <div class="col-md-6 col-lg-6 col-sm-12">
                          <button type="button" class="btn btn-danger" onclick="enviarIncidencia()"><small>Enviar Incidencia <i class="ti-pulse"></i></small></button>
                          <br/>
                          <h5><small>Notificar Incidencia</small></h5>
                        </div>
                      </div>
                    -->

                    </div>

                </div>
            </div>

            <div class="text-center">
                <div class="row">

                    <h5><?=$_SESSION['userCasillas']['name'];?></h5>
                    <div class="col-md-4 ">
                        <h5><small><?=$_SESSION['userCasillas']['clave_agrupamiento'];?></small></h5>
                    </div>
                    <div class="col-md-4">
                        <h5><small></small></h5>
                    </div>
                    <div class="col-md-4">
                        <h5><small><?=$_SESSION['userCasillas']['urbana'];?></small></h5>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="row"> </div>

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

    function showNotificationC(from, align){
        $(document).ready(function(){
            $.notify({
                icon: "ti-package",
                message: "<?=$message_c;?>"

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

  function enviarIncidencia()
  {
       $.ajax({
           url: '/XmfCasillas/enviarIncidencia',
           type: "POST",
           dataType: "json",
           data: {
               xmf_casillas_id:$('#xmf_casillas_id').val(),
               xmf_total_incidencias:1
           }
           ,
           success: function (json) {

               $.notify ({
                    icon: 'ti-pulse',
                    message: "<b>Incidencia</b> Enviada."

                  },{
                      type: 'danger',
                      timer: 2000
                  });
                  $('#btn_reporte_2').attr('disabled','disabled');
           },
           error: function (xhr, textStatus, errorThrown) {
               console.log(xhr);
           }
       });
   }

   $(function(){
  var actualizarHora = function(){
    var fecha = new Date(),
        hora = fecha.getHours(),
        minutos = fecha.getMinutes(),
        segundos = fecha.getSeconds(),
        diaSemana = fecha.getDay(),
        dia = fecha.getDate(),
        mes = fecha.getMonth(),
        anio = fecha.getFullYear(),
        ampm;

    var $pHoras = $("#horas"),
        $pSegundos = $("#segundos"),
        $pMinutos = $("#minutos"),
        $pAMPM = $("#ampm"),
        $pDiaSemana = $("#diaSemana"),
        $pDia = $("#dia"),
        $pMes = $("#mes"),
        $pAnio = $("#anio");
    var semana = ['Domingo','Lunes','Martes','Miercoles','Jueves','Viernes','Sabado'];
    var meses = ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];

    $pDiaSemana.text(semana[diaSemana]);
    $pDia.text(dia);
    $pMes.text(meses[mes]);
    $pAnio.text(anio);
    if(hora>=12){
      hora = hora - 12;
      ampm = "PM";
    }else{
      ampm = "AM";
    }
    if(hora == 0){
      hora = 12;
    }
    if(hora<10){$pHoras.text("0"+hora)}else{$pHoras.text(hora)};
    if(minutos<10){$pMinutos.text("0"+minutos)}else{$pMinutos.text(minutos)};
    if(segundos<10){$pSegundos.text("0"+segundos)}else{$pSegundos.text(segundos)};
    $pAMPM.text(ampm);

  };


  actualizarHora();
  var intervalo = setInterval(actualizarHora,1000);
});

    $('#clocker').click(function(){return false;});
    </script>
