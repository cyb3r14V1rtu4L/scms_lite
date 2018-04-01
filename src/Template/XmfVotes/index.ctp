<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\XmfVote[]|\Cake\Collection\CollectionInterface $xmfVotes
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Xmf Vote'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Xmf Casillas'), ['controller' => 'XmfCasillas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Xmf Casilla'), ['controller' => 'XmfCasillas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Xmf Tipo Votaciones'), ['controller' => 'XmfTipoVotaciones', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Xmf Tipo Votacione'), ['controller' => 'XmfTipoVotaciones', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Xmf Partidos'), ['controller' => 'XmfPartidos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Xmf Partido'), ['controller' => 'XmfPartidos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="xmfVotes index large-9 medium-8 columns content">
    <h3><?= __('Xmf Votes') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('xmf_casillas_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('xmf_tipo_votaciones_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('xmf_partidos_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('votes') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($xmfVotes as $xmfVote): ?>
            <tr>
                <td><?= $this->Number->format($xmfVote->id) ?></td>
                <td><?= $xmfVote->has('xmf_casilla') ? $this->Html->link($xmfVote->xmf_casilla->name, ['controller' => 'XmfCasillas', 'action' => 'view', $xmfVote->xmf_casilla->id]) : '' ?></td>
                <td><?= $xmfVote->has('xmf_tipo_votacione') ? $this->Html->link($xmfVote->xmf_tipo_votacione->id, ['controller' => 'XmfTipoVotaciones', 'action' => 'view', $xmfVote->xmf_tipo_votacione->id]) : '' ?></td>
                <td><?= $xmfVote->has('xmf_partido') ? $this->Html->link($xmfVote->xmf_partido->id, ['controller' => 'XmfPartidos', 'action' => 'view', $xmfVote->xmf_partido->id]) : '' ?></td>
                <td><?= $this->Number->format($xmfVote->votes) ?></td>
                <td><?= h($xmfVote->created) ?></td>
                <td><?= h($xmfVote->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $xmfVote->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $xmfVote->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $xmfVote->id], ['confirm' => __('Are you sure you want to delete # {0}?', $xmfVote->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
