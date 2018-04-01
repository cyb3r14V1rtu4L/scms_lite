<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\XmfValidationsLog $xmfValidationsLog
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Xmf Validations Log'), ['action' => 'edit', $xmfValidationsLog->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Xmf Validations Log'), ['action' => 'delete', $xmfValidationsLog->id], ['confirm' => __('Are you sure you want to delete # {0}?', $xmfValidationsLog->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Xmf Validations Logs'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Xmf Validations Log'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Xmf Reports'), ['controller' => 'XmfReports', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Xmf Report'), ['controller' => 'XmfReports', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Xmf Validations'), ['controller' => 'XmfValidations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Xmf Validation'), ['controller' => 'XmfValidations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Xmf Validations Configs'), ['controller' => 'XmfValidationsConfigs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Xmf Validations Config'), ['controller' => 'XmfValidationsConfigs', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="xmfValidationsLogs view large-9 medium-8 columns content">
    <h3><?= h($xmfValidationsLog->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Xmf Report') ?></th>
            <td><?= $xmfValidationsLog->has('xmf_report') ? $this->Html->link($xmfValidationsLog->xmf_report->id, ['controller' => 'XmfReports', 'action' => 'view', $xmfValidationsLog->xmf_report->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Xmf Validation') ?></th>
            <td><?= $xmfValidationsLog->has('xmf_validation') ? $this->Html->link($xmfValidationsLog->xmf_validation->id, ['controller' => 'XmfValidations', 'action' => 'view', $xmfValidationsLog->xmf_validation->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Xmf Validations Config') ?></th>
            <td><?= $xmfValidationsLog->has('xmf_validations_config') ? $this->Html->link($xmfValidationsLog->xmf_validations_config->id, ['controller' => 'XmfValidationsConfigs', 'action' => 'view', $xmfValidationsLog->xmf_validations_config->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($xmfValidationsLog->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Level') ?></th>
            <td><?= $this->Number->format($xmfValidationsLog->level) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($xmfValidationsLog->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($xmfValidationsLog->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Level Validation') ?></th>
            <td><?= $xmfValidationsLog->level_validation ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
