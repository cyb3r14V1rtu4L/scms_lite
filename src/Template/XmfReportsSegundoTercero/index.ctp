<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface[]|\Cake\Collection\CollectionInterface $xmfReportsSegundoTercero
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Xmf Reports Segundo Tercero'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="xmfReportsSegundoTercero index large-9 medium-8 columns content">
    <h3><?= __('Xmf Reports Segundo Tercero') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('votantes_segundo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('promovidos_segundo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('hr_voto_segundo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('votantes_tercero') ?></th>
                <th scope="col"><?= $this->Paginator->sort('promovidos_tercero') ?></th>
                <th scope="col"><?= $this->Paginator->sort('hr_voto_tercero') ?></th>
                <th scope="col"><?= $this->Paginator->sort('info_validada') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('xmf_casillas_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($xmfReportsSegundoTercero as $xmfReportsSegundoTercero): ?>
            <tr>
                <td><?= $this->Number->format($xmfReportsSegundoTercero->id) ?></td>
                <td><?= $this->Number->format($xmfReportsSegundoTercero->votantes_segundo) ?></td>
                <td><?= $this->Number->format($xmfReportsSegundoTercero->promovidos_segundo) ?></td>
                <td><?= h($xmfReportsSegundoTercero->hr_voto_segundo) ?></td>
                <td><?= $this->Number->format($xmfReportsSegundoTercero->votantes_tercero) ?></td>
                <td><?= $this->Number->format($xmfReportsSegundoTercero->promovidos_tercero) ?></td>
                <td><?= h($xmfReportsSegundoTercero->hr_voto_tercero) ?></td>
                <td><?= $this->Number->format($xmfReportsSegundoTercero->info_validada) ?></td>
                <td><?= h($xmfReportsSegundoTercero->created) ?></td>
                <td><?= h($xmfReportsSegundoTercero->modified) ?></td>
                <td><?= $this->Number->format($xmfReportsSegundoTercero->xmf_casillas_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $xmfReportsSegundoTercero->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $xmfReportsSegundoTercero->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $xmfReportsSegundoTercero->id], ['confirm' => __('Are you sure you want to delete # {0}?', $xmfReportsSegundoTercero->id)]) ?>
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
