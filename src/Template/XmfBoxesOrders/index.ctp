<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\XmfBoxesOrder[]|\Cake\Collection\CollectionInterface $xmfBoxesOrders
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Xmf Boxes Order'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Xmf Tipo Votaciones'), ['controller' => 'XmfTipoVotaciones', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Xmf Tipo Votacione'), ['controller' => 'XmfTipoVotaciones', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Xmf Boxes Blocks'), ['controller' => 'XmfBoxesBlocks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Xmf Boxes Block'), ['controller' => 'XmfBoxesBlocks', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="xmfBoxesOrders index large-9 medium-8 columns content">
    <h3><?= __('Xmf Boxes Orders') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('xmf_partidos') ?></th>
                <th scope="col"><?= $this->Paginator->sort('xmf_tipo_votaciones_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('order') ?></th>
                <th scope="col"><?= $this->Paginator->sort('partition') ?></th>
                <th scope="col"><?= $this->Paginator->sort('xmf_boxes_blocks_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($xmfBoxesOrders as $xmfBoxesOrder): ?>
            <tr>
                <td><?= $this->Number->format($xmfBoxesOrder->id) ?></td>
                <td><?= $this->Number->format($xmfBoxesOrder->xmf_partidos) ?></td>
                <td><?= $xmfBoxesOrder->has('xmf_tipo_votacione') ? $this->Html->link($xmfBoxesOrder->xmf_tipo_votacione->id, ['controller' => 'XmfTipoVotaciones', 'action' => 'view', $xmfBoxesOrder->xmf_tipo_votacione->id]) : '' ?></td>
                <td><?= $this->Number->format($xmfBoxesOrder->order) ?></td>
                <td><?= $this->Number->format($xmfBoxesOrder->partition) ?></td>
                <td><?= $xmfBoxesOrder->has('xmf_boxes_block') ? $this->Html->link($xmfBoxesOrder->xmf_boxes_block->id, ['controller' => 'XmfBoxesBlocks', 'action' => 'view', $xmfBoxesOrder->xmf_boxes_block->id]) : '' ?></td>
                <td><?= h($xmfBoxesOrder->status) ?></td>
                <td><?= h($xmfBoxesOrder->created) ?></td>
                <td><?= h($xmfBoxesOrder->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $xmfBoxesOrder->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $xmfBoxesOrder->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $xmfBoxesOrder->id], ['confirm' => __('Are you sure you want to delete # {0}?', $xmfBoxesOrder->id)]) ?>
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
