<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


trait FileManagement
{
    public function uploadFile($file, $path = '')
    {
        $fileName = uniqid(rand()) . '.' . $file->getClientOriginalExtension();
        $file->move($path, $fileName);
        return $fileName;
    }

    protected function deleteFile($path)
    {
        try {
            unlink($path);
        } catch (\Exception $e) {
            return $path;
        }
        return true;
    }

    public function generateQrCode()
    {
        $qrName = rand(2000, 365840) . '_' . time() . '.svg';
         QrCode::color(31, 106, 205)->generate($qrName, public_path('uploads/qrcodes/'.$qrName));
        return $qrName;
    }

    protected function uniqueName($path, $disk = "public")
    {
        $name = uniqid() . '_' . md5(Carbon::now());
        if (Storage::disk($disk)->has($path . '/' . $name)) {
            $this->uniqueName($disk, $path);
        } else {
            return $name;
        }
    }

    protected function uniqueDirName($path, $disk = "public")
    {
        $name = uniqid();
        if (Storage::disk($disk)->has($path . '/' . $name)) {
            $this->uniqueDirName($path, $disk);
        } else {
            return '/' . $path . '/' . $name;
        }
    }
}
