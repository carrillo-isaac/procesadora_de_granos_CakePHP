<?php
declare(strict_types=1);

use Migrations\BaseMigration;

class Initial extends BaseMigration
{
    /**
     * Up Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-up-method
     *
     * @return void
     */
    public function up(): void
    {
        $this->table('pedidos')
            ->addColumn('user_id', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => false,
                'signed' => true,
            ])
            ->addColumn('fecha', 'datetime', [
                'default' => 'CURRENT_TIMESTAMP',
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('total', 'decimal', [
                'default' => null,
                'null' => false,
                'precision' => 10,
                'scale' => 2,
                'signed' => true,
            ])
            ->addColumn('estado', 'string', [
                'default' => 'pendiente',
                'limit' => null,
                'null' => true,
            ])
            ->addIndex(
                $this->index('user_id')
                    ->setName('user_id')
            )
            ->create();

        $this->table('pedidos_detalle')
            ->addColumn('pedido_id', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => false,
                'signed' => true,
            ])
            ->addColumn('producto_id', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => false,
                'signed' => true,
            ])
            ->addColumn('cantidad', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => false,
                'signed' => true,
            ])
            ->addColumn('precio_unitario', 'decimal', [
                'default' => null,
                'null' => false,
                'precision' => 10,
                'scale' => 2,
                'signed' => true,
            ])
            ->addIndex(
                $this->index('pedido_id')
                    ->setName('pedido_id')
            )
            ->addIndex(
                $this->index('producto_id')
                    ->setName('producto_id')
            )
            ->create();

        $this->table('productos')
            ->addColumn('nombre', 'string', [
                'default' => null,
                'limit' => 150,
                'null' => false,
            ])
            ->addColumn('descripcion', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('precio', 'decimal', [
                'default' => null,
                'null' => false,
                'precision' => 10,
                'scale' => 2,
                'signed' => true,
            ])
            ->addColumn('stock', 'integer', [
                'default' => '0',
                'limit' => null,
                'null' => true,
                'signed' => true,
            ])
            ->addColumn('created', 'datetime', [
                'default' => 'CURRENT_TIMESTAMP',
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => 'CURRENT_TIMESTAMP',
                'limit' => null,
                'null' => true,
            ])
            ->create();

        $this->table('users')
            ->addColumn('nombre', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => false,
            ])
            ->addColumn('email', 'string', [
                'default' => null,
                'limit' => 150,
                'null' => false,
            ])
            ->addColumn('password', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('rol', 'string', [
                'default' => 'cliente',
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('created', 'datetime', [
                'default' => 'CURRENT_TIMESTAMP',
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => 'CURRENT_TIMESTAMP',
                'limit' => null,
                'null' => true,
            ])
            ->addIndex(
                $this->index('email')
                    ->setName('email')
                    ->setType('unique')
            )
            ->create();

        $this->table('pedidos')
            ->addForeignKey(
                $this->foreignKey('user_id')
                    ->setReferencedTable('users')
                    ->setReferencedColumns('id')
                    ->setOnDelete('RESTRICT')
                    ->setOnUpdate('RESTRICT')
                    ->setName('pedidos_ibfk_1')
            )
            ->update();

        $this->table('pedidos_detalle')
            ->addForeignKey(
                $this->foreignKey('producto_id')
                    ->setReferencedTable('productos')
                    ->setReferencedColumns('id')
                    ->setOnDelete('RESTRICT')
                    ->setOnUpdate('RESTRICT')
                    ->setName('pedidos_detalle_ibfk_2')
            )
            ->addForeignKey(
                $this->foreignKey('pedido_id')
                    ->setReferencedTable('pedidos')
                    ->setReferencedColumns('id')
                    ->setOnDelete('RESTRICT')
                    ->setOnUpdate('RESTRICT')
                    ->setName('pedidos_detalle_ibfk_1')
            )
            ->update();
    }

    /**
     * Down Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-down-method
     *
     * @return void
     */
    public function down(): void
    {
        $this->table('pedidos')
            ->dropForeignKey(
                'user_id'
            )->save();

        $this->table('pedidos_detalle')
            ->dropForeignKey(
                'producto_id'
            )
            ->dropForeignKey(
                'pedido_id'
            )->save();

        $this->table('pedidos')->drop()->save();
        $this->table('pedidos_detalle')->drop()->save();
        $this->table('productos')->drop()->save();
        $this->table('users')->drop()->save();
    }
}
