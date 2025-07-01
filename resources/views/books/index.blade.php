@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-6">

    <h1 class="text-2xl font-bold text-gray-800 mb-6">📚 Daftar Buku</h1>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4 border border-green-300">
            {{ session('success') }}
        </div>
    @endif

    @if($books->isEmpty())
        <div class="text-gray-600">Belum ada buku yang tersedia.</div>
    @else
        <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-3">
            @foreach ($books as $book)
                <div class="bg-white shadow rounded-lg p-4 border border-gray-200">
                    <h2 class="text-lg font-semibold text-blue-700">{{ $book->title }}</h2>
                    <p class="text-sm text-gray-600 mb-1">Penulis: {{ $book->author }}</p>
                    <p class="text-sm text-gray-600 mb-1">Penerbit: {{ $book->publisher }}</p>
                    <p class="text-sm text-gray-600 mb-2">Tahun: {{ $book->year }}</p>
                    <p class="text-sm text-gray-700 mb-4">{{ $book->description }}</p>

                    @role('admin')
                        <div class="flex gap-3">
                            <a href="{{ route('books.edit', $book) }}"
                               class="text-sm px-3 py-1 bg-yellow-400 text-white rounded hover:bg-yellow-500 transition">
                                ✏️ Edit
                            </a>

                            <form action="{{ route('books.destroy', $book) }}" method="POST"
                                  onsubmit="return confirm('Yakin ingin menghapus buku ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="text-sm px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 transition">
                                    🗑️ Hapus
                                </button>
                            </form>
                        </div>
                    @endrole
                </div>
            @endforeach
        </div>
    @endif

</div>
@endsection
