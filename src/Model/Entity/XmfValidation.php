<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * XmfValidation Entity
 *
 * @property int $id
 * @property int $reports_id
 * @property int $level
 * @property bool $level_validation
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\Report $report
 */
class XmfValidation extends Entity
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
        'reports_id' => true,
        'level' => true,
        'level_validation' => true,
        'created' => true,
        'modified' => true,
        'report' => true
    ];
}
