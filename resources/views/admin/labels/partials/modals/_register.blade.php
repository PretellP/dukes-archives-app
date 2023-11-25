<div class="modal fade labelModal" id="RegisterLabelModal" tabindex="-1" aria-labelledby="RegisterLabelModal"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="RegisterLabel">
                    <div class="section-title mt-0">
                        <i class="fa-solid fa-square-plus"></i> &nbsp;
                        Registrar Categoría
                    </div>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{ route('admin.labels.store') }}" id="registerLabelForm" method="POST">
                @csrf

                @include('admin.labels.partials.components._form')

            </form>
        </div>
    </div>
</div>