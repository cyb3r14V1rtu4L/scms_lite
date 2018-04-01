<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * XmfPresencesReferences Model
 *
 * @property \App\Model\Table\XmfCasillasTable|\Cake\ORM\Association\BelongsTo $XmfCasillas
 * @property \App\Model\Table\XmfPartidosTable|\Cake\ORM\Association\BelongsTo $XmfPartidos
 *
 * @method \App\Model\Entity\XmfPresencesReference get($primaryKey, $options = [])
 * @method \App\Model\Entity\XmfPresencesReference newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\XmfPresencesReference[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\XmfPresencesReference|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\XmfPresencesReference patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\XmfPresencesReference[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\XmfPresencesReference findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class XmfPresencesReferencesTable extends Table
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

        $this->setTable('xmf_presences_references');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('XmfCasillas', [
            'foreignKey' => 'xmf_casillas_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('XmfPartidos', [
            'foreignKey' => 'xmf_partidos_id',
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
            ->boolean('is_present')
            ->allowEmpty('is_present');

        $validator
            ->scalar('description')
            ->maxLength('description', 150)
            ->requirePresence('description', 'create')
            ->notEmpty('description');

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
        $rules->add($rules->existsIn(['xmf_casillas_id'], 'XmfCasillas'));
        $rules->add($rules->existsIn(['xmf_partidos_id'], 'XmfPartidos'));

        return $rules;
    }
}
