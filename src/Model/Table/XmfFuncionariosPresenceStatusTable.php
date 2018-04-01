<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * XmfFuncionariosPresenceStatus Model
 *
 * @property \App\Model\Table\XmfPresencesReferencesTable|\Cake\ORM\Association\BelongsTo $XmfPresencesReferences
 * @property \App\Model\Table\XmfCasillasTable|\Cake\ORM\Association\BelongsTo $XmfCasillas
 * @property \App\Model\Table\XmfPartidosTable|\Cake\ORM\Association\BelongsTo $XmfPartidos
 *
 * @method \App\Model\Entity\XmfFuncionariosPresenceStatus get($primaryKey, $options = [])
 * @method \App\Model\Entity\XmfFuncionariosPresenceStatus newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\XmfFuncionariosPresenceStatus[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\XmfFuncionariosPresenceStatus|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\XmfFuncionariosPresenceStatus patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\XmfFuncionariosPresenceStatus[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\XmfFuncionariosPresenceStatus findOrCreate($search, callable $callback = null, $options = [])
 */
class XmfFuncionariosPresenceStatusTable extends Table
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

        $this->setTable('xmf_funcionarios_presence_status');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('XmfPresencesReferences', [
            'foreignKey' => 'xmf_presences_references_id',
            'joinType' => 'INNER'
        ]);
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
            ->requirePresence('id', 'create')
            ->notEmpty('id');

        $validator
            ->boolean('is_present')
            ->allowEmpty('is_present');

        $validator
            ->scalar('description')
            ->maxLength('description', 150)
            ->requirePresence('description', 'create')
            ->notEmpty('description');

        $validator
            ->scalar('nombre')
            ->allowEmpty('nombre');

        $validator
            ->scalar('descripcion')
            ->allowEmpty('descripcion');

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
        $rules->add($rules->existsIn(['xmf_presences_references_id'], 'XmfPresencesReferences'));
        $rules->add($rules->existsIn(['xmf_casillas_id'], 'XmfCasillas'));
        $rules->add($rules->existsIn(['xmf_partidos_id'], 'XmfPartidos'));

        return $rules;
    }
}
