<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\XmfReportsConfigDefinition[]|\Cake\Collection\CollectionInterface $xmfReportsConfigDefinitions
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Xmf Reports Config Definition'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Xmf Reports Definitions'), ['controller' => 'XmfReportsDefinitions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Xmf Reports Definition'), ['controller' => 'XmfReportsDefinitions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="xmfReportsConfigDefinitions index large-9 medium-8 columns content">
    <h3><?= __('Xmf Reports Config Definitions') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('xmf_reports_definitions_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('field_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($xmfReportsConfigDefinitions as $xmfReportsConfigDefinition): ?>
            <tr>
                <td><?= $this->Number->format($xmfReportsConfigDefinition->id) ?></td>
                <td><?= $xmfReportsConfigDefinition->has('xmf_reports_definition') ? $this->Html->link($xmfReportsConfigDefinition->xmf_reports_definition->name, ['controller' => 'XmfReportsDefinitions', 'action' => 'view', $xmfReportsConfigDefinition->xmf_reports_definition->id]) : '' ?></td>
                <td><?= h($xmfReportsConfigDefinition->field_name) ?></td>
                <td><?= h($xmfReportsConfigDefinition->created) ?></td>
                <td><?= h($xmfReportsConfigDefinition->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $xmfReportsConfigDefinition->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $xmfReportsConfigDefinition->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $xmfReportsConfigDefinition->id], ['confirm' => __('Are you sure you want to delete # {0}?', $xmfReportsConfigDefinition->id)]) ?>
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
