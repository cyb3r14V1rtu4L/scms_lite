<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\XmfPartido $xmfPartido
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $xmfPartido->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $xmfPartido->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Xmf Partidos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Parent Xmf Partidos'), ['controller' => 'XmfPartidos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Parent Xmf Partido'), ['controller' => 'XmfPartidos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="xmfPartidos form large-9 medium-8 columns content">
    <?= $this->Form->create($xmfPartido) ?>
    <fieldset>
        <legend><?= __('Edit Xmf Partido') ?></legend>
        <?php
            echo $this->Form->control('nombre');
            echo $this->Form->control('formula');
            echo $this->Form->control('is_coalicion');
            echo $this->Form->control('has_parent');
            echo $this->Form->control('parent_id', ['options' => $parentXmfPartidos, 'empty' => true]);
            echo $this->Form->control('is_funcionario');
            echo $this->Form->control('funcionario_name');
            echo $this->Form->control('funcionario_lastname');
            echo $this->Form->control('description');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
