<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\XmfPresence[]|\Cake\Collection\CollectionInterface $xmfPresences
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Xmf Presence'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="xmfPresences index large-9 medium-8 columns content">
    <h3><?= __('Xmf Presences') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('casillas_index') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('clave_agrupamiento') ?></th>
                <th scope="col"><?= $this->Paginator->sort('hora_instalacion') ?></th>
                <th scope="col"><?= $this->Paginator->sort('hora_inicio') ?></th>
                <th scope="col"><?= $this->Paginator->sort('hora_cierre') ?></th>
                <th scope="col"><?= $this->Paginator->sort('is_present') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($xmfPresences as $xmfPresence): ?>
            <tr>
                <td><?= $this->Number->format($xmfPresence->id) ?></td>
                <td><?= $this->Number->format($xmfPresence->casillas_index) ?></td>
                <td><?= h($xmfPresence->name) ?></td>
                <td><?= h($xmfPresence->clave_agrupamiento) ?></td>
                <td><?= h($xmfPresence->hora_instalacion) ?></td>
                <td><?= h($xmfPresence->hora_inicio) ?></td>
                <td><?= h($xmfPresence->hora_cierre) ?></td>
                <td><?= h($xmfPresence->is_present) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $xmfPresence->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $xmfPresence->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $xmfPresence->id], ['confirm' => __('Are you sure you want to delete # {0}?', $xmfPresence->id)]) ?>
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
