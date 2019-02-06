@extends('layouts.main')

@section('stylesheets')
  <link rel="stylesheet" href="/css/search-head.css">
  <link rel="stylesheet" href="/css/tabs.css">
  @yield('styles')
@endsection

@section('content')
  <div class="row" id="sh-row">
    @yield('search-head')
  </div>
  <div class="tab-container" style="display:none;">

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
  </div>
    {{-- <div id="Tokyo" class="tabcontent">
      <h3>Tokyo</h3>
      <p>Tokyo is the capital of Japan.</p>
    </div> --}}
  <div class="accordion" id="accordionExample" style="display:none;">
    <div class="card">
      <div class="card-header" id="headingOne">
        <h2 class="mb-0">
          <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            Todos
          </button>
        </h2>
      </div>

      <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
        <div class="card-body">
          @yield('db-tab')
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header" id="headingTwo">
        <h2 class="mb-0">
          <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            Más venden
          </button>
        </h2>
      </div>
      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
        <div class="card-body">
          Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
        </div>
      </div>
    </div>

  </div>



  </div>
@endsection
