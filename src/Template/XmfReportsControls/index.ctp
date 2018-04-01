<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\XmfReportsControl[]|\Cake\Collection\CollectionInterface $xmfReportsControls
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Xmf Reports Control'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Xmf Reports'), ['controller' => 'XmfReports', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Xmf Report'), ['controller' => 'XmfReports', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Xmf Validations'), ['controller' => 'XmfValidations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Xmf Validation'), ['controller' => 'XmfValidations', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="xmfReportsControls index large-9 medium-8 columns content">
    <h3><?= __('Xmf Reports Controls') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('xmf_reports_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('xmf_users_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('xmf_roles_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('is_user_config') ?></th>
                <th scope="col"><?= $this->Paginator->sort('is_role_config') ?></th>
                <th scope="col"><?= $this->Paginator->sort('xmf_validations_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($xmfReportsControls as $xmfReportsControl): ?>
            <tr>
                <td><?= $this->Number->format($xmfReportsControl->id) ?></td>
                <td><?= $xmfReportsControl->has('xmf_report') ? $this->Html->link($xmfReportsControl->xmf_report->id, ['controller' => 'XmfReports', 'action' => 'view', $xmfReportsControl->xmf_report->id]) : '' ?></td>
                <td><?= $this->Number->format($xmfReportsControl->xmf_users_id) ?></td>
                <td><?= $this->Number->format($xmfReportsControl->xmf_roles_id) ?></td>
                <td><?= h($xmfReportsControl->is_user_config) ?></td>
                <td><?= h($xmfReportsControl->is_role_config) ?></td>
                <td><?= $xmfReportsControl->has('xmf_validation') ? $this->Html->link($xmfReportsControl->xmf_validation->id, ['controller' => 'XmfValidations', 'action' => 'view', $xmfReportsControl->xmf_validation->id]) : '' ?></td>
                <td><?= h($xmfReportsControl->created) ?></td>
                <td><?= h($xmfReportsControl->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $xmfReportsControl->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $xmfReportsControl->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $xmfReportsControl->id], ['confirm' => __('Are you sure you want to delete # {0}?', $xmfReportsControl->id)]) ?>
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
