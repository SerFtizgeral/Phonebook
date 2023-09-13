<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImagePathToPhonesTable extends Migration
{
    public function up()
    {
        Schema::table('phones', function (Blueprint $table) {
            $table->string('image_path')->nullable()->after('mmail'); // Add the image_path column after 'mmail'
        });
    }



    
    public function down()
    {
        Schema::table('phones', function (Blueprint $table) {
            $table->dropColumn('image_path');
        });
    }
}
