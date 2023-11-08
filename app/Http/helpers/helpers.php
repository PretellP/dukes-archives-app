<?php

use Carbon\Carbon;
use App\Models\{
    File as ModelsFile,
};

date_default_timezone_set("America/Lima");

use Illuminate\Support\Facades\File as FacadesFile;

function setActive($routeName)
{
    return request()->routeIs($routeName) ? 'active' : '';
}

function getMessageFromSuccess($success, $context)
{
    $message = $success ? config('parameters.'. $context .'_message') : config('parameters.exception_message');

    return $message;
}

function getStatusButton($status)
{
    return '<span class="status ' . ($status == 1 ? 'active' : 'inactive') . '">' . 
                ($status == 1 ? 'Activo' : 'Inactivo') . 
            '</span>';
}

// ---------- FILE -------------

function verifyUserAvatar($file)
{
    $url = asset('storage/img/user_avatar/default.png');

    if ($file) {
        $url = $file->file_url == null ? $url
        : $file->file_url;
    }

    return $url;
}

function verifyImage($file)
{
    $url = asset('storage/img/common/no-image.png');
    if ($file) {
        $url = $file->file_url == null ? $url
            : $file->file_url;

        // TARDA DEMASIADO CUANDO SON VARIAS IMÁGENES

        // $directory = (explode('/', str_ireplace(array('http://', 'https://'), '', $url)))[0];

        // if ($directory == 'localhost' || $directory == '127.0.0.1:8000') {
        //     $url = $url == null ? asset('storage/img/common/no-image.png')
        //         : $url;
        // } else {
        //     $ch = curl_init();
        //     curl_setopt($ch, CURLOPT_URL, $url);

        //     curl_setopt($ch, CURLOPT_NOBODY, 1);
        //     curl_setopt($ch, CURLOPT_FAILONERROR, 1);
        //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        //     $result = curl_exec($ch);
        //     curl_close($ch);
        //     if ($result == false) {
        //         $url = asset('storage/img/common/no-image.png');
        //     }
        // }
    }

    return $url;
}

function verifyFile($file)
{
    return $file != null ? $file->file_url : null;
}

//--------------------------------


// ----------- DATE TIME ------------

function getCurrentDate()
{
    return Carbon::now('America/Lima')->format('Y-m-d');
}

function getDiffForHumansFromTimestamp($timestamp)
{
    return Carbon::parse($timestamp)->diffForHumans();
}

function getTimeforHummans($time)
{
    return Carbon::parse($time)->format('g:i A');
}

function getCurrentYear()
{
    return Carbon::now('America/Lima')->format('Y');
}

function getCurrentMonth()
{
    return Carbon::now('America/Lima')->isoFormat('MMMM');
}

// ----------------------------------




function normalizeInputStatus($data)
{
    $data['status'] = isset($data['status']) ? 1 : 0;

    return $data;
}


function getFileExtension(ModelsFile $file)
{
    $pathToFile = $file->file_url;

    $fileExt = FacadesFile::extension($pathToFile);

    switch ($fileExt) {
        case 'ai':
            $extension = 'ai';
            break;
        case 'avi':
            $extension = 'avi';
            break;
        case 'csv':
            $extension = 'csv';
            break;
        case 'eps':
            $extension = 'eps';
            break;
        case 'docx':
        case 'doc':
            $extension = 'docx';
            break;
        case 'flv':
            $extension = 'flv';
            break;
        case 'gif':
            $extension = 'gif';
            break;
        case 'html':
            $extension = 'html';
            break;
        case 'java':
            $extension = 'java';
            break;
        case 'jpg':
        case 'jpeg':
        case 'jfif':
        case 'pjeg':
        case 'pjp':
            $extension = 'jpg';
            break;
        case 'mid':
        case 'midi':
            $extension = 'mid';
            break;
        case 'mov':
            $extension = 'mov';
            break;
        case 'mp4':
        case 'm4p':
        case 'm4v':
            $extension = 'mp4';
            break;
        case 'mpeg':
        case 'mpg':
        case 'mp2':
        case 'mpe':
        case 'mpv':
        case 'm2v':
            $extension = 'mpeg';
            break;
        case 'pdf':
            $extension = 'pdf';
            break;
        case 'png':
            $extension = 'png';
            break;
        case 'pptx':
        case 'pptm':
        case 'ppt':
            $extension = 'ppt';
            break;
        case 'psd':
            $extension = 'psd';
            break;
        case 'rar':
            $extension = 'rar';
            break;
        case 'rss':
            $extension = 'rss';
            break;
        case 'svg':
            $extension = 'svg';
            break;
        case 'txt':
            $extension = 'txt';
            break;
        case 'wav':
            $extension = 'wav';
            break;
        case 'vma':
            $extension = 'vma';
            break;
        case 'xml':
            $extension = 'xml';
            break;
        case 'xlsx':
        case 'xls':
            $extension = 'xsl';
            break;
        case 'zip':
            $extension = 'zip';
            break;
        default:
            $extension = 'default';
    }

    return $extension;
}
