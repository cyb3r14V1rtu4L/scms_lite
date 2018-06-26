<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * XmfPrimerReporte Entity
 *
 * @property string $representante
 * @property int $xmf_casillas_id
 * @property string $nombre
 * @property int $bloque
 * @property int $orden
 * @property bool $is_present
 * @property string $casilla
 * @property bool $lugar_indicado
 * @property bool $gente_fila
 * @property string $nombres_fila
 *
 * @property \App\Model\Entity\XmfCasilla $xmf_casilla
 */
class XmfPrimerReporte extends Entity
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
        'representante' => true,
        'xmf_casillas_id' => true,
        'nombre' => true,
        'bloque' => true,
        'orden' => true,
        'is_present' => true,
        'casilla' => true,
        'lugar_indicado' => true,
        'gente_fila' => true,
        'nombres_fila' => true,
        'xmf_casilla' => true
    ];
}
