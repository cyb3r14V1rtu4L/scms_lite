<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $xmfReportsSegundoTercero
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Xmf Reports Segundo Tercero'), ['action' => 'edit', $xmfReportsSegundoTercero->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Xmf Reports Segundo Tercero'), ['action' => 'delete', $xmfReportsSegundoTercero->id], ['confirm' => __('Are you sure you want to delete # {0}?', $xmfReportsSegundoTercero->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Xmf Reports Segundo Tercero'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Xmf Reports Segundo Tercero'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="xmfReportsSegundoTercero view large-9 medium-8 columns content">
    <h3><?= h($xmfReportsSegundoTercero->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($xmfReportsSegundoTercero->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Votantes Segundo') ?></th>
            <td><?= $this->Number->format($xmfReportsSegundoTercero->votantes_segundo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Promovidos Segundo') ?></th>
            <td><?= $this->Number->format($xmfReportsSegundoTercero->promovidos_segundo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Votantes Tercero') ?></th>
            <td><?= $this->Number->format($xmfReportsSegundoTercero->votantes_tercero) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Promovidos Tercero') ?></th>
            <td><?= $this->Number->format($xmfReportsSegundoTercero->promovidos_tercero) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Info Validada') ?></th>
            <td><?= $this->Number->format($xmfReportsSegundoTercero->info_validada) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Xmf Casillas Id') ?></th>
            <td><?= $this->Number->format($xmfReportsSegundoTercero->xmf_casillas_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Hr Voto Segundo') ?></th>
            <td><?= h($xmfReportsSegundoTercero->hr_voto_segundo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Hr Voto Tercero') ?></th>
            <td><?= h($xmfReportsSegundoTercero->hr_voto_tercero) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($xmfReportsSegundoTercero->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($xmfReportsSegundoTercero->modified) ?></td>
        </tr>
    </table>
</div>
