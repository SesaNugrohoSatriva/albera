@extends('layouts.admin', ['title' => 'Direksi | Admin ALBERA'])

@section('content')
<div class="admin-heading"><div><span class="admin-kicker">Tim ALBERA</span><h1>Direksi</h1><p>Kelola nama, jabatan, foto, dan urutan tampilan tim.</p></div><a class="admin-button" href="{{ route('admin.directors.create') }}"><span>+</span> Tambah profil</a></div>
<section class="admin-panel"><div class="admin-panel-head"><h2>Profil tim</h2><span>{{ $directors->total() }} orang</span></div>
    @if($directors->isEmpty())<div class="admin-empty">Belum ada profil direksi.<br><a href="{{ route('admin.directors.create') }}">Tambahkan profil pertama</a></div>
    @else<div class="admin-table-wrap"><table class="admin-table"><thead><tr><th>Nama</th><th>Jabatan</th><th>Urutan</th><th>Aksi</th></tr></thead><tbody>
        @foreach($directors as $director)<tr><td><div style="display:flex;align-items:center;gap:10px">@if($director->photo)<img class="admin-thumb" src="{{ route('media', ['path' => $director->photo]) }}" alt="">@else<span class="admin-placeholder-thumb">{{ mb_substr($director->name, 0, 1) }}</span>@endif<div><strong>{{ $director->name }}</strong>@if($director->bio)<small>{{ Str::limit($director->bio, 65) }}</small>@endif</div></div></td><td>{{ $director->position }}</td><td>{{ $director->sort_order }}</td><td><div class="admin-actions"><a class="admin-button admin-button-muted" href="{{ route('admin.directors.edit', $director) }}">Ubah</a><form method="POST" action="{{ route('admin.directors.destroy', $director) }}" onsubmit="return confirm('Hapus profil ini?')">@csrf @method('DELETE')<button class="admin-button admin-button-danger" type="submit">Hapus</button></form></div></td></tr>@endforeach
    </tbody></table></div><div class="admin-pagination">{{ $directors->links() }}</div>@endif
</section>
@endsection