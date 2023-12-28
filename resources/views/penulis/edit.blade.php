@extends('/layout/main')
@section('content')
<div class="container mt-3">
  <div class="row">
    <div class="col mt-4">
      <form action="/penulis/update/{{ $penulis->id}}" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{ $penulis->id }}">
        <div class="row">
          <div class="col-5">
            <div class="mb-3">
              <label class="form-label">Nama Penulis</label>
              <input
                required
                type="text"
                class="form-control"
                name="nm_penulis"
                autocomplete="off"
                value="{{ $penulis->nm_penulis }}"
              />
            </div>
            <div class="mb-3">
              <label class="form-label">Tanggal Lahir</label>
              <input
                required
                type="date"
                class="form-control"
                name="tgl_lahir"
                autocomplete="off"
                value="{{ $penulis->tgl_lahir }}"
              />
            </div>
            <div class="mb-3">
              <label class="form-label">Jenis Kelamin</label>
              <select name="jn_kelamin" id="">
                <option value="L">Laki-laki</option>
                <option value="P">Perempuan</option>
              </select>
            </div>
            <div class="mb-3">
              <label class="form-label">Keterangan</label>
              <input
                required
                type="text"
                class="form-control"
                name="ket"
                autocomplete="off"
                value="{{ $penulis->ket }}"
              />
            </div>
          </div>
        </div>

        <div class="float-start">
          <a href="/penulis" class="btn btn-secondary">Back</a>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
