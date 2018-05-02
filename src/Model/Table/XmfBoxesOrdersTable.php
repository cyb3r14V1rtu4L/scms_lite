<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * XmfBoxesOrders Model
 *
 * @property \App\Model\Table\XmfTipoVotacionesTable|\Cake\ORM\Association\BelongsTo $XmfTipoVotaciones
 * @property \App\Model\Table\XmfBoxesBlocksTable|\Cake\ORM\Association\BelongsTo $XmfBoxesBlocks
 *
 * @method \App\Model\Entity\XmfBoxesOrder get($primaryKey, $options = [])
 * @method \App\Model\Entity\XmfBoxesOrder newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\XmfBoxesOrder[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\XmfBoxesOrder|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\XmfBoxesOrder patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\XmfBoxesOrder[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\XmfBoxesOrder findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class XmfBoxesOrdersTable extends Table
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

        $this->setTable('xmf_boxes_orders');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('XmfTipoVotaciones', [
            'foreignKey' => 'xmf_tipo_votaciones_id'
        ]);
        $this->belongsTo('XmfBoxesBlocks', [
            'foreignKey' => 'xmf_boxes_blocks_id'
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
            ->scalar('name')
            ->allowEmpty('name');

        $validator
            ->scalar('formula')
            ->allowEmpty('formula');

        $validator
            ->scalar('descripcion')
            ->allowEmpty('descripcion');

        $validator
            ->integer('xmf_partidos')
            ->allowEmpty('xmf_partidos');

        $validator
            ->integer('order')
            ->allowEmpty('order');

        $validator
            ->integer('partition')
            ->allowEmpty('partition');

        $validator
            ->boolean('status')
            ->requirePresence('status', 'create')
            ->notEmpty('status');

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
        $rules->add($rules->existsIn(['xmf_tipo_votaciones_id'], 'XmfTipoVotaciones'));
        $rules->add($rules->existsIn(['xmf_boxes_blocks_id'], 'XmfBoxesBlocks'));

        return $rules;
    }
}
