<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * XmfReportsControls Model
 *
 * @property \App\Model\Table\XmfReportsTable|\Cake\ORM\Association\BelongsTo $XmfReports
 * @property \App\Model\Table\XmfUsersTable|\Cake\ORM\Association\BelongsTo $XmfUsers
 * @property \App\Model\Table\XmfRolesTable|\Cake\ORM\Association\BelongsTo $XmfRoles
 * @property \App\Model\Table\XmfValidationsTable|\Cake\ORM\Association\BelongsTo $XmfValidations
 *
 * @method \App\Model\Entity\XmfReportsControl get($primaryKey, $options = [])
 * @method \App\Model\Entity\XmfReportsControl newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\XmfReportsControl[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\XmfReportsControl|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\XmfReportsControl patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\XmfReportsControl[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\XmfReportsControl findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class XmfReportsControlsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('xmf_reports_controls');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('XmfReports', [
            'foreignKey' => 'xmf_reports_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('XmfUsers', [
            'foreignKey' => 'xmf_users_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('XmfRoles', [
            'foreignKey' => 'xmf_roles_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('XmfValidations', [
            'foreignKey' => 'xmf_validations_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->boolean('is_user_config')
            ->allowEmpty('is_user_config');

        $validator
            ->boolean('is_role_config')
            ->allowEmpty('is_role_config');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['xmf_reports_id'], 'XmfReports'));
        $rules->add($rules->existsIn(['xmf_users_id'], 'XmfUsers'));
        $rules->add($rules->existsIn(['xmf_roles_id'], 'XmfRoles'));
        $rules->add($rules->existsIn(['xmf_validations_id'], 'XmfValidations'));

        return $rules;
    }
}
