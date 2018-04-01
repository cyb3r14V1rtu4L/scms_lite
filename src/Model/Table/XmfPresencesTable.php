<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * XmfPresences Model
 *
 * @method \App\Model\Entity\XmfPresence get($primaryKey, $options = [])
 * @method \App\Model\Entity\XmfPresence newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\XmfPresence[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\XmfPresence|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\XmfPresence patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\XmfPresence[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\XmfPresence findOrCreate($search, callable $callback = null, $options = [])
 */
class XmfPresencesTable extends Table
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

        $this->setTable('xmf_presences');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');
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
            ->scalar('description')
            ->allowEmpty('description');

        $validator
            ->boolean('is_present')
            ->allowEmpty('is_present');

        return $validator;
    }
}
