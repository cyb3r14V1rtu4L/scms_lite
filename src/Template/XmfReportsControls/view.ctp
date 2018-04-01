<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\XmfReportsControl $xmfReportsControl
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Xmf Reports Control'), ['action' => 'edit', $xmfReportsControl->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Xmf Reports Control'), ['action' => 'delete', $xmfReportsControl->id], ['confirm' => __('Are you sure you want to delete # {0}?', $xmfReportsControl->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Xmf Reports Controls'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Xmf Reports Control'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Xmf Reports'), ['controller' => 'XmfReports', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Xmf Report'), ['controller' => 'XmfReports', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Xmf Validations'), ['controller' => 'XmfValidations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Xmf Validation'), ['controller' => 'XmfValidations', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="xmfReportsControls view large-9 medium-8 columns content">
    <h3><?= h($xmfReportsControl->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Xmf Report') ?></th>
            <td><?= $xmfReportsControl->has('xmf_report') ? $this->Html->link($xmfReportsControl->xmf_report->id, ['controller' => 'XmfReports', 'action' => 'view', $xmfReportsControl->xmf_report->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Xmf Validation') ?></th>
            <td><?= $xmfReportsControl->has('xmf_validation') ? $this->Html->link($xmfReportsControl->xmf_validation->id, ['controller' => 'XmfValidations', 'action' => 'view', $xmfReportsControl->xmf_validation->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($xmfReportsControl->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Xmf Users Id') ?></th>
            <td><?= $this->Number->format($xmfReportsControl->xmf_users_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Xmf Roles Id') ?></th>
            <td><?= $this->Number->format($xmfReportsControl->xmf_roles_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($xmfReportsControl->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($xmfReportsControl->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is User Config') ?></th>
            <td><?= $xmfReportsControl->is_user_config ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Role Config') ?></th>
            <td><?= $xmfReportsControl->is_role_config ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
