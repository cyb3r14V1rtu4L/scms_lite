<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\XmfFuncionariosPresenceStatus $xmfFuncionariosPresenceStatus
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $xmfFuncionariosPresenceStatus->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $xmfFuncionariosPresenceStatus->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Xmf Funcionarios Presence Status'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Xmf Presences References'), ['controller' => 'XmfPresencesReferences', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Xmf Presences Reference'), ['controller' => 'XmfPresencesReferences', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Xmf Casillas'), ['controller' => 'XmfCasillas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Xmf Casilla'), ['controller' => 'XmfCasillas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Xmf Partidos'), ['controller' => 'XmfPartidos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Xmf Partido'), ['controller' => 'XmfPartidos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="xmfFuncionariosPresenceStatus form large-9 medium-8 columns content">
    <?= $this->Form->create($xmfFuncionariosPresenceStatus) ?>
    <fieldset>
        <legend><?= __('Edit Xmf Funcionarios Presence Status') ?></legend>
        <?php
            echo $this->Form->control('xmf_presences_references_id', ['options' => $xmfPresencesReferences]);
            echo $this->Form->control('xmf_casillas_id', ['options' => $xmfCasillas]);
            echo $this->Form->control('xmf_partidos_id', ['options' => $xmfPartidos]);
            echo $this->Form->control('is_present');
            echo $this->Form->control('description');
            echo $this->Form->control('nombre');
            echo $this->Form->control('descripcion');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
