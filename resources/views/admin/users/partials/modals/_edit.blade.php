<div class="modal fade userModal" id="EditUserModal" tabindex="-1" aria-labelledby="EditUserModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="EditUserModalLabel">
                    <div class="section-title mt-0">
                        <i class="fa-solid fa-pen-to-square"></i> &nbsp;
                        Editar Usuario
                    </div>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="" class="userForm" id="editUserForm" method="POST" enctype="multipart/form-data"
                data-validatenickname="{{ route('admin.users.validateEdit', ['column' => 'nickname']) }}"
                data-validateemail="{{ route('admin.users.validateEdit', ['column' => 'email']) }}">
                @csrf

                @include('admin.users.partials.components._form')

            </form>
        </div>
    </div>
</div>
