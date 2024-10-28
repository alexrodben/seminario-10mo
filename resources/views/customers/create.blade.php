@extends('layouts.tabler')

@section('content')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center mb-3">
                <div class="col">
                    <h2 class="page-title">
                        {{ __('Crear beneficiario') }}
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

                                    <img class="img-account-profile rounded-circle mb-2"
                                        src="{{ asset('assets/img/demo/user-placeholder.svg') }}" alt=""
                                        id="image-preview" />

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
                                        {{ __('Información del beneficiario') }}
                                    </h3>

                                    <div class="row row-cards">
                                        <div class="col-md-12">
                                            <x-input name="name" label="Nombre" :required="true" />

                                            <x-input name="email" label="Correo electrónico" :required="true" />
                                        </div>

                                        <div class="col-sm-6 col-md-6">
                                            <x-input label="Teléfono" name="phone" :required="true" />
                                        </div>

                                        <div class="col-sm-6 col-md-6">
                                            <label for="type" class="form-label">
                                                Tipo de beneficiario
                                            </label>

                                            <select
                                                class="form-select form-control-solid @error('type') is-invalid @enderror"
                                                id="type" name="type">
                                                <option selected="" disabled="">Elige tipo de beneficiario:</option>
                                                <option value="Iglesia"
                                                    @if (old('type') == 'Iglesia') selected="selected" @endif>Iglesia
                                                </option>
                                                <option value="Escuela"
                                                    @if (old('type') == 'Escuela') selected="selected" @endif>Escuela
                                                </option>
                                                <option value="Particuales"
                                                    @if (old('type') == 'Particuales') selected="selected" @endif>Particuales
                                                </option>
                                                <option value="Mujeres"
                                                    @if (old('type') == 'Mujeres') selected="selected" @endif>Mujeres
                                                </option>
                                                <option value="Otros"
                                                    @if (old('type') == 'Otros') selected="selected" @endif>Otros
                                                </option>
                                            </select>

                                            @error('type')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>


                                        <div class="col-sm-6 col-md-6">
                                            <x-input label="Contacto nombre" name="contact_name" />
                                        </div>

                                        <div class="col-sm-6 col-md-6">
                                            <x-input label="Contacto numero" name="contact_number" />
                                        </div>

                                        <div class="mb-3">
                                            <label for="notes" class="form-label required">
                                                Dirección
                                            </label>

                                            <textarea name="notes" id="notes" rows="3"
                                                class="form-control form-control-solid @error('notes') is-invalid @enderror">{{ old('notes') }}</textarea>

                                            @error('notes')
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
