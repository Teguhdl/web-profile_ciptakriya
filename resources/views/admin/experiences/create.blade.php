@extends('admin.layouts.app')

@section('title', 'Tambah Rekam Jejak')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Tambah Rekam Jejak</h2>
        <a href="{{ route('admin.experiences.index') }}" class="text-gray-500 hover:text-gray-700 flex items-center gap-1 text-sm font-medium">
            <span class="material-symbols-outlined text-lg">arrow_back</span> Kembali
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
        <form action="{{ route('admin.experiences.store') }}" method="POST" class="space-y-5">
            @csrf
            
            <div>
                <label class="block text-gray-700 text-sm font-semibold mb-2">Nama Klien</label>
                <input type="text" name="client" value="{{ old('client') }}" required class="w-full border border-gray-200 rounded-lg py-3 px-4 text-base text-gray-800 focus:outline-none focus:ring-2 focus:ring-red-500 transition-shadow duration-200" placeholder="Contoh: PT SCG Readymix Indonesia">
                @error('client') <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-gray-700 text-sm font-semibold mb-2">Tahun Pekerjaan</label>
                    <input type="text" name="year" value="{{ old('year', date('Y')) }}" required class="w-full border border-gray-200 rounded-lg py-3 px-4 text-base text-gray-800 focus:outline-none focus:ring-2 focus:ring-red-500 transition-shadow duration-200" placeholder="Contoh: 2026">
                    @error('year') <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-gray-700 text-sm font-semibold mb-2">Kategori Kerja</label>
                    <input type="text" name="category" value="{{ old('category') }}" required class="w-full border border-gray-200 rounded-lg py-3 px-4 text-base text-gray-800 focus:outline-none focus:ring-2 focus:ring-red-500 transition-shadow duration-200" placeholder="Contoh: Civil, Mekanikal, Fabrikasi">
                    @error('category') <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <div>
                <label class="block text-gray-700 text-sm font-semibold mb-2">Warna Badge</label>
                <select name="tone" class="w-full border border-gray-200 rounded-lg py-3 px-4 text-base text-gray-800 focus:outline-none focus:ring-2 focus:ring-red-500 transition-shadow duration-200">
                    <option value="brand" {{ old('tone') == 'brand' ? 'selected' : '' }}>Biru (Brand)</option>
                    <option value="green" {{ old('tone') == 'green' ? 'selected' : '' }}>Hijau</option>
                </select>
                @error('tone') <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-gray-700 text-sm font-semibold mb-2">Lingkup Pekerjaan</label>
                <textarea name="scope" rows="5" required class="w-full border border-gray-200 rounded-lg py-3 px-4 text-base text-gray-800 focus:outline-none focus:ring-2 focus:ring-red-500 transition-shadow duration-200" placeholder="Contoh: Pekerjaan Solo Ring Road & pembuatan silo batu">{{ old('scope') }}</textarea>
                @error('scope') <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="flex items-center justify-end gap-3 pt-4 border-t border-gray-100">
                <a href="{{ route('admin.experiences.index') }}" class="px-5 py-2.5 rounded-lg border border-gray-200 text-gray-700 hover:bg-gray-50 font-medium text-sm transition">
                    Batal
                </a>
                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2.5 px-6 rounded-lg shadow transition text-sm">
                    Simpan Rekam Jejak
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
