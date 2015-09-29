<?php

namespace App\Providers;

use App\Models\Education;
use App\Models\Question;
use App\Models\Result_level;
use App\Models\Senttype;
use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{


    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //esta es una que se podrá llamar de cualquier parte de la web
        $sent_types = Senttype::all();
        view()->share('sent_types', $sent_types);

        $num_question = Question::active()->count();
        view()->share('num_question',$num_question);

        $num_education = Education::active()->count();
        view()->share('num_education',$num_education);

        $result_levels = Result_level::all();
        view()->share('result_levels',$result_levels);

        $date = Carbon::now();
        $year = $date->format('Y');
        view()->share('year',$year);


    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        /*$this->app->bind('path.public', function() {
            return base_path().'/public';
        });*/
    }
}
