@extends('shopify-app::layouts.default')
@section('styles')
    @parent
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@endsection
@section('content')
    <div class="container py-3">
        <header>
            <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
              <h1 class="display-4 fw-normal">Pricing</h1>
              <p class="fs-5 text-muted">Quickly build an effective pricing table for your potential customers with this Bootstrap example. It’s built with default Bootstrap components and utilities with little customization.</p>
            </div>
          </header>

          <main>
            <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
                @foreach ($plans as $plan)
                    <div class="col">
                        <div class="card mb-4 rounded-3 shadow-sm @if ($loop->last) text-white border-primary @endif">
                          <div class="card-header py-3 @if ($loop->last) bg-primary border-primary @endif">
                            <h4 class="my-0 fw-normal">{{ $plan->name }}</h4>
                          </div>
                          <div class="card-body">
                            <h1 class="card-title pricing-card-title">{{ $plan->price }}</h1>
                            <ul class="list-unstyled mt-3 mb-4">
                              <li>20 users included</li>
                              <li>10 GB of storage</li>
                              <li>Priority email support</li>
                              <li>Help center access</li>
                            </ul>
                            {{-- {{ dd(URL::tokenRoute('billing', [$plan->id])) }} --}}
                            <a class="w-100 btn btn-lg btn-primary {{$plan->id}}" href="{{ URL::tokenRoute('billing', [$plan->id])}}" > Pay now </a>
                          </div>
                        </div>
                      </div>
                @endforeach

            </div>

            <h2 class="display-6 text-center mb-4">Compare plans</h2>

            <div class="table-responsive">
              <table class="table text-center">
                <thead>
                  <tr>
                    <th style="width: 34%;"></th>
                    <th style="width: 22%;">Free</th>
                    <th style="width: 22%;">Pro</th>
                    <th style="width: 22%;">Enterprise</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row" class="text-start">Public</th>
                    <td><svg class="bi" width="24" height="24"><use xlink:href="#check"/></svg></td>
                    <td><svg class="bi" width="24" height="24"><use xlink:href="#check"/></svg></td>
                    <td><svg class="bi" width="24" height="24"><use xlink:href="#check"/></svg></td>
                  </tr>
                  <tr>
                    <th scope="row" class="text-start">Private</th>
                    <td></td>
                    <td><svg class="bi" width="24" height="24"><use xlink:href="#check"/></svg></td>
                    <td><svg class="bi" width="24" height="24"><use xlink:href="#check"/></svg></td>
                  </tr>
                </tbody>

                <tbody>
                  <tr>
                    <th scope="row" class="text-start">Permissions</th>
                    <td><svg class="bi" width="24" height="24"><use xlink:href="#check"/></svg></td>
                    <td><svg class="bi" width="24" height="24"><use xlink:href="#check"/></svg></td>
                    <td><svg class="bi" width="24" height="24"><use xlink:href="#check"/></svg></td>
                  </tr>
                  <tr>
                    <th scope="row" class="text-start">Sharing</th>
                    <td></td>
                    <td><svg class="bi" width="24" height="24"><use xlink:href="#check"/></svg></td>
                    <td><svg class="bi" width="24" height="24"><use xlink:href="#check"/></svg></td>
                  </tr>
                  <tr>
                    <th scope="row" class="text-start">Unlimited members</th>
                    <td></td>
                    <td><svg class="bi" width="24" height="24"><use xlink:href="#check"/></svg></td>
                    <td><svg class="bi" width="24" height="24"><use xlink:href="#check"/></svg></td>
                  </tr>
                  <tr>
                    <th scope="row" class="text-start">Extra security</th>
                    <td></td>
                    <td></td>
                    <td><svg class="bi" width="24" height="24"><use xlink:href="#check"/></svg></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </main>
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
            title: 'Welcome',
        };
        var myTitleBar = TitleBar.create(app, titleBarOptions);
    </script>
@endsection
