<div class="modal fade labelModal" id="EditLabelModal" tabindex="-1" aria-labelledby="EditLabelModal"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="EditLabel">
                    <div class="section-title mt-0">
                        <i class="fa-solid fa-pen-to-square"></i> &nbsp;
                        Editar Categoría
                    </div>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="" id="editLabelForm" method="POST">
                @csrf

                @include('admin.labels.partials.components._form')

            </form>
        </div>
    </div>
</div>