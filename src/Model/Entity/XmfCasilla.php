<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * XmfCasilla Entity
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $municipio
 * @property string $seccion
 * @property string $clave_agrupamiento
 * @property string $tipo_casilla
 * @property string $urbana
 * @property string $distrito
 * @property string $locacion
 * @property string $rg_casilla
 * @property string $rg_telefono
 * @property \Cake\I18n\Time $hora_instalacion
 * @property \Cake\I18n\Time $hora_inicio
 * @property \Cake\I18n\Time $hora_cierre
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified

 */
class XmfCasilla extends Entity
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
        'name' => true,
        'description' => true,
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
        'rg_casilla' => true,
        'rg_telefono' => true,
        'rc_telefono' => true,
        'created' => true,
        'modified' => true
    ];
}
