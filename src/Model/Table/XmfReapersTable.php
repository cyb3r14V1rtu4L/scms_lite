<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * XmfReapers Model
 *
 * @property \App\Model\Table\XmfReapersTable|\Cake\ORM\Association\BelongsTo $ParentXmfReapers
 * @property \App\Model\Table\XmfCasillasTable|\Cake\ORM\Association\BelongsTo $XmfCasillas
 * @property \App\Model\Table\XmfTipoVotacionesTable|\Cake\ORM\Association\BelongsTo $XmfTipoVotaciones
 * @property \App\Model\Table\XmfPartidosTable|\Cake\ORM\Association\BelongsTo $XmfPartidos
 * @property \App\Model\Table\XmfReapersTable|\Cake\ORM\Association\HasMany $ChildXmfReapers
 *
 * @method \App\Model\Entity\XmfReaper get($primaryKey, $options = [])
 * @method \App\Model\Entity\XmfReaper newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\XmfReaper[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\XmfReaper|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\XmfReaper patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\XmfReaper[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\XmfReaper findOrCreate($search, callable $callback = null, $options = [])
 */
class XmfReapersTable extends Table
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

        $this->setTable('xmf_reapers');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('ParentXmfReapers', [
            'className' => 'XmfReapers',
            'foreignKey' => 'parent_id'
        ]);
        $this->belongsTo('XmfCasillas', [
            'foreignKey' => 'xmf_casillas_id'
        ]);
        $this->belongsTo('XmfTipoVotaciones', [
            'foreignKey' => 'xmf_tipo_votaciones_id'
        ]);
        $this->belongsTo('XmfPartidos', [
            'foreignKey' => 'xmf_partidos_id'
        ]);
        $this->hasMany('ChildXmfReapers', [
            'className' => 'XmfReapers',
            'foreignKey' => 'parent_id'
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
            ->integer('casillas_index')
            ->requirePresence('casillas_index', 'create')
            ->notEmpty('casillas_index');

        $validator
            ->scalar('name')
            ->maxLength('name', 50)
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->scalar('municipio')
            ->allowEmpty('municipio');

        $validator
            ->scalar('seccion')
            ->allowEmpty('seccion');

        $validator
            ->scalar('clave_agrupamiento')
            ->maxLength('clave_agrupamiento', 2)
            ->allowEmpty('clave_agrupamiento');

        $validator
            ->scalar('tipo_casilla')
            ->allowEmpty('tipo_casilla');

        $validator
            ->scalar('urbana')
            ->allowEmpty('urbana');

        $validator
            ->scalar('distrito')
            ->allowEmpty('distrito');

        $validator
            ->scalar('locacion')
            ->allowEmpty('locacion');

        $validator
            ->dateTime('hora_instalacion')
            ->allowEmpty('hora_instalacion');

        $validator
            ->dateTime('hora_inicio')
            ->allowEmpty('hora_inicio');

        $validator
            ->dateTime('hora_cierre')
            ->allowEmpty('hora_cierre');

        $validator
            ->scalar('nombre')
            ->allowEmpty('nombre');

        $validator
            ->scalar('formula')
            ->allowEmpty('formula');

        $validator
            ->boolean('is_coalicion')
            ->requirePresence('is_coalicion', 'create')
            ->notEmpty('is_coalicion');

        $validator
            ->boolean('has_parent')
            ->requirePresence('has_parent', 'create')
            ->notEmpty('has_parent');

        $validator
            ->scalar('tipo')
            ->maxLength('tipo', 50)
            ->allowEmpty('tipo');

        $validator
            ->integer('votes')
            ->allowEmpty('votes');

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
        $rules->add($rules->existsIn(['parent_id'], 'ParentXmfReapers'));
        $rules->add($rules->existsIn(['xmf_casillas_id'], 'XmfCasillas'));
        $rules->add($rules->existsIn(['xmf_tipo_votaciones_id'], 'XmfTipoVotaciones'));
        $rules->add($rules->existsIn(['xmf_partidos_id'], 'XmfPartidos'));

        return $rules;
    }
}
