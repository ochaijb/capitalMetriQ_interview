<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBalanceAndPhoneNumberToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->decimal('balance', 15, 2)->default(0.00)->after('email'); // Adjust 'after' if needed
            $table->string('phone_number', 15)->nullable()->after('balance'); // Adjust 'after' if needed
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('balance');
            $table->dropColumn('phone_number');
        });
    }
}