<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('public_reports', function (Blueprint $table) {
            $table->id('reportId');
            $table->string('reportTitle');
            $table->string('reportFile')->nullable();
            $table->string('imageFile')->nullable();
            $table->tinyInteger('reportStatus')->default(0);
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
        Schema::dropIfExists('public_reports');
    }
}
