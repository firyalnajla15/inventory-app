@extends('layouts.main')

@section('content')

<div class="container mt-4">

    <h3 class="mb-4">
        Tambah Produk
    </h3>

    <form action="{{ route('products.store') }}" method="POST">
        @csrf

        <!-- Nama Produk -->
        <div class="mb-3">
            <label class="form-label">
                Nama Produk
            </label>

            <input
                type="text"
                name="name"
                class="form-control"
                placeholder="Masukkan nama produk"
                required>
        </div>

        <!-- Kategori -->
        <div class="mb-3">
            <label class="form-label">
                Kategori Produk
            </label>

            <select
                name="category_id"
                class="form-select"
                required>

                <option value="">
                    -- Pilih Kategori --
                </option>

                @foreach($categories as $category)
                <option value="{{ $category->id }}">
                    {{ $category->name }}
                </option>
                @endforeach

            </select>
        </div>

        <!-- Harga -->
        <div class="mb-3">
            <label class="form-label">
                Harga
            </label>

            <input
                type="number"
                name="price"
                class="form-control"
                placeholder="Masukkan harga"
                required>
        </div>

        <!-- Stok -->
        <div class="mb-3">
            <label class="form-label">
                Jumlah Stok
            </label>

            <input
                type="number"
                name="stock"
                class="form-control"
                placeholder="Masukkan stok"
                required>
        </div>

        <!-- Deskripsi -->
        <div class="mb-3">
            <label class="form-label">
                Deskripsi Produk
            </label>

            <textarea
                name="description"
                rows="4"
                class="form-control"
                placeholder="Masukkan deskripsi produk"></textarea>
        </div>

        <!-- Status -->
        <div class="mb-3">
            <label class="form-label">
                Status Produk
            </label>

            <select
                name="status"
                class="form-select"
                required>

                <option value="">
                    -- Pilih Status --
                </option>

                <option value="Tersedia">
                    Tersedia
                </option>

                <option value="Habis">
                    Habis
                </option>

            </select>
        </div>

        <!-- Button -->
        <div class="mt-4">
            <a href="/products" class="btn btn-secondary">
                Kembali
            </a>

            <button type="submit" class="btn btn-primary">
                Simpan Produk
            </button>
        </div>

    </form>

</div>

@endsection