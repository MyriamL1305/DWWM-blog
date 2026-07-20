<div class="border rounded p-4 mb-4">
    <div class="flex justify-between items-start text-sm text-gray-500 mb-1">
        <span class="border rounded px-2 py-0.5">{{ $article->category->name }}</span>
        <span>{{ $article->created_at->format('d M Y') }}</span>
    </div>
    <h2 class="font-semibold text-lg mb-1">{{ $article->title }}</h2>
    <p class="text-sm text-gray-700 mb-2">{{ Str::limit($article->content, 150) }}</p>
    <div class="text-right">
        <a href="{{ route('articles.show', $article->id)}}" class="underline text-sm">Lire →</a>
    </div>
</div>
