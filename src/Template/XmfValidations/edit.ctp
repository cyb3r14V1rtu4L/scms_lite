<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\XmfValidation $xmfValidation
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $xmfValidation->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $xmfValidation->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Xmf Validations'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="xmfValidations form large-9 medium-8 columns content">
    <?= $this->Form->create($xmfValidation) ?>
    <fieldset>
        <legend><?= __('Edit Xmf Validation') ?></legend>
        <?php
            echo $this->Form->control('reports_id');
            echo $this->Form->control('level');
            echo $this->Form->control('level_validation');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
