<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\XmfValidation[]|\Cake\Collection\CollectionInterface $xmfValidations
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Xmf Validation'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="xmfValidations index large-9 medium-8 columns content">
    <h3><?= __('Xmf Validations') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('reports_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('level') ?></th>
                <th scope="col"><?= $this->Paginator->sort('level_validation') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($xmfValidations as $xmfValidation): ?>
            <tr>
                <td><?= $this->Number->format($xmfValidation->id) ?></td>
                <td><?= $this->Number->format($xmfValidation->reports_id) ?></td>
                <td><?= $this->Number->format($xmfValidation->level) ?></td>
                <td><?= h($xmfValidation->level_validation) ?></td>
                <td><?= h($xmfValidation->created) ?></td>
                <td><?= h($xmfValidation->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $xmfValidation->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $xmfValidation->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $xmfValidation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $xmfValidation->id)]) ?>
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
