<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFeedsTable extends Migration
{
    use MigrationHelper;

    /** @var string */
    protected $table = 'feeds';

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
                $table->unsignedInteger('user_id');
                $table->string('url');
                $table->string('title');
                $table->string('link');
                $table->string('description');
                $table->rememberToken();
                $table->timestamps();

                $table->index(['user_id', 'url']);
                $table->foreign('user_id')->references('id')->on('users');
            });
    }
}
