
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<?= $this->Html->css('clockpicker.css') ?>
<?= $this->Html->script('clockpicker'); ?>
<!-- CSS stylea -->
<?= $this->Html->css('paper-bootstrap-wizard.css') ?>


<!-- JS Plugin for the Wizard  -->
<?= $this->Html->script('jquery.bootstrap.wizard', ['block' => true]); ?>
<?= $this->Html->script('paper-bootstrap-wizard', ['block' => true]); ?>
<!-- More information about jquery.validate here: http://jqueryvalidation.org/ -->
<?= $this->Html->script('jquery.validate.min', ['block' => true]); ?>
<!-- UI Kit Plugins -->
<?= $this->Html->script('ct-paper-radio', ['block' => true]); ?>
<?= $this->Html->script('bootstrap-select', ['block' => true]); ?>

<div class="container-fluid">
  <div class="row">
    <button type="button" class="btn btn-danger pull-right"  onclick="enviarIncidencia()"><small>Enviar Incidencia <i class="ti-pulse"></i></small></button>
    <input type="hidden" id="xcasilla" value="<?=$_SESSION['Casilla']['id']?>"/>
  </div>
  <br/>


    <div class="row">
        <div class="col-sm-12">
            <!--      Wizard container        -->
            <div class="wizard-container">
                <!-- You can switch " data-color="green" "  with one of the next bright colors: "blue", "azure", "orange", "red" -->
                <div class="card wizard-card" data-color="orange" id="wizard">
                    <div class="wizard-header">
                        <h3 class="wizard-title">ENVÍO DE REPORTES</h3>
                        <p class="category">Solo podrán enviarse a la hora establecida.</p>
                    </div>
                    <div class="wizard-navigation">
                        <div class="progress-with-circle">
                            <div class="progress-bar" role="progressbar" aria-valuenow="1" aria-valuemin="1" aria-valuemax="4" style="width: 15%;"></div>
                        </div>
                        <ul>
                            <li>
                                <a href="#primer_reporte" data-toggle="tab">
                                    <div class="icon-circle">
                                        <i class="ti-package"></i>
                                    </div>
                                    APERTURA DE CASILLA
                                </a>
                            </li>
                            <li>
                                <a href="#segundo_reporte" data-toggle="tab">
                                    <div class="icon-circle">
                                        <i class="ti-user"></i>
                                    </div>
                                    PRIMER REPORTE
                                </a>
                            </li>
                            <li>
                                <a href="#tercer_reporte" data-toggle="tab">
                                    <div class="icon-circle">
                                        <i class="ti-user"></i>
                                    </div>
                                    SEGUNDO REPORTE
                                </a>
                            </li>
                            <li>
                                <a href="#cuarto_reporte" data-toggle="tab">
                                    <div class="icon-circle">
                                        <i class="ti-hand-stop"></i>
                                    </div>
                                    TERCER REPORTE
                                </a>
                            </li>
                            <li>
                                <a href="#resultados_finales" data-toggle="tab">
                                    <div class="icon-circle">
                                        <i class="ti-stats-up"></i>
                                    </div>
                                    RESULTADOS FINALES
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane" id="primer_reporte">
                        <?= $this->element('Paper.xmf/reportes-cap/primer_reporte'); ?>
                    </div>
                    <div class="tab-pane" id="segundo_reporte">
                        <?= $this->element('Paper.xmf/reportes-cap/segundo_reporte'); ?>
                    </div>
                    <div class="tab-pane" id="tercer_reporte">
                    <?= $this->element('Paper.xmf/reportes-cap/tercer_reporte'); ?>
                    </div>
                    <div class="tab-pane" id="cuarto_reporte">
                    <?= $this->element('Paper.xmf/reportes-cap/cuarto_reporte'); ?>
                    </div>
                    <div class="tab-pane" id="resultados_finales">
                    <?= $this->element('Paper.xmf/reportes-cap/resultados_finales'); ?>
                    </div>
                    <div class="wizard-footer">
                        <hr/>
                        <div class="pull-right">

                            <input type='button' class='btn btn-next btn-fill btn-success btn-wd' name='next' value='Siguiente' />
                            <input type='button' class='btn btn-finish btn-fill btn-success btn-wd' name='finish' value='Siguiente' />

                        </div>

                        <div class="pull-left">
                            <input type='button' class='btn btn-previous btn-default btn-wd' name='previous' value='Anterior' />
                        </div>
                        <div class="clearfix"></div>
                </div>
            </div> <!-- wizard container -->
        </div>
    </div>
</div> <!-- row -->
<script>
$(document).ready(function() {
    $(".voto").keydown(function (e) {
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
            (e.keyCode == 65 && e.ctrlKey === true) ||
            (e.keyCode >= 35 && e.keyCode <= 39)) {
                 return;
        }

        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });

    $(".voto").attr('maxlength','4');
});

function enviarIncidencia()
{
     $.ajax({
         url: '/XmfCasillas/enviarIncidencia',
         type: "POST",
         dataType: "json",
         data: {
             xmf_casillas_id:$('#xcasilla').val(),
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
</script>
