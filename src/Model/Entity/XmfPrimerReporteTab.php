<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * XmfPrimerReporteTab Entity
 *
 * @property int $xmf_casillas_id
 * @property string $name
 * @property string $rg_telefono
 * @property string $rc_telefono
 *
 * @property \App\Model\Entity\XmfCasilla $xmf_casilla
 */
class XmfPrimerReporteTab extends Entity
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
        'xmf_casillas_id' => true,
        'name' => true,
        'rg_telefono' => true,
        'rc_telefono' => true,
        'xmf_casilla' => true
    ];
}
