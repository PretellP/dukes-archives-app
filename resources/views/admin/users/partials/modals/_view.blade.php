<div class="modal fade userModal" id="viewUserModal" tabindex="-1" aria-labelledby="viewUserModal"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">
                    <div class="section-title mt-0">
                        <i class="fa-regular fa-eye"></i> &nbsp;
                        Ver usuario
                    </div>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form id="viewUserForm">
                
                @include('admin.users.partials.components._viewContent')

            </form>
        </div>
    </div>
</div>