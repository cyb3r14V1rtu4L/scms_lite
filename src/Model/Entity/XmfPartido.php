<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * XmfPartido Entity
 *
 * @property int $id
 * @property string $nombre
 * @property string $formula
 * @property bool $is_coalicion
 * @property bool $has_parent
 * @property int $parent_id
 * @property bool $is_funcionario
 * @property string $funcionario_name
 * @property string $funcionario_lastname
 * @property string $description
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\ParentXmfPartido $parent_xmf_partido
 * @property \App\Model\Entity\ChildXmfPartido[] $child_xmf_partidos
 */
class XmfPartido extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'nombre' => true,
        'formula' => true,
        'is_coalicion' => true,
        'has_parent' => true,
        'parent_id' => true,
        'is_funcionario' => true,
        'funcionario_name' => true,
        'funcionario_lastname' => true,
        'description' => true,
        'created' => true,
        'modified' => true,
        'parent_xmf_partido' => true,
        'child_xmf_partidos' => true
    ];
}
