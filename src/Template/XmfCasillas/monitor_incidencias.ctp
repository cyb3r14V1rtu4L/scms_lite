<!-- Set the notification -->
<?= $this->Html->script('xmf/notifications/notify.js', ['block' => true]); ?>
<?= $this->element('Paper.xmf/counter_head_vertical'); ?>
<div class="container-fluid">
    <div class="row" id="resMonitorCasillas">
    <div class="nav-tabs-navigation">
        <div class="nav-tabs-wrapper">
            <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
                <li class="active"><a href="#incidencias" data-toggle="tab" style="color:red" >INCIDENCIAS (<?=$casillas_incidencias?>)</a></li>
            </ul>
        </div>
    </div>
    <div id="my-tab-content" class="tab-content text-center">

        <div class="tab-pane active" id="incidencias">
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
