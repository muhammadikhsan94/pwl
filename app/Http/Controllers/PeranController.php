<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use DataTables;

class PeranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('peran.index');
    }

    /**
     * Get data for DataTables
     */
    public function data()
    {
        $data = Role::orderBy('created_at', 'desc')->get();

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('aktif', function($row) {
                if($row->aktif == 1) {
                    return '<span class="badge badge-success">Aktif</span>';
                } else {
                    return '<span class="badge badge-danger">Tidak Aktif</span>';
                }
            })
            ->addColumn('action', function($row) {
                $html = '';
                $routeEdit = route('peran.edit', $row->id);
                $html .= '<a class="btn btn-info btn-xs mr-2" href="'.$routeEdit.'"><i class="fas fa-edit mr-2"></i>Ubah</a>';
                $html .= '<button class="btn btn-danger btn-xs btn-delete" data-id="'.$row->id.'"><i class="fas fa-trash-alt mr-2"></i>Hapus</button>';
                return $html;
            })
            ->rawColumns(['aktif', 'action'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('peran.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255|unique:role,nama',
            'aktif' => 'required|in:0,1',
        ]);

        Role::create([
            'nama' => $request->nama,
            'aktif' => $request->aktif,
        ]);

        return redirect()->route('peran.index')->with('success', 'Data peran berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $peran = Role::findOrFail($id);
        return view('peran.edit', compact('peran'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255|unique:role,nama,' . $id,
            'aktif' => 'required|in:0,1',
        ]);

        $peran = Role::findOrFail($id);
        $peran->nama = $request->nama;
        $peran->aktif = $request->aktif;
        $peran->save();

        return redirect()->route('peran.index')->with('success', 'Data peran berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $peran = Role::findOrFail($id);
            $peran->delete();

            return response()->json(['success' => true, 'message' => 'Data peran berhasil dihapus.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Gagal menghapus data peran.'], 500);
        }
    }
}
