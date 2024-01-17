@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h2>Profile</h2>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.update', auth()->user()->id) }}">

                            @csrf
                            @method('PUT')
                            <div class="mb-3 form-floating">
                                <input type="text" class="form-control " name="first_name" id="first_name"
                                    placeholder="first_name"
                                    value="{{ auth()->user()->first_name . ' ' . auth()->user()->last_name }}">
                                <label for="first_name">Name</label>
                                {{-- <span class="nameError"></span> --}}
                            </div>

                            <div class="mb-3 form-floating">
                                <input type="text" class="form-control email" name="email" id="email"
                                    placeholder="Enter email" required>
                                <label for="email">Email</label>
                                {{-- <span class="email"></span> --}}
                            </div>

                             <div class="mb-3 form-floating">
                                <input type="password" class="form-control " name="password" id="password"
                                    placeholder="Enter password" required>
                                <label for="password">Password</label>
                                {{-- <span class="password"></span> --}}
                            </div>

                             <div class="mb-3 form-floating">
                                <input type="password" class="form-control " name="confirm_password" id="confirm_password"
                                    placeholder="Enter confirm_password" required>
                                <label for="confirm_password"> Confirm Password</label>
                                {{-- <span class="confirm_password"></span> --}}
                            </div>
                            <button type="submit" class="btn btn-primary">Update Profile</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
        <div id="editor"></div>
    </div>
@endsection
