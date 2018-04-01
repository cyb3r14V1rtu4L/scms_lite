<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\XmfTipoVotacione $xmfTipoVotacione
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $xmfTipoVotacione->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $xmfTipoVotacione->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Xmf Tipo Votaciones'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="xmfTipoVotaciones form large-9 medium-8 columns content">
    <?= $this->Form->create($xmfTipoVotacione) ?>
    <fieldset>
        <legend><?= __('Edit Xmf Tipo Votacione') ?></legend>
        <?php
            echo $this->Form->control('tipo');
            echo $this->Form->control('description');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
