<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCompanyToInvoiceHeaders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('invoice_headers', function (Blueprint $table) {
            $table->unsignedBigInteger("company_id");
            $table->foreign("company_id")->references("id")->on("companies")->onDelete("cascade");
            $table->unsignedBigInteger("branch_id");
            $table->foreign("branch_id")->references("id")->on("branches")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('invoice_headers', function (Blueprint $table) {
            //
        });
    }
}
