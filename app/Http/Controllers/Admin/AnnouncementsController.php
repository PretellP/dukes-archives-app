<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use App\Services\{AnnouncementService};
use Exception;
use Illuminate\Http\Request;

class AnnouncementsController extends Controller
{
    private $annoucementService;

    public function __construct(AnnouncementService $service)
    {
        $this->annoucementService = $service;
    }

    public function index(Request $request)
    {
        $banners = $this->annoucementService->getBanners();

        return view('admin.announcements.index', compact(
            'banners'
        ));
    }

    public function store(Request $request)
    {
        $storage = env('FILESYSTEM_DRIVER');

        try {
            $this->annoucementService->storeBanner($request, $storage);
            $success = true;
        } catch (Exception $e) {
            $success = false;
        }

        $message = getMessageFromSuccess($success, 'stored');

        if ($success) {
            $banners = $this->annoucementService->getBanners();
            $html = view('admin.announcements.partials.components._banners_list', compact('banners'))->render();
        }

        return response()->json([
            "success" => $success,
            "message" => $message,
            "html" => $html ?? null
        ]);
    }

    public function editBanner(Announcement $banner)
    {
        $banner->load('file');

        $url = verifyImage($banner->file);

        return response()->json([
            "banner" => $banner,
            "url_img" => $url
        ]);
    }

    public function updateBanner(Request $request, Announcement $banner)
    {
        $banner->load('file');

        $storage = env('FILESYSTEM_DRIVER');

        try {
            $success = $this->annoucementService->updateBanner($banner, $request, $storage);
        } catch (Exception $e) {
            $success = false;
        }

        $message = getMessageFromSuccess($success, 'updated');

        if ($success) {
            $banners = $this->annoucementService->getBanners();
            $html = view('admin.announcements.partials.components._banners_list', compact('banners'))->render();
        }

        return response()->json([
            "success" => $success,
            "message" => $message,
            "html" => $html ?? null
        ]);
    }


    public function destroyBanner(Announcement $banner)
    {
        $banner->load('file');

        $storage = env('FILESYSTEM_DRIVER');

        try {
            $success = $this->annoucementService->destroyBanner($banner, $storage);
        } catch (Exception $e) {
            $success = false;
        }

        $message = getMessageFromSuccess($success, 'deleted');

        if ($success) {
            $banners = $this->annoucementService->getBanners();
            $html = view('admin.announcements.partials.components._banners_list', compact('banners'))->render();
        }

        return response()->json([
            "success" => $success,
            "message" => $message,
            "html" => $html ?? null
        ]);
    }

}
