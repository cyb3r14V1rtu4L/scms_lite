<!-- Set the notification -->
<?=$this->Html->script('xmf/notifications/notify.js', ['block' => true]); ?>

<div class="container-fluid">
    <h3 class="text-center">VALIDAR PRESENCIAS Y RESULTADOS DE ELECCIONES</h3>
    
    <div class="row" id="resMonitorCasillas">
        <div class="nav-tabs-navigation">
            <div class="nav-tabs-wrapper">
                <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
                    <li class="active"><a href="#presencias" data-toggle="tab">PRESENCIAS (130)</a></li>
                    <li><a href="#reporte_1" data-toggle="tab">REPORTE I</a></li>
                    <li><a href="#reporte_2" data-toggle="tab">REPORTE II</a></li>
                    <li><a href="#reporte_3" data-toggle="tab">REPORTE III</a></li>
                    <li><a href="#reporte_4" data-toggle="tab">REPORTE IV</a></li>
                    <li><a href="#resultados" data-toggle="tab">RESULTADOS FINALES</a></li>
                    <li><a href="#incidencias" data-toggle="tab">INCIDENCIAS</a></li>

                </ul>
            </div>
        </div>
        <div id="my-tab-content" class="tab-content text-center">
            <div class="tab-pane active" id="presencias">
                <p>
                    <h4>VALIDAR PRESENCIAS</h4>   
                    <hr/>
                    <?php
                    for($x=0;$x<=50;$x++){
                    ?>
                        <div class="col-lg-2 col-sm-12">
                            <div class="card ">
                                <div class="content">
                                    <div class="row">
                                        <div class="col-xs-5">
                                            <div class="numbers">
                                                <div class="text-center">CB206</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="footer">
                                        <hr />
                                            <div class="text-center">
                                                <a href="tel:9999999999">
                                                    <span class="ti-mobile"></span>
                                                </a>
                                                &nbsp;
                                                <a href="/pages/reports/ValidaReporte">
                                                    <span class="ti-package"></span>
                                                </a>
                                                <a href="#open-modal">
                                                    <span class="ti-pie-chart"></span>
                                                </a>
                                                
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </p>
            </div>
            <div class="tab-pane" id="reporte_1">
                <p>
                <h4>VALIDAR REPORTE I</h4>   
                    <hr/>
                <?php
                    for($x=0;$x<=15;$x++){
                    ?>
                        <div class="col-lg-2 col-sm-12">
                            <div class="card ">
                                <div class="content">
                                    <div class="row">
                                        <div class="col-xs-5">
                                            <div class="numbers">
                                                <div class="text-center">CB206</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="footer">
                                        <hr />
                                            <div class="text-center">
                                                <a href="tel:9999999999">
                                                    <span class="ti-mobile"></span>
                                                </a>
                                                &nbsp;
                                                <a href="/pages/reports/ValidaReporte">
                                                    <span class="ti-package"></span>
                                                </a>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </p>
            </div>
            <div class="tab-pane" id="reporte_2">
                <p>
                <h4>VALIDAR REPORTE II</h4>   
                    <hr/>
                <?php
                    for($x=0;$x<=15;$x++){
                    ?>
                        <div class="col-lg-2 col-sm-12">
                            <div class="card ">
                                <div class="content">
                                    <div class="row">
                                        <div class="col-xs-5">
                                            <div class="numbers">
                                                <div class="text-center">CB206</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="footer">
                                        <hr />
                                            <div class="text-center">
                                                <a href="tel:9999999999">
                                                    <span class="ti-mobile"></span>
                                                </a>
                                                &nbsp;
                                                <a href="/pages/reports/ValidaReporte">
                                                    <span class="ti-package"></span>
                                                </a>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </p>
            </div>
            <div class="tab-pane" id="reporte_3">
                <p>
                <h4>VALIDAR REPORTE III</h4>   
                    <hr/>
                <?php
                    for($x=0;$x<=15;$x++){
                    ?>
                        <div class="col-lg-2 col-sm-12">
                            <div class="card ">
                                <div class="content">
                                    <div class="row">
                                        <div class="col-xs-5">
                                            <div class="numbers">
                                                <div class="text-center">CB206</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="footer">
                                        <hr />
                                            <div class="text-center">
                                                <a href="tel:9999999999">
                                                    <span class="ti-mobile"></span>
                                                </a>
                                                &nbsp;
                                                <a href="/pages/reports/ValidaReporte">
                                                    <span class="ti-package"></span>
                                                </a>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </p>
            </div>
            <div class="tab-pane" id="reporte_4">
                <p>
                <h4>VALIDAR REPORTE IV</h4>   
                    <hr/>
                <?php
                    for($x=0;$x<=15;$x++){
                    ?>
                        <div class="col-lg-2 col-sm-12">
                            <div class="card ">
                                <div class="content">
                                    <div class="row">
                                        <div class="col-xs-5">
                                            <div class="numbers">
                                                <div class="text-center">CB206</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="footer">
                                        <hr />
                                            <div class="text-center">
                                                <a href="tel:9999999999">
                                                    <span class="ti-mobile"></span>
                                                </a>
                                                &nbsp;
                                                <a href="/pages/reports/ValidaReporte">
                                                    <span class="ti-package"></span>
                                                </a>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </p>
            </div>
            <div class="tab-pane" id="resultados">
                <p>
                <h4>VALIDAR RESULTADOS FINALES</h4>   
                    <hr/>
                <?php
                    for($x=0;$x<=15;$x++){
                    ?>
                        <div class="col-lg-2 col-sm-12">
                            <div class="card ">
                                <div class="content">
                                    <div class="row">
                                        <div class="col-xs-5">
                                            <div class="numbers">
                                                <div class="text-center">CB206</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="footer">
                                        <hr />
                                            <div class="text-center">
                                                <a href="tel:9999999999">
                                                    <span class="ti-mobile"></span>
                                                </a>
                                                &nbsp;
                                                <a href="/pages/reports/ValidaReporte">
                                                    <span class="ti-package"></span>
                                                </a>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </p>
            </div>
            <div class="tab-pane" id="incidencias">
                <?= $this->element('Paper.xmf/reportes/incidencias'); ?>
            </div>
        </div>
    </div>
    <div class "row">
        <div class="text-center">
            <button type="submit" class="btn btn-info btn-fill btn-wd">Exportar XLS</button>
        </div>
    </div>
</div>   <!-- container-fluid -->


<div id="open-modal" class="modal-window">
    <div>
        <a href="#modal-close" title="Close" class="modal-close">Cerrar</a>
        <h1>FLUJO VOTACIONES</h1>
    <div>

   <?= $this->element('Paper.xmf/graficas/votantes_promovidos_pastel'); ?> 
</div>

