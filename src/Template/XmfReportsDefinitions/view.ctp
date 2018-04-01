<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\XmfReportsDefinition $xmfReportsDefinition
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Xmf Reports Definition'), ['action' => 'edit', $xmfReportsDefinition->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Xmf Reports Definition'), ['action' => 'delete', $xmfReportsDefinition->id], ['confirm' => __('Are you sure you want to delete # {0}?', $xmfReportsDefinition->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Xmf Reports Definitions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Xmf Reports Definition'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="xmfReportsDefinitions view large-9 medium-8 columns content">
    <h3><?= h($xmfReportsDefinition->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($xmfReportsDefinition->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($xmfReportsDefinition->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($xmfReportsDefinition->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($xmfReportsDefinition->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($xmfReportsDefinition->description)); ?>
    </div>
</div>
