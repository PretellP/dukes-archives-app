<div class="tab-content" id="modalTabContent">
    <!-- Itera sobre las imágenes y crea el contenido de cada pestaña -->

    @if(isset($productDetails) && $productDetails->files)
        @foreach($productDetails->files as $index => $image)

            <div class="tab-pane fade @if($index === 0) show active @endif" id="nav{{ $index + 1 }}" role="tabpanel" aria-labelledby="nav{{ $index + 1 }}-tab">
                <div class="product__modal-img w-img mb-3">
                    <img src="{{ verifyImage($image) }}" alt="">
                </div>
            </div>

        @endforeach
    @endif
</div>

<ul class="nav nav-tabs" id="modalTab" role="tablist">
    <!-- Itera sobre las imágenes y crea los botones de navegación -->
    @if(isset($productDetails) && $productDetails->files)
        @foreach($productDetails->files as $index => $image)
            <li class="nav-item" role="presentation">
                <button class="nav-link @if($index === 0) active @endif" id="nav{{ $index + 1 }}-tab" data-bs-toggle="tab" data-bs-target="#nav{{ $index + 1 }}" type="button" role="tab" aria-controls="nav{{ $index + 1 }}" aria-selected="{{ $index === 0 ? 'true' : 'false' }}">
                    <img src="{{ verifyImage($image) }}" alt="">
                </button>
            </li>
        @endforeach
    @endif
</ul>
