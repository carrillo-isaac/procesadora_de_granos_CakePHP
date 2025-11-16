<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Carrito Model
 *
 * @property \App\Model\Table\UsuariosTable&\Cake\ORM\Association\BelongsTo $Usuarios
 * @property \App\Model\Table\ProductosTable&\Cake\ORM\Association\BelongsTo $Productos
 *
 * @method \App\Model\Entity\Carrito newEmptyEntity()
 * @method \App\Model\Entity\Carrito newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Carrito> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Carrito get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Carrito findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Carrito patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Carrito> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Carrito|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Carrito saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Carrito>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Carrito>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Carrito>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Carrito> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Carrito>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Carrito>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Carrito>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Carrito> deleteManyOrFail(iterable $entities, array $options = [])
 */
class CarritoTable extends Table
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

        $this->setTable('carrito');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Usuarios', [
            'foreignKey' => 'usuario_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Productos', [
            'foreignKey' => 'producto_id',
            'joinType' => 'INNER',
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
            ->notEmptyString('usuario_id');

        $validator
            ->integer('producto_id')
            ->notEmptyString('producto_id');

        $validator
            ->integer('cantidad')
            ->notEmptyString('cantidad');

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
        $rules->add($rules->isUnique(['usuario_id', 'producto_id']), ['errorField' => 'usuario_id']);
        $rules->add($rules->existsIn(['usuario_id'], 'Usuarios'), ['errorField' => 'usuario_id']);
        $rules->add($rules->existsIn(['producto_id'], 'Productos'), ['errorField' => 'producto_id']);

        return $rules;
    }
}
