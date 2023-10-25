@extends('dashboard.layouts.main')

@push('title')
  <title> Student Index. </title>
@endpush

@section('main-content')
<div style="padding-top: 50px;" class="container">
    <div style="padding-bottom: 30px;">
        <a href="{{route('school-session.add')}}" class="btn btn-primary">+ Add New Session</a>
     </div>

        @if(session()->has('message'))
            <div class="alert alert-success">
                {{session()->get('message') }}
            </div>
        @endif
        @if($sessions->count()>0)
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <p class="card-title">Advanced Table</p>
                <div class="row">
                  <div class="col-12">
                    <div class="table-responsive">
                      <table id="example" class="display expandable-table" style="width:100%">
                        <thead>
                          <tr>
                            <th>Quote#</th>
                            <th>Product</th>
                            <th>Business type</th>
                            <th>Policy holder</th>
                            <th>Premium</th>
                            <th>Status</th>
                            <th>Updated at</th>
                            <th></th>
                          </tr>
                        </thead>
                    </table>
                    </div>
                  </div>
                </div>
                </div>
              </div>
            </div>
          </div>

        @else
        <h2>No any Session exists. </h2>

        @endif
    </div>

@endsection
@push('scripts')


@endpush
