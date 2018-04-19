<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\XmfViewReporteSegundosTercero[]|\Cake\Collection\CollectionInterface $xmfViewReporteSegundosTerceros
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Xmf View Reporte Segundos Tercero'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Xmf Casillas'), ['controller' => 'XmfCasillas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Xmf Casilla'), ['controller' => 'XmfCasillas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="xmfViewReporteSegundosTerceros index large-9 medium-8 columns content">
    <h3><?= __('Xmf View Reporte Segundos Terceros') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('xmf_casillas_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('votantes_segundo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('promovidos_segundo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('votantes_tercero') ?></th>
                <th scope="col"><?= $this->Paginator->sort('promovidos_tercero') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($xmfViewReporteSegundosTerceros as $xmfViewReporteSegundosTercero): ?>
            <tr>
                <td><?= $xmfViewReporteSegundosTercero->has('xmf_casilla') ? $this->Html->link($xmfViewReporteSegundosTercero->xmf_casilla->name, ['controller' => 'XmfCasillas', 'action' => 'view', $xmfViewReporteSegundosTercero->xmf_casilla->id]) : '' ?></td>
                <td><?= $this->Number->format($xmfViewReporteSegundosTercero->votantes_segundo) ?></td>
                <td><?= $this->Number->format($xmfViewReporteSegundosTercero->promovidos_segundo) ?></td>
                <td><?= $this->Number->format($xmfViewReporteSegundosTercero->votantes_tercero) ?></td>
                <td><?= $this->Number->format($xmfViewReporteSegundosTercero->promovidos_tercero) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $xmfViewReporteSegundosTercero->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $xmfViewReporteSegundosTercero->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $xmfViewReporteSegundosTercero->id], ['confirm' => __('Are you sure you want to delete # {0}?', $xmfViewReporteSegundosTercero->id)]) ?>
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
