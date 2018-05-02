<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\XmfBoxesOrder $xmfBoxesOrder
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Xmf Boxes Order'), ['action' => 'edit', $xmfBoxesOrder->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Xmf Boxes Order'), ['action' => 'delete', $xmfBoxesOrder->id], ['confirm' => __('Are you sure you want to delete # {0}?', $xmfBoxesOrder->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Xmf Boxes Orders'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Xmf Boxes Order'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Xmf Tipo Votaciones'), ['controller' => 'XmfTipoVotaciones', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Xmf Tipo Votacione'), ['controller' => 'XmfTipoVotaciones', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Xmf Boxes Blocks'), ['controller' => 'XmfBoxesBlocks', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Xmf Boxes Block'), ['controller' => 'XmfBoxesBlocks', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="xmfBoxesOrders view large-9 medium-8 columns content">
    <h3><?= h($xmfBoxesOrder->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Xmf Tipo Votacione') ?></th>
            <td><?= $xmfBoxesOrder->has('xmf_tipo_votacione') ? $this->Html->link($xmfBoxesOrder->xmf_tipo_votacione->id, ['controller' => 'XmfTipoVotaciones', 'action' => 'view', $xmfBoxesOrder->xmf_tipo_votacione->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Xmf Boxes Block') ?></th>
            <td><?= $xmfBoxesOrder->has('xmf_boxes_block') ? $this->Html->link($xmfBoxesOrder->xmf_boxes_block->id, ['controller' => 'XmfBoxesBlocks', 'action' => 'view', $xmfBoxesOrder->xmf_boxes_block->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($xmfBoxesOrder->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Xmf Partidos') ?></th>
            <td><?= $this->Number->format($xmfBoxesOrder->xmf_partidos) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Order') ?></th>
            <td><?= $this->Number->format($xmfBoxesOrder->order) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Partition') ?></th>
            <td><?= $this->Number->format($xmfBoxesOrder->partition) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($xmfBoxesOrder->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($xmfBoxesOrder->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $xmfBoxesOrder->status ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Name') ?></h4>
        <?= $this->Text->autoParagraph(h($xmfBoxesOrder->name)); ?>
    </div>
    <div class="row">
        <h4><?= __('Formula') ?></h4>
        <?= $this->Text->autoParagraph(h($xmfBoxesOrder->formula)); ?>
    </div>
    <div class="row">
        <h4><?= __('Descripcion') ?></h4>
        <?= $this->Text->autoParagraph(h($xmfBoxesOrder->descripcion)); ?>
    </div>
</div>
