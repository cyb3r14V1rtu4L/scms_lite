<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\XmfVote $xmfVote
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Xmf Vote'), ['action' => 'edit', $xmfVote->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Xmf Vote'), ['action' => 'delete', $xmfVote->id], ['confirm' => __('Are you sure you want to delete # {0}?', $xmfVote->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Xmf Votes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Xmf Vote'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Xmf Casillas'), ['controller' => 'XmfCasillas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Xmf Casilla'), ['controller' => 'XmfCasillas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Xmf Tipo Votaciones'), ['controller' => 'XmfTipoVotaciones', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Xmf Tipo Votacione'), ['controller' => 'XmfTipoVotaciones', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Xmf Partidos'), ['controller' => 'XmfPartidos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Xmf Partido'), ['controller' => 'XmfPartidos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="xmfVotes view large-9 medium-8 columns content">
    <h3><?= h($xmfVote->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Xmf Casilla') ?></th>
            <td><?= $xmfVote->has('xmf_casilla') ? $this->Html->link($xmfVote->xmf_casilla->name, ['controller' => 'XmfCasillas', 'action' => 'view', $xmfVote->xmf_casilla->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Xmf Tipo Votacione') ?></th>
            <td><?= $xmfVote->has('xmf_tipo_votacione') ? $this->Html->link($xmfVote->xmf_tipo_votacione->id, ['controller' => 'XmfTipoVotaciones', 'action' => 'view', $xmfVote->xmf_tipo_votacione->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Xmf Partido') ?></th>
            <td><?= $xmfVote->has('xmf_partido') ? $this->Html->link($xmfVote->xmf_partido->id, ['controller' => 'XmfPartidos', 'action' => 'view', $xmfVote->xmf_partido->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($xmfVote->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Votes') ?></th>
            <td><?= $this->Number->format($xmfVote->votes) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($xmfVote->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($xmfVote->modified) ?></td>
        </tr>
    </table>
</div>
