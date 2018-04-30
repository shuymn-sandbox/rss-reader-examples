<?php
declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration
{
    use MigrationHelper;

    /** @var string */
    protected $table = 'users';

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
                $table->string('username')->unique();
                $table->string('nickname');
                $table->string('email');
                $table->string('password');
                $table->string('profile_image')->default('');
                $table->string('description')->default('');
                $table->string('url')->default('');
                $table->rememberToken();
                $table->timestamps();
            });
    }
}
