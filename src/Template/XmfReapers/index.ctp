<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\XmfReaper[]|\Cake\Collection\CollectionInterface $xmfReapers
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Xmf Reaper'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Xmf Casillas'), ['controller' => 'XmfCasillas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Xmf Casilla'), ['controller' => 'XmfCasillas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Xmf Tipo Votaciones'), ['controller' => 'XmfTipoVotaciones', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Xmf Tipo Votacione'), ['controller' => 'XmfTipoVotaciones', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Xmf Partidos'), ['controller' => 'XmfPartidos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Xmf Partido'), ['controller' => 'XmfPartidos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="xmfReapers index large-9 medium-8 columns content">
    <h3><?= __('Xmf Reapers') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('casillas_index') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('clave_agrupamiento') ?></th>
                <th scope="col"><?= $this->Paginator->sort('hora_instalacion') ?></th>
                <th scope="col"><?= $this->Paginator->sort('hora_inicio') ?></th>
                <th scope="col"><?= $this->Paginator->sort('hora_cierre') ?></th>
                <th scope="col"><?= $this->Paginator->sort('is_coalicion') ?></th>
                <th scope="col"><?= $this->Paginator->sort('is_funcionario') ?></th>
                <th scope="col"><?= $this->Paginator->sort('has_parent') ?></th>
                <th scope="col"><?= $this->Paginator->sort('parent_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tipo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('xmf_casillas_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('xmf_tipo_votaciones_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('xmf_partidos_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('votes') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($xmfReapers as $xmfReaper): ?>
            <tr>
                <td><?= $this->Number->format($xmfReaper->casillas_index) ?></td>
                <td><?= h($xmfReaper->name) ?></td>
                <td><?= h($xmfReaper->clave_agrupamiento) ?></td>
                <td><?= h($xmfReaper->hora_instalacion) ?></td>
                <td><?= h($xmfReaper->hora_inicio) ?></td>
                <td><?= h($xmfReaper->hora_cierre) ?></td>
                <td><?= h($xmfReaper->is_coalicion) ?></td>
                <td><?= h($xmfReaper->is_funcionario) ?></td>
                <td><?= h($xmfReaper->has_parent) ?></td>
                <td><?= $xmfReaper->has('parent_xmf_reaper') ? $this->Html->link($xmfReaper->parent_xmf_reaper->name, ['controller' => 'XmfReapers', 'action' => 'view', $xmfReaper->parent_xmf_reaper->id]) : '' ?></td>
                <td><?= h($xmfReaper->tipo) ?></td>
                <td><?= $this->Number->format($xmfReaper->id) ?></td>
                <td><?= $xmfReaper->has('xmf_casilla') ? $this->Html->link($xmfReaper->xmf_casilla->name, ['controller' => 'XmfCasillas', 'action' => 'view', $xmfReaper->xmf_casilla->id]) : '' ?></td>
                <td><?= $xmfReaper->has('xmf_tipo_votacione') ? $this->Html->link($xmfReaper->xmf_tipo_votacione->id, ['controller' => 'XmfTipoVotaciones', 'action' => 'view', $xmfReaper->xmf_tipo_votacione->id]) : '' ?></td>
                <td><?= $xmfReaper->has('xmf_partido') ? $this->Html->link($xmfReaper->xmf_partido->id, ['controller' => 'XmfPartidos', 'action' => 'view', $xmfReaper->xmf_partido->id]) : '' ?></td>
                <td><?= $this->Number->format($xmfReaper->votes) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $xmfReaper->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $xmfReaper->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $xmfReaper->id], ['confirm' => __('Are you sure you want to delete # {0}?', $xmfReaper->id)]) ?>
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
