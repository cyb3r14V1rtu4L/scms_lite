<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * XmfViewIncidencias Model
 *
 * @property \App\Model\Table\XmfIncidenciasTable|\Cake\ORM\Association\BelongsTo $XmfIncidencias
 *
 * @method \App\Model\Entity\XmfViewIncidencia get($primaryKey, $options = [])
 * @method \App\Model\Entity\XmfViewIncidencia newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\XmfViewIncidencia[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\XmfViewIncidencia|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\XmfViewIncidencia patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\XmfViewIncidencia[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\XmfViewIncidencia findOrCreate($search, callable $callback = null, $options = [])
 */
class XmfViewIncidenciasTable extends Table
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

        $this->setTable('xmf_view_incidencias');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('XmfIncidencias', [
            'foreignKey' => 'xmf_incidencias_id'
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
            ->scalar('nombre')
            ->allowEmpty('nombre');

        $validator
            ->scalar('formula')
            ->allowEmpty('formula');

        $validator
            ->integer('id')
            ->allowEmpty('id');

        $validator
            ->scalar('otra')
            ->allowEmpty('otra');

        $validator
            ->scalar('titulo')
            ->allowEmpty('titulo');

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
        $rules->add($rules->existsIn(['xmf_incidencias_id'], 'XmfIncidencias'));

        return $rules;
    }
}
