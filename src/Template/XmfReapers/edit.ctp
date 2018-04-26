<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\XmfReaper $xmfReaper
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $xmfReaper->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $xmfReaper->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Xmf Reapers'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Parent Xmf Reapers'), ['controller' => 'XmfReapers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Parent Xmf Reaper'), ['controller' => 'XmfReapers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Xmf Casillas'), ['controller' => 'XmfCasillas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Xmf Casilla'), ['controller' => 'XmfCasillas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Xmf Tipo Votaciones'), ['controller' => 'XmfTipoVotaciones', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Xmf Tipo Votacione'), ['controller' => 'XmfTipoVotaciones', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Xmf Partidos'), ['controller' => 'XmfPartidos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Xmf Partido'), ['controller' => 'XmfPartidos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="xmfReapers form large-9 medium-8 columns content">
    <?= $this->Form->create($xmfReaper) ?>
    <fieldset>
        <legend><?= __('Edit Xmf Reaper') ?></legend>
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
            echo $this->Form->control('hora_instalacion', ['empty' => true]);
            echo $this->Form->control('hora_inicio', ['empty' => true]);
            echo $this->Form->control('hora_cierre', ['empty' => true]);
            echo $this->Form->control('nombre');
            echo $this->Form->control('formula');
            echo $this->Form->control('is_coalicion');
            echo $this->Form->control('is_funcionario');
            echo $this->Form->control('has_parent');
            echo $this->Form->control('parent_id', ['options' => $parentXmfReapers, 'empty' => true]);
            echo $this->Form->control('tipo');
            echo $this->Form->control('xmf_casillas_id', ['options' => $xmfCasillas, 'empty' => true]);
            echo $this->Form->control('xmf_tipo_votaciones_id', ['options' => $xmfTipoVotaciones, 'empty' => true]);
            echo $this->Form->control('xmf_partidos_id', ['options' => $xmfPartidos, 'empty' => true]);
            echo $this->Form->control('votes');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
