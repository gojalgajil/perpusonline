@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">✏️ Edit Buku</h1>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('books.update', $book) }}" enctype="multipart/form-data" class="space-y-4 bg-white p-6 rounded-lg shadow border border-gray-200">
        @csrf
        @method('PUT')

        <div>
            <label for="title" class="block font-medium text-sm text-gray-700">Judul</label>
            <input type="text" name="title" id="title" value="{{ old('title', $book->title) }}" class="w-full mt-1 px-3 py-2 border rounded-md shadow-sm focus:ring focus:ring-blue-200">
        </div>

        <div>
            <label for="author" class="block font-medium text-sm text-gray-700">Penulis</label>
            <input type="text" name="author" id="author" value="{{ old('author', $book->author) }}" class="w-full mt-1 px-3 py-2 border rounded-md shadow-sm focus:ring focus:ring-blue-200">
        </div>

        <div>
            <label for="publisher" class="block font-medium text-sm text-gray-700">Penerbit</label>
            <input type="text" name="publisher" id="publisher" value="{{ old('publisher', $book->publisher) }}" class="w-full mt-1 px-3 py-2 border rounded-md shadow-sm focus:ring focus:ring-blue-200">
        </div>

        <div>
            <label for="year" class="block font-medium text-sm text-gray-700">Tahun</label>
            <input type="number" name="year" id="year" value="{{ old('year', $book->year) }}" class="w-full mt-1 px-3 py-2 border rounded-md shadow-sm focus:ring focus:ring-blue-200">
        </div>

        <div>
            <label for="description" class="block font-medium text-sm text-gray-700">Deskripsi</label>
            <textarea name="description" id="description" rows="3" class="w-full mt-1 px-3 py-2 border rounded-md shadow-sm focus:ring focus:ring-blue-200">{{ old('description', $book->description) }}</textarea>
        </div>

        <div>
            <label for="cover" class="block text-sm font-medium text-gray-700">Upload Cover (JPG/PNG)</label>
            <input type="file" name="cover" id="cover" accept="image/*" class="w-full mt-1 border rounded-md px-3 py-2 shadow-sm focus:ring focus:ring-blue-200">
        </div>

        <div>
            <label for="pdf" class="block font-medium text-sm text-gray-700">Ganti PDF (Opsional)</label>
            <input type="file" name="pdf" id="pdf" accept="application/pdf" class="w-full mt-1 border rounded-md px-3 py-2 shadow-sm focus:ring focus:ring-blue-200">
        </div>

        @if ($book->pdf)
            <div>
                <span class="text-sm text-gray-600">File PDF saat ini:</span>
                <a href="{{ asset('storage/' . $book->pdf) }}" target="_blank" class="text-blue-600 hover:underline text-sm">
                    📄 Lihat / Download PDF
                </a>
            </div>
        @endif

        <div>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection
