<div  class="action-btn-dropdown-container show top-container-inner-box mb-3">
    <button class="btn btn-primary"
        data-toggle='modal' data-target='#registerBannerModal'>
        <i class="fa-solid fa-square-plus"></i>  &nbsp; Añadir imagen
    </button>
</div>

@foreach ($banners as $banner)

<div class="banner-container d-flex">

    <div class="image-content-container">

        <div class="content-container mb-2">
            <span class="little-text text-bold"> URL: </span>
            {!! $banner->description !!}
        </div>

        <div class="image-container">
            <img src="{{ verifyImage($banner->file) }}" alt="">
        </div>

    </div>

    @if($banner->status == 1)
        <div class="status-icon-indicator active">
            <i class="fa-solid fa-circle-check"></i>
        </div>
    @else
        <div class="status-icon-indicator">
            <i class="fa-regular fa-circle-check"></i>
        </div>
    @endif


    <div class="btn-action-container text-center">

        <span data-url="{{ route('admin.announcements.update', $banner) }}"
            data-send="{{ route('admin.announcements.edit', $banner) }}"
            class="edit-banner-btn edit-btn">
            <i class="fa-solid fa-pen-to-square"></i>
        </span>

        <span data-url="{{ route('admin.announcements.destroy', $banner) }}"
            class="delete-banner-btn delete-btn">
            <i class="fa-solid fa-trash-can"></i>
        </span>

    </div>


</div>

@endforeach
