<div class="modal fade userModal" id="RegisterUserModal" tabindex="-1" aria-labelledby="RegisterUserModal"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="RegisterUserModalLabel">
                    <div class="section-title mt-0">
                        <i class="fa-solid fa-user-plus"></i> &nbsp;
                        Registrar Usuario
                    </div>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{ route('admin.users.store') }}" class="userForm" id="registerUserForm" method="POST" enctype="multipart/form-data"
                data-validatenickname="{{ route('users.validateRegister', ['column' => 'nickname']) }}"
                data-validateemail="{{ route('users.validateRegister', ['column' => 'email']) }}">
                @csrf

                @include('admin.users.partials.components._form')

            </form>

        </div>
    </div>
</div>
