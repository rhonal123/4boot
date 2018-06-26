<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTypeCompanyRequerimentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_company_requeriments', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('requeriment_id');
            $table->foreign('requeriment_id')->references('id')->on('requeriments');

            $table->unsignedInteger('company_type_id');
            $table->foreign('company_type_id')->references('id')->on('company_types');

            $table->softDeletes();  
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('type_company_requeriments');
    }
}
