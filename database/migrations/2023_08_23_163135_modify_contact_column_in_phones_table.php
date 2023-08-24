<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyContactColumnInPhonesTable extends Migration
{
    public function up()
    {
        Schema::table('phones', function (Blueprint $table) {
            // Change the 'contact' column to a longer string type, like VARCHAR with a length of 50
            $table->string('contact', 50)->change();
        });
    }

    public function down()
    {
        Schema::table('phones', function (Blueprint $table) {
            // If needed, define the reverse migration logic here
        });
    }
}
