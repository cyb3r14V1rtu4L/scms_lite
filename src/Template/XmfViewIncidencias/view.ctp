<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\XmfViewIncidencia $xmfViewIncidencia
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Xmf View Incidencia'), ['action' => 'edit', $xmfViewIncidencia->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Xmf View Incidencia'), ['action' => 'delete', $xmfViewIncidencia->id], ['confirm' => __('Are you sure you want to delete # {0}?', $xmfViewIncidencia->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Xmf View Incidencias'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Xmf View Incidencia'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Xmf Incidencias'), ['controller' => 'XmfIncidencias', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Xmf Incidencia'), ['controller' => 'XmfIncidencias', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="xmfViewIncidencias view large-9 medium-8 columns content">
    <h3><?= h($xmfViewIncidencia->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($xmfViewIncidencia->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Clave Agrupamiento') ?></th>
            <td><?= h($xmfViewIncidencia->clave_agrupamiento) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Xmf Incidencia') ?></th>
            <td><?= $xmfViewIncidencia->has('xmf_incidencia') ? $this->Html->link($xmfViewIncidencia->xmf_incidencia->id, ['controller' => 'XmfIncidencias', 'action' => 'view', $xmfViewIncidencia->xmf_incidencia->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Casillas Index') ?></th>
            <td><?= $this->Number->format($xmfViewIncidencia->casillas_index) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($xmfViewIncidencia->id) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Municipio') ?></h4>
        <?= $this->Text->autoParagraph(h($xmfViewIncidencia->municipio)); ?>
    </div>
    <div class="row">
        <h4><?= __('Seccion') ?></h4>
        <?= $this->Text->autoParagraph(h($xmfViewIncidencia->seccion)); ?>
    </div>
    <div class="row">
        <h4><?= __('Tipo Casilla') ?></h4>
        <?= $this->Text->autoParagraph(h($xmfViewIncidencia->tipo_casilla)); ?>
    </div>
    <div class="row">
        <h4><?= __('Urbana') ?></h4>
        <?= $this->Text->autoParagraph(h($xmfViewIncidencia->urbana)); ?>
    </div>
    <div class="row">
        <h4><?= __('Distrito') ?></h4>
        <?= $this->Text->autoParagraph(h($xmfViewIncidencia->distrito)); ?>
    </div>
    <div class="row">
        <h4><?= __('Locacion') ?></h4>
        <?= $this->Text->autoParagraph(h($xmfViewIncidencia->locacion)); ?>
    </div>
    <div class="row">
        <h4><?= __('Nombre') ?></h4>
        <?= $this->Text->autoParagraph(h($xmfViewIncidencia->nombre)); ?>
    </div>
    <div class="row">
        <h4><?= __('Formula') ?></h4>
        <?= $this->Text->autoParagraph(h($xmfViewIncidencia->formula)); ?>
    </div>
    <div class="row">
        <h4><?= __('Otra') ?></h4>
        <?= $this->Text->autoParagraph(h($xmfViewIncidencia->otra)); ?>
    </div>
    <div class="row">
        <h4><?= __('Titulo') ?></h4>
        <?= $this->Text->autoParagraph(h($xmfViewIncidencia->titulo)); ?>
    </div>
    <div class="row">
        <h4><?= __('Descripcion') ?></h4>
        <?= $this->Text->autoParagraph(h($xmfViewIncidencia->descripcion)); ?>
    </div>
</div>
