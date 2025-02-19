@extends('layout')
@section("content")
<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-md-3">
            <div class="sidebar bg-dark p-3">
                <h4>Sidebar</h4>
                <div style="display: flex; align-items: center;">
                    <img src="{{ asset('images/techSupport.png') }}" alt="Description">
                    <p>123-456-7890 || tech@techsupport.com</p>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-9">
            <div class="main-content p-3">
                <h1>About Page</h1>
                <p>This web application is for managing inventory records. </p>
            </div>
        </div>
    </div>

    @endsection("content")