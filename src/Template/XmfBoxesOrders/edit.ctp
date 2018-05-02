<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\XmfBoxesOrder $xmfBoxesOrder
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $xmfBoxesOrder->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $xmfBoxesOrder->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Xmf Boxes Orders'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Xmf Tipo Votaciones'), ['controller' => 'XmfTipoVotaciones', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Xmf Tipo Votacione'), ['controller' => 'XmfTipoVotaciones', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Xmf Boxes Blocks'), ['controller' => 'XmfBoxesBlocks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Xmf Boxes Block'), ['controller' => 'XmfBoxesBlocks', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="xmfBoxesOrders form large-9 medium-8 columns content">
    <?= $this->Form->create($xmfBoxesOrder) ?>
    <fieldset>
        <legend><?= __('Edit Xmf Boxes Order') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('formula');
            echo $this->Form->control('descripcion');
            echo $this->Form->control('xmf_partidos');
            echo $this->Form->control('xmf_tipo_votaciones_id', ['options' => $xmfTipoVotaciones, 'empty' => true]);
            echo $this->Form->control('order');
            echo $this->Form->control('partition');
            echo $this->Form->control('xmf_boxes_blocks_id', ['options' => $xmfBoxesBlocks, 'empty' => true]);
            echo $this->Form->control('status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
