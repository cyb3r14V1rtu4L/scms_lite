<?= $this->Html->script('jquery.counterup.min', ['block' => true]); ?>
<?= $this->Html->script('waypoints.min', ['block' => true]); ?>

<div id ="divMonitorCasillas">
  <div class="col-lg-6">
    <?= $this->element('Paper.xmf/graficas/abierta_cerrada_pastel'); ?>
  </div>
  <div class="col-lg-6">
    <?= $this->element('Paper.xmf/counter_head_vertical');?>

  </div>

</div>
