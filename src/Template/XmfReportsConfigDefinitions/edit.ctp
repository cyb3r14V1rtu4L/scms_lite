<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\XmfReportsConfigDefinition $xmfReportsConfigDefinition
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $xmfReportsConfigDefinition->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $xmfReportsConfigDefinition->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Xmf Reports Config Definitions'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Xmf Reports Definitions'), ['controller' => 'XmfReportsDefinitions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Xmf Reports Definition'), ['controller' => 'XmfReportsDefinitions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="xmfReportsConfigDefinitions form large-9 medium-8 columns content">
    <?= $this->Form->create($xmfReportsConfigDefinition) ?>
    <fieldset>
        <legend><?= __('Edit Xmf Reports Config Definition') ?></legend>
        <?php
            echo $this->Form->control('xmf_reports_definitions_id', ['options' => $xmfReportsDefinitions]);
            echo $this->Form->control('field_name');
            echo $this->Form->control('description');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
