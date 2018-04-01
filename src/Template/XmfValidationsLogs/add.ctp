<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\XmfValidationsLog $xmfValidationsLog
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Xmf Validations Logs'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Xmf Reports'), ['controller' => 'XmfReports', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Xmf Report'), ['controller' => 'XmfReports', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Xmf Validations'), ['controller' => 'XmfValidations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Xmf Validation'), ['controller' => 'XmfValidations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Xmf Validations Configs'), ['controller' => 'XmfValidationsConfigs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Xmf Validations Config'), ['controller' => 'XmfValidationsConfigs', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="xmfValidationsLogs form large-9 medium-8 columns content">
    <?= $this->Form->create($xmfValidationsLog) ?>
    <fieldset>
        <legend><?= __('Add Xmf Validations Log') ?></legend>
        <?php
            echo $this->Form->control('xmf_reports_id', ['options' => $xmfReports]);
            echo $this->Form->control('xmf_validations_id', ['options' => $xmfValidations]);
            echo $this->Form->control('xmf_validations_configs_id', ['options' => $xmfValidationsConfigs]);
            echo $this->Form->control('level');
            echo $this->Form->control('level_validation');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
