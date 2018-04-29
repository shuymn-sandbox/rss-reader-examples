<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntriesTable extends Migration
{
    use MigrationHelper;

    /** @var string */
    protected $table = 'entries';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this
            ->getSchemaBuilder()
            ->create($this->table, function (Blueprint $table): void {
                $table->increments('id');
                $table->unsignedInteger('feed_id')->unique();
                $table->string('title');
                $table->string('link');
                $table->string('title');
                $table->string('link');
                $table->string('description');
                $table->timestamp('entry_published_at');
                $table->timestamp('entry_updated_at');
                $table->timestamps();

                $table->foreign('feed_id')->references('id')->on('feeds');
            });
    }
}
