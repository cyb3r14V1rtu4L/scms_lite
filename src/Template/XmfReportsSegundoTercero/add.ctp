<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $xmfReportsSegundoTercero
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Xmf Reports Segundo Tercero'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="xmfReportsSegundoTercero form large-9 medium-8 columns content">
    <?= $this->Form->create($xmfReportsSegundoTercero) ?>
    <fieldset>
        <legend><?= __('Add Xmf Reports Segundo Tercero') ?></legend>
        <?php
            echo $this->Form->control('votantes_segundo');
            echo $this->Form->control('promovidos_segundo');
            echo $this->Form->control('hr_voto_segundo', ['empty' => true]);
            echo $this->Form->control('votantes_tercero');
            echo $this->Form->control('promovidos_tercero');
            echo $this->Form->control('hr_voto_tercero', ['empty' => true]);
            echo $this->Form->control('info_validada');
            echo $this->Form->control('xmf_casillas_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
