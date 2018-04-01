<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\XmfValidationsConfig $xmfValidationsConfig
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Xmf Validations Configs'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="xmfValidationsConfigs form large-9 medium-8 columns content">
    <?= $this->Form->create($xmfValidationsConfig) ?>
    <fieldset>
        <legend><?= __('Add Xmf Validations Config') ?></legend>
        <?php
            echo $this->Form->control('top_level');
            echo $this->Form->control('role_id', ['options' => $roles, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
