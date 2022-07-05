<?php

namespace App\Helpers;

class Helper 
{

    public static function IDGenerator($model, $trow, $length = 4 , $prefix)
    {

        $kh_data = $model::orderBy('id', 'desc')->first();

        if(!$kh_data)
        {
            $kh_length = $length;
            $last_number = '';
        } 
        else 
        {
            $code_kh = substr($kh_data->$trow, strlen($prefix)+1);
            $kh_last_number = ($code_kh/1)*1;
            $increment_last_number = $kh_last_number+1;
            $last_number_length = strlen($increment_last_number);
            $kh_length = $length - $last_number_length;
        //    $last_number_length = $increment_last_number;
            $last_number = $increment_last_number;
        }
        $servicerepair = "";

        for($i=0; $i<$kh_length;$i++)
        {
            $servicerepair.= "0";
        }
        return $prefix.'-'.$servicerepair.$last_number;
    }

    public static function InvGenerator($model, $trow, $length = 4 , $prefix)
    {

        $kh_data = $model::orderBy('id', 'desc')->first();

        if(!$kh_data)
        {
            $kh_length = $length;
            $last_number = '';
        } 
        else 
        {
            $code_kh = substr($kh_data->$trow, strlen($prefix)+1);
            $kh_last_number = ($code_kh/1)*1;
            $increment_last_number = $kh_last_number+1;
            $last_number_length = strlen($increment_last_number);
            $kh_length = $length - $last_number_length;
        //    $last_number_length = $increment_last_number;
            $last_number = $increment_last_number;
        }
        $salary = "";

        for($i=0; $i<$kh_length;$i++)
        {
            $salary.= "0";
        }
        return $prefix.'-'.$salary.$last_number;
    }

}