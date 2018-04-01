<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * XmfPresence Entity
 *
 * @property int $id
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
 * @property string $description
 * @property bool $is_present
 */
class XmfPresence extends Entity
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
        'description' => true,
        'is_present' => true
    ];
}
