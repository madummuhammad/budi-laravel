<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnalyticsUsersTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
        CREATE TRIGGER tr_Session_Create AFTER INSERT ON `sessions` FOR EACH ROW
            BEGIN
                INSERT INTO analytics_users (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `device`, `location`, `last_activity`, `created_at`, `updated_at`) 
                VALUES (NEW.id, New.user_id, NEW.ip_address, NEW.user_agent, NEW.payload, NEW.device, NEW.location, NEW.last_activity, NEW.created_at, NEW.updated_at);
            END
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `tr_Session_Create`');
    }
}
