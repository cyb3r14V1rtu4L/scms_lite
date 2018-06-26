<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * XmfPrimerReporte Model
 *
 * @property \App\Model\Table\XmfCasillasTable|\Cake\ORM\Association\BelongsTo $XmfCasillas
 *
 * @method \App\Model\Entity\XmfPrimerReporte get($primaryKey, $options = [])
 * @method \App\Model\Entity\XmfPrimerReporte newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\XmfPrimerReporte[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\XmfPrimerReporte|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\XmfPrimerReporte patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\XmfPrimerReporte[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\XmfPrimerReporte findOrCreate($search, callable $callback = null, $options = [])
 */
class XmfPrimerReporteTable extends Table
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

        $this->setTable('xmf_primer_reporte');

        $this->belongsTo('XmfCasillas', [
            'foreignKey' => 'xmf_casillas_id',
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
            ->scalar('representante')
            ->maxLength('representante', 111)
            ->allowEmpty('representante');

        $validator
            ->scalar('nombre')
            ->allowEmpty('nombre');

        $validator
            ->integer('bloque')
            ->allowEmpty('bloque');

        $validator
            ->integer('orden')
            ->allowEmpty('orden');

        $validator
            ->boolean('is_present')
            ->allowEmpty('is_present');

        $validator
            ->scalar('casilla')
            ->maxLength('casilla', 50)
            ->requirePresence('casilla', 'create')
            ->notEmpty('casilla');

        $validator
            ->boolean('lugar_indicado')
            ->allowEmpty('lugar_indicado');

        $validator
            ->boolean('gente_fila')
            ->allowEmpty('gente_fila');

        $validator
            ->scalar('nombres_fila')
            ->allowEmpty('nombres_fila');

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

        return $rules;
    }
}
