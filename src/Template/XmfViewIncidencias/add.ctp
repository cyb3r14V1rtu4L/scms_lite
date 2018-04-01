<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\XmfViewIncidencia $xmfViewIncidencia
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Xmf View Incidencias'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Xmf Incidencias'), ['controller' => 'XmfIncidencias', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Xmf Incidencia'), ['controller' => 'XmfIncidencias', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="xmfViewIncidencias form large-9 medium-8 columns content">
    <?= $this->Form->create($xmfViewIncidencia) ?>
    <fieldset>
        <legend><?= __('Add Xmf View Incidencia') ?></legend>
        <?php
            echo $this->Form->control('casillas_index');
            echo $this->Form->control('name');
            echo $this->Form->control('municipio');
            echo $this->Form->control('seccion');
            echo $this->Form->control('clave_agrupamiento');
            echo $this->Form->control('tipo_casilla');
            echo $this->Form->control('urbana');
            echo $this->Form->control('distrito');
            echo $this->Form->control('locacion');
            echo $this->Form->control('nombre');
            echo $this->Form->control('formula');
            echo $this->Form->control('xmf_incidencias_id', ['options' => $xmfIncidencias, 'empty' => true]);
            echo $this->Form->control('otra');
            echo $this->Form->control('titulo');
            echo $this->Form->control('descripcion');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
