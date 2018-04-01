<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * XmfPartidos Model
 *
 * @property \App\Model\Table\XmfPartidosTable|\Cake\ORM\Association\BelongsTo $ParentXmfPartidos
 * @property \App\Model\Table\XmfPartidosTable|\Cake\ORM\Association\HasMany $ChildXmfPartidos
 *
 * @method \App\Model\Entity\XmfPartido get($primaryKey, $options = [])
 * @method \App\Model\Entity\XmfPartido newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\XmfPartido[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\XmfPartido|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\XmfPartido patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\XmfPartido[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\XmfPartido findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class XmfPartidosTable extends Table
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

        $this->setTable('xmf_partidos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('ParentXmfPartidos', [
            'className' => 'XmfPartidos',
            'foreignKey' => 'parent_id'
        ]);
        $this->hasMany('ChildXmfPartidos', [
            'className' => 'XmfPartidos',
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
            ->integer('id')
            ->allowEmpty('id', 'create');

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
            ->boolean('is_funcionario')
            ->requirePresence('is_funcionario', 'create')
            ->notEmpty('is_funcionario');

        $validator
            ->scalar('funcionario_name')
            ->maxLength('funcionario_name', 55)
            ->allowEmpty('funcionario_name');

        $validator
            ->scalar('funcionario_lastname')
            ->maxLength('funcionario_lastname', 55)
            ->allowEmpty('funcionario_lastname');

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
        $rules->add($rules->existsIn(['parent_id'], 'ParentXmfPartidos'));

        return $rules;
    }
}
