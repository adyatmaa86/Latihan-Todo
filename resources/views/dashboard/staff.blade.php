@extends('layouts.admin')

@section('title', 'Staff Dashboard')
@section('page-title', 'Staff Dashboard')

@section('content')
    <div class="row">
        {{-- Small Box - Tasks --}}
        <div class="col-lg-4 col-6">
            <div class="small-box text-bg-info">
                <div class="inner">
                    <h3>28</h3>
                    <p>Tasks</p>
                </div>
                <div class="icon">
                    <i class="bi bi-list-check"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="bi bi-arrow-right-circle-fill"></i>
                </a>
            </div>
        </div>

        {{-- Small Box - Reports --}}
        <div class="col-lg-4 col-6">
            <div class="small-box text-bg-success">
                <div class="inner">
                    <h3>12</h3>
                    <p>Reports</p>
                </div>
                <div class="icon">
                    <i class="bi bi-file-earmark-bar-graph"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="bi bi-arrow-right-circle-fill"></i>
                </a>
            </div>
        </div>

        {{-- Small Box - Messages --}}
        <div class="col-lg-4 col-6">
            <div class="small-box text-bg-warning">
                <div class="inner">
                    <h3>5</h3>
                    <p>Messages</p>
                </div>
                <div class="icon">
                    <i class="bi bi-chat-dots-fill"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="bi bi-arrow-right-circle-fill"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Welcome, Staff!</h3>
                </div>
                <div class="card-body">
                    <p>Selamat datang di Dashboard <strong>Staff</strong>. Anda dapat mengelola tugas dan melihat laporan.</p>
                    <p>Role: <span class="badge text-bg-info">{{ Auth::user()->role }}</span></p>
                    <p>Status: <span class="badge text-bg-success">{{ Auth::user()->status }}</span></p>
                </div>
            </div>
        </div>
    </div>
@endsection
