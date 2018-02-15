<?php

namespace App\Providers;

use App\Category;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class ValidationProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('validCategories', function ($attribute, $value){

            if(is_array($value)) {

                foreach ($value as $item) {

                    if (!Category::find($item)) {

                        return false;

                    }

                }
            }

            if(is_numeric($value)){

                if (!Category::find($value)) {

                    return false;

                }

            }

            return  true;


        },'Один из переданных id категорий не валиден');
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
