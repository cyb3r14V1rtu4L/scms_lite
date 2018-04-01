<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * XmfValidationsLogs Model
 *
 * @property \App\Model\Table\XmfReportsTable|\Cake\ORM\Association\BelongsTo $XmfReports
 * @property \App\Model\Table\XmfValidationsTable|\Cake\ORM\Association\BelongsTo $XmfValidations
 * @property \App\Model\Table\XmfValidationsConfigsTable|\Cake\ORM\Association\BelongsTo $XmfValidationsConfigs
 *
 * @method \App\Model\Entity\XmfValidationsLog get($primaryKey, $options = [])
 * @method \App\Model\Entity\XmfValidationsLog newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\XmfValidationsLog[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\XmfValidationsLog|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\XmfValidationsLog patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\XmfValidationsLog[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\XmfValidationsLog findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class XmfValidationsLogsTable extends Table
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

        $this->setTable('xmf_validations_logs');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('XmfReports', [
            'foreignKey' => 'xmf_reports_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('XmfValidations', [
            'foreignKey' => 'xmf_validations_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('XmfValidationsConfigs', [
            'foreignKey' => 'xmf_validations_configs_id',
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
            ->requirePresence('level', 'create')
            ->notEmpty('level');

        $validator
            ->boolean('level_validation')
            ->allowEmpty('level_validation');

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
        $rules->add($rules->existsIn(['xmf_validations_id'], 'XmfValidations'));
        $rules->add($rules->existsIn(['xmf_validations_configs_id'], 'XmfValidationsConfigs'));

        return $rules;
    }
}
