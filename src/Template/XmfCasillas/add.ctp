<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\XmfCasilla $xmfCasilla
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Xmf Casillas'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="xmfCasillas form large-9 medium-8 columns content">
    <?= $this->Form->create($xmfCasilla) ?>
    <fieldset>
        <legend><?= __('Add Xmf Casilla') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('description');
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
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
