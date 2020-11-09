<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateEmailTemplatesTable extends Migration{
        public function up(){
            Schema::create('email_templates', function (Blueprint $table) {
                $table->id();
                $table->string('key')->nullable();
                $table->string('title')->nullable();
                $table->text('subject')->nullable();
                $table->text('html')->nullable();
                $table->enum('status', ['Y', 'N'])->default('Y');
                $table->timestamps();
            });

            \DB::table('email_templates')->insert(['key' => 'forget_password', 'title' => 'Forget password', 'subject' => 'Forget Password', 'html' => '<p><strong>Hello {obj_name},</strong></p>
            <p>You have requested to reset your password associated with this Email address.&nbsp;</p>
            <p>If you made this request, please follow the instructions below.</p>
            <p>please click Below link for Reset Password</p>
            <p>{obj_link}</p>', 'status' => 'Y']);
        }

        public function down(){
            Schema::dropIfExists('email_templates');
        }
    }
