<!-- Set the notification -->
<?= $this->Html->script('xmf/notifications/notify.js', ['block' => true]); ?>
<?= $this->element('Paper.xmf/counter_head'); ?>
<div class="container-fluid">
    <div class="row" id="resMonitorCasillas">
    <div class="nav-tabs-navigation">
    <div class="nav-tabs-wrapper">
        <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
            <li class="active"><a href="#cerradas" data-toggle="tab">CERRADAS (<?=$count_cerradas?>)</a></li>
            <li class=""><a href="#incidencias" data-toggle="tab" style="color:red" >INCIDENCIAS (<?=$casillas_incidencias;?>)</a></li>
        </ul>
    </div>
</div>
<div id="my-tab-content" class="tab-content text-center">
    <div class="tab-pane active" id="cerradas">
        <p>
            <h4>CASILLAS CERRADAS</h4>
            <hr/>
            <?php
            foreach($casillas_cerradas as $cp){
            ?>
                <div class="col-lg-2 col-sm-12">
                    <div class="card ">
                        <div class="content">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="">
                                        <div class="text-center"><?=$cp['name']?></div>
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
                                        <a href="<?php echo $this->Url->build('/XmfCasillas/CapturaResultados/'.$cp['id'].'/4'); ?>">
                                            <span class="ti-package"></span>
                                        </a>
                                        &nbsp;
                                        <?php
                                        #$votantes = $cp['votos']['votantes_segundo']+$cp['votos']['votantes_tercero'];
                                        #$promovidos =$cp['votos']['promovidos_segundo']+$cp['votos']['promovidos_tercero'];

                                        ?>
                                        <!--<a href="#" rel="tooltip" style="white-space: nowrap;" title="<?=$votantes?>/<?=$promovidos?>"><span class="pie"><?=$votantes?>/<?=$promovidos?></span></a> -->

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

<div class="row">
        <div class="col-lg-6 col-sm-6">
            <div class="text-center">
                <button type="submit" class="btn btn-info btn-fill btn-wd">Exportar PDF</button>
            </div>
        </div>
        <div class="col-lg-6 col-sm-6">
            <div class="text-center">
                <button type="submit" class="btn btn-info btn-fill btn-wd">Exportar XLS</button>
            </div>
        </div>
    </div>

</div>   <!-- container-fluid -->
