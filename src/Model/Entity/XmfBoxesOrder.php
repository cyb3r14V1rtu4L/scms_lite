<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * XmfBoxesOrder Entity
 *
 * @property int $id
 * @property string $name
 * @property string $formula
 * @property string $descripcion
 * @property int $xmf_partidos
 * @property int $xmf_tipo_votaciones_id
 * @property int $order
 * @property int $partition
 * @property int $xmf_boxes_blocks_id
 * @property bool $status
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\XmfTipoVotacione $xmf_tipo_votacione
 * @property \App\Model\Entity\XmfBoxesBlock $xmf_boxes_block
 */
class XmfBoxesOrder extends Entity
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
        'formula' => true,
        'descripcion' => true,
        'xmf_partidos' => true,
        'xmf_tipo_votaciones_id' => true,
        'order' => true,
        'partition' => true,
        'xmf_boxes_blocks_id' => true,
        'status' => true,
        'created' => true,
        'modified' => true,
        'xmf_tipo_votacione' => true,
        'xmf_boxes_block' => true
    ];
}
