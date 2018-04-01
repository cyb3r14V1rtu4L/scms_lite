<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\XmfPartidosIncidencia $xmfPartidosIncidencia
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $xmfPartidosIncidencia->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $xmfPartidosIncidencia->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Xmf Partidos Incidencias'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Xmf Casillas'), ['controller' => 'XmfCasillas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Xmf Casilla'), ['controller' => 'XmfCasillas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Xmf Partidos'), ['controller' => 'XmfPartidos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Xmf Partido'), ['controller' => 'XmfPartidos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Xmf Incidencias'), ['controller' => 'XmfIncidencias', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Xmf Incidencia'), ['controller' => 'XmfIncidencias', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="xmfPartidosIncidencias form large-9 medium-8 columns content">
    <?= $this->Form->create($xmfPartidosIncidencia) ?>
    <fieldset>
        <legend><?= __('Edit Xmf Partidos Incidencia') ?></legend>
        <?php
            echo $this->Form->control('xmf_casillas_id', ['options' => $xmfCasillas, 'empty' => true]);
            echo $this->Form->control('xmf_partidos_id', ['options' => $xmfPartidos, 'empty' => true]);
            echo $this->Form->control('xmf_incidencias_id', ['options' => $xmfIncidencias, 'empty' => true]);
            echo $this->Form->control('otra');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
