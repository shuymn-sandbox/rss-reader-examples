<?php

/**
 * Trait MigrationHelper
 */
trait MigrationHelper
{
    /**
     * @return void
     */
    public function down(): void
    {
        /** @var \Illuminate\Database\Schema\Builder $builder */
        $builder = $this->getSchemaBuilder();

        $builder->disableForeignKeyConstraints();
        $builder->dropIfExists($this->table);
        $builder->enableForeignKeyConstraints();
    }

    /**
     * @return \Illuminate\Database\Schema\Builder
     */
    protected function getSchemaBuilder(): \Illuminate\Database\Schema\Builder
    {
        return app('db')
            ->connection($this->getConnection())
            ->getSchemaBuilder();
    }
}
