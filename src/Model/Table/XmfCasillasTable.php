<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * XmfCasillas Model
 *
 * @method \App\Model\Entity\XmfCasilla get($primaryKey, $options = [])
 * @method \App\Model\Entity\XmfCasilla newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\XmfCasilla[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\XmfCasilla|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\XmfCasilla patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\XmfCasilla[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\XmfCasilla findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class XmfCasillasTable extends Table
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

        $this->setTable('xmf_casillas');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        /*  $this->addBehavior('Timestamp');

      $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);*/
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
  /*  public function validationDefault(Validator $validator)
    {
        /*$validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 50)
            ->requirePresence('name', 'create')
            ->notEmpty('name')
            ->add('name', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('description')
            ->maxLength('description', 150)
            ->requirePresence('description', 'create')
            ->notEmpty('description');

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

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
  /*  public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['name']));

        return $rules;
    }*/
}
