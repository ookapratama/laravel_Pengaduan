@extends('layouts.app', ['title' => 'Website Pengaduan'])

@section('content')
    @push('styles')
    @endpush

    <div class="main-content ">
        <section class="section">
            <div class="section-header">
                <h1>Cetak Rekapan Data Pengaduan</h1>

            </div>

            <div class="section-body">
                <form method="POST" action="{{ route('admin.cetak-rekap') }}">
                    @csrf
                    <button type="submit" class="btn btn-success">Cetak Rekap</button>
                </form>
            </div>
        </section>
    </div>

    @push('scripts')
    @endpush
@endsection
