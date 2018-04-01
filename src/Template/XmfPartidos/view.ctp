<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\XmfPartido $xmfPartido
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Xmf Partido'), ['action' => 'edit', $xmfPartido->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Xmf Partido'), ['action' => 'delete', $xmfPartido->id], ['confirm' => __('Are you sure you want to delete # {0}?', $xmfPartido->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Xmf Partidos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Xmf Partido'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Parent Xmf Partidos'), ['controller' => 'XmfPartidos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Parent Xmf Partido'), ['controller' => 'XmfPartidos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Child Xmf Partidos'), ['controller' => 'XmfPartidos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Child Xmf Partido'), ['controller' => 'XmfPartidos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="xmfPartidos view large-9 medium-8 columns content">
    <h3><?= h($xmfPartido->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Parent Xmf Partido') ?></th>
            <td><?= $xmfPartido->has('parent_xmf_partido') ? $this->Html->link($xmfPartido->parent_xmf_partido->id, ['controller' => 'XmfPartidos', 'action' => 'view', $xmfPartido->parent_xmf_partido->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Funcionario Name') ?></th>
            <td><?= h($xmfPartido->funcionario_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Funcionario Lastname') ?></th>
            <td><?= h($xmfPartido->funcionario_lastname) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($xmfPartido->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($xmfPartido->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($xmfPartido->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Coalicion') ?></th>
            <td><?= $xmfPartido->is_coalicion ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Has Parent') ?></th>
            <td><?= $xmfPartido->has_parent ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Funcionario') ?></th>
            <td><?= $xmfPartido->is_funcionario ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Nombre') ?></h4>
        <?= $this->Text->autoParagraph(h($xmfPartido->nombre)); ?>
    </div>
    <div class="row">
        <h4><?= __('Formula') ?></h4>
        <?= $this->Text->autoParagraph(h($xmfPartido->formula)); ?>
    </div>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($xmfPartido->description)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Xmf Partidos') ?></h4>
        <?php if (!empty($xmfPartido->child_xmf_partidos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Nombre') ?></th>
                <th scope="col"><?= __('Formula') ?></th>
                <th scope="col"><?= __('Is Coalicion') ?></th>
                <th scope="col"><?= __('Has Parent') ?></th>
                <th scope="col"><?= __('Parent Id') ?></th>
                <th scope="col"><?= __('Is Funcionario') ?></th>
                <th scope="col"><?= __('Funcionario Name') ?></th>
                <th scope="col"><?= __('Funcionario Lastname') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($xmfPartido->child_xmf_partidos as $childXmfPartidos): ?>
            <tr>
                <td><?= h($childXmfPartidos->id) ?></td>
                <td><?= h($childXmfPartidos->nombre) ?></td>
                <td><?= h($childXmfPartidos->formula) ?></td>
                <td><?= h($childXmfPartidos->is_coalicion) ?></td>
                <td><?= h($childXmfPartidos->has_parent) ?></td>
                <td><?= h($childXmfPartidos->parent_id) ?></td>
                <td><?= h($childXmfPartidos->is_funcionario) ?></td>
                <td><?= h($childXmfPartidos->funcionario_name) ?></td>
                <td><?= h($childXmfPartidos->funcionario_lastname) ?></td>
                <td><?= h($childXmfPartidos->description) ?></td>
                <td><?= h($childXmfPartidos->created) ?></td>
                <td><?= h($childXmfPartidos->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'XmfPartidos', 'action' => 'view', $childXmfPartidos->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'XmfPartidos', 'action' => 'edit', $childXmfPartidos->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'XmfPartidos', 'action' => 'delete', $childXmfPartidos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $childXmfPartidos->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
