@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    {{ __('You are logged in!') }}
                    You are admin.
                </div>
            </div>
            <style>
                ul.blue {
                    padding: 5px;
                    margin: 10px 0;
                    list-style: none;
                    float: left;

                }

                ul.blue li {
                    float: left;
                }

                ul.blue li a {
                    float: left;
                    text-decoration: none;
                    color: #000000;
                    padding: 4px 15px 0 0;
                    margin-right: 8px;
                    font: 1000 14px "Arial", Helvetica, sans-serif;
                }

                ul.blue li a:hover,
                ul.blue li a.current {
                    color: #FF6666;
                    background: url("images/blue.png") no-repeat top right;
                }

                ul.blue li a:hover span,
                ul.blue li a.current span {
                    background: url("images/blue.png") no-repeat top left;
                }
            </style>
            <ul class="blue">
                <li><a href="#">Home</a></li>
                <li><a href="/member">Member information</a></li>
                <li><a href="/placetype">Type of attraction</a></li>
                <li><a href="#">Event</a></li>
                <li><a href="#">Tourist information</a></li>
                <li><a href="#">Review</a></li>
            </ul>




        </div>
    </div>
</div>

@endsection