<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSmFeesAssignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sm_fees_assigns', function (Blueprint $table) {
            $table->increments('id'); 
            $table->tinyInteger('active_status')->default(1);
            $table->timestamps();


            $table->integer('fees_master_id')->nullable()->unsigned();
            $table->foreign('fees_master_id')->references('id')->on('sm_fees_masters')->onDelete('restrict');

            $table->integer('student_id')->nullable()->unsigned();
            $table->foreign('student_id')->references('id')->on('sm_students')->onDelete('restrict');

            $table->integer('created_by')->nullable()->default(1)->unsigned();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('restrict');

            $table->integer('updated_by')->nullable()->default(1)->unsigned();
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('restrict');

            $table->integer('school_id')->nullable()->default(1)->unsigned();
            $table->foreign('school_id')->references('id')->on('sm_schools')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sm_fees_assigns');
    }
}
