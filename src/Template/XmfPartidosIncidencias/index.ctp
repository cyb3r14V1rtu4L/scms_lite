<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\XmfPartidosIncidencia[]|\Cake\Collection\CollectionInterface $xmfPartidosIncidencias
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Xmf Partidos Incidencia'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Xmf Casillas'), ['controller' => 'XmfCasillas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Xmf Casilla'), ['controller' => 'XmfCasillas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Xmf Partidos'), ['controller' => 'XmfPartidos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Xmf Partido'), ['controller' => 'XmfPartidos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Xmf Incidencias'), ['controller' => 'XmfIncidencias', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Xmf Incidencia'), ['controller' => 'XmfIncidencias', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="xmfPartidosIncidencias index large-9 medium-8 columns content">
    <h3><?= __('Xmf Partidos Incidencias') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('xmf_casillas_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('xmf_partidos_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('xmf_incidencias_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($xmfPartidosIncidencias as $xmfPartidosIncidencia): ?>
            <tr>
                <td><?= $this->Number->format($xmfPartidosIncidencia->id) ?></td>
                <td><?= $xmfPartidosIncidencia->has('xmf_casilla') ? $this->Html->link($xmfPartidosIncidencia->xmf_casilla->name, ['controller' => 'XmfCasillas', 'action' => 'view', $xmfPartidosIncidencia->xmf_casilla->id]) : '' ?></td>
                <td><?= $xmfPartidosIncidencia->has('xmf_partido') ? $this->Html->link($xmfPartidosIncidencia->xmf_partido->id, ['controller' => 'XmfPartidos', 'action' => 'view', $xmfPartidosIncidencia->xmf_partido->id]) : '' ?></td>
                <td><?= $xmfPartidosIncidencia->has('xmf_incidencia') ? $this->Html->link($xmfPartidosIncidencia->xmf_incidencia->id, ['controller' => 'XmfIncidencias', 'action' => 'view', $xmfPartidosIncidencia->xmf_incidencia->id]) : '' ?></td>
                <td><?= h($xmfPartidosIncidencia->created) ?></td>
                <td><?= h($xmfPartidosIncidencia->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $xmfPartidosIncidencia->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $xmfPartidosIncidencia->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $xmfPartidosIncidencia->id], ['confirm' => __('Are you sure you want to delete # {0}?', $xmfPartidosIncidencia->id)]) ?>
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
