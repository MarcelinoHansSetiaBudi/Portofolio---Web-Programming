@extends('dashboard.layout')

@section('konten')
    <div class="pb-3"><a href="{{ route('experience.index') }}" class="btn btn-secondary">
        << kembali </a>
    </div>
    <form action="{{ route('experience.update', $data->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
          <label for="judul" class="form-label">Posisi</label>
          <input type="text"
            class="form-control form-control-sm" name="judul" id="judul" aria-describedby="helpId" placeholder="Posisi" value="{{ $data->judul }}">
        </div>
        <div class="mb-3">
            <label for="info_1" class="form-label">Nama Perusahaan</label>
            <input type="text"
              class="form-control form-control-sm" name="info_1" id="info_1" aria-describedby="helpId" placeholder="Nama Perusahaan" value="{{ $data->info_1 }}">
          </div>
          <div class="mb-3">
            <div class="row">
                <div class="col-auto">Tanggal Mulai</div>
                <div class="col-auto">
                    <input type="date" class="form-control form-control-sm" name="tgl_mulai" placeholder="dd/mm/yyy" value="{{ $data->tgl_mulai }}">
                </div>
                <div class="col-auto">Tanggal Selesai</div>
                <div class="col-auto">
                    <input type="date" class="form-control form-control-sm" name="tgl_selesai" placeholder="dd/mm/yyy" value="{{ $data->tgl_selesai }}">
                </div>
            </div>
          </div>
        <div class="mb-3">
            <label for="isi" class="form-label">Isi</label>
            <textarea class="form-control summernote" rows = "5" name="isi">{{ Session::get('isi') }}</textarea>
        </div>
        <button class="btn btn-primary" name="simpan" type="submit">SIMPAN</button>
    </form>
@endsection