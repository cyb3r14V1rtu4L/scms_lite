<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * XmfReportsControl Entity
 *
 * @property int $id
 * @property int $xmf_reports_id
 * @property int $xmf_users_id
 * @property int $xmf_roles_id
 * @property bool $is_user_config
 * @property bool $is_role_config
 * @property int $xmf_validations_id
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\XmfReport $xmf_report
 * @property \App\Model\Entity\XmfUser $xmf_user
 * @property \App\Model\Entity\XmfRole $xmf_role
 * @property \App\Model\Entity\XmfValidation $xmf_validation
 */
class XmfReportsControl extends Entity
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
        'xmf_users_id' => true,
        'xmf_roles_id' => true,
        'is_user_config' => true,
        'is_role_config' => true,
        'xmf_validations_id' => true,
        'created' => true,
        'modified' => true,
        'xmf_report' => true,
        'xmf_user' => true,
        'xmf_role' => true,
        'xmf_validation' => true
    ];
}
