<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\XmfCasilla[]|\Cake\Collection\CollectionInterface $xmfCasillas
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Xmf Casilla'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="xmfCasillas index large-9 medium-8 columns content">
    <h3><?= __('Xmf Casillas') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                <th scope="col"><?= $this->Paginator->sort('clave_agrupamiento') ?></th>
                <th scope="col"><?= $this->Paginator->sort('hora_instalacion') ?></th>
                <th scope="col"><?= $this->Paginator->sort('hora_inicio') ?></th>
                <th scope="col"><?= $this->Paginator->sort('hora_cierre') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($xmfCasillas as $xmfCasilla): ?>
            <tr>
                <td><?= $this->Number->format($xmfCasilla->id) ?></td>
                <td><?= h($xmfCasilla->name) ?></td>
                <td><?= h($xmfCasilla->description) ?></td>
                <td><?= h($xmfCasilla->clave_agrupamiento) ?></td>
                <td><?= h($xmfCasilla->hora_instalacion) ?></td>
                <td><?= h($xmfCasilla->hora_inicio) ?></td>
                <td><?= h($xmfCasilla->hora_cierre) ?></td>
                <td><?= h($xmfCasilla->created) ?></td>
                <td><?= h($xmfCasilla->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $xmfCasilla->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $xmfCasilla->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $xmfCasilla->id], ['confirm' => __('Are you sure you want to delete # {0}?', $xmfCasilla->id)]) ?>
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
