<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\XmfPartido[]|\Cake\Collection\CollectionInterface $xmfPartidos
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Xmf Partido'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="xmfPartidos index large-9 medium-8 columns content">
    <h3><?= __('Xmf Partidos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('is_coalicion') ?></th>
                <th scope="col"><?= $this->Paginator->sort('has_parent') ?></th>
                <th scope="col"><?= $this->Paginator->sort('parent_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('is_funcionario') ?></th>
                <th scope="col"><?= $this->Paginator->sort('funcionario_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('funcionario_lastname') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($xmfPartidos as $xmfPartido): ?>
            <tr>
                <td><?= $this->Number->format($xmfPartido->id) ?></td>
                <td><?= h($xmfPartido->is_coalicion) ?></td>
                <td><?= h($xmfPartido->has_parent) ?></td>
                <td><?= $xmfPartido->has('parent_xmf_partido') ? $this->Html->link($xmfPartido->parent_xmf_partido->id, ['controller' => 'XmfPartidos', 'action' => 'view', $xmfPartido->parent_xmf_partido->id]) : '' ?></td>
                <td><?= h($xmfPartido->is_funcionario) ?></td>
                <td><?= h($xmfPartido->funcionario_name) ?></td>
                <td><?= h($xmfPartido->funcionario_lastname) ?></td>
                <td><?= h($xmfPartido->created) ?></td>
                <td><?= h($xmfPartido->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $xmfPartido->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $xmfPartido->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $xmfPartido->id], ['confirm' => __('Are you sure you want to delete # {0}?', $xmfPartido->id)]) ?>
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
