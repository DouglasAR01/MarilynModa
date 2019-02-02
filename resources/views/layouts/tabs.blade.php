@extends('layouts.main')

@section('stylesheets')
  <link rel="stylesheet" href="/css/tabs.css">
  @yield('styles')
@endsection

@section('content')
  <div class="tab-container">

    <div class="tab">
      <button class="tablinks active" onclick="openTab(event, 'all-tab')">Todos</button>
      <button class="tablinks" onclick="openTab(event, 'mas-venden')">Más venden</button>
      {{-- <button class="tablinks" onclick="openCity(event, 'Tokyo')">Búsqueda</button> --}}
    </div>

    <!-- Tab content -->
    <div id="all-tab" class="tabcontent">
      @yield('db-tab')
    </div>

    <div id="mas-venden" class="tabcontent">
      <h3>Paris</h3>
      <p>Paris is the capital of France.</p>
    </div>

    {{-- <div id="Tokyo" class="tabcontent">
      <h3>Tokyo</h3>
      <p>Tokyo is the capital of Japan.</p>
    </div> --}}


  </div>
@endsection
