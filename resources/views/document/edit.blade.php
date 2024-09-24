@extends('template.app') 

@section('content')
<div class="container mt-5">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <div class="row justify-content-center">
        <div class="col-md-6"> 
            <div class="card">
                <div class="card-header bg-primary text-white">
                    Edit Data Penduduk
                </div>
                <div class="card-body">
                    <form action="{{ route('document.update', $document->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label for="nama_dokument" class="form-label">Nama Dokumen</label>
                                <input type="text" id="nama_dokument" name="nama_dokument" class="form-control" value="{{ old('nama_dokument', $document->nama_dokument) }}" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label for="jenis_id" class="form-label">Jenis Dokumen</label>
                                <select id="jenis_id" name="jenis_id" class="form-control" required>
                                    <option value="">Pilih Jenis Dokumen</option>
                                    @foreach ($jenis as $item)
                                        <option value="{{ $item->id }}" {{ old('jenis_id', $document->jenis_id) == $item->id ? 'selected' : '' }}>
                                            {{ $item->jenis_surat }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label for="image" class="form-label">Upload Gambar (optional)</label>
                                <input type="file" id="image" name="image" class="form-control" accept="image/*">
                            </div>
                        </div>
                        
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary me-2">Perbarui</button>
                            <a class="btn btn-secondary" href="{{ route('document.index') }}" style="margin-left: 5px;">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
