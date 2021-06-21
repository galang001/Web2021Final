<?php

namespace App\Http\Controllers;

use App\Models\Bio;
use App\Models\Jkel;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bio=Bio::
          join('jkels', 'bios.j_kelamin', '=', 'jkels.id_jkel')
          ->join('kelas', 'bios.kd_kelas', '=', 'kelas.id_kelas')
        ->paginate(5);
        $title="Biodata";
        return view('admin.Kelas6a', compact('title','bio'));
    }

    // public function pagination ()
    // {
    //   $data = Bio::paginate(5);
    //   return view('admin.kelas6a', compact('data'));
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jkel=Jkel::all();
        $kelas=Kelas::all();
        $title="Input Data";
        return view('admin.inputdata', compact('title','jkel','kelas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message=[
            'required'=>'Kolom :attribute Harus Lengkap',
            'date'=>'Kolom :attribute Wajib Dengan Format Y-m-d contoh : 2000-04-12',
            'numeric'=>'Kolom :attribute Harus Angka'
        ];
        $validasi=$request->validate([
            'nama'=>'required|max:255',
            'nis'=>'required',
            'alamat'=>'required|max:255',
            'tanggal_lahir'=>'date',
            'j_kelamin'=>'required',
            'kd_kelas'=>'required',
        ]);
        $validasi['user_id']=Auth::id();
        Bio::create($validasi);
        return redirect('biodata')->with('success','Data Berhasil Tersimpan');
        }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_user)
    {
        $bio=Bio::find($id_user);
        $jkel=Jkel::all();
        $kelas=kelas::all();
        $title="Edit Biodata";
        return view('admin.inputdata', compact('title','bio','jkel','kelas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_user)
    {
        $message=[
            'required'=>'Kolom :attribute Harus Lengkap',
            'date'=>'Kolom :attribute Wajib Dengan Format Y-m-d contoh : 2000-04-12',
            'numeric'=>'Kolom :attribute Harus Angka'
        ];
        $validasi=$request->validate([
            'nama'=>'required|max:255',
            'nis'=>'required',
            'alamat'=>'required|max:255',
            'tanggal_lahir'=>'date',
            'j_kelamin'=>'required',
            'kd_kelas'=>'required',
        ]);
        $validasi['user_id']=Auth::id();
        Bio::where('id',$id_user)->update($validasi);
        return redirect('biodata')->with('success','Data Berhasil Terupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_user)
    {
        $bio=Bio::find($id_user);
        if($bio !=null){
            $bio=Bio::find($bio->id);
            Bio::where('id',$id_user)->delete();
        }
        return redirect('biodata')->with('success','Data Berhasil Terhapus');
    }
}
