<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * XmfIncidencias Model
 *
 * @method \App\Model\Entity\XmfIncidencia get($primaryKey, $options = [])
 * @method \App\Model\Entity\XmfIncidencia newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\XmfIncidencia[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\XmfIncidencia|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\XmfIncidencia patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\XmfIncidencia[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\XmfIncidencia findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class XmfIncidenciasTable extends Table
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

        $this->setTable('xmf_incidencias');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
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
            ->scalar('titulo')
            ->allowEmpty('titulo');

        $validator
            ->scalar('descripcion')
            ->allowEmpty('descripcion');

        return $validator;
    }
}
