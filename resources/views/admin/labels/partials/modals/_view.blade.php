<div class="modal fade labelModal" id="viewLabelModal" tabindex="-1" aria-labelledby="viewLabelModal"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">
                    <div class="section-title mt-0">
                        <i class="fa-regular fa-eye"></i> &nbsp;
                        Ver Categoría
                    </div>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form id="viewLabelForm">
                
                @include('admin.labels.partials.components._viewContent')

            </form>
        </div>
    </div>
</div>