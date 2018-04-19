<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\XmfViewReporteSegundosTercero $xmfViewReporteSegundosTercero
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Xmf View Reporte Segundos Tercero'), ['action' => 'edit', $xmfViewReporteSegundosTercero->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Xmf View Reporte Segundos Tercero'), ['action' => 'delete', $xmfViewReporteSegundosTercero->id], ['confirm' => __('Are you sure you want to delete # {0}?', $xmfViewReporteSegundosTercero->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Xmf View Reporte Segundos Terceros'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Xmf View Reporte Segundos Tercero'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Xmf Casillas'), ['controller' => 'XmfCasillas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Xmf Casilla'), ['controller' => 'XmfCasillas', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="xmfViewReporteSegundosTerceros view large-9 medium-8 columns content">
    <h3><?= h($xmfViewReporteSegundosTercero->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Xmf Casilla') ?></th>
            <td><?= $xmfViewReporteSegundosTercero->has('xmf_casilla') ? $this->Html->link($xmfViewReporteSegundosTercero->xmf_casilla->name, ['controller' => 'XmfCasillas', 'action' => 'view', $xmfViewReporteSegundosTercero->xmf_casilla->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Votantes Segundo') ?></th>
            <td><?= $this->Number->format($xmfViewReporteSegundosTercero->votantes_segundo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Promovidos Segundo') ?></th>
            <td><?= $this->Number->format($xmfViewReporteSegundosTercero->promovidos_segundo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Votantes Tercero') ?></th>
            <td><?= $this->Number->format($xmfViewReporteSegundosTercero->votantes_tercero) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Promovidos Tercero') ?></th>
            <td><?= $this->Number->format($xmfViewReporteSegundosTercero->promovidos_tercero) ?></td>
        </tr>
    </table>
</div>
