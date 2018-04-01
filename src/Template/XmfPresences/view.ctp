<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\XmfPresence $xmfPresence
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Xmf Presence'), ['action' => 'edit', $xmfPresence->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Xmf Presence'), ['action' => 'delete', $xmfPresence->id], ['confirm' => __('Are you sure you want to delete # {0}?', $xmfPresence->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Xmf Presences'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Xmf Presence'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="xmfPresences view large-9 medium-8 columns content">
    <h3><?= h($xmfPresence->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($xmfPresence->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Clave Agrupamiento') ?></th>
            <td><?= h($xmfPresence->clave_agrupamiento) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($xmfPresence->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Casillas Index') ?></th>
            <td><?= $this->Number->format($xmfPresence->casillas_index) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Hora Instalacion') ?></th>
            <td><?= h($xmfPresence->hora_instalacion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Hora Inicio') ?></th>
            <td><?= h($xmfPresence->hora_inicio) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Hora Cierre') ?></th>
            <td><?= h($xmfPresence->hora_cierre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Present') ?></th>
            <td><?= $xmfPresence->is_present ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Municipio') ?></h4>
        <?= $this->Text->autoParagraph(h($xmfPresence->municipio)); ?>
    </div>
    <div class="row">
        <h4><?= __('Seccion') ?></h4>
        <?= $this->Text->autoParagraph(h($xmfPresence->seccion)); ?>
    </div>
    <div class="row">
        <h4><?= __('Tipo Casilla') ?></h4>
        <?= $this->Text->autoParagraph(h($xmfPresence->tipo_casilla)); ?>
    </div>
    <div class="row">
        <h4><?= __('Urbana') ?></h4>
        <?= $this->Text->autoParagraph(h($xmfPresence->urbana)); ?>
    </div>
    <div class="row">
        <h4><?= __('Distrito') ?></h4>
        <?= $this->Text->autoParagraph(h($xmfPresence->distrito)); ?>
    </div>
    <div class="row">
        <h4><?= __('Locacion') ?></h4>
        <?= $this->Text->autoParagraph(h($xmfPresence->locacion)); ?>
    </div>
    <div class="row">
        <h4><?= __('Nombre') ?></h4>
        <?= $this->Text->autoParagraph(h($xmfPresence->nombre)); ?>
    </div>
    <div class="row">
        <h4><?= __('Formula') ?></h4>
        <?= $this->Text->autoParagraph(h($xmfPresence->formula)); ?>
    </div>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($xmfPresence->description)); ?>
    </div>
</div>
