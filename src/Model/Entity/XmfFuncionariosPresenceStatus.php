<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * XmfFuncionariosPresenceStatus Entity
 *
 * @property int $id
 * @property int $xmf_presences_references_id
 * @property int $xmf_casillas_id
 * @property int $xmf_partidos_id
 * @property bool $is_present
 * @property string $description
 * @property string $nombre
 * @property string $descripcion
 *
 * @property \App\Model\Entity\XmfPresencesReference $xmf_presences_reference
 * @property \App\Model\Entity\XmfCasilla $xmf_casilla
 * @property \App\Model\Entity\XmfPartido $xmf_partido
 */
class XmfFuncionariosPresenceStatus extends Entity
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
        'xmf_presences_references_id' => true,
        'xmf_casillas_id' => true,
        'xmf_partidos_id' => true,
        'is_present' => true,
        'description' => true,
        'nombre' => true,
        'descripcion' => true,
        'xmf_presences_reference' => true,
        'xmf_casilla' => true,
        'xmf_partido' => true
    ];
}
