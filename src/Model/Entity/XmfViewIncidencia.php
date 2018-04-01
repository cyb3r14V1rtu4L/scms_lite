<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * XmfViewIncidencia Entity
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
 * @property string $nombre
 * @property string $formula
 * @property int $id
 * @property int $xmf_incidencias_id
 * @property string $otra
 * @property string $titulo
 * @property string $descripcion
 *
 * @property \App\Model\Entity\XmfIncidencia $xmf_incidencia
 */
class XmfViewIncidencia extends Entity
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
        'nombre' => true,
        'formula' => true,
        'id' => true,
        'xmf_incidencias_id' => true,
        'otra' => true,
        'titulo' => true,
        'descripcion' => true,
        'xmf_incidencia' => true
    ];
}
