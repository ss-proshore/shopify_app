@extends('shopify-app::layouts.default')
@section('content')
    <p>You are: {{ Auth::user()->name }} from home page</p>

    <p><a href="{{ URL::tokenRoute('billing', ['plan' => $upgrade_plan[0]]) }}">Update Plan</a></p>
@endsection
@section('scripts')
    @parent
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