<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\XmfIncidencia $xmfIncidencia
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Xmf Incidencias'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="xmfIncidencias form large-9 medium-8 columns content">
    <?= $this->Form->create($xmfIncidencia) ?>
    <fieldset>
        <legend><?= __('Add Xmf Incidencia') ?></legend>
        <?php
            echo $this->Form->control('titulo');
            echo $this->Form->control('descripcion');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
