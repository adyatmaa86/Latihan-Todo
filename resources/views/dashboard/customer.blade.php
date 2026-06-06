@extends('layouts.admin')

@section('title', 'Customer Dashboard')
@section('page-title', 'Customer Dashboard')

@section('content')
    <div class="row">
        {{-- Small Box - Orders --}}
        <div class="col-lg-6 col-6">
            <div class="small-box text-bg-primary">
                <div class="inner">
                    <h3>3</h3>
                    <p>My Orders</p>
                </div>
                <div class="icon">
                    <i class="bi bi-bag-check"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="bi bi-arrow-right-circle-fill"></i>
                </a>
            </div>
        </div>

        {{-- Small Box - Notifications --}}
        <div class="col-lg-6 col-6">
            <div class="small-box text-bg-success">
                <div class="inner">
                    <h3>7</h3>
                    <p>Notifications</p>
                </div>
                <div class="icon">
                    <i class="bi bi-bell-fill"></i>
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
                    <h3 class="card-title">Welcome, Customer!</h3>
                </div>
                <div class="card-body">
                    <p>Selamat datang di Dashboard <strong>Customer</strong>. Anda dapat melihat pesanan dan profil Anda.</p>
                    <p>Role: <span class="badge text-bg-secondary">{{ Auth::user()->role }}</span></p>
                    <p>Status: <span class="badge text-bg-success">{{ Auth::user()->status }}</span></p>
                </div>
            </div>
        </div>
    </div>
@endsection
