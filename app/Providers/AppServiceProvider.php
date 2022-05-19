<?php

namespace App\Providers;

use App\Http\CommonLib;
use Illuminate\Support\ServiceProvider;

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
       // $company_seq            =   CommonLib::login_admin();
        //view()->share('company_seq',$company_seq['company_seq']);
    }
}
