<?php

namespace App\Http\Controllers;



use App\Qapp;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Imagick;
use Softon\LaravelFaceDetect\Facades\FaceDetect;
use Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Image;
use Mockery\Exception;
use function Sodium\randombytes_buf;



class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;





}
