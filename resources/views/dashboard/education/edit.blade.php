@extends('dashboard.layout')

@section('konten')
    <div class="pb-3"><a href="{{ route('education.index') }}" class="btn btn-secondary">
        << kembali </a>
    </div>
    <form action="{{ route('education.update', $data->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
          <label for="judul" class="form-label">Universitas</label>
          <input type="text"
            class="form-control form-control-sm" name="judul" id="judul" aria-describedby="helpId" placeholder="Universitas" value="{{ $data->judul }}">
        </div>
        <div class="mb-3">
            <label for="info_1" class="form-label">Nama Fakultas</label>
            <input type="text"
              class="form-control form-control-sm" name="info_1" id="info_1" aria-describedby="helpId" placeholder="Nama Fakultas" value="{{ $data->info_1 }}">
          </div>
          <div class="mb-3">
            <label for="info_2" class="form-label">Nama Prodi</label>
            <input type="text"
              class="form-control form-control-sm" name="info_2" id="info_2" aria-describedby="helpId" placeholder="Nama Prodi" value="{{ $data->info_2 }}">
          </div>
          <div class="mb-3">
            <label for="info_3" class="form-label">IPK</label>
            <input type="text"
              class="form-control form-control-sm" name="info_3" id="info_3" aria-describedby="helpId" placeholder="IPK" value="{{ $data->info_3 }}">
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
        <button class="btn btn-primary" name="simpan" type="submit">SIMPAN</button>
    </form>
@endsection