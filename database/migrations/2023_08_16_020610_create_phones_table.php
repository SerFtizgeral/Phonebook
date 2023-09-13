<?php 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('phones', function (Blueprint $table) {
            $table->id(); // Add the id column
            $table->string('fname');
            $table->string('lname');
            $table->string('address');
            $table->integer('contact');
            $table->string('mmail');
            $table->string('image_path')->nullable(); // Add the image_path column
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phones');
    }
};
