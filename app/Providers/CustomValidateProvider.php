<?php

namespace App\Providers;

use Validator;
use App\Services\CustomValidator;

use Illuminate\Support\ServiceProvider;

class CustomValidateProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Validator::resolver(function ($translator, $data, $rules, $messages) {
          return new CustomValidator($translator, $data, $rules, $messages);
        });
    }
}
