<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * XmfReportsConfigDefinition Entity
 *
 * @property int $id
 * @property int $xmf_reports_definitions_id
 * @property string $field_name
 * @property string $description
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\XmfReportsDefinition $xmf_reports_definition
 */
class XmfReportsConfigDefinition extends Entity
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
        'xmf_reports_definitions_id' => true,
        'field_name' => true,
        'description' => true,
        'created' => true,
        'modified' => true,
        'xmf_reports_definition' => true
    ];
}
