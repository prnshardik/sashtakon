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
                $table->enum('status', ['Y', 'N'])->default('Y');
                $table->enum('type', ['general', 'logo', 'smtp'])->default('general');
                $table->timestamps();
            });

            \DB::table('settings')->insert(['key' => 'site_title', 'value' => 'Sashtakon', 'status' => 'Y', 'type' => 'general']);
            \DB::table('settings')->insert(['key' => 'site_title_sort_name', 'value' => 'S', 'status' => 'Y', 'type' => 'general']);
            \DB::table('settings')->insert(['key' => 'footer_title', 'value' => 'Sashtakon. All rights reserved by Sashtakon', 'status' => 'Y', 'type' => 'general']);

            \DB::table('settings')->insert(['key' => 'header_logo', 'value' => 'default.png', 'status' => 'Y', 'type' => 'logo']);
            \DB::table('settings')->insert(['key' => 'footer_logo', 'value' => 'default.png', 'status' => 'Y', 'type' => 'logo']);

            \DB::table('settings')->insert(['key' => 'username', 'value' => 'prns.hardik@gmail.com', 'status' => 'Y', 'type' => 'smtp']);
            \DB::table('settings')->insert(['key' => 'server_address', 'value' => 'smtp.gmail.com', 'status' => 'Y', 'type' => 'smtp']);
            \DB::table('settings')->insert(['key' => 'password', 'value' => 'password', 'status' => 'Y', 'type' => 'smtp']);
            \DB::table('settings')->insert(['key' => 'tls_port', 'value' => '587', 'status' => 'Y', 'type' => 'smtp']);
            \DB::table('settings')->insert(['key' => 'ssl_port', 'value' => '465', 'status' => 'Y', 'type' => 'smtp']);
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
