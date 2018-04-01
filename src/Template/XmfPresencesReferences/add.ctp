<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\XmfPresencesReference $xmfPresencesReference
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Xmf Presences References'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Xmf Casillas'), ['controller' => 'XmfCasillas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Xmf Casilla'), ['controller' => 'XmfCasillas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Xmf Partidos'), ['controller' => 'XmfPartidos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Xmf Partido'), ['controller' => 'XmfPartidos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="xmfPresencesReferences form large-9 medium-8 columns content">
    <?= $this->Form->create($xmfPresencesReference) ?>
    <fieldset>
        <legend><?= __('Add Xmf Presences Reference') ?></legend>
        <?php
            echo $this->Form->control('xmf_casillas_id', ['options' => $xmfCasillas]);
            echo $this->Form->control('xmf_partidos_id', ['options' => $xmfPartidos]);
            echo $this->Form->control('is_present');
            echo $this->Form->control('description');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
