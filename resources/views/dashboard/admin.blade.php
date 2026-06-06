@extends('layouts.admin')

@section('title', 'Admin Dashboard')
@section('page-title', 'Admin Dashboard')

@section('content')
    <div class="row">
        {{-- Small Box - Users --}}
        <div class="col-lg-3 col-6">
            <div class="small-box text-bg-primary">
                <div class="inner">
                    <h3>150</h3>
                    <p>New Members</p>
                </div>
                <div class="icon">
                    <i class="bi bi-people-fill"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="bi bi-arrow-right-circle-fill"></i>
                </a>
            </div>
        </div>

        {{-- Small Box - Revenue --}}
        <div class="col-lg-3 col-6">
            <div class="small-box text-bg-success">
                <div class="inner">
                    <h3>53<sup class="fs-5">%</sup></h3>
                    <p>Bounce Rate</p>
                </div>
                <div class="icon">
                    <i class="bi bi-graph-up-arrow"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="bi bi-arrow-right-circle-fill"></i>
                </a>
            </div>
        </div>

        {{-- Small Box - Orders --}}
        <div class="col-lg-3 col-6">
            <div class="small-box text-bg-warning">
                <div class="inner">
                    <h3>44</h3>
                    <p>User Registrations</p>
                </div>
                <div class="icon">
                    <i class="bi bi-person-plus-fill"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="bi bi-arrow-right-circle-fill"></i>
                </a>
            </div>
        </div>

        {{-- Small Box - Visitors --}}
        <div class="col-lg-3 col-6">
            <div class="small-box text-bg-danger">
                <div class="inner">
                    <h3>65</h3>
                    <p>Unique Visitors</p>
                </div>
                <div class="icon">
                    <i class="bi bi-eye-fill"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="bi bi-arrow-right-circle-fill"></i>
                </a>
            </div>
        </div>
    </div>

    {{-- Sales Value Chart + World Map Row --}}
    <div class="row">
        {{-- Sales Value Area Chart --}}
        <div class="col-lg-7">
            <div class="card">
                <div class="card-header border-0">
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title">Sales Value</h3>
                    </div>
                </div>
                <div class="card-body">
                    <div id="sales-chart"></div>
                </div>
            </div>
        </div>

        {{-- World Map + Sparklines --}}
        <div class="col-lg-5">
            <div class="card bg-primary text-white">
                <div class="card-header border-0">
                    <h3 class="card-title">Sales Value</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-primary btn-sm" data-lte-toggle="card-collapse">
                            <i class="bi bi-dash-lg"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div id="world-map" style="height: 220px;"></div>
                </div>
                <div class="card-footer border-0 d-flex justify-content-center gap-4 pb-3">
                    <div class="text-center">
                        <div id="sparkline-visitors" class="sparkline-chart"></div>
                        <div class="text-white-50 mt-1 small">Visitors</div>
                    </div>
                    <div class="text-center">
                        <div id="sparkline-online" class="sparkline-chart"></div>
                        <div class="text-white-50 mt-1 small">Online</div>
                    </div>
                    <div class="text-center">
                        <div id="sparkline-sales" class="sparkline-chart"></div>
                        <div class="text-white-50 mt-1 small">Sales</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Direct Chat + Welcome Card Row --}}
    <div class="row">
        {{-- Direct Chat --}}
        <div class="col-lg-6">
            <div class="card direct-chat direct-chat-primary">
                <div class="card-header">
                    <h3 class="card-title">Direct Chat</h3>
                    <div class="card-tools">
                        <span class="badge text-bg-primary" id="chat-badge">3</span>
                        <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse">
                            <i class="bi bi-dash-lg"></i>
                        </button>
                        <button type="button" class="btn btn-tool" title="Contacts" data-lte-toggle="chat-pane">
                            <i class="bi bi-chat-dots-fill"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-lte-toggle="card-remove">
                            <i class="bi bi-x-lg"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="direct-chat-messages" id="chat-messages">
                        {{-- Message from left --}}
                        <div class="direct-chat-msg">
                            <div class="direct-chat-infos clearfix">
                                <span class="direct-chat-name float-start">Alexander Pierce</span>
                                <span class="direct-chat-timestamp float-end">23 Jan 2:00 pm</span>
                            </div>
                            <img class="direct-chat-img" src="{{ asset('admin/assets/img/user1-128x128.jpg') }}" alt="User">
                            <div class="direct-chat-text">
                                Is this template really for free? That's unbelievable!
                            </div>
                        </div>

                        {{-- Message from right --}}
                        <div class="direct-chat-msg end">
                            <div class="direct-chat-infos clearfix">
                                <span class="direct-chat-timestamp float-start">23 Jan 2:05 pm</span>
                                <span class="direct-chat-name float-end">Sarah Bullock</span>
                            </div>
                            <img class="direct-chat-img" src="{{ asset('admin/assets/img/user3-128x128.jpg') }}" alt="User">
                            <div class="direct-chat-text">
                                You better believe it!
                            </div>
                        </div>

                        {{-- Message from left --}}
                        <div class="direct-chat-msg">
                            <div class="direct-chat-infos clearfix">
                                <span class="direct-chat-name float-start">Alexander Pierce</span>
                                <span class="direct-chat-timestamp float-end">23 Jan 5:37 pm</span>
                            </div>
                            <img class="direct-chat-img" src="{{ asset('admin/assets/img/user1-128x128.jpg') }}" alt="User">
                            <div class="direct-chat-text">
                                Working with AdminLTE on a great new app! Wanna join?
                            </div>
                        </div>

                        {{-- Message from right --}}
                        <div class="direct-chat-msg end">
                            <div class="direct-chat-infos clearfix">
                                <span class="direct-chat-timestamp float-start">23 Jan 6:10 pm</span>
                                <span class="direct-chat-name float-end">Sarah Bullock</span>
                            </div>
                            <img class="direct-chat-img" src="{{ asset('admin/assets/img/user3-128x128.jpg') }}" alt="User">
                            <div class="direct-chat-text">
                                Sure, let me know when you're ready!
                            </div>
                        </div>
                    </div>

                    {{-- Chat Contacts Pane --}}
                    <div class="direct-chat-contacts">
                        <ul class="contacts-list">
                            <li>
                                <a href="#">
                                    <img class="contacts-list-img" src="{{ asset('admin/assets/img/user1-128x128.jpg') }}" alt="User">
                                    <div class="contacts-list-info">
                                        <span class="contacts-list-name">Alexander Pierce <small class="contacts-list-date float-end">2/28</small></span>
                                        <span class="contacts-list-msg">How have you been?</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img class="contacts-list-img" src="{{ asset('admin/assets/img/user7-128x128.jpg') }}" alt="User">
                                    <div class="contacts-list-info">
                                        <span class="contacts-list-name">Sarah Bullock <small class="contacts-list-date float-end">1/15</small></span>
                                        <span class="contacts-list-msg">I will be available tomorrow.</span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-footer">
                    <form id="chat-form">
                        <div class="input-group">
                            <input type="text" name="message" placeholder="Type Message ..." class="form-control" id="chat-input">
                            <span class="input-group-append">
                                <button type="submit" class="btn btn-primary" id="chat-send-btn">Send</button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- Welcome Card --}}
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Welcome, Admin!</h3>
                </div>
                <div class="card-body">
                    <p>Selamat datang di Dashboard <strong>Admin</strong>. Anda memiliki akses penuh ke semua fitur aplikasi.</p>
                    <p>Role: <span class="badge text-bg-primary">{{ Auth::user()->role }}</span></p>
                    <p>Status: <span class="badge text-bg-success">{{ Auth::user()->status }}</span></p>
                </div>
            </div>
        </div>
    </div>
@endsection
