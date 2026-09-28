@extends('layouts.admin', ['title' => ($article->exists ? 'Ubah' : 'Tulis').' artikel | Admin ALBERA'])

@section('content')
<div class="admin-heading"><div><span class="admin-kicker">ALBERA Journal</span><h1>{{ $article->exists ? 'Ubah artikel' : 'Artikel baru' }}</h1><p>Susun insight pertanian untuk dibaca pengunjung.</p></div></div>
<form class="admin-form" method="POST" enctype="multipart/form-data" action="{{ $article->exists ? route('admin.articles.update', $article) : route('admin.articles.store') }}">
    @csrf @if($article->exists) @method('PUT') @endif
    <div class="admin-form-grid">
        <div class="admin-field admin-field-full"><label for="title">Judul artikel</label><input id="title" name="title" value="{{ old('title', $article->title) }}" required maxlength="180">@error('title')<span class="admin-error">{{ $message }}</span>@enderror</div>
        <div class="admin-field admin-field-full"><label for="excerpt">Ringkasan</label><textarea id="excerpt" name="excerpt" maxlength="500" required>{{ old('excerpt', $article->excerpt) }}</textarea><span class="admin-help">Ringkasan muncul di halaman utama dan hasil berbagi.</span>@error('excerpt')<span class="admin-error">{{ $message }}</span>@enderror</div>
        <div class="admin-field admin-field-full"><label for="content">Isi artikel</label><textarea id="content" name="content" required maxlength="50000" style="min-height:280px">{{ old('content', $article->content) }}</textarea><span class="admin-help">Gunakan baris baru untuk memisahkan paragraf.</span>@error('content')<span class="admin-error">{{ $message }}</span>@enderror</div>
        <div class="admin-field admin-field-full"><label for="image">Foto sampul</label><input id="image" name="image" type="file" accept="image/*"><span class="admin-help">Format gambar, maksimal 5 MB. Foto sebelumnya tetap digunakan bila dibiarkan kosong.</span>@error('image')<span class="admin-error">{{ $message }}</span>@enderror</div>
        <label class="admin-checkbox admin-field-full"><input type="checkbox" name="is_published" value="1" @checked(old('is_published', $article->exists ? $article->is_published : true))> Publikasikan artikel</label>
    </div>
    <div class="admin-form-actions"><button class="admin-button" type="submit">Simpan artikel</button><a class="admin-cancel" href="{{ route('admin.articles.index') }}">Batal</a></div>
</form>
@endsection