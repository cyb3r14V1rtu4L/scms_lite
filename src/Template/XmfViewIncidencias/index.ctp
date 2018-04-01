<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\XmfViewIncidencia[]|\Cake\Collection\CollectionInterface $xmfViewIncidencias
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Xmf View Incidencia'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Xmf Incidencias'), ['controller' => 'XmfIncidencias', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Xmf Incidencia'), ['controller' => 'XmfIncidencias', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="xmfViewIncidencias index large-9 medium-8 columns content">
    <h3><?= __('Xmf View Incidencias') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('casillas_index') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('clave_agrupamiento') ?></th>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('xmf_incidencias_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($xmfViewIncidencias as $xmfViewIncidencia): ?>
            <tr>
                <td><?= $this->Number->format($xmfViewIncidencia->casillas_index) ?></td>
                <td><?= h($xmfViewIncidencia->name) ?></td>
                <td><?= h($xmfViewIncidencia->clave_agrupamiento) ?></td>
                <td><?= $this->Number->format($xmfViewIncidencia->id) ?></td>
                <td><?= $xmfViewIncidencia->has('xmf_incidencia') ? $this->Html->link($xmfViewIncidencia->xmf_incidencia->id, ['controller' => 'XmfIncidencias', 'action' => 'view', $xmfViewIncidencia->xmf_incidencia->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $xmfViewIncidencia->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $xmfViewIncidencia->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $xmfViewIncidencia->id], ['confirm' => __('Are you sure you want to delete # {0}?', $xmfViewIncidencia->id)]) ?>
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
