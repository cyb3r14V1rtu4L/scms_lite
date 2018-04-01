<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\XmfReportsConfigDefinition $xmfReportsConfigDefinition
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Xmf Reports Config Definition'), ['action' => 'edit', $xmfReportsConfigDefinition->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Xmf Reports Config Definition'), ['action' => 'delete', $xmfReportsConfigDefinition->id], ['confirm' => __('Are you sure you want to delete # {0}?', $xmfReportsConfigDefinition->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Xmf Reports Config Definitions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Xmf Reports Config Definition'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Xmf Reports Definitions'), ['controller' => 'XmfReportsDefinitions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Xmf Reports Definition'), ['controller' => 'XmfReportsDefinitions', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="xmfReportsConfigDefinitions view large-9 medium-8 columns content">
    <h3><?= h($xmfReportsConfigDefinition->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Xmf Reports Definition') ?></th>
            <td><?= $xmfReportsConfigDefinition->has('xmf_reports_definition') ? $this->Html->link($xmfReportsConfigDefinition->xmf_reports_definition->name, ['controller' => 'XmfReportsDefinitions', 'action' => 'view', $xmfReportsConfigDefinition->xmf_reports_definition->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Field Name') ?></th>
            <td><?= h($xmfReportsConfigDefinition->field_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($xmfReportsConfigDefinition->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($xmfReportsConfigDefinition->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($xmfReportsConfigDefinition->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($xmfReportsConfigDefinition->description)); ?>
    </div>
</div>
