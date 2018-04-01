<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\XmfPartidosIncidencia $xmfPartidosIncidencia
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Xmf Partidos Incidencia'), ['action' => 'edit', $xmfPartidosIncidencia->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Xmf Partidos Incidencia'), ['action' => 'delete', $xmfPartidosIncidencia->id], ['confirm' => __('Are you sure you want to delete # {0}?', $xmfPartidosIncidencia->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Xmf Partidos Incidencias'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Xmf Partidos Incidencia'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Xmf Casillas'), ['controller' => 'XmfCasillas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Xmf Casilla'), ['controller' => 'XmfCasillas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Xmf Partidos'), ['controller' => 'XmfPartidos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Xmf Partido'), ['controller' => 'XmfPartidos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Xmf Incidencias'), ['controller' => 'XmfIncidencias', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Xmf Incidencia'), ['controller' => 'XmfIncidencias', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="xmfPartidosIncidencias view large-9 medium-8 columns content">
    <h3><?= h($xmfPartidosIncidencia->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Xmf Casilla') ?></th>
            <td><?= $xmfPartidosIncidencia->has('xmf_casilla') ? $this->Html->link($xmfPartidosIncidencia->xmf_casilla->name, ['controller' => 'XmfCasillas', 'action' => 'view', $xmfPartidosIncidencia->xmf_casilla->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Xmf Partido') ?></th>
            <td><?= $xmfPartidosIncidencia->has('xmf_partido') ? $this->Html->link($xmfPartidosIncidencia->xmf_partido->id, ['controller' => 'XmfPartidos', 'action' => 'view', $xmfPartidosIncidencia->xmf_partido->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Xmf Incidencia') ?></th>
            <td><?= $xmfPartidosIncidencia->has('xmf_incidencia') ? $this->Html->link($xmfPartidosIncidencia->xmf_incidencia->id, ['controller' => 'XmfIncidencias', 'action' => 'view', $xmfPartidosIncidencia->xmf_incidencia->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($xmfPartidosIncidencia->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($xmfPartidosIncidencia->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($xmfPartidosIncidencia->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Otra') ?></h4>
        <?= $this->Text->autoParagraph(h($xmfPartidosIncidencia->otra)); ?>
    </div>
</div>
