@extends('layouts.layout')
@section('content')
<div class="main_content">
    <div class="mcontainer">

        <!--  breadcrumb -->
        <div class="breadcrumb-area py-0">
            <div class="breadcrumb">
                <ul class="m-0">
                    <li>
                        <a href="index.html">Homes</a>
                    </li>
                    <li class="active">
                        <a href="#">Edit {{App\Models\Home::find($id)->name}} </a>
                    </li>
                </ul>
            </div>
        </div>


        <livewire:home-edit :home="$id">


    </div>
</div>
@endsection