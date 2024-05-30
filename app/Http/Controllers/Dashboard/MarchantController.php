<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Marchant; // تأكد من أن اسم النموذج هو Marchant
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MarchantController extends Controller
{
    public function index()
    {
        $this->authorize('read Marchant');
        $marchants = Marchant::useFilters()->dynamicPaginate();

        return view('dashboard.marchants.index', compact('marchants'));
    }

    public function create()
    {
        $this->authorize('create Marchant');
        return view('dashboard.marchants.create');
    }

    public function store(Request $request)
    {
        $this->authorize('create Marchant');

        $request->validate([
            'name' => 'required|string|max:255',
            'identity_number' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'bank_name' => 'required|string|max:255',
            'iban' => 'required|string|max:255',
            'commercial_registration_file' => 'required|file|mimes:pdf,jpg,jpeg,png',
            'tax_registration_file' => 'required|file|mimes:pdf,jpg,jpeg,png',
            'business_license' => 'required|string|max:255',
            'agent_authorization' => 'required|string|max:255',
        ]);

        $marchant = new Marchant($request->all());

        if ($request->hasFile('commercial_registration_file')) {
            $marchant->commercial_registration_file = $request->file('commercial_registration_file')->store('commercial_registration_files', 'public');
        }

        if ($request->hasFile('tax_registration_file')) {
            $marchant->tax_registration_file = $request->file('tax_registration_file')->store('tax_registration_files', 'public');
        }

        $marchant->save();

        return redirect()->route('dashboard.marchants.index')->with('success', __('Marchant added successfully'));
    }

    public function show(Marchant $marchant)
    {
        $this->authorize('read Marchant');
        return view('dashboard.marchants.show', compact('marchant'));
    }

    public function edit(Marchant $marchant)
    {
        $this->authorize('update Marchant');
        return view('dashboard.marchants.edit', compact('marchant'));
    }

    public function update(Request $request, Marchant $marchant)
    {
        $this->authorize('update Marchant');

        $request->validate([
            'name' => 'required|string|max:255',
            'identity_number' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'bank_name' => 'required|string|max:255',
            'iban' => 'required|string|max:255',
            'commercial_registration_file' => 'sometimes|file|mimes:pdf,jpg,jpeg,png',
            'tax_registration_file' => 'sometimes|file|mimes:pdf,jpg,jpeg,png',
            'business_license' => 'required|string|max:255',
            'agent_authorization' => 'required|string|max:255',
        ]);

        $marchant->fill($request->all());

        if ($request->hasFile('commercial_registration_file')) {
            $marchant->commercial_registration_file = $request->file('commercial_registration_file')->store('commercial_registration_files', 'public');
        }

        if ($request->hasFile('tax_registration_file')) {
            $marchant->tax_registration_file = $request->file('tax_registration_file')->store('tax_registration_files', 'public');
        }

        $marchant->save();

        return redirect()->route('dashboard.marchants.index')->with('success', __('Marchant updated successfully'));
    }

    public function destroy(Marchant $marchant)
    {
        $this->authorize('delete Marchant');
        $marchant->delete();

        return redirect()->route('dashboard.marchants.index')->with('success', __('Marchant deleted successfully'));
    }
}
