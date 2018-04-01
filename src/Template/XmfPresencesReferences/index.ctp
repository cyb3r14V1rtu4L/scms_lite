<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\XmfPresencesReference[]|\Cake\Collection\CollectionInterface $xmfPresencesReferences
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Xmf Presences Reference'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Xmf Casillas'), ['controller' => 'XmfCasillas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Xmf Casilla'), ['controller' => 'XmfCasillas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Xmf Partidos'), ['controller' => 'XmfPartidos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Xmf Partido'), ['controller' => 'XmfPartidos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="xmfPresencesReferences index large-9 medium-8 columns content">
    <h3><?= __('Xmf Presences References') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('xmf_casillas_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('xmf_partidos_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('is_present') ?></th>
                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($xmfPresencesReferences as $xmfPresencesReference): ?>
            <tr>
                <td><?= $this->Number->format($xmfPresencesReference->id) ?></td>
                <td><?= $xmfPresencesReference->has('xmf_casilla') ? $this->Html->link($xmfPresencesReference->xmf_casilla->name, ['controller' => 'XmfCasillas', 'action' => 'view', $xmfPresencesReference->xmf_casilla->id]) : '' ?></td>
                <td><?= $xmfPresencesReference->has('xmf_partido') ? $this->Html->link($xmfPresencesReference->xmf_partido->id, ['controller' => 'XmfPartidos', 'action' => 'view', $xmfPresencesReference->xmf_partido->id]) : '' ?></td>
                <td><?= h($xmfPresencesReference->is_present) ?></td>
                <td><?= h($xmfPresencesReference->description) ?></td>
                <td><?= h($xmfPresencesReference->created) ?></td>
                <td><?= h($xmfPresencesReference->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $xmfPresencesReference->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $xmfPresencesReference->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $xmfPresencesReference->id], ['confirm' => __('Are you sure you want to delete # {0}?', $xmfPresencesReference->id)]) ?>
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
