<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * XmfReportsConfigDefinitions Model
 *
 * @property \App\Model\Table\XmfReportsDefinitionsTable|\Cake\ORM\Association\BelongsTo $XmfReportsDefinitions
 *
 * @method \App\Model\Entity\XmfReportsConfigDefinition get($primaryKey, $options = [])
 * @method \App\Model\Entity\XmfReportsConfigDefinition newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\XmfReportsConfigDefinition[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\XmfReportsConfigDefinition|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\XmfReportsConfigDefinition patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\XmfReportsConfigDefinition[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\XmfReportsConfigDefinition findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class XmfReportsConfigDefinitionsTable extends Table
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

        $this->setTable('xmf_reports_config_definitions');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('XmfReportsDefinitions', [
            'foreignKey' => 'xmf_reports_definitions_id',
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
            ->scalar('field_name')
            ->maxLength('field_name', 1)
            ->allowEmpty('field_name');

        $validator
            ->scalar('description')
            ->allowEmpty('description');

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
        $rules->add($rules->existsIn(['xmf_reports_definitions_id'], 'XmfReportsDefinitions'));

        return $rules;
    }
}
