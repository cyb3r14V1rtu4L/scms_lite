<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * XmfValidationsLog Entity
 *
 * @property int $id
 * @property int $xmf_reports_id
 * @property int $xmf_validations_id
 * @property int $xmf_validations_configs_id
 * @property int $level
 * @property bool $level_validation
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\XmfReport $xmf_report
 * @property \App\Model\Entity\XmfValidation $xmf_validation
 * @property \App\Model\Entity\XmfValidationsConfig $xmf_validations_config
 */
class XmfValidationsLog extends Entity
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
        'xmf_reports_id' => true,
        'xmf_validations_id' => true,
        'xmf_validations_configs_id' => true,
        'level' => true,
        'level_validation' => true,
        'created' => true,
        'modified' => true,
        'xmf_report' => true,
        'xmf_validation' => true,
        'xmf_validations_config' => true
    ];
}
