<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\XmfValidationsConfig[]|\Cake\Collection\CollectionInterface $xmfValidationsConfigs
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Xmf Validations Config'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="xmfValidationsConfigs index large-9 medium-8 columns content">
    <h3><?= __('Xmf Validations Configs') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('top_level') ?></th>
                <th scope="col"><?= $this->Paginator->sort('role_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($xmfValidationsConfigs as $xmfValidationsConfig): ?>
            <tr>
                <td><?= $this->Number->format($xmfValidationsConfig->id) ?></td>
                <td><?= $this->Number->format($xmfValidationsConfig->top_level) ?></td>
                <td><?= $xmfValidationsConfig->has('role') ? $this->Html->link($xmfValidationsConfig->role->name, ['controller' => 'Roles', 'action' => 'view', $xmfValidationsConfig->role->id]) : '' ?></td>
                <td><?= h($xmfValidationsConfig->created) ?></td>
                <td><?= h($xmfValidationsConfig->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $xmfValidationsConfig->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $xmfValidationsConfig->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $xmfValidationsConfig->id], ['confirm' => __('Are you sure you want to delete # {0}?', $xmfValidationsConfig->id)]) ?>
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
