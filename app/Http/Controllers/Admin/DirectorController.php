<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Director;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DirectorController extends Controller
{
    public function index()
    {
        return view('admin.directors.index', ['directors' => Director::orderBy('sort_order')->orderBy('name')->paginate(12)]);
    }

    public function create()
    {
        return view('admin.directors.form', ['director' => new Director]);
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);
        $data['photo'] = $request->file('photo')?->store('directors', 'public');

        Director::create($data);

        return redirect()->route('admin.directors.index')->with('status', 'Direksi berhasil ditambahkan.');
    }

    public function edit(Director $director)
    {
        return view('admin.directors.form', compact('director'));
    }

    public function update(Request $request, Director $director)
    {
        $data = $this->validated($request);

        if ($request->hasFile('photo')) {
            if ($director->photo) {
                Storage::disk('public')->delete($director->photo);
            }
            $data['photo'] = $request->file('photo')->store('directors', 'public');
        }

        $director->update($data);

        return redirect()->route('admin.directors.index')->with('status', 'Data direksi berhasil diperbarui.');
    }

    public function destroy(Director $director)
    {
        if ($director->photo) {
            Storage::disk('public')->delete($director->photo);
        }
        $director->delete();

        return redirect()->route('admin.directors.index')->with('status', 'Data direksi berhasil dihapus.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'name' => ['required', 'string', 'max:160'],
            'position' => ['required', 'string', 'max:120'],
            'bio' => ['nullable', 'string', 'max:3000'],
            'photo' => ['nullable', 'image', 'max:5120'],
            'sort_order' => ['required', 'integer', 'min:0', 'max:9999'],
        ]);
    }
}
