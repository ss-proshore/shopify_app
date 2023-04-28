@extends('shopify-app::layouts.default')
@section('styles')
    @parent
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@endsection
@section('content')
<div class="p-5">

    <p>You are: {{ Auth::user()->name }} from home page</p>

    <p>
        @if (\Session::has('success'))
            <div class="alert alert-success alert-dismissible" role="alert">
                {!! \Session::get('success') !!}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <a class="btn btn-primary float-start" href="{{ URL::tokenRoute('billing', ['plan' => $update_plan ]) }}">Update Plan</a>
        <a class="btn btn-secondary float-end" href="{{ URL::tokenRoute('product.sync') }}">Sync Data</a>
    </p>


    <table class="table">
        <thead>
          <tr>
            <th scope="col">Product Name</th>
            <th scope="col">Type</th>
            <th scope="col">Vendor</th>
            <th scope="col">collection</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <td>{{ $product->title }}</td>
                <td>{{ $product->product_type }}</td>
                <td> {{ $product->vendor }}</td>
                <td>
                    @foreach ($product->collections as $collection)
                        {{ $collection->title}}

                        @if( !$loop->last)
                        ,
                        @endif
                    @endforeach
                </td>
            </tr>
            @endforeach
      </table>
</div>

@endsection
@section('scripts')
    @parent
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script type="text/javascript">
        var AppBridge = window['app-bridge'];
        var actions = AppBridge.actions;
        var TitleBar = actions.TitleBar;
        var Button = actions.Button;
        var Redirect = actions.Redirect;
        var titleBarOptions = {
            title: 'Find your business status here !! ',
        };
        var myTitleBar = TitleBar.create(app, titleBarOptions);
    </script>
@endsection
