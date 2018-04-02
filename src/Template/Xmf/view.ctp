<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\XmfIncidencia $xmfIncidencia
 */
?>


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
        <div class="col-sm-3">
            <div class="card">

                <div class="content">
                    <h5>CB206</h5>
                    708 - URBANA - BÁSICA - IX
                    <h5><small>REPRESENTANTE</small></h5>
                    <a href="tel:9999999999">(999)999-9999</a>
                    <hr/>
                    <h5><small>NOMBRE ABOGADO</small></h5>
                    <a href="tel:9999999999">(999)999-9999</a>
                    <hr/>

                </div>

            </div>
        </div>
        <div class="col-sm-9">
            <?= $this->element('Paper.xmf/reportes/agregar_incidencias'); ?>
        </div>
    </div>


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
                                    PRIMER REPORTE
                                </a>
                            </li>
                            <li>
                                <a href="#segundo_reporte" data-toggle="tab">
                                    <div class="icon-circle">
                                        <i class="ti-user"></i>
                                    </div>
                                    SEGUNDO REPORTE
                                </a>
                            </li>
                            <li>
                                <a href="#tercer_reporte" data-toggle="tab">
                                    <div class="icon-circle">
                                        <i class="ti-user"></i>
                                    </div>
                                    TERCER REPORTE
                                </a>
                            </li>
                            <li>
                                <a href="#cuarto_reporte" data-toggle="tab">
                                    <div class="icon-circle">
                                        <i class="ti-hand-stop"></i>
                                    </div>
                                    CUARTO REPORTE
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
                        <hr/>
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

                            <input type='button' class='btn btn-next btn-fill btn-success btn-wd' name='next' value='Enviar' />
                            <input type='button' class='btn btn-finish btn-fill btn-success btn-wd' name='finish' value='Enviar' />

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
