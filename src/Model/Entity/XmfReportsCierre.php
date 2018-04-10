<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * 
 * XmfRerportsCierre
 *
 * @property int $id
 * @property int $xmf_casillas_id
 * @property \Cake\I18n\Time $hr_cierre
 * @property bool $habia_gente_fila
 * @property int $votantes
 * @property int $promovidos
 * @property bool $info_validada
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * 
 * 
 *
 */
class XmfRerportsCierre extends Entity
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
        'hr_cierre' => true,
        'habia_gente_fila' => true,
        'votantes' => true,
        'promovidos' => true,
        'info_validada' => true,
        'created' => true,
        'modified' => true,
    ];
}
