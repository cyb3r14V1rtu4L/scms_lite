<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * XmfPrimerReporteTab Model
 *
 * @property \App\Model\Table\XmfCasillasTable|\Cake\ORM\Association\BelongsTo $XmfCasillas
 *
 * @method \App\Model\Entity\XmfPrimerReporteTab get($primaryKey, $options = [])
 * @method \App\Model\Entity\XmfPrimerReporteTab newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\XmfPrimerReporteTab[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\XmfPrimerReporteTab|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\XmfPrimerReporteTab patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\XmfPrimerReporteTab[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\XmfPrimerReporteTab findOrCreate($search, callable $callback = null, $options = [])
 */
class XmfPrimerReporteTabTable extends Table
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

        $this->setTable('xmf_primer_reporte_tab');
        $this->setDisplayField('name');

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
            ->scalar('name')
            ->maxLength('name', 50)
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->scalar('rg_telefono')
            ->allowEmpty('rg_telefono');

        $validator
            ->scalar('rc_telefono')
            ->allowEmpty('rc_telefono');

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
