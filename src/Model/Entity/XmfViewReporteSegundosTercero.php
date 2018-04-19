<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * XmfViewReporteSegundosTercero Entity
 *
 * @property int $xmf_casillas_id
 * @property string $name
 * @property float $votantes_segundo
 * @property float $promovidos_segundo
 * @property float $votantes_tercero
 * @property float $promovidos_tercero
 *
 * @property \App\Model\Entity\XmfCasilla $xmf_casilla
 */
class XmfViewReporteSegundosTercero extends Entity
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
        'votantes_segundo' => true,
        'promovidos_segundo' => true,
        'votantes_tercero' => true,
        'promovidos_tercero' => true,
        'xmf_casilla' => true
    ];
}
