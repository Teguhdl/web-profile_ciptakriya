@extends('admin.layouts.app')

@section('title', 'Edit Portofolio')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Edit Portofolio</h2>
        <a href="{{ route('admin.portfolios.index') }}" class="text-gray-500 hover:text-gray-700 flex items-center gap-1 text-sm font-medium">
            <span class="material-symbols-outlined text-lg">arrow_back</span> Kembali
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
        <form action="{{ route('admin.portfolios.update', $portfolio->id) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf
            @method('PUT')
            
            <div>
                <label class="block text-gray-700 text-sm font-semibold mb-2">Judul Proyek</label>
                <input type="text" name="title" value="{{ old('title', $portfolio->title) }}" required class="w-full border border-gray-200 rounded-lg py-3 px-4 text-base text-gray-800 focus:outline-none focus:ring-2 focus:ring-red-500 transition-shadow duration-200" placeholder="Masukkan judul proyek...">
                @error('title') <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-gray-700 text-sm font-semibold mb-2">Nama Klien</label>
                    <input type="text" name="client" value="{{ old('client', $portfolio->client) }}" class="w-full border border-gray-200 rounded-lg py-3 px-4 text-base text-gray-800 focus:outline-none focus:ring-2 focus:ring-red-500 transition-shadow duration-200" placeholder="Nama Klien / Instansi...">
                    @error('client') <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-gray-700 text-sm font-semibold mb-2">Tahun Pengerjaan</label>
                    <input type="number" name="year" value="{{ old('year', $portfolio->year) }}" class="w-full border border-gray-200 rounded-lg py-3 px-4 text-base text-gray-800 focus:outline-none focus:ring-2 focus:ring-red-500 transition-shadow duration-200">
                    @error('year') <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-gray-700 text-sm font-semibold mb-2">Tag Kategori (Badge)</label>
                    <input type="text" name="tag" value="{{ old('tag', $portfolio->tag) }}" class="w-full border border-gray-200 rounded-lg py-3 px-4 text-base text-gray-800 focus:outline-none focus:ring-2 focus:ring-red-500 transition-shadow duration-200" placeholder="Contoh: Fabrikasi">
                    @error('tag') <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-gray-700 text-sm font-semibold mb-2">Warna Badge</label>
                    <select name="tone" class="w-full border border-gray-200 rounded-lg py-3 px-4 text-base text-gray-800 focus:outline-none focus:ring-2 focus:ring-red-500 transition-shadow duration-200">
                        <option value="brand" {{ old('tone', $portfolio->tone) == 'brand' ? 'selected' : '' }}>Biru (Brand)</option>
                        <option value="green" {{ old('tone', $portfolio->tone) == 'green' ? 'selected' : '' }}>Hijau</option>
                    </select>
                    @error('tone') <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-gray-700 text-sm font-semibold mb-2">Status</label>
                    <select name="status" class="w-full border border-gray-200 rounded-lg py-3 px-4 text-base text-gray-800 focus:outline-none focus:ring-2 focus:ring-red-500 transition-shadow duration-200">
                        <option value="Publish" {{ old('status', $portfolio->status) == 'Publish' ? 'selected' : '' }}>Publish</option>
                        <option value="Draft" {{ old('status', $portfolio->status) == 'Draft' ? 'selected' : '' }}>Draft</option>
                    </select>
                    @error('status') <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <div>
                <label class="block text-gray-700 text-sm font-semibold mb-2">Deskripsi Proyek</label>
                <textarea name="description" rows="6" required class="w-full border border-gray-200 rounded-lg py-3 px-4 text-base text-gray-800 focus:outline-none focus:ring-2 focus:ring-red-500 transition-shadow duration-200" placeholder="Tulis deskripsi detail proyek...">{{ old('description', $portfolio->description) }}</textarea>
                @error('description') <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-gray-700 text-sm font-semibold mb-2">Gambar Utama Proyek</label>
                @if($portfolio->image)
                    <div class="mb-3">
                        <img src="{{ asset($portfolio->image) }}" class="h-32 w-auto rounded-lg object-cover border border-gray-200" alt="Current Image">
                    </div>
                @endif
                <input type="file" name="image" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-lg file:border file:border-gray-200 file:text-sm file:font-semibold file:bg-gray-50 file:text-gray-700 hover:file:bg-gray-100 cursor-pointer"/>
                <p class="text-xs text-gray-400 mt-1.5">Biarkan kosong jika tidak ingin mengganti gambar.</p>
                @error('image') <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-gray-700 text-sm font-semibold mb-2">Galeri Gambar Tambahan (Multi-upload)</label>
                
                @if($portfolio->images->count() > 0)
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-4">
                        @foreach($portfolio->images as $img)
                            <div class="relative group border rounded-lg overflow-hidden">
                                <img src="{{ asset($img->image_path) }}" class="w-full h-24 object-cover">
                                <div class="absolute inset-0 bg-black/60 hidden group-hover:flex items-center justify-center transition">
                                    <label class="flex items-center space-x-2 cursor-pointer text-white">
                                        <input type="checkbox" name="delete_images[]" value="{{ $img->id }}" class="form-checkbox text-red-600 rounded">
                                        <span class="text-xs font-bold">Hapus</span>
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <p class="text-xs text-gray-500 mb-2">Centang "Hapus" pada gambar yang ingin dibuang saat disimpan.</p>
                @endif

                <input type="file" name="gallery_images[]" multiple class="block w-full text-sm text-gray-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-lg file:border file:border-gray-200 file:text-sm file:font-semibold file:bg-gray-50 file:text-gray-700 hover:file:bg-gray-100 cursor-pointer"/>
                <p class="text-xs text-gray-400 mt-1">Pilih beberapa file sekaligus untuk menambah gambar galeri pendukung.</p>
                @error('gallery_images.*') <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="flex items-center justify-end gap-3 pt-4 border-t border-gray-100">
                <a href="{{ route('admin.portfolios.index') }}" class="px-5 py-2.5 rounded-lg border border-gray-200 text-gray-700 hover:bg-gray-50 font-medium text-sm transition">
                    Batal
                </a>
                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2.5 px-6 rounded-lg shadow transition text-sm">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
