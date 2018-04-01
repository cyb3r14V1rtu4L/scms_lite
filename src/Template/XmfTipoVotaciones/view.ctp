<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\XmfTipoVotacione $xmfTipoVotacione
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Xmf Tipo Votacione'), ['action' => 'edit', $xmfTipoVotacione->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Xmf Tipo Votacione'), ['action' => 'delete', $xmfTipoVotacione->id], ['confirm' => __('Are you sure you want to delete # {0}?', $xmfTipoVotacione->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Xmf Tipo Votaciones'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Xmf Tipo Votacione'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="xmfTipoVotaciones view large-9 medium-8 columns content">
    <h3><?= h($xmfTipoVotacione->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Tipo') ?></th>
            <td><?= h($xmfTipoVotacione->tipo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($xmfTipoVotacione->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($xmfTipoVotacione->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($xmfTipoVotacione->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($xmfTipoVotacione->description)); ?>
    </div>
</div>
