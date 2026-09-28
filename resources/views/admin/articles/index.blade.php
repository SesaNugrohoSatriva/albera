@extends('layouts.admin', ['title' => 'Artikel | Admin ALBERA'])

@section('content')
<div class="admin-heading"><div><span class="admin-kicker">ALBERA Journal</span><h1>Artikel</h1><p>Tulis dan publikasikan insight untuk pengunjung situs.</p></div><a class="admin-button" href="{{ route('admin.articles.create') }}"><span>+</span> Tulis artikel</a></div>
<section class="admin-panel"><div class="admin-panel-head"><h2>Semua artikel</h2><span>{{ $articles->total() }} item</span></div>
    @if($articles->isEmpty())<div class="admin-empty">Belum ada artikel.<br><a href="{{ route('admin.articles.create') }}">Tulis artikel pertama</a></div>
    @else<div class="admin-table-wrap"><table class="admin-table"><thead><tr><th>Judul</th><th>Diperbarui</th><th>Status</th><th>Aksi</th></tr></thead><tbody>
        @foreach($articles as $article)<tr><td><div style="display:flex;align-items:center;gap:10px">@if($article->image)<img class="admin-thumb" src="{{ asset('storage/'.$article->image) }}" alt="">@else<span class="admin-placeholder-thumb">A</span>@endif<div><strong>{{ $article->title }}</strong><small>{{ Str::limit($article->excerpt, 72) }}</small></div></div></td><td>{{ $article->updated_at->format('d M Y') }}</td><td><span class="admin-status {{ $article->is_published ? '' : 'admin-status-draft' }}">{{ $article->is_published ? 'Tayang' : 'Draft' }}</span></td><td><div class="admin-actions"><a class="admin-button admin-button-muted" href="{{ route('admin.articles.edit', $article) }}">Ubah</a><form method="POST" action="{{ route('admin.articles.destroy', $article) }}" onsubmit="return confirm('Hapus artikel ini?')">@csrf @method('DELETE')<button class="admin-button admin-button-danger" type="submit">Hapus</button></form></div></td></tr>@endforeach
    </tbody></table></div><div class="admin-pagination">{{ $articles->links() }}</div>@endif
</section>
@endsection