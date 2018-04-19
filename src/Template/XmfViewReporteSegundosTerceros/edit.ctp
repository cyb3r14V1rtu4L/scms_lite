<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\XmfViewReporteSegundosTercero $xmfViewReporteSegundosTercero
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $xmfViewReporteSegundosTercero->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $xmfViewReporteSegundosTercero->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Xmf View Reporte Segundos Terceros'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Xmf Casillas'), ['controller' => 'XmfCasillas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Xmf Casilla'), ['controller' => 'XmfCasillas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="xmfViewReporteSegundosTerceros form large-9 medium-8 columns content">
    <?= $this->Form->create($xmfViewReporteSegundosTercero) ?>
    <fieldset>
        <legend><?= __('Edit Xmf View Reporte Segundos Tercero') ?></legend>
        <?php
            echo $this->Form->control('xmf_casillas_id', ['options' => $xmfCasillas, 'empty' => true]);
            echo $this->Form->control('votantes_segundo');
            echo $this->Form->control('promovidos_segundo');
            echo $this->Form->control('votantes_tercero');
            echo $this->Form->control('promovidos_tercero');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
