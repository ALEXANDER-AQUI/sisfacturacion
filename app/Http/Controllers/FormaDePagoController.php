<?php

namespace App\Http\Controllers;

use App\Models\FormaDePago;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\FormaDePagoRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class FormaDePagoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $formaDePagos = FormaDePago::paginate();

        return view('forma-de-pago.index', compact('formaDePagos'))
            ->with('i', ($request->input('page', 1) - 1) * $formaDePagos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $formaDePago = new FormaDePago();

        return view('forma-de-pago.create', compact('formaDePago'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FormaDePagoRequest $request): RedirectResponse
    {
        FormaDePago::create($request->validated());

        return Redirect::route('forma-de-pagos.index')
            ->with('success', 'FormaDePago created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $formaDePago = FormaDePago::find($id);

        return view('forma-de-pago.show', compact('formaDePago'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $formaDePago = FormaDePago::find($id);

        return view('forma-de-pago.edit', compact('formaDePago'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FormaDePagoRequest $request, FormaDePago $formaDePago): RedirectResponse
    {
        $formaDePago->update($request->validated());

        return Redirect::route('forma-de-pagos.index')
            ->with('success', 'FormaDePago updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        FormaDePago::find($id)->delete();

        return Redirect::route('forma-de-pagos.index')
            ->with('success', 'FormaDePago deleted successfully');
    }
}
