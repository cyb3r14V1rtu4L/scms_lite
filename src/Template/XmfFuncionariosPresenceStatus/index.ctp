<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\XmfFuncionariosPresenceStatus[]|\Cake\Collection\CollectionInterface $xmfFuncionariosPresenceStatus
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Xmf Funcionarios Presence Status'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Xmf Presences References'), ['controller' => 'XmfPresencesReferences', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Xmf Presences Reference'), ['controller' => 'XmfPresencesReferences', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Xmf Casillas'), ['controller' => 'XmfCasillas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Xmf Casilla'), ['controller' => 'XmfCasillas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Xmf Partidos'), ['controller' => 'XmfPartidos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Xmf Partido'), ['controller' => 'XmfPartidos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="xmfFuncionariosPresenceStatus index large-9 medium-8 columns content">
    <h3><?= __('Xmf Funcionarios Presence Status') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('xmf_presences_references_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('xmf_casillas_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('xmf_partidos_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('is_present') ?></th>
                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($xmfFuncionariosPresenceStatus as $xmfFuncionariosPresenceStatus): ?>
            <tr>
                <td><?= $this->Number->format($xmfFuncionariosPresenceStatus->id) ?></td>
                <td><?= $xmfFuncionariosPresenceStatus->has('xmf_presences_reference') ? $this->Html->link($xmfFuncionariosPresenceStatus->xmf_presences_reference->id, ['controller' => 'XmfPresencesReferences', 'action' => 'view', $xmfFuncionariosPresenceStatus->xmf_presences_reference->id]) : '' ?></td>
                <td><?= $xmfFuncionariosPresenceStatus->has('xmf_casilla') ? $this->Html->link($xmfFuncionariosPresenceStatus->xmf_casilla->name, ['controller' => 'XmfCasillas', 'action' => 'view', $xmfFuncionariosPresenceStatus->xmf_casilla->id]) : '' ?></td>
                <td><?= $xmfFuncionariosPresenceStatus->has('xmf_partido') ? $this->Html->link($xmfFuncionariosPresenceStatus->xmf_partido->id, ['controller' => 'XmfPartidos', 'action' => 'view', $xmfFuncionariosPresenceStatus->xmf_partido->id]) : '' ?></td>
                <td><?= h($xmfFuncionariosPresenceStatus->is_present) ?></td>
                <td><?= h($xmfFuncionariosPresenceStatus->description) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $xmfFuncionariosPresenceStatus->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $xmfFuncionariosPresenceStatus->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $xmfFuncionariosPresenceStatus->id], ['confirm' => __('Are you sure you want to delete # {0}?', $xmfFuncionariosPresenceStatus->id)]) ?>
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
