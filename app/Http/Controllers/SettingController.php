<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;

class SettingController extends Controller
{
    //

    public function genreal()
    {
      $env_files = [
        'APP_URL' => env('APP_URL'),
        'APP_DEBUG' => env('APP_DEBUG'),
        'MAIL_FROM_NAME' => env('MAIL_FROM_NAME'),
        'MAIL_FROM_ADDRESS' => env('MAIL_FROM_ADDRESS'),
        'MAIL_DRIVER' => env('MAIL_DRIVER'),
        'MAIL_HOST' => env('MAIL_HOST'),
        'MAIL_PORT' => env('MAIL_PORT'),
        'MAIL_USERNAME' => env('MAIL_USERNAME'),
        'MAIL_PASSWORD' => env('MAIL_PASSWORD'),
        'MAIL_ENCRYPTION' => env('MAIL_ENCRYPTION'),
       
        'GOOGLE_CLIENT_ID' => env('GOOGLE_CLIENT_ID'),
        'GOOGLE_CLIENT_SECRET' => env('GOOGLE_CLIENT_SECRET'),
        'GOOGLE_CALLBACK_URL' => env('GOOGLE_CALLBACK_URL'),

      ];
      $setting = Setting::first();
      return view('admin.setting.setting',compact('setting','env_files'));
    }

    public function store(Request $request){

        $request->validate([
          'project_title' => 'required',
          'APP_URL' => 'required',
          'favicon' => 'mimes:ico,png',
          'logo' => 'mimes:png,jpeg,jpg'
        ],
        [
          'project_title.required' => 'Project Title is required',
          'APP_URL.required' => 'App URL is required'
        ]
        );

        $active = @file_get_contents(public_path().'/config.txt');

        if(!$active){
            $putS = 1;
            @file_put_contents(public_path().'/config.txt',$putS);
        }

       
        $d = \Request::getHost();
        $domain = str_replace("www.", "", $d); 

        return $this->extraUpdate($request);

    }

    public function extraUpdate($request){
              $setting = Setting::first();

        if(config('app.demolock') == 0){
          $setting->project_title = $request->project_title;
        }

        $setting->rightclick = $request->rightclick;
        $setting->inspect = $request->inspect;
        $setting->wel_email = $request->wel_email;
        $setting->default_address = $request->default_address;
        $setting->default_phone = $request->default_phone;

        $env_update = $this->changeEnv([
            'APP_NAME' => $string = preg_replace('/\s+/', '', $request->project_title),
            'APP_URL' => $request->APP_URL,
            
        ]);


        if(config('app.demolock') == 0){

          if(isset($request->APP_DEBUG)){
            $env_update = $this->changeEnv([
              'APP_DEBUG' => 'true'
            ]);
          }else{
            $env_update = $this->changeEnv([
              'APP_DEBUG' => 'false'
            ]);
          }

        }


        if(config('app.demolock') == 0){
     
          if($file = $request->file('logo')) {

            $name = 'logo'.uniqid() . '.' . $file->getClientOriginalExtension();

            if($setting->logo !="")
            {
                $content = @file_get_contents(public_path().'/images/logo/'.$setting->logo);

                if ($content) {
                    unlink(public_path().'/images/logo/'.$setting->logo);
                }
            }
        
            $file->move('images/logo', $name);
            $setting->logo = $name;
          }

          if($file = $request->file('preloader_logo')) {

             $name = 'preloader_logo'.uniqid() . '.' . $file->getClientOriginalExtension();

            if($setting->logo != null) {
              $content = @file_get_contents(public_path().'/images/logo/'.$setting->preloader_logo);
              if($content) {
                unlink(public_path().'/images/logo/'.$setting->preloader_logo);
              }
            }
            $file->move('images/logo', $name);
            $setting->preloader_logo = $name;
            
          }

          if($file = $request->file('footer_logo')) {

            $name = 'footer_logo'.uniqid() . '.' . $file->getClientOriginalExtension();

            if($setting->logo != null) {
              $content = @file_get_contents(public_path().'/images/logo/'.$setting->footer_logo);
              if($content) {
                unlink(public_path().'/images/logo/'.$setting->footer_logo);
              }
            }
            $file->move('images/logo', $name);
            $setting->footer_logo = $name;
            $setting->logo_type = 'L';
          }

          if($file = $request->file('favicon')) {
            $name = 'favicon'.uniqid() . '.' . $file->getClientOriginalExtension();

            if($setting->favicon != null) {
                $content = @file_get_contents(public_path().'/images/favicon/'.$setting->favicon);
                if($content) {
                  unlink(public_path().'/images/favicon/'.$setting->favicon);
                }
            }
            $file->move('images/favicon', $name);
            $setting->favicon = $name;
           
          }

        }


        if(isset($request->cookie_enable))
        {
          $setting->cookie_enable = 1;
        }
        else
        {
          $setting->cookie_enable = 0;
        }

        

        if(isset($request->project_logo))
        {
          $setting->logo_type = 'L';
        }
        else
        {
          $setting->logo_type = 'T';
        }

        if(isset($request->rightclick))
        {
          $setting->rightclick = 0;
        }
        else
        {
          $setting->rightclick = 1;
        }

        if(isset($request->inspect))
        {
          $setting->inspect = 0;
        }
        else
        {
          $setting->inspect = 1;
        }

        if(isset($request->w_email_enable))
        {
          if (env('MAIL_USERNAME')!=null) {
             $setting->w_email_enable = '1';
          }else{
            return back()->with('delete', trans('flash.UpdateMail'));
          }
        }
        else
        {
          $setting->w_email_enable = '0';
        }

        if(isset($request->verify_enable))
        {
          if (env('MAIL_USERNAME')!=null) {
             $setting->verify_enable = '1';
          }else{
            return back()->with('delete', trans('flash.UpdateMail'));
          }
        }
        else
        {
          $setting->verify_enable = '0';
        }

        if(isset($request->instructor_enable))
        {
          $setting->instructor_enable = '1';
        }
        else
        {
          $setting->instructor_enable = '0';
        }

        if(isset($request->cat_enable))
        {
          $setting->cat_enable = '1';
        }
        else
        {
          $setting->cat_enable = '0';
        }

        if(isset($request->preloader_enable))
        {
          $setting->preloader_enable = '1';
        }
        else
        {
          $setting->preloader_enable = '0';
        }

        

        if(isset($request->appointment_enable)){
          $setting->appointment_enable = 1;
        }else{
          $setting->appointment_enable = 0;
        }


        $setting->save();
        toast(__('adminstaticword.successfullyUpdate'),'success');
        return redirect()->route('gen.set');
    }
    public function updateSeo(Request $request)
    {

        $setting = Setting::first();
        $setting->meta_data_desc = $request->meta_data_desc;
        $setting->meta_data_keyword = $request->meta_data_keyword;
        $setting->google_ana = $request->google_ana;
        $setting->fb_pixel = $request->fb_pixel;

        $setting->save();
        toast(__('adminstaticword.successfullyUpdate'),'success');
        return redirect()->route('gen.set');
    }

    public function facebook(Request $request){}
    public function google(Request $request){}
    public function updateMailSetting(Request $request){}
}
