<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Setting;

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
        Schema::defaultStringLength(191);
        try {
            \DB::connection()->getPdo();
            
            if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
                $ip_address = @$_SERVER['HTTP_CLIENT_IP'];
            }
            //whether ip is from proxy
            elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                $ip_address = @$_SERVER['HTTP_X_FORWARDED_FOR'];
            }
            //whether ip is from remote address
            else {
                $ip_address = @$_SERVER['REMOTE_ADDR'];
            }

            $d = \Request::getHost();
            $domain = str_replace("www.", "", $d);


            $data = array();

            if(\DB::connection()->getDatabaseName()){
                if (Schema::hasTable('settings')) {

                    $project_title = Setting::first()->project_title;
                    $gsetting = Setting::first();

                    $data = array(
                        'project_title' => $project_title ?? '',
                        'gsetting' => $gsetting ?? '',
                    );



                    view()->composer('*', function ($view) use ($data){

                        try {

                            if(\DB::connection()->getDatabaseName()){
                              if(Schema::hasTable('settings')){
                                
                                
                                $view->with([
                                    'project_title' => $data['project_title'],
                                    'gsetting' => $data['gsetting'],
                                 
                                ]);

                              }
                            }
                        } catch (\Exception $e) {

                        }
                    });

                }
            }
        }catch(\Exception $ex){

          
        }
    }
}
