<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\XmfReportsDefinition $xmfReportsDefinition
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Xmf Reports Definitions'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="xmfReportsDefinitions form large-9 medium-8 columns content">
    <?= $this->Form->create($xmfReportsDefinition) ?>
    <fieldset>
        <legend><?= __('Add Xmf Reports Definition') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('description');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
