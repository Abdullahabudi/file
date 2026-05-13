@extends('layout')

@section('content')

{{-- Page Header --}}
<div style="display:flex; align-items:flex-end; justify-content:space-between; margin-bottom:28px;">
    <div>
        <div style="font-size:10px; letter-spacing:3px; text-transform:uppercase; color:#666; margin-bottom:6px;">
            Inventaris / Barang
        </div>
        <h1 style="font-family:'Syne',sans-serif; font-weight:800; font-size:28px; color:#fff; letter-spacing:-0.5px;">
            Daftar Barang
        </h1>
    </div>
    <a href="{{ route('items.create') }}" class="btn-primary">
        <span style="font-size:16px; line-height:1;">+</span> Tambah Barang
    </a>
</div>

{{-- Table Card --}}
<div class="table-card">
    <table class="stock-table">
        <thead>
            <tr>
                <th>Kode</th>
                <th>Nama Barang</th>
                <th>Stok</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $item)
            <tr>
                <td>
                    <span class="kode-badge">{{ $item->kode_barang }}</span>
                </td>
                <td style="font-weight:600; color:#e8e8e8;">{{ $item->nama_barang }}</td>
                <td>
                    <span class="stok-pill {{ $item->stok_barang <= 5 ? 'stok-low' : 'stok-ok' }}">
                        {{ $item->stok_barang }}
                    </span>
                </td>
                <td style="color:#c8ff00; font-family:'Space Mono',monospace; font-size:13px;">
                    Rp {{ number_format($item->harga_barang, 0, ',', '.') }}
                </td>
                <td>
                    <div style="display:flex; gap:8px; align-items:center;">
                        <a href="{{ route('items.edit', $item->id) }}" class="btn-edit">Edit</a>
                        <form action="{{ route('items.destroy', $item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-hapus"
                                onclick="return confirm('Hapus {{ $item->nama_barang }}?')">
                                Hapus
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach

            @if($items->isEmpty())
            <tr>
                <td colspan="5" style="text-align:center; padding:48px; color:#444; font-size:13px; letter-spacing:1px;">
                    — BELUM ADA DATA BARANG —
                </td>
            </tr>
            @endif
        </tbody>
    </table>
</div>

<style>
    .btn-primary {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: #c8ff00;
        color: #0f0f0f;
        font-family: 'Space Mono', monospace;
        font-size: 12px;
        font-weight: 700;
        letter-spacing: 0.5px;
        padding: 10px 18px;
        border-radius: 3px;
        text-decoration: none;
        transition: all 0.15s ease;
        border: 2px solid #c8ff00;
    }
    .btn-primary:hover {
        background: transparent;
        color: #c8ff00;
    }

    .table-card {
        background: #1a1a1a;
        border: 2px solid #2e2e2e;
        border-radius: 4px;
        overflow: hidden;
    }

    .stock-table {
        width: 100%;
        border-collapse: collapse;
        font-family: 'Space Mono', monospace;
        font-size: 13px;
    }

    .stock-table thead tr {
        background: #111;
        border-bottom: 2px solid #c8ff00;
    }

    .stock-table th {
        padding: 13px 18px;
        text-align: left;
        font-size: 9px;
        letter-spacing: 3px;
        text-transform: uppercase;
        color: #888;
        font-weight: 400;
    }

    .stock-table tbody tr {
        border-bottom: 1px solid #252525;
        transition: background 0.12s ease;
    }

    .stock-table tbody tr:last-child {
        border-bottom: none;
    }

    .stock-table tbody tr:hover {
        background: rgba(200, 255, 0, 0.03);
    }

    .stock-table td {
        padding: 13px 18px;
        color: #aaa;
        vertical-align: middle;
    }

    .kode-badge {
        font-size: 11px;
        letter-spacing: 1px;
        background: #252525;
        border: 1px solid #333;
        color: #999;
        padding: 3px 8px;
        border-radius: 2px;
    }

    .stok-pill {
        display: inline-block;
        padding: 3px 10px;
        border-radius: 2px;
        font-size: 12px;
        font-weight: 700;
        letter-spacing: 0.5px;
    }
    .stok-ok  { background: rgba(200,255,0,0.12); color: #c8ff00; border: 1px solid rgba(200,255,0,0.25); }
    .stok-low { background: rgba(255,80,80,0.12); color: #ff6060; border: 1px solid rgba(255,80,80,0.25); }

    .btn-edit {
        font-family: 'Space Mono', monospace;
        font-size: 11px;
        padding: 5px 12px;
        border-radius: 2px;
        text-decoration: none;
        color: #aaa;
        border: 1px solid #333;
        background: transparent;
        transition: all 0.12s ease;
        letter-spacing: 0.3px;
    }
    .btn-edit:hover {
        border-color: #c8ff00;
        color: #c8ff00;
    }

    .btn-hapus {
        font-family: 'Space Mono', monospace;
        font-size: 11px;
        padding: 5px 12px;
        border-radius: 2px;
        color: #ff6060;
        border: 1px solid rgba(255,96,96,0.3);
        background: transparent;
        cursor: pointer;
        transition: all 0.12s ease;
        letter-spacing: 0.3px;
    }
    .btn-hapus:hover {
        background: rgba(255,96,96,0.1);
        border-color: #ff6060;
    }
</style>

@endsection
