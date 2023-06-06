<header class="p-3 bg-dark text-white">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
          

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                @auth
                    @role('admin')
                        <li><a href="{{ route('users.index') }}" class="nav-link px-2 text-white">Users</a></li>
                        <li><a href="{{ route('roles.index') }}" class="nav-link px-2 text-white">Roles</a></li>
                        <li><a href="{{ route('permissions.index') }}" class="nav-link px-2 text-white">Permissions</a></li>
                        <li><a href="{{ route('examscores') }}" class="nav-link px-2 text-white">Exam Answers</a></li>
                        {{-- <li><a href="{{ route('image.index') }}" class="nav-link px-2 text-white">upload Images</a></li> --}}

                    @endrole
                @endauth
            </ul>

            
            @auth
                {{ auth()->user()->name }}&nbsp;
                <div class="text-end">
                    <a href="{{ route('logout.perform') }}" class="btn btn-outline-light me-2">Logout</a>
                </div>
            @endauth

        </div>
    </div>
</header>
