@extends('layout')

@section('content')

{{-- Page Header --}}
<div style="margin-bottom:28px;">
    <div style="font-size:10px; letter-spacing:3px; text-transform:uppercase; color:#666; margin-bottom:6px;">
        Inventaris / Barang / <span style="color:#c8ff00;">Baru</span>
    </div>
    <h1 style="font-family:'Syne',sans-serif; font-weight:800; font-size:28px; color:#fff; letter-spacing:-0.5px;">
        Tambah Barang Baru
    </h1>
</div>

{{-- Form Card --}}
<div class="form-card">
    <div class="form-card-header">
        <span class="form-card-label">INFORMASI BARANG</span>
    </div>

    <form action="{{ route('items.store') }}" method="POST" class="item-form">
        @csrf

        <div class="form-grid">
            {{-- Nama Barang --}}
            <div class="form-group">
                <label class="form-label" for="nama_barang">
                    Nama Barang
                    <span class="required-dot">*</span>
                </label>
                <input
                    type="text"
                    id="nama_barang"
                    name="nama_barang"
                    value="{{ old('nama_barang') }}"
                    placeholder="cth. Kertas HVS A4"
                    class="form-input {{ $errors->has('nama_barang') ? 'input-error' : '' }}"
                >
                @error('nama_barang')
                    <span class="error-msg">{{ $message }}</span>
                @enderror
            </div>

            {{-- Kode Barang --}}
            <div class="form-group">
                <label class="form-label" for="kode_barang">
                    Kode Barang
                    <span class="required-dot">*</span>
                </label>
                <input
                    type="text"
                    id="kode_barang"
                    name="kode_barang"
                    value="{{ old('kode_barang') }}"
                    placeholder="cth. BRG-001"
                    class="form-input {{ $errors->has('kode_barang') ? 'input-error' : '' }}"
                    style="text-transform:uppercase; letter-spacing:1px;"
                >
                @error('kode_barang')
                    <span class="error-msg">{{ $message }}</span>
                @enderror
            </div>

            {{-- Stok Barang --}}
            <div class="form-group">
                <label class="form-label" for="stok_barang">
                    Stok Barang
                    <span class="required-dot">*</span>
                </label>
                <input
                    type="number"
                    id="stok_barang"
                    name="stok_barang"
                    value="{{ old('stok_barang') }}"
                    placeholder="0"
                    min="0"
                    class="form-input {{ $errors->has('stok_barang') ? 'input-error' : '' }}"
                >
                @error('stok_barang')
                    <span class="error-msg">{{ $message }}</span>
                @enderror
            </div>

            {{-- Harga Barang --}}
            <div class="form-group">
                <label class="form-label" for="harga_barang">
                    Harga Barang
                    <span class="required-dot">*</span>
                </label>
                <div class="input-prefix-wrap">
                    <span class="input-prefix">Rp</span>
                    <input
                        type="number"
                        id="harga_barang"
                        name="harga_barang"
                        value="{{ old('harga_barang') }}"
                        placeholder="0"
                        min="0"
                        class="form-input has-prefix {{ $errors->has('harga_barang') ? 'input-error' : '' }}"
                    >
                </div>
                @error('harga_barang')
                    <span class="error-msg">{{ $message }}</span>
                @enderror
            </div>
        </div>

        {{-- Actions --}}
        <div class="form-actions">
            <a href="{{ route('items.index') }}" class="btn-cancel">← Batal</a>
            <button type="submit" class="btn-submit">Simpan Barang</button>
        </div>
    </form>
</div>

<style>
    .form-card {
        background: #1a1a1a;
        border: 2px solid #2e2e2e;
        border-radius: 4px;
        overflow: hidden;
        max-width: 680px;
    }

    .form-card-header {
        padding: 12px 24px;
        background: #111;
        border-bottom: 2px solid #c8ff00;
    }

    .form-card-label {
        font-size: 9px;
        letter-spacing: 3px;
        color: #888;
    }

    .item-form {
        padding: 28px 24px;
    }

    .form-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
        margin-bottom: 28px;
    }

    .form-group {
        display: flex;
        flex-direction: column;
        gap: 7px;
    }

    .form-label {
        font-family: 'Space Mono', monospace;
        font-size: 10px;
        letter-spacing: 2px;
        text-transform: uppercase;
        color: #888;
        display: flex;
        align-items: center;
        gap: 4px;
    }

    .required-dot {
        color: #c8ff00;
        font-size: 14px;
        line-height: 1;
    }

    .form-input {
        background: #111;
        border: 1.5px solid #333;
        border-radius: 3px;
        padding: 10px 14px;
        color: #e8e8e8;
        font-family: 'Space Mono', monospace;
        font-size: 13px;
        outline: none;
        transition: border-color 0.15s ease, box-shadow 0.15s ease;
        width: 100%;
    }

    .form-input::placeholder {
        color: #3a3a3a;
    }

    .form-input:focus {
        border-color: #c8ff00;
        box-shadow: 0 0 0 3px rgba(200,255,0,0.07);
    }

    .form-input.input-error {
        border-color: #ff6060;
    }

    .input-prefix-wrap {
        position: relative;
        display: flex;
        align-items: center;
    }

    .input-prefix {
        position: absolute;
        left: 12px;
        font-family: 'Space Mono', monospace;
        font-size: 12px;
        color: #555;
        pointer-events: none;
        z-index: 1;
    }

    .form-input.has-prefix {
        padding-left: 36px;
    }

    .error-msg {
        font-size: 11px;
        color: #ff6060;
        letter-spacing: 0.3px;
    }

    .form-actions {
        display: flex;
        align-items: center;
        justify-content: flex-end;
        gap: 12px;
        padding-top: 20px;
        border-top: 1px solid #252525;
    }

    .btn-cancel {
        font-family: 'Space Mono', monospace;
        font-size: 12px;
        padding: 10px 18px;
        border-radius: 3px;
        text-decoration: none;
        color: #666;
        border: 1.5px solid #2e2e2e;
        background: transparent;
        transition: all 0.15s ease;
        letter-spacing: 0.3px;
    }
    .btn-cancel:hover {
        color: #aaa;
        border-color: #444;
    }

    .btn-submit {
        font-family: 'Space Mono', monospace;
        font-size: 12px;
        font-weight: 700;
        padding: 10px 22px;
        border-radius: 3px;
        background: #c8ff00;
        color: #0f0f0f;
        border: 2px solid #c8ff00;
        cursor: pointer;
        letter-spacing: 0.5px;
        transition: all 0.15s ease;
    }
    .btn-submit:hover {
        background: transparent;
        color: #c8ff00;
    }

    @media (max-width: 540px) {
        .form-grid { grid-template-columns: 1fr; }
    }
</style>

@endsection
