<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\XmfPresencesReference $xmfPresencesReference
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Xmf Presences Reference'), ['action' => 'edit', $xmfPresencesReference->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Xmf Presences Reference'), ['action' => 'delete', $xmfPresencesReference->id], ['confirm' => __('Are you sure you want to delete # {0}?', $xmfPresencesReference->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Xmf Presences References'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Xmf Presences Reference'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Xmf Casillas'), ['controller' => 'XmfCasillas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Xmf Casilla'), ['controller' => 'XmfCasillas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Xmf Partidos'), ['controller' => 'XmfPartidos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Xmf Partido'), ['controller' => 'XmfPartidos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="xmfPresencesReferences view large-9 medium-8 columns content">
    <h3><?= h($xmfPresencesReference->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Xmf Casilla') ?></th>
            <td><?= $xmfPresencesReference->has('xmf_casilla') ? $this->Html->link($xmfPresencesReference->xmf_casilla->name, ['controller' => 'XmfCasillas', 'action' => 'view', $xmfPresencesReference->xmf_casilla->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Xmf Partido') ?></th>
            <td><?= $xmfPresencesReference->has('xmf_partido') ? $this->Html->link($xmfPresencesReference->xmf_partido->id, ['controller' => 'XmfPartidos', 'action' => 'view', $xmfPresencesReference->xmf_partido->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($xmfPresencesReference->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($xmfPresencesReference->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($xmfPresencesReference->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($xmfPresencesReference->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Present') ?></th>
            <td><?= $xmfPresencesReference->is_present ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
