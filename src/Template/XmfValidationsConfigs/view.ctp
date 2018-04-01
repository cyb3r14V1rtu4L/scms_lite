<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\XmfValidationsConfig $xmfValidationsConfig
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Xmf Validations Config'), ['action' => 'edit', $xmfValidationsConfig->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Xmf Validations Config'), ['action' => 'delete', $xmfValidationsConfig->id], ['confirm' => __('Are you sure you want to delete # {0}?', $xmfValidationsConfig->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Xmf Validations Configs'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Xmf Validations Config'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="xmfValidationsConfigs view large-9 medium-8 columns content">
    <h3><?= h($xmfValidationsConfig->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Role') ?></th>
            <td><?= $xmfValidationsConfig->has('role') ? $this->Html->link($xmfValidationsConfig->role->name, ['controller' => 'Roles', 'action' => 'view', $xmfValidationsConfig->role->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($xmfValidationsConfig->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Top Level') ?></th>
            <td><?= $this->Number->format($xmfValidationsConfig->top_level) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($xmfValidationsConfig->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($xmfValidationsConfig->modified) ?></td>
        </tr>
    </table>
</div>
