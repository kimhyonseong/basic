<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }


    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // 버전에 따라 인덱스, 마이그레이션 생성할 때 기본 길이를 수동으로 구성해야 한다.
        Schema::defaultStringLength(191);
    }
}
