<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * 
 * XmfRerportsSegundoTercero
 *
 * @property int $id
 * @property int $xmf_casillas_id
 * @property int $votantes_segundo
 * @property int $promovidos_segundo
 * @property \Cake\I18n\Time $hr_voto_segundo
 * @property int $votantes_tercero
 * @property int $promovidos_tercero
 * @property \Cake\I18n\Time $hr_voto_tercero
 * @property bool $info_validada
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 */
class XmfRerportsSegundoTercero extends Entity
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
        'id' => true,
        'xmf_casillas_id' => true,
        'votantes_segundo' => true,
        'promovidos_segundo' => true,
        'hr_voto_segundo' => true,
        'votantes_tercero' => true,
        'promovidos_tercero' => true,
        'hr_voto_tercero' => true,
        'info_validada' => true,
        'created' => true,
        'modified' => true,
    ];
}
