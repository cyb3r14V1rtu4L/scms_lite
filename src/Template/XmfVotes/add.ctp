<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\XmfVote $xmfVote
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Xmf Votes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Xmf Casillas'), ['controller' => 'XmfCasillas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Xmf Casilla'), ['controller' => 'XmfCasillas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Xmf Tipo Votaciones'), ['controller' => 'XmfTipoVotaciones', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Xmf Tipo Votacione'), ['controller' => 'XmfTipoVotaciones', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Xmf Partidos'), ['controller' => 'XmfPartidos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Xmf Partido'), ['controller' => 'XmfPartidos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="xmfVotes form large-9 medium-8 columns content">
    <?= $this->Form->create($xmfVote) ?>
    <fieldset>
        <legend><?= __('Add Xmf Vote') ?></legend>
        <?php
            echo $this->Form->control('xmf_casillas_id', ['options' => $xmfCasillas]);
            echo $this->Form->control('xmf_tipo_votaciones_id', ['options' => $xmfTipoVotaciones]);
            echo $this->Form->control('xmf_partidos_id', ['options' => $xmfPartidos]);
            echo $this->Form->control('votes');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
