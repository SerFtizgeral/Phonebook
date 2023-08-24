<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveColumnsFromTable extends Migration
{
    public function up()
    {
        Schema::table('phone', function (Blueprint $table) {
            $table->dropColumn(['created_at', 'updated_at', 'id']);
        });
    }

    public function down()
    {
        Schema::table('phone', function (Blueprint $table) {
            // If you need to revert the change during rollback
            $table->id();
            $table->timestamps();
        });
    }
}
