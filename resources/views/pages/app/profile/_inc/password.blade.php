<div class="tab-pane" id="password">
    @foreach($errors->updatePassword->all() as $error)
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            {{ $error }}
        </div>
    @endforeach

    @if (session()->has('status') && session('status') == 'password-updated')
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            Your password has been successfully updated.
        </div>
    @endif

    <form action="{{ route('user-password.update') }}" method="POST" class="form-horizontal">
        @csrf
        @method('PUT')

        <div class="form-group row">
            <label for="current_password" class="col-sm-2 col-form-label">Current Password</label>
            <div class="col-sm-10">
                <input
                    type="password"
                    class="form-control"
                    id="current_password"
                    placeholder="Current Password"
                    name="current_password"
                />
            </div>
        </div>
        <div class="form-group row">
            <label for="password" class="col-sm-2 col-form-label">New Password</label>
            <div class="col-sm-10">
                <input
                    type="password"
                    class="form-control"
                    id="password"
                    placeholder="New Password"
                    name="password"
                />
            </div>
        </div>
        <div class="form-group row">
            <label for="password_confirmation" class="col-sm-2 col-form-label">Confirm Password</label>
            <div class="col-sm-10">
                <input
                    type="password"
                    class="form-control"
                    id="password_confirmation"
                    placeholder="Confirm Password"
                    name="password_confirmation"
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
