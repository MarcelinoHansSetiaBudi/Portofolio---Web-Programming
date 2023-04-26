<?php

namespace App\Http\Controllers;

use App\Models\riwayat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class educationController extends Controller
{
    function __construct()
    {
        $this->_tipe = 'education';
    }
    public function index()
    {
        $data = riwayat::where('tipe', $this->_tipe )->orderBy('tgl_selesai', 'desc')->get();
        return view('dashboard.education.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.education.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('judul', $request->judul);
        Session::flash('info_1', $request->info_1);
        Session::flash('info_2', $request->info_2);
        Session::flash('info_3', $request->info_3);
        Session::flash('tgl_mulai', $request->tgl_mulai);
        Session::flash('tgl_selesai', $request->tgl_selesai);
        $request->validate(
            [
                'judul' => 'required',
                'info_1' => 'required',
                'tgl_mulai' => 'required',
            ],
            [
                'judul.required' => 'Judul wajib diisi',
                'info_1.required' => 'Nama Perusahaan wajib diisi',
                'tgl_mulai.required' => 'Tanggal Mulai wajib diisi'
            ]
        );

        $data = [
            'judul' => $request->judul,
            'info_1' => $request->info_1,
            'info_2' => $request->info_2,
            'info_3' => $request->info_3,
            'tipe' => $this->_tipe ,
            'tgl_mulai' => $request->tgl_mulai,
            'tgl_selesai' => $request->tgl_selesai,
        ];
        riwayat::create($data);

        return redirect()->route('education.index')->with('Success', 'Berhasil menambahkan data education');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = riwayat::where('id', $id)->where('tipe', $this->_tipe)->first();
        return view('dashboard.education.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'judul' => 'required',
                'info_1' => 'required',
                'tgl_mulai' => 'required',
            ],
            [
                'judul.required' => 'Judul wajib diisi',
                'info_1.required' => 'Nama Perusahaan wajib diisi',
                'tgl_mulai.required' => 'Tanggal Mulai wajib diisi',
            ]
        );

        $data = [
            'judul' => $request->judul,
            'info_1' => $request->info_1,
            'info_2' => $request->info_2,
            'info_3' => $request->info_3,
            'tipe' => $this->_tipe ,
            'tgl_mulai' => $request->tgl_mulai,
            'tgl_selesai' => $request->tgl_selesai,
        ];
        riwayat::where('id', $id)->where('tipe', $this->_tipe)->update($data);
        return redirect()->route('education.index')->with('Success', 'Berhasil melakukan update data education');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        riwayat::where('id', $id)->where('tipe', $this->_tipe)->delete();
        return redirect()->route('education.index')->with('Success', 'Berhasil menghapus data education');
    }
}

