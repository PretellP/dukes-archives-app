<?php

namespace App\Services;

use App\Models\{Announcement, User};
use Auth;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;

class AnnouncementService
{
    public function storeBanner($request, $storage)
    {
        $data = $request->all();

        $data['status'] = isset($data['status']) ? 1 : 0;

        if ($data['description']) {

            $target = isset($data['blank_indicator']) ? '_BLANK' : '_SELF';
            $data['description'] = '<a href="' . $data['description'] . '"  target="' . $target . '">' . $data['description'] . '</a>';
        } else {
            $data['description'] = '';
        }

        $banner = Announcement::create($data);

        if ($banner && $request->hasFile('image')) {

            $file_type = 'imagenes';
            $category = 'publicaciones';
            $file = $request->file('image');
            $belongsTo = 'publicaciones';
            $relation = 'one_one';

            return app(FileService::class)->store(
                $banner,
                $file_type,
                $category,
                $file,
                $storage,
                $belongsTo,
                $relation
            );
        }

        throw new Exception(config('parameters.exception_message'));
    }

    public function getBanners()
    {
        return Announcement::with('file')
            ->orderBy('id', 'DESC')
            ->get();
    }

    public function updateBanner(Announcement $banner, $request, $storage)
    {
        $data = $request->all();
        $data['status'] = isset($data['status']) ? 1 : 0;

        if ($data['description']) {
            $target = isset($data['blank_indicator']) ? '_BLANK' : '_SELF';
            $data['description'] = '<a href="' . $data['description'] . '"  target="' . $target . '">' . $data['description'] . '</a>';
        } else {
            $data['description'] = '';
        }

        if ($banner->update($data)) {

            if ($request->hasFile('image')) {

                app(FileService::class)->destroy($banner->file, $storage);

                $file_type = 'imagenes';
                $category = 'publicaciones';
                $file = $request->file('image');
                $belongsTo = 'publicaciones';
                $relation = 'one_one';

                app(FileService::class)->store(
                    $banner,
                    $file_type,
                    $category,
                    $file,
                    $storage,
                    $belongsTo,
                    $relation
                );
            }

            return true;

        };

        throw new Exception(config('parameters.exception_message'));
    }

    public function destroyBanner(Announcement $banner, $storage)
    {
        if (app(FileService::class)->destroy($banner->file, $storage)) {

            if ($banner->delete()) {
                return true;
            }
        };

        throw new Exception(config('parameters.exception_message'));
    }
}
