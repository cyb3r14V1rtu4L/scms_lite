<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\XmfValidation $xmfValidation
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Xmf Validation'), ['action' => 'edit', $xmfValidation->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Xmf Validation'), ['action' => 'delete', $xmfValidation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $xmfValidation->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Xmf Validations'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Xmf Validation'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="xmfValidations view large-9 medium-8 columns content">
    <h3><?= h($xmfValidation->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($xmfValidation->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Reports Id') ?></th>
            <td><?= $this->Number->format($xmfValidation->reports_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Level') ?></th>
            <td><?= $this->Number->format($xmfValidation->level) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($xmfValidation->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($xmfValidation->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Level Validation') ?></th>
            <td><?= $xmfValidation->level_validation ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
