<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * XmfTipoVotaciones Model
 *
 * @method \App\Model\Entity\XmfTipoVotacione get($primaryKey, $options = [])
 * @method \App\Model\Entity\XmfTipoVotacione newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\XmfTipoVotacione[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\XmfTipoVotacione|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\XmfTipoVotacione patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\XmfTipoVotacione[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\XmfTipoVotacione findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class XmfTipoVotacionesTable extends Table
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

        $this->setTable('xmf_tipo_votaciones');
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
            ->scalar('tipo')
            ->maxLength('tipo', 50)
            ->allowEmpty('tipo');

        $validator
            ->scalar('description')
            ->allowEmpty('description');

        return $validator;
    }
}
