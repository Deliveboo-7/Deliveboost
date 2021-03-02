@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="company_name" class="col-md-4 col-form-label text-md-right">{{ __('Company Name') }}</label>

                            <div class="col-md-6">
                                <input id="company_name" type="text" class="form-control @error('company_name') is-invalid @enderror" name="company_name" value="{{ old('company_name') }}" required autocomplete="company_name" autofocus>

                                @error('company_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus>

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="vat" class="col-md-4 col-form-label text-md-right">{{ __('VAT') }}</label>

                            <div class="col-md-6">
                                <input id="vat" type="text" class="form-control @error('vat') is-invalid @enderror" name="vat" value="{{ old('vat') }}" required autocomplete="vat" maxlength="11" autofocus>

                                @error('vat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="img" class="col-md-4 col-form-label text-md-right">{{ __('Restaurant Cover') }}</label>

                            <div class="col-md-6">
                                <input id="img" type="text" class="form-control @error('img') is-invalid @enderror" name="img" value="{{ old('img') }}" required autocomplete="img" autofocus>

                                @error('img')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone_number" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

                            <div class="col-md-6">
                                <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" required autocomplete="phone_number" maxlength="20" autofocus>

                                @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="opening_info" class="col-md-4 col-form-label text-md-right">{{ __('Opening hours') }}</label>

                            <div class="col-md-6">
                                {{-- <input id="opening_info" type="text" class="form-control @error('opening_info') is-invalid @enderror" name="opening_info" value="{{ old('opening_info') }}" required autocomplete="opening_info" autofocus> --}}
                                <textarea name="opening_info" class="form-control @error('opening_info') is-invalid @enderror" value="{{ old('opening_info') }}" required autocomplete="opening_info" autofocus cols="30" rows="10">


                                </textarea>

                                @error('opening_info')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="website" class="col-md-4 col-form-label text-md-right">{{ __('Website') }}</label>

                            <div class="col-md-6">
                                <input id="website" type="text" class="form-control @error('website') is-invalid @enderror" name="website" value="{{ old('website') }}" required autocomplete="website" autofocus>

                                @error('website')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
