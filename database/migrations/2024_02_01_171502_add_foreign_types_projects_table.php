<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('projects', function (Blueprint $progetti) {
            $progetti->id();
            $progetti->string("name");
            $progetti->text("description");
            $progetti->string("image");
            $progetti->date("dataCreation");
            $progetti->string("language");
            $progetti->timestamps();

            
        });
        Schema::table('projects', function (Blueprint $table) {
            $table->unsignedBigInteger('types_id')->nullable()->after('id');
            $table->foreign('types_id')->references('types')->on('id')->nullOnDelete();});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function(Blueprint $table){
            $table->dropForeign('projects_type_id_foreign');
            $table->dropColumn('category_id');

        });
    }
};
