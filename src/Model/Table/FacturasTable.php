<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Facturas Model
 *
 * @property \App\Model\Table\UsuariosTable&\Cake\ORM\Association\BelongsTo $Usuarios
 * @property \App\Model\Table\FacturaDetallesTable&\Cake\ORM\Association\HasMany $FacturaDetalles
 *
 * @method \App\Model\Entity\Factura newEmptyEntity()
 * @method \App\Model\Entity\Factura newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Factura> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Factura get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Factura findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Factura patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Factura> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Factura|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Factura saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Factura>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Factura>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Factura>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Factura> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Factura>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Factura>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Factura>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Factura> deleteManyOrFail(iterable $entities, array $options = [])
 */
class FacturasTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('facturas');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Usuarios', [
            'foreignKey' => 'usuario_id',
        ]);
        $this->hasMany('FacturaDetalles', [
            'foreignKey' => 'factura_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('usuario_id')
            ->allowEmptyString('usuario_id');

        $validator
            ->decimal('total')
            ->allowEmptyString('total');

        $validator
            ->dateTime('fecha')
            ->allowEmptyDateTime('fecha');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['usuario_id'], 'Usuarios'), ['errorField' => 'usuario_id']);

        return $rules;
    }
}
