<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatedInvitedCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invited_codes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code')->unique()->comment('12 digits of random number and letter');
            $table->dateTime('sent_at')->nullable()->comment('the time of sending code to customer');
            $table->integer('customer_id')->default(0)->comment('each code assign to one customer, 0: not assign');
            $table->dateTime('expired_by')->nullable()->comment('the time of invited code expired');
            $table->tinyInteger('status')->default(0)->comment('0: created,1: sent, 2:verified,-1:expired');
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
        Schema::dropIfExists('invited_codes');
    }
}
