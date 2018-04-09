<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersMailTable extends Migration
{
    use MigrationHelper;

    /** @var string */
    protected $table = 'users_mail';

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
                $table->string('email');
                $table->string('password');
                $table->timestamps();

                $table->index('user_id');
                $table->foreign('user_id')->references('id')->on('users');
            });
    }
}
