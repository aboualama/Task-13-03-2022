<?php

namespace App\Providers ;

use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*',"App\Http\ViewComposer\ViewComposer");
        view()->composer(['/app/employees/app_employees','/app/employees/app-employee-view'],"App\Http\ViewComposer\EmployeeViewComposer");
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
