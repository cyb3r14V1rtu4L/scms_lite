<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\XmfCasilla $xmfCasilla
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Xmf Casilla'), ['action' => 'edit', $xmfCasilla->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Xmf Casilla'), ['action' => 'delete', $xmfCasilla->id], ['confirm' => __('Are you sure you want to delete # {0}?', $xmfCasilla->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Xmf Casillas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Xmf Casilla'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="xmfCasillas view large-9 medium-8 columns content">
    <h3><?= h($xmfCasilla->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($xmfCasilla->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($xmfCasilla->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Clave Agrupamiento') ?></th>
            <td><?= h($xmfCasilla->clave_agrupamiento) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($xmfCasilla->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Hora Instalacion') ?></th>
            <td><?= h($xmfCasilla->hora_instalacion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Hora Inicio') ?></th>
            <td><?= h($xmfCasilla->hora_inicio) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Hora Cierre') ?></th>
            <td><?= h($xmfCasilla->hora_cierre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($xmfCasilla->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($xmfCasilla->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Municipio') ?></h4>
        <?= $this->Text->autoParagraph(h($xmfCasilla->municipio)); ?>
    </div>
    <div class="row">
        <h4><?= __('Seccion') ?></h4>
        <?= $this->Text->autoParagraph(h($xmfCasilla->seccion)); ?>
    </div>
    <div class="row">
        <h4><?= __('Tipo Casilla') ?></h4>
        <?= $this->Text->autoParagraph(h($xmfCasilla->tipo_casilla)); ?>
    </div>
    <div class="row">
        <h4><?= __('Urbana') ?></h4>
        <?= $this->Text->autoParagraph(h($xmfCasilla->urbana)); ?>
    </div>
    <div class="row">
        <h4><?= __('Distrito') ?></h4>
        <?= $this->Text->autoParagraph(h($xmfCasilla->distrito)); ?>
    </div>
    <div class="row">
        <h4><?= __('Locacion') ?></h4>
        <?= $this->Text->autoParagraph(h($xmfCasilla->locacion)); ?>
    </div>
</div>
