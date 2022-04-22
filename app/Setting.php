<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    //
    protected $table ='settings';
    protected $fillable = [
       'project_title','default_address','default_phone','logo','favicon','logo_type','meta_data_desc','meta_data_keyword',
       'fb_login_enable','google_login_enable','instructor_enable','verify_enable','captcha_enable','rightclick',
       'inspect','promo_enable','cat_enable','preloader_enable','appointment_enable'
    ];

    protected $casts =[
      'fb_login_enable'=>'boolean',
      'google_login_enable'=>'boolean',
      'instructor_enable'=>'boolean',
      'verify_enable'=>'boolean',
      'w_email_enable'=>'boolean',
      'captcha_enable'=>'boolean',
      'rightclick'=>'boolean',
      'inspect'=>'boolean',
      'promo_enable'=>'boolean',
      'cat_enable'=>'boolean',
      'preloader_enable'=>'boolean',
      'appointment_enable'=>'boolean'
    ];

}
