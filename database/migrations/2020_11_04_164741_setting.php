<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class Setting extends Migration{
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('settings', function (Blueprint $table) {
                $table->id();
                $table->string('key')->nullable();
                $table->string('value');
                $table->enum('status', ['Y', 'N']);
                $table->timestamps();
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down(){
            Schema::dropIfExists('settings');
        }
    }
