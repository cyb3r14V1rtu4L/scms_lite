<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\XmfFuncionariosPresenceStatus $xmfFuncionariosPresenceStatus
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Xmf Funcionarios Presence Status'), ['action' => 'edit', $xmfFuncionariosPresenceStatus->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Xmf Funcionarios Presence Status'), ['action' => 'delete', $xmfFuncionariosPresenceStatus->id], ['confirm' => __('Are you sure you want to delete # {0}?', $xmfFuncionariosPresenceStatus->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Xmf Funcionarios Presence Status'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Xmf Funcionarios Presence Status'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Xmf Presences References'), ['controller' => 'XmfPresencesReferences', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Xmf Presences Reference'), ['controller' => 'XmfPresencesReferences', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Xmf Casillas'), ['controller' => 'XmfCasillas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Xmf Casilla'), ['controller' => 'XmfCasillas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Xmf Partidos'), ['controller' => 'XmfPartidos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Xmf Partido'), ['controller' => 'XmfPartidos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="xmfFuncionariosPresenceStatus view large-9 medium-8 columns content">
    <h3><?= h($xmfFuncionariosPresenceStatus->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Xmf Presences Reference') ?></th>
            <td><?= $xmfFuncionariosPresenceStatus->has('xmf_presences_reference') ? $this->Html->link($xmfFuncionariosPresenceStatus->xmf_presences_reference->id, ['controller' => 'XmfPresencesReferences', 'action' => 'view', $xmfFuncionariosPresenceStatus->xmf_presences_reference->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Xmf Casilla') ?></th>
            <td><?= $xmfFuncionariosPresenceStatus->has('xmf_casilla') ? $this->Html->link($xmfFuncionariosPresenceStatus->xmf_casilla->name, ['controller' => 'XmfCasillas', 'action' => 'view', $xmfFuncionariosPresenceStatus->xmf_casilla->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Xmf Partido') ?></th>
            <td><?= $xmfFuncionariosPresenceStatus->has('xmf_partido') ? $this->Html->link($xmfFuncionariosPresenceStatus->xmf_partido->id, ['controller' => 'XmfPartidos', 'action' => 'view', $xmfFuncionariosPresenceStatus->xmf_partido->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($xmfFuncionariosPresenceStatus->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($xmfFuncionariosPresenceStatus->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Present') ?></th>
            <td><?= $xmfFuncionariosPresenceStatus->is_present ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Nombre') ?></h4>
        <?= $this->Text->autoParagraph(h($xmfFuncionariosPresenceStatus->nombre)); ?>
    </div>
    <div class="row">
        <h4><?= __('Descripcion') ?></h4>
        <?= $this->Text->autoParagraph(h($xmfFuncionariosPresenceStatus->descripcion)); ?>
    </div>
</div>
