@extends('layouts.main')

@section('content')

<style>
    body {
        background: linear-gradient(135deg, #eef2ff, #f8fafc);
        min-height: 100vh;
    }

    .product-card {
        border: none;
        border-radius: 28px;
        overflow: hidden;
        background: #fff;
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.08);
    }

    .product-header {
        background: linear-gradient(135deg, #4f46e5, #7c3aed);
        padding: 45px;
        position: relative;
        overflow: hidden;
    }

    .product-header::before {
        content: '';
        position: absolute;
        width: 250px;
        height: 250px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
        top: -80px;
        right: -80px;
    }

    .product-header::after {
        content: '';
        position: absolute;
        width: 180px;
        height: 180px;
        background: rgba(255, 255, 255, 0.08);
        border-radius: 50%;
        bottom: -70px;
        left: -70px;
    }

    .product-header h1 {
        font-size: 34px;
        font-weight: 700;
        position: relative;
        z-index: 2;
    }

    .product-header p {
        position: relative;
        z-index: 2;
        opacity: .9;
        font-size: 15px;
    }

    .form-label {
        font-weight: 600;
        margin-bottom: 10px;
        color: #374151;
    }

    .form-control,
    .form-select {
        border-radius: 14px;
        padding: 14px 18px;
        border: 1px solid #d1d5db;
        transition: .3s;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #6366f1;
        box-shadow: 0 0 0 0.2rem rgba(99, 102, 241, 0.2);
    }

    .input-group-text {
        border-radius: 14px 0 0 14px;
        background: #f3f4f6;
        border: 1px solid #d1d5db;
        color: #6366f1;
        font-size: 18px;
    }

    textarea {
        resize: none;
    }

    .btn-custom {
        padding: 13px 35px;
        border-radius: 50px;
        font-weight: 600;
        transition: .3s;
    }

    .btn-save {
        background: linear-gradient(135deg, #4f46e5, #7c3aed);
        border: none;
        color: white;
        box-shadow: 0 10px 20px rgba(79, 70, 229, 0.25);
    }

    .btn-save:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 25px rgba(79, 70, 229, 0.35);
    }

    .btn-back {
        border: 2px solid #d1d5db;
        color: #374151;
        background: white;
    }

    .btn-back:hover {
        background: #f3f4f6;
    }

    .form-section {
        background: #ffffff;
        border-radius: 20px;
        padding: 30px;
    }
</style>

<div class="container py-5">

    <div class="row justify-content-center">
        <div class="col-lg-10">

            <div class="product-card">

                <!-- Header -->
                <div class="product-header text-white text-center">
                    <h1>
                        <i class="bi bi-bag-plus-fill"></i>
                        Tambah Produk
                    </h1>

                    <p class="mb-0">
                        Tambahkan produk baru dengan informasi yang lengkap
                    </p>
                </div>

                <!-- Body -->
                <div class="card-body p-5 bg-light">

                    <div class="form-section">

                        <form action="{{ route('products.store') }}" method="POST">
                            @csrf

                            <!-- Nama -->
                            <div class="mb-4">
                                <label class="form-label">
                                    Nama Produk
                                </label>

                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="bi bi-box"></i>
                                    </span>

                                    <input
                                        type="text"
                                        name="name"
                                        class="form-control"
                                        placeholder="Masukkan nama produk"
                                        required>
                                </div>
                            </div>

                            <!-- Kategori -->
                            <div class="mb-4">
                                <label class="form-label">
                                    Kategori Produk
                                </label>

                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="bi bi-grid-fill"></i>
                                    </span>

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
                            </div>

                            <!-- Harga & Stok -->
                            <div class="row">

                                <!-- Harga -->
                                <div class="col-md-6 mb-4">
                                    <label class="form-label">
                                        Harga
                                    </label>

                                    <div class="input-group">
                                        <span class="input-group-text">
                                            Rp
                                        </span>

                                        <input
                                            type="number"
                                            name="price"
                                            class="form-control"
                                            placeholder="Masukkan harga"
                                            required>
                                    </div>
                                </div>

                                <!-- Stok -->
                                <div class="col-md-6 mb-4">
                                    <label class="form-label">
                                        Jumlah Stok
                                    </label>

                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="bi bi-box-seam"></i>
                                        </span>

                                        <input
                                            type="number"
                                            name="stock"
                                            class="form-control"
                                            placeholder="Masukkan stok"
                                            required>
                                    </div>
                                </div>

                            </div>

                            <!-- Deskripsi -->
                            <div class="mb-4">
                                <label class="form-label">
                                    Deskripsi Produk
                                </label>

                                <textarea
                                    name="description"
                                    rows="5"
                                    class="form-control"
                                    placeholder="Tuliskan deskripsi produk secara lengkap..."></textarea>
                            </div>

                            <!-- Status -->
                            <div class="mb-4">
                                <label class="form-label">
                                    Status Produk
                                </label>

                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="bi bi-check-circle-fill"></i>
                                    </span>

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

                                        <option value="habis">
                                            Habis
                                        </option>

                                    </select>
                                </div>
                            </div>

                            <!-- Button -->
                            <div class="d-flex justify-content-between mt-5">

                                <a href="/products"
                                    class="btn btn-custom btn-back">
                                    <i class="bi bi-arrow-left"></i>
                                    Kembali
                                </a>

                                <button
                                    type="submit"
                                    class="btn btn-custom btn-save">

                                    <i class="bi bi-save-fill"></i>
                                    Simpan Produk

                                </button>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>
    </div>

</div>

@endsection