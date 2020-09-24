<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Carbon\Carbon;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;



    protected function uploadFile($file)
    {
        $year = Carbon::now()->year;
        $month = Carbon::now()->month;
        $day = Carbon::now()->day;

        $filePath = "/storage/upload/{$year}/{$month}/{$day}/";
        $fileName = time() . "_" . $file->getClientOriginalName();

        //        $file->move(public_path() . '_html' . $filePath, $fileName);
        $file->move(public_path() . $filePath, $fileName);
        $file = "$filePath" . "$fileName";

        return $file;

    }

    protected function fa2en($string)
    {
        $persian1 = array('۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹');
        $persian2 = array('٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩');
        $num = range(0, 9);
        $string = str_replace($persian1, $num, $string);
        $string = str_replace(',', '', $string);
        return intval(str_replace($persian2, $num, $string));
    }



}
