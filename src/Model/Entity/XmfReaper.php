<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * XmfReaper Entity
 *
 * @property int $casillas_index
 * @property string $name
 * @property string $municipio
 * @property string $seccion
 * @property string $clave_agrupamiento
 * @property string $tipo_casilla
 * @property string $urbana
 * @property string $distrito
 * @property string $locacion
 * @property \Cake\I18n\Time $hora_instalacion
 * @property \Cake\I18n\Time $hora_inicio
 * @property \Cake\I18n\Time $hora_cierre
 * @property string $nombre
 * @property string $formula
 * @property bool $is_coalicion
 * @property bool $is_funcionario
 * @property bool $has_parent
 * @property int $parent_id
 * @property string $tipo
 * @property int $id
 * @property int $xmf_casillas_id
 * @property int $xmf_tipo_votaciones_id
 * @property int $xmf_partidos_id
 * @property int $votes
 *
 * @property \App\Model\Entity\XmfReaper $parent_xmf_reaper
 * @property \App\Model\Entity\XmfCasilla $xmf_casilla
 * @property \App\Model\Entity\XmfTipoVotacione $xmf_tipo_votacione
 * @property \App\Model\Entity\XmfPartido $xmf_partido
 * @property \App\Model\Entity\XmfReaper[] $child_xmf_reapers
 */
class XmfReaper extends Entity
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
        'casillas_index' => true,
        'name' => true,
        'municipio' => true,
        'seccion' => true,
        'clave_agrupamiento' => true,
        'tipo_casilla' => true,
        'urbana' => true,
        'distrito' => true,
        'locacion' => true,
        'hora_instalacion' => true,
        'hora_inicio' => true,
        'hora_cierre' => true,
        'nombre' => true,
        'formula' => true,
        'is_coalicion' => true,
        'is_funcionario' => true,
        'has_parent' => true,
        'parent_id' => true,
        'tipo' => true,
        'id' => true,
        'xmf_casillas_id' => true,
        'xmf_tipo_votaciones_id' => true,
        'xmf_partidos_id' => true,
        'votes' => true,
        'parent_xmf_reaper' => true,
        'xmf_casilla' => true,
        'xmf_tipo_votacione' => true,
        'xmf_partido' => true,
        'child_xmf_reapers' => true
    ];
}
