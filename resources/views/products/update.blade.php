@extends('layouts.main')

@section('content')

<h1>Update Barang Inventaris</h1>

<form action="{{ route('products.update', $product->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Nama Barang</label>

        <input type="text"
               class="form-control"
               name="name"
               value="{{ $product->name }}"
               required>
    </div>

    <div class="mb-3">

        <label class="form-label">Kategori</label>

        <select class="form-select"
                name="category_id"
                required>

            <option value="">
                Pilih Kategori
            </option>

            @foreach($categories as $c)

            <option value="{{ $c->id }}"
                {{ $product->category_id == $c->id ? 'selected' : '' }}>

                {{ $c->name }}

            </option>

            @endforeach

        </select>

    </div>

    <div class="mb-3">

        <label class="form-label">Harga</label>

        <input type="number"
               class="form-control"
               name="price"
               value="{{ $product->price }}"
               required>

    </div>

    <div class="mb-3">

        <label class="form-label">Stok</label>

        <input type="number"
               class="form-control"
               name="stock"
               value="{{ $product->stock }}"
               required>

    </div>

    <div class="mb-3">

        <label class="form-label">Deskripsi</label>

        <textarea class="form-control"
                  name="description"
                  rows="3">{{ $product->description }}</textarea>

    </div>

    <div class="mb-3">

        <label class="form-label">Status</label>

        <select class="form-select"
                name="status"
                required>

            <option value="">
                Pilih Status
            </option>

            <option value="tersedia"
                {{ $product->status == 'tersedia' ? 'selected' : '' }}>

                Tersedia

            </option>

            <option value="habis"
                {{ $product->status == 'habis' ? 'selected' : '' }}>

                Habis

            </option>

        </select>

    </div>

    <button type="submit" class="btn btn-success">
        Simpan
    </button>

</form>

@endsection