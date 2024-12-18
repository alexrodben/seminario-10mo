@extends('layouts.tabler')

@section('content')
    <div class="page-body">
        @if ($orders->isEmpty())
            {{-- <x-empty
        title="No entradas no encontradas"
        message="Trata de ajustar tu búsqueda o filtrar lo que estás buscando"
        button_label="{{ __('Agregar tu primera entrada') }}"
        button_route="{{ route('orders.create') }}"
    /> --}}
            <div class="empty">
                <div class="empty-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-mood-happy" width="24"
                        height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                        <path d="M9 9l.01 0" />
                        <path d="M15 9l.01 0" />
                        <path d="M8 13a4 4 0 1 0 8 0h-8" />
                    </svg>
                </div>
                <p class="empty-title">No hay entradas con saldos pendientes encontradas</p>
            </div>
        @else
            <div class="container-xl">
                <div class="card">
                    <div class="card-header">
                        <div>
                            <h3 class="card-title">
                                {{ __('Lista de entradas con saldo vencido') }}
                            </h3>
                        </div>
                        <div class="card-actions">
                            <x-action.create route="{{ route('orders.create') }}" />
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered card-table table-vcenter text-nowrap datatable">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" class="text-center">No.</th>
                                    <th scope="col" class="text-center">No. de documento</th>
                                    <th scope="col" class="text-center">Beneficiario</th>
                                    <th scope="col" class="text-center">Fecha</th>
                                    <th scope="col" class="text-center">Pago</th>
                                    <th scope="col" class="text-center">Pagado</th>
                                    <th scope="col" class="text-center">Adeudado</th>
                                    <th scope="col" class="text-center">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td class="text-center">
                                            {{ $loop->iteration }}
                                        </td>
                                        <td class="text-center">
                                            {{ $order->invoice_no }}
                                        </td>
                                        <td class="text-center">
                                            {{ $order->customer->name }}
                                        </td>
                                        <td class="text-center">
                                            {{ $order->order_date->format('d-m-Y') }}
                                        </td>
                                        <td class="text-center">
                                            {{ $order->payment_type }}
                                        </td>
                                        <td class="text-center">
                                            <span class="badge bg-green text-white">
                                                {{ Number::currency($order->pay, 'QTZ') }}
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <span class="badge bg-yellow text-white">
                                                {{ Number::currency($order->due, 'QTZ') }}
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <x-button.edit class="btn-icon" route="{{ route('due.edit', $order) }}" />
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        {{-- - - --}}
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
