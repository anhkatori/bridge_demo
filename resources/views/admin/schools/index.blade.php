@extends('admin.layouts.default')

@section('content')
@section('pageTitle', 'Administrative')
<input id="title" value='administrative' hidden>
<div class="page-title">
    <form id='form-administrative'>
        <div class="header">
            <select name="value_page" id="value_page">
                <option value="10">10/page</option>
                <option value="15">15/page</option>
                <option value="20">20/page</option>
                <option value="25">25/page</option>
            </select>
            <div class="search">
                <input type="text" name="search" id="search">
                <button class="button-search" id="button-search">Tìm kiếm</button>
                <button class="filter">
                    <i class="fa fa-filter" aria-hidden="true"></i>
                </button>
            </div>
        </div>
    </form>
    <div class="page_action">
            <button class="delete_button" id="delete_button" disabled>Delete</button>
            <button class="add" style="width:auto " type="button">
                Add
            </button>
    </div>
    <div id='data-administrative'>
        {{-- @include('admin.administrative.data') --}}
    </div>
    {{-- @include('admin.administrative.add')
    @include('admin.administrative.edit') --}}
</div>
<script src="{{ asset('assets/js/admin/administrative.js') }}"></script>
@endsection
