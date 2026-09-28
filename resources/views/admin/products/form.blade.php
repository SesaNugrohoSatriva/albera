@extends('layouts.admin', ['title' => ($product->exists ? 'Ubah' : 'Tambah').' produk | Admin ALBERA'])

@section('content')
<div class="admin-heading"><div><span class="admin-kicker">Katalog produk</span><h1>{{ $product->exists ? 'Ubah produk' : 'Produk baru' }}</h1><p>Lengkapi informasi yang akan ditampilkan pada katalog ALBERA.</p></div></div>
<form class="admin-form" method="POST" enctype="multipart/form-data" action="{{ $product->exists ? route('admin.products.update', $product) : route('admin.products.store') }}">
    @csrf @if($product->exists) @method('PUT') @endif
    <div class="admin-form-grid">
        <div class="admin-field admin-field-full"><label for="name">Nama produk</label><input id="name" name="name" value="{{ old('name', $product->name) }}" required maxlength="160">@error('name')<span class="admin-error">{{ $message }}</span>@enderror</div>
        <div class="admin-field admin-field-full"><label for="description">Deskripsi produk</label><textarea id="description" name="description" required maxlength="10000">{{ old('description', $product->description) }}</textarea>@error('description')<span class="admin-error">{{ $message }}</span>@enderror</div>
        <div class="admin-field"><label for="nitrogen">Nitrogen (N) %</label><input id="nitrogen" name="nitrogen" type="number" min="0" max="100" step="0.01" value="{{ old('nitrogen', $product->nitrogen) }}" required>@error('nitrogen')<span class="admin-error">{{ $message }}</span>@enderror</div>
        <div class="admin-field"><label for="phosphorus">Fosfor (P) %</label><input id="phosphorus" name="phosphorus" type="number" min="0" max="100" step="0.01" value="{{ old('phosphorus', $product->phosphorus) }}" required>@error('phosphorus')<span class="admin-error">{{ $message }}</span>@enderror</div>
        <div class="admin-field"><label for="potassium">Kalium (K) %</label><input id="potassium" name="potassium" type="number" min="0" max="100" step="0.01" value="{{ old('potassium', $product->potassium) }}" required>@error('potassium')<span class="admin-error">{{ $message }}</span>@enderror</div>
        <div class="admin-field"><label for="netto">Netto / kemasan</label><input id="netto" name="netto" value="{{ old('netto', $product->netto) }}" placeholder="Contoh: 10 kg/sak" required maxlength="80">@error('netto')<span class="admin-error">{{ $message }}</span>@enderror</div>
        <div class="admin-field"><label for="category">Kategori</label><input id="category" name="category" value="{{ old('category', $product->category) }}" placeholder="Contoh: Pupuk NPK" required maxlength="100">@error('category')<span class="admin-error">{{ $message }}</span>@enderror</div>
        <div class="admin-field"><label for="certification">Sertifikasi <span class="admin-help">(opsional)</span></label><input id="certification" name="certification" value="{{ old('certification', $product->certification) }}" maxlength="160">@error('certification')<span class="admin-error">{{ $message }}</span>@enderror</div>
        <div class="admin-field admin-field-full"><label for="image">Foto produk</label><input id="image" name="image" type="file" accept="image/*"><span class="admin-help">Format gambar, maksimal 5 MB. Foto sebelumnya tetap digunakan bila dibiarkan kosong.</span>@error('image')<span class="admin-error">{{ $message }}</span>@enderror</div>
        <label class="admin-checkbox admin-field-full"><input type="checkbox" name="is_published" value="1" @checked(old('is_published', $product->exists ? $product->is_published : true))> Tampilkan produk di situs publik</label>
    </div>
    <div class="admin-form-actions"><button class="admin-button" type="submit">Simpan produk</button><a class="admin-cancel" href="{{ route('admin.products.index') }}">Batal</a></div>
</form>
@endsection