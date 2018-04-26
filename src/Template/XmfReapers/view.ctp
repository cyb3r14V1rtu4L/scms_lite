<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\XmfReaper $xmfReaper
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Xmf Reaper'), ['action' => 'edit', $xmfReaper->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Xmf Reaper'), ['action' => 'delete', $xmfReaper->id], ['confirm' => __('Are you sure you want to delete # {0}?', $xmfReaper->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Xmf Reapers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Xmf Reaper'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Parent Xmf Reapers'), ['controller' => 'XmfReapers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Parent Xmf Reaper'), ['controller' => 'XmfReapers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Xmf Casillas'), ['controller' => 'XmfCasillas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Xmf Casilla'), ['controller' => 'XmfCasillas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Xmf Tipo Votaciones'), ['controller' => 'XmfTipoVotaciones', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Xmf Tipo Votacione'), ['controller' => 'XmfTipoVotaciones', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Xmf Partidos'), ['controller' => 'XmfPartidos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Xmf Partido'), ['controller' => 'XmfPartidos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Child Xmf Reapers'), ['controller' => 'XmfReapers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Child Xmf Reaper'), ['controller' => 'XmfReapers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="xmfReapers view large-9 medium-8 columns content">
    <h3><?= h($xmfReaper->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($xmfReaper->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Clave Agrupamiento') ?></th>
            <td><?= h($xmfReaper->clave_agrupamiento) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Parent Xmf Reaper') ?></th>
            <td><?= $xmfReaper->has('parent_xmf_reaper') ? $this->Html->link($xmfReaper->parent_xmf_reaper->name, ['controller' => 'XmfReapers', 'action' => 'view', $xmfReaper->parent_xmf_reaper->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tipo') ?></th>
            <td><?= h($xmfReaper->tipo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Xmf Casilla') ?></th>
            <td><?= $xmfReaper->has('xmf_casilla') ? $this->Html->link($xmfReaper->xmf_casilla->name, ['controller' => 'XmfCasillas', 'action' => 'view', $xmfReaper->xmf_casilla->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Xmf Tipo Votacione') ?></th>
            <td><?= $xmfReaper->has('xmf_tipo_votacione') ? $this->Html->link($xmfReaper->xmf_tipo_votacione->id, ['controller' => 'XmfTipoVotaciones', 'action' => 'view', $xmfReaper->xmf_tipo_votacione->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Xmf Partido') ?></th>
            <td><?= $xmfReaper->has('xmf_partido') ? $this->Html->link($xmfReaper->xmf_partido->id, ['controller' => 'XmfPartidos', 'action' => 'view', $xmfReaper->xmf_partido->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Casillas Index') ?></th>
            <td><?= $this->Number->format($xmfReaper->casillas_index) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($xmfReaper->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Votes') ?></th>
            <td><?= $this->Number->format($xmfReaper->votes) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Hora Instalacion') ?></th>
            <td><?= h($xmfReaper->hora_instalacion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Hora Inicio') ?></th>
            <td><?= h($xmfReaper->hora_inicio) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Hora Cierre') ?></th>
            <td><?= h($xmfReaper->hora_cierre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Coalicion') ?></th>
            <td><?= $xmfReaper->is_coalicion ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Funcionario') ?></th>
            <td><?= $xmfReaper->is_funcionario ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Has Parent') ?></th>
            <td><?= $xmfReaper->has_parent ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Municipio') ?></h4>
        <?= $this->Text->autoParagraph(h($xmfReaper->municipio)); ?>
    </div>
    <div class="row">
        <h4><?= __('Seccion') ?></h4>
        <?= $this->Text->autoParagraph(h($xmfReaper->seccion)); ?>
    </div>
    <div class="row">
        <h4><?= __('Tipo Casilla') ?></h4>
        <?= $this->Text->autoParagraph(h($xmfReaper->tipo_casilla)); ?>
    </div>
    <div class="row">
        <h4><?= __('Urbana') ?></h4>
        <?= $this->Text->autoParagraph(h($xmfReaper->urbana)); ?>
    </div>
    <div class="row">
        <h4><?= __('Distrito') ?></h4>
        <?= $this->Text->autoParagraph(h($xmfReaper->distrito)); ?>
    </div>
    <div class="row">
        <h4><?= __('Locacion') ?></h4>
        <?= $this->Text->autoParagraph(h($xmfReaper->locacion)); ?>
    </div>
    <div class="row">
        <h4><?= __('Nombre') ?></h4>
        <?= $this->Text->autoParagraph(h($xmfReaper->nombre)); ?>
    </div>
    <div class="row">
        <h4><?= __('Formula') ?></h4>
        <?= $this->Text->autoParagraph(h($xmfReaper->formula)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Xmf Reapers') ?></h4>
        <?php if (!empty($xmfReaper->child_xmf_reapers)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Casillas Index') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Municipio') ?></th>
                <th scope="col"><?= __('Seccion') ?></th>
                <th scope="col"><?= __('Clave Agrupamiento') ?></th>
                <th scope="col"><?= __('Tipo Casilla') ?></th>
                <th scope="col"><?= __('Urbana') ?></th>
                <th scope="col"><?= __('Distrito') ?></th>
                <th scope="col"><?= __('Locacion') ?></th>
                <th scope="col"><?= __('Hora Instalacion') ?></th>
                <th scope="col"><?= __('Hora Inicio') ?></th>
                <th scope="col"><?= __('Hora Cierre') ?></th>
                <th scope="col"><?= __('Nombre') ?></th>
                <th scope="col"><?= __('Formula') ?></th>
                <th scope="col"><?= __('Is Coalicion') ?></th>
                <th scope="col"><?= __('Is Funcionario') ?></th>
                <th scope="col"><?= __('Has Parent') ?></th>
                <th scope="col"><?= __('Parent Id') ?></th>
                <th scope="col"><?= __('Tipo') ?></th>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Xmf Casillas Id') ?></th>
                <th scope="col"><?= __('Xmf Tipo Votaciones Id') ?></th>
                <th scope="col"><?= __('Xmf Partidos Id') ?></th>
                <th scope="col"><?= __('Votes') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($xmfReaper->child_xmf_reapers as $childXmfReapers): ?>
            <tr>
                <td><?= h($childXmfReapers->casillas_index) ?></td>
                <td><?= h($childXmfReapers->name) ?></td>
                <td><?= h($childXmfReapers->municipio) ?></td>
                <td><?= h($childXmfReapers->seccion) ?></td>
                <td><?= h($childXmfReapers->clave_agrupamiento) ?></td>
                <td><?= h($childXmfReapers->tipo_casilla) ?></td>
                <td><?= h($childXmfReapers->urbana) ?></td>
                <td><?= h($childXmfReapers->distrito) ?></td>
                <td><?= h($childXmfReapers->locacion) ?></td>
                <td><?= h($childXmfReapers->hora_instalacion) ?></td>
                <td><?= h($childXmfReapers->hora_inicio) ?></td>
                <td><?= h($childXmfReapers->hora_cierre) ?></td>
                <td><?= h($childXmfReapers->nombre) ?></td>
                <td><?= h($childXmfReapers->formula) ?></td>
                <td><?= h($childXmfReapers->is_coalicion) ?></td>
                <td><?= h($childXmfReapers->is_funcionario) ?></td>
                <td><?= h($childXmfReapers->has_parent) ?></td>
                <td><?= h($childXmfReapers->parent_id) ?></td>
                <td><?= h($childXmfReapers->tipo) ?></td>
                <td><?= h($childXmfReapers->id) ?></td>
                <td><?= h($childXmfReapers->xmf_casillas_id) ?></td>
                <td><?= h($childXmfReapers->xmf_tipo_votaciones_id) ?></td>
                <td><?= h($childXmfReapers->xmf_partidos_id) ?></td>
                <td><?= h($childXmfReapers->votes) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'XmfReapers', 'action' => 'view', $childXmfReapers->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'XmfReapers', 'action' => 'edit', $childXmfReapers->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'XmfReapers', 'action' => 'delete', $childXmfReapers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $childXmfReapers->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
