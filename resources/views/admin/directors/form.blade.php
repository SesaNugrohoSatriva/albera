@extends('layouts.admin', ['title' => ($director->exists ? 'Ubah' : 'Tambah').' direksi | Admin ALBERA'])

@section('content')
<div class="admin-heading"><div><span class="admin-kicker">Tim ALBERA</span><h1>{{ $director->exists ? 'Ubah profil' : 'Profil baru' }}</h1><p>Perbarui informasi orang-orang di balik ALBERA.</p></div></div>
<form class="admin-form" method="POST" enctype="multipart/form-data" action="{{ $director->exists ? route('admin.directors.update', $director) : route('admin.directors.store') }}">
    @csrf @if($director->exists) @method('PUT') @endif
    <div class="admin-form-grid">
        <div class="admin-field"><label for="name">Nama lengkap</label><input id="name" name="name" value="{{ old('name', $director->name) }}" required maxlength="160">@error('name')<span class="admin-error">{{ $message }}</span>@enderror</div>
        <div class="admin-field"><label for="position">Jabatan</label><input id="position" name="position" value="{{ old('position', $director->position) }}" required maxlength="120">@error('position')<span class="admin-error">{{ $message }}</span>@enderror</div>
        <div class="admin-field admin-field-full"><label for="bio">Profil singkat <span class="admin-help">(opsional)</span></label><textarea id="bio" name="bio" maxlength="3000">{{ old('bio', $director->bio) }}</textarea>@error('bio')<span class="admin-error">{{ $message }}</span>@enderror</div>
        <div class="admin-field"><label for="sort_order">Urutan tampil</label><input id="sort_order" name="sort_order" type="number" min="0" max="9999" value="{{ old('sort_order', $director->sort_order ?? 0) }}" required>@error('sort_order')<span class="admin-error">{{ $message }}</span>@enderror</div>
        <div class="admin-field"><label for="photo">Foto profil</label><input id="photo" name="photo" type="file" accept="image/*"><span class="admin-help">Format gambar, maksimal 5 MB.</span>@error('photo')<span class="admin-error">{{ $message }}</span>@enderror</div>
    </div>
    <div class="admin-form-actions"><button class="admin-button" type="submit">Simpan profil</button><a class="admin-cancel" href="{{ route('admin.directors.index') }}">Batal</a></div>
</form>
@endsection