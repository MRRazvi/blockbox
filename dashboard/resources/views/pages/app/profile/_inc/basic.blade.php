<div class="tab-pane active" id="basic">
    @foreach($errors->updateProfileInformation->all() as $error)
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            {{ $error }}
        </div>
    @endforeach

    @if (session()->has('status') && session('status') == 'profile-information-updated')
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            Your profile has been successfully updated.
        </div>
    @endif

    <form action="{{ route('user-profile-information.update') }}" method="POST" class="form-horizontal">
        @csrf
        @method('PUT')

        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Full Name</label>
            <div class="col-sm-10">
                <input
                    type="text"
                    class="form-control"
                    id="name"
                    placeholder="Full Name"
                    name="name"
                    value="{{ auth()->user()->name }}"
                />
            </div>
        </div>
        <div class="form-group row">
            <label for="username" class="col-sm-2 col-form-label">Username</label>
            <div class="col-sm-10">
                <input
                    type="text"
                    class="form-control"
                    id="username"
                    placeholder="Username"
                    name="username"
                    value="{{ auth()->user()->username }}"
                />
            </div>
        </div>
        <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input
                    type="email"
                    class="form-control"
                    id="email"
                    placeholder="Email"
                    name="email"
                    value="{{ auth()->user()->email }}"
                />
            </div>
        </div>
        <div class="form-group row">
            <div class="offset-sm-2 col-sm-10">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
</div>
