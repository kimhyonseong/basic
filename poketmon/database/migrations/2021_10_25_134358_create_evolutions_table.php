<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNextEvolutionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('next_evolutions', function (Blueprint $table) {
            $table->id();
            $table->integer('num')->unsigned()->comment('포켓몬 번호');
            $table->integer('next_evolution')->nullable()->comment('진화 포켓몬 번호');
            $table->timestamps();

            $table->index('num');
            $table->foreign('next_evolution')
                ->references('num')
                ->on('next_evolutions')
                ->onUpdate('cascade');
        });

        \App\Models\Evolution::create([
            /* 1. poketmons 테이블에서 조회에서 여기에 삽입하기
               2. poketmons 테이블의 evolution 칼럼 삭제 */
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        /*  1. poketmons 테이블에 next_evolution 칼럼 생성
            2. poketmons 테이블에 evolutions 테이블 데이터 넣기 */
        Schema::dropIfExists('next_evolutions');
    }
}
