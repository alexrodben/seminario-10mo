<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Http\Requests\Customer\StoreCustomerRequest;
use App\Http\Requests\Customer\UpdateCustomerRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::where('user_id', auth()->id())->count();

        return view('customers.index', [
            'customers' => $customers
        ]);
    }

    public function create()
    {
        return view('customers.create');
    }

    public function store(StoreCustomerRequest $request)
    {
        /**
         * Handle upload an image
         */
        $image = '';
        if ($request->hasFile('photo')) {
            $image = $request->file('photo')->store('customers', 'public');
        }

        Customer::create([
            'user_id' => auth()->id(),
            'uuid' => Str::uuid(),
            'photo' => $image,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'type' => $request->type,
            'contact_name' => $request->contact_name,
            'contact_number' => $request->contact_number,
            'type' => $request->type,
            'notes' => $request->notes,
        ]);

        return redirect()
            ->route('customers.index')
            ->with('success', 'Beneficiario agregado');
    }

    public function show($uuid)
    {
        $customer = Customer::where('uuid', $uuid)->firstOrFail();
        $customer->loadMissing(['quotations', 'orders'])->get();

        return view('customers.show', [
            'customer' => $customer
        ]);
    }

    public function edit($uuid)
    {
        $customer = Customer::where('uuid', $uuid)->firstOrFail();
        return view('customers.edit', [
            'customer' => $customer
        ]);
    }

    public function update(UpdateCustomerRequest $request, $uuid)
    {
        $customer = Customer::where('uuid', $uuid)->firstOrFail();



        /**
         * Handle upload image with Storage.
         */
        $image = $customer->photo;
        if ($request->hasFile('photo')) {
            // Si ya existe una foto previa, la eliminamos
            if ($customer->photo && Storage::disk('public')->exists($customer->photo)) {
                Storage::disk('public')->delete($customer->photo);
            }
            // Guardamos la nueva imagen
            $image = $request->file('photo')->store('customers', 'public');
        }

        // Actualizamos el beneficiario con los nuevos datos
        $customer->update([
            'photo' => $image,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'type' => $request->type,
            'contact_name' => $request->contact_name,
            'contact_number' => $request->contact_number,
            'type' => $request->type,
            'notes' => $request->notes,
        ]);

        return redirect()
            ->route('customers.index')
            ->with('success', 'Beneficiario actualizado');
    }

    public function destroy($uuid)
    {
        $customer = Customer::where('uuid', $uuid)->firstOrFail();

        if ($customer->photo && Storage::disk('public')->exists($customer->photo)) {
            Storage::disk('public')->delete($customer->photo);
        }

        // Eliminamos el beneficiario
        $customer->delete();

        return redirect()
            ->back()
            ->with('success', 'Beneficiario eliminado');
    }
}