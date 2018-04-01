<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\XmfReportsControl $xmfReportsControl
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $xmfReportsControl->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $xmfReportsControl->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Xmf Reports Controls'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Xmf Reports'), ['controller' => 'XmfReports', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Xmf Report'), ['controller' => 'XmfReports', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Xmf Validations'), ['controller' => 'XmfValidations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Xmf Validation'), ['controller' => 'XmfValidations', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="xmfReportsControls form large-9 medium-8 columns content">
    <?= $this->Form->create($xmfReportsControl) ?>
    <fieldset>
        <legend><?= __('Edit Xmf Reports Control') ?></legend>
        <?php
            echo $this->Form->control('xmf_reports_id', ['options' => $xmfReports]);
            echo $this->Form->control('xmf_users_id');
            echo $this->Form->control('xmf_roles_id');
            echo $this->Form->control('is_user_config');
            echo $this->Form->control('is_role_config');
            echo $this->Form->control('xmf_validations_id', ['options' => $xmfValidations]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
