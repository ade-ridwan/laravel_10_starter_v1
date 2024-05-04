<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Role;

class JurusanController extends Controller
{
    public function index(Request $request)
    {
        $jurusans = Jurusan::query()
            ->when(!blank($request->search), function ($query) use ($request) {
                return $query
                    ->where('nama_jurusan', 'like', '%' . $request->search . '%');
            })
            ->latest()
            ->paginate(10);

        return view('jurusan.index', compact('jurusans'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'jurusan' => ['required'],
            'kode_jurusan' => ['required', 'unique:data_jurusan,kode_jurusan']
        ]);

        return Jurusan::create($data)
            ? back()->with('success', 'Jurusan has been created successfully!')
            : back()->with('failed', 'Jurusan was not created successfully!');
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'jurusan' => ['required'],
            'kode_jurusan' => ['required']
        ]);

        $jurusan = Jurusan::find($id);
        $jur = $jurusan->update($data);

        if (true) {
            Session::flash('success', 'Jurusan has been created successfully!');
            Session::save();
            return redirect()->route('jurusan.index');
        }
        return redirect()->route('jurusan.index')->with(['failed', 'Jurusan was not created successfully!']);
    }

    public function destroy(Jurusan $jurusan)
    {
        return $jurusan->delete()
            ? back()->with('success', 'Jurusan has been deleted successfully!')
            : back()->with('failed', 'Jurusan was not deleted successfully!');
    }
}
//
