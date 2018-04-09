<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersProfileTable extends Migration
{
    use MigrationHelper;

    /** @var string */
    protected $table = 'users_profile';

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
                $table->unsignedInteger('user_id')->unique();
                $table->string('nickname');
                $table->string('url');
                $table->string('description');
                $table->string('profile_image');

                $table->index('user_id');
                $table->foreign('user_id')->references('id')->on('users');
            });
    }
}
