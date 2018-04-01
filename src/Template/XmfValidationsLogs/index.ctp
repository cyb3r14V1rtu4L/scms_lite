<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\XmfValidationsLog[]|\Cake\Collection\CollectionInterface $xmfValidationsLogs
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Xmf Validations Log'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Xmf Reports'), ['controller' => 'XmfReports', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Xmf Report'), ['controller' => 'XmfReports', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Xmf Validations'), ['controller' => 'XmfValidations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Xmf Validation'), ['controller' => 'XmfValidations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Xmf Validations Configs'), ['controller' => 'XmfValidationsConfigs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Xmf Validations Config'), ['controller' => 'XmfValidationsConfigs', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="xmfValidationsLogs index large-9 medium-8 columns content">
    <h3><?= __('Xmf Validations Logs') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('xmf_reports_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('xmf_validations_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('xmf_validations_configs_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('level') ?></th>
                <th scope="col"><?= $this->Paginator->sort('level_validation') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($xmfValidationsLogs as $xmfValidationsLog): ?>
            <tr>
                <td><?= $this->Number->format($xmfValidationsLog->id) ?></td>
                <td><?= $xmfValidationsLog->has('xmf_report') ? $this->Html->link($xmfValidationsLog->xmf_report->id, ['controller' => 'XmfReports', 'action' => 'view', $xmfValidationsLog->xmf_report->id]) : '' ?></td>
                <td><?= $xmfValidationsLog->has('xmf_validation') ? $this->Html->link($xmfValidationsLog->xmf_validation->id, ['controller' => 'XmfValidations', 'action' => 'view', $xmfValidationsLog->xmf_validation->id]) : '' ?></td>
                <td><?= $xmfValidationsLog->has('xmf_validations_config') ? $this->Html->link($xmfValidationsLog->xmf_validations_config->id, ['controller' => 'XmfValidationsConfigs', 'action' => 'view', $xmfValidationsLog->xmf_validations_config->id]) : '' ?></td>
                <td><?= $this->Number->format($xmfValidationsLog->level) ?></td>
                <td><?= h($xmfValidationsLog->level_validation) ?></td>
                <td><?= h($xmfValidationsLog->created) ?></td>
                <td><?= h($xmfValidationsLog->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $xmfValidationsLog->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $xmfValidationsLog->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $xmfValidationsLog->id], ['confirm' => __('Are you sure you want to delete # {0}?', $xmfValidationsLog->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
