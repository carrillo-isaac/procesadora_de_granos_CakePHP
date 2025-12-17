<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * FacturaDetalles Model
 *
 * @property \App\Model\Table\FacturasTable&\Cake\ORM\Association\BelongsTo $Facturas
 * @property \App\Model\Table\ProductosTable&\Cake\ORM\Association\BelongsTo $Productos
 *
 * @method \App\Model\Entity\FacturaDetalle newEmptyEntity()
 * @method \App\Model\Entity\FacturaDetalle newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\FacturaDetalle> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\FacturaDetalle get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\FacturaDetalle findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\FacturaDetalle patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\FacturaDetalle> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\FacturaDetalle|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\FacturaDetalle saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\FacturaDetalle>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\FacturaDetalle>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\FacturaDetalle>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\FacturaDetalle> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\FacturaDetalle>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\FacturaDetalle>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\FacturaDetalle>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\FacturaDetalle> deleteManyOrFail(iterable $entities, array $options = [])
 */
class FacturaDetallesTable extends Table
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

        $this->setTable('factura_detalles');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Facturas', [
            'foreignKey' => 'factura_id',
        ]);
        $this->belongsTo('Productos', [
            'foreignKey' => 'producto_id',
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
            ->integer('factura_id')
            ->allowEmptyString('factura_id');

        $validator
            ->integer('producto_id')
            ->allowEmptyString('producto_id');

        $validator
            ->integer('cantidad')
            ->allowEmptyString('cantidad');

        $validator
            ->decimal('precio_unitario')
            ->allowEmptyString('precio_unitario');

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
        $rules->add($rules->existsIn(['factura_id'], 'Facturas'), ['errorField' => 'factura_id']);
        $rules->add($rules->existsIn(['producto_id'], 'Productos'), ['errorField' => 'producto_id']);

        return $rules;
    }
}
