<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * XmfPartidosIncidencias Model
 *
 * @property \App\Model\Table\XmfCasillasTable|\Cake\ORM\Association\BelongsTo $XmfCasillas
 * @property \App\Model\Table\XmfPartidosTable|\Cake\ORM\Association\BelongsTo $XmfPartidos
 * @property \App\Model\Table\XmfIncidenciasTable|\Cake\ORM\Association\BelongsTo $XmfIncidencias
 *
 * @method \App\Model\Entity\XmfPartidosIncidencia get($primaryKey, $options = [])
 * @method \App\Model\Entity\XmfPartidosIncidencia newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\XmfPartidosIncidencia[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\XmfPartidosIncidencia|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\XmfPartidosIncidencia patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\XmfPartidosIncidencia[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\XmfPartidosIncidencia findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class XmfPartidosIncidenciasTable extends Table
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

        $this->setTable('xmf_partidos_incidencias');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('XmfCasillas', [
            'foreignKey' => 'xmf_casillas_id'
        ]);
        $this->belongsTo('XmfPartidos', [
            'foreignKey' => 'xmf_partidos_id'
        ]);
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
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('otra')
            ->allowEmpty('otra');

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
        $rules->add($rules->existsIn(['xmf_incidencias_id'], 'XmfIncidencias'));

        return $rules;
    }
}
