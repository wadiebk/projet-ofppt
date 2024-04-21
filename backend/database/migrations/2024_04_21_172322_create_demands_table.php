<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demands', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['Relevé des Notes', 'Attestation de poursuite de formation']);
            $table->foreignId('user_id')->nullable()->constrained('users')->cascadeOnDelete();
            $table->boolean('is_accepted')->default(false);
            $table->date('when_to_deliver')->nullable();
            $table->dateTime('accepted_at')->nullable();
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
        Schema::dropIfExists('demands');
    }
};
