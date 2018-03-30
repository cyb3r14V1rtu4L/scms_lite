<!-- Set the notification -->
<?= $this->Html->script('xmf/notifications/notify.js', ['block' => true]); ?>

    <?= $this->element('Paper.xmf/counter_head'); ?> 
    <div class="row" id="resMonitorCasillas">
        <div class="nav-tabs-navigation">
            <div class="nav-tabs-wrapper">
                <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
                    <li class="active"><a href="#home" data-toggle="tab" style="color:blue" >PRESENCIAS (130)</a></li>
                    <li><a href="#profile" data-toggle="tab" style="color:red" >AUSENCIAS (110)</a></li>
                    <li><a href="#messages" data-toggle="tab" style="color:orange" >INCIDENCIAS (5)</a></li>
                </ul>
            </div>
        </div>
        <div id="my-tab-content" class="tab-content text-center">
            <div class="tab-pane active" id="home">
                <p>
                    <h4>CASILLAS PRESSENTES</h4>   
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
                                                
                                                <a href="#" rel="tooltip" style="white-space: nowrap;" title="1,226/360"><span class="pie">226/360</span></a>
                                                
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
            <div class="tab-pane" id="profile">
                <p>
                    <h4>CASILLAS AUSENTES</h4>   
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
                                                <a href="#">
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
            <div class="tab-pane" id="messages">
                <?= $this->element('Paper.xmf/reportes/incidencias'); ?>
            </div>
        </div>
    </div>
    <div class="row text-center">
        <button type="submit" class="btn btn-info btn-fill btn-wd">Exportar XLS</button>
    </div>    