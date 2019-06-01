<?php


namespace App\Helper;


class FileDelete
{
    public static function deleteFile($file)
    {
        if (file_exists($file))
        {
        return unlink($file);
        }
    }
}
