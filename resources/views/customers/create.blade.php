@extends('layouts.tabler')

@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center mb-3">
            <div class="col">
                <h2 class="page-title">
                    {{ __('Crear cliente') }}
                </h2>
            </div>
        </div>

        @include('partials._breadcrumbs')
    </div>
</div>

<div class="page-body">
    <div class="container-xl">
        <div class="row row-cards">

            <form action="{{ route('customers.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <!-- <h3 class="card-title">
                                    {{ __('Customer Image') }}
                                </h3> -->

                                <img class="img-account-profile rounded-circle mb-2" src="{{ asset('assets/img/demo/user-placeholder.svg') }}" alt="" id="image-preview" />

                                <!-- <div class="small font-italic text-muted mb-2">Formato JPG o PNG no mayor a 2 MB</div>

                                <input class="form-control @error('photo') is-invalid @enderror" type="file"  id="image" name="photo" accept="image/*" onchange="previewImage();"> -->

                                @error('photo')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">
                                    {{ __('Información del cliente') }}
                                </h3>

                                <div class="row row-cards">
                                    <div class="col-md-12">
                                        <x-input name="name" label="Nombre" :required="true"/>

                                        <x-input name="email" label="Correo electrónico" :required="true"/>
                                    </div>

                                    <div class="col-sm-6 col-md-6">
                                        <x-input label="Teléfono" name="phone" :required="true"/>
                                    </div>

                                    <div class="col-sm-6 col-md-6">
                                        <label for="bank_name" class="form-label">
                                            Medio de pago
                                        </label>

                                        <select class="form-select form-control-solid @error('bank_name') is-invalid @enderror" id="bank_name" name="bank_name">
                                            <option selected="" disabled="">Elige medio de pago:</option>
                                            <option value="Efectivo" @if(old('bank_name') == 'Efec')selected="selected"@endif>Efectivo</option>
                                            <option value="BAC" @if(old('bank_name') == 'BAC')selected="selected"@endif>BAC</option>
                                            <option value="Industrial" @if(old('bank_name') == 'Industrial')selected="selected"@endif>Industrial</option>
                                            <option value="Banrural" @if(old('bank_name') == 'Banrural')selected="selected"@endif>Banrural</option>
                                        </select>

                                        @error('bank_name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>


                                    <div class="col-sm-6 col-md-6">
                                        <x-input label="Titular de la cuenta" name="account_holder" />
                                    </div>

                                    <div class="col-sm-6 col-md-6">
                                        <x-input label="Número de cuenta" name="account_number" />
                                    </div>

                                    <div class="mb-3">
                                        <label for="address" class="form-label required">
                                            Dirección
                                        </label>

                                        <textarea name="address"
                                                  id="address"
                                                  rows="3"
                                                  class="form-control form-control-solid @error('address') is-invalid @enderror"
                                            >{{ old('address') }}</textarea>

                                        @error('address')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-end">
                                <button class="btn btn-primary" type="submit">
                                    {{ __('Guardar') }}
                                </button>

                                <a class="btn btn-outline-warning" href="{{ route('customers.index') }}">
                                    {{ __('Cancelar') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@pushonce('page-scripts')
    <script src="{{ asset('assets/js/img-preview.js') }}"></script>
@endpushonce
