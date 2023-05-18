<?php

declare(strict_types=1);

use Phoenix\Migration\AbstractMigration;

final class Create_users_table extends AbstractMigration
{
    protected function up(): void
    {
        $this->table('users')
            ->addColumn('photo', 'string', ['null' => true])
            ->addColumn('first_name', 'string')
            ->addColumn('last_name', 'string')
            ->addColumn('email', 'string')
            ->addColumn('email_verified_at', 'timestamp', ['null' => true])
            ->addColumn('password', 'string')
            ->addColumn('active', 'boolean', ['default' => false])
            ->addColumn('created_at', 'timestamp')
            ->addColumn('updated_at', 'timestamp')
            ->create();
    }

    protected function down(): void
    {
        $this->table('users')
            ->drop();
    }
}