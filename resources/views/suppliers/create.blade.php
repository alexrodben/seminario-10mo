@extends('layouts.tabler')

@section('content')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center mb-3">
                <div class="col">
                    <h2 class="page-title">
                        {{ __('Agregar donador') }}
                    </h2>
                </div>
            </div>

            @include('partials._breadcrumbs')
        </div>
    </div>

    <div class="page-body">
        <div class="container-xl">
            <div class="row row-cards">

                <form action="{{ route('suppliers.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <!-- <h3 class="card-title">
                                                    {{ __('Profile Image') }}
                                                </h3> -->

                                    <img class="img-account-profile rounded-circle mb-2"
                                        src="{{ asset('assets/img/demo/user-placeholder.svg') }}" alt=""
                                        id="image-preview" />

                                    <!-- <div class="small font-italic text-muted mb-2">Formato JPG o PNG no mayor a 1 MB</div>

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
                                        {{ __('Detalle de donador') }}
                                    </h3>

                                    <div class="row row-cards">
                                        <div class="col-md-12">
                                            <x-input name="name" label="Nombre" :required="true" />

                                            <x-input name="email" label="Correo electrónico" :required="false" />

                                            <x-input name="phone" label="Teléfono" :required="true" />
                                        </div>

                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="notes" class="form-label required">
                                                    {{ __('Notas') }}
                                                </label>

                                                <textarea id="notes" name="notes" rows="3" class="form-control @error('notes') is-invalid @enderror">{{ old('notes') }}</textarea>

                                                @error('notes')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-end">
                                    <button class="btn btn-primary" type="submit">
                                        {{ __('Guardar') }}
                                    </button>

                                    <a class="btn btn-outline-warning" href="{{ route('suppliers.index') }}">
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
