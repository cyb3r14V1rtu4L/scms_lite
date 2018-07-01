<div id="divResults">

<div class="container-fluid">
    <div class="row" id="resMonitorCasillas">
      <div class="col-lg-12"><?= $this->element('Paper.xmf/counter_head_vertical');?></div>

      <div class="col-lg-12 col-sm-12">
        <div class="nav-tabs-navigation">
            <div class="nav-tabs-wrapper">
                <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
                    <li class="active"><a href="#cerradas" data-toggle="tab">INSTALADANDO (<?=$count_instalando?>)</a></li>
                    <li class=""><a href="#incidencias" data-toggle="tab" style="color:red" >INCIDENCIAS (<?=$casillas_incidencias;?>)</a></li>
                </ul>
            </div>
        </div>
        <div id="my-tab-content" class="tab-content text-center">
            <div class="tab-pane active" id="cerradas">
                <p>
                    <h4>CASILLAS INSTALADANDO</h4>
                    <hr/>
                    <?= $this->element('Paper.xmf/pagination/casillas_instalando'); ?>
                </p>
                <div class="col-lg-12">
                  <div class="paginator">
                      <ul class="pagination">
                        <?php

                        $this->Paginator->options([
                          'url' => ['controller' => 'XmfCasillas',
                                    'action' => 'monitorInstalando'
                                   ]
                        ]);
                        ?>
                          <?= $this->Paginator->first('<< ' . __('Primera')) ?>
                          <?= $this->Paginator->prev('< ' . __('Anterior')) ?>
                          <?= $this->Paginator->numbers() ?>
                          <?= $this->Paginator->next(__('Siguiente') . ' >') ?>
                          <?= $this->Paginator->last(__('Última') . ' >>') ?>
                      </ul>
                  </div>

                </div>
            </div>
            <div class="tab-pane" id="incidencias">
                <?= $this->element('Paper.xmf/reportes/incidencias'); ?>
            </div>
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

<script type="text/javascript">
$(document).ready(function () {
$(".pagination a").bind("click", function (event) {
    if(!$(this).attr('href'))
        return false;
    $.ajax({
        type: 'POST',
        dataType: "html",
        evalScripts:true,

        success:function (data, textStatus) {
            $("#divResults").html(data);
        },
        url:$(this).attr('href')});
        return false;
    });
    });
</script>
</div><!--divResults-->
