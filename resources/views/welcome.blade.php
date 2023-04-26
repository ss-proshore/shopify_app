@extends('shopify-app::layouts.default')
@section('content')
    <!-- You are: (shop domain name) -->
    <p>You are: {{ Auth::user()->name }}</p>


    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ut deserunt, sed error commodi, consequuntur illo unde exercitationem numquam consequatur sequi accusantium expedita ipsum quas culpa eos quo? Ex, dolores quasi?
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
            title: 'Welcome',
        };
        var myTitleBar = TitleBar.create(app, titleBarOptions);
    </script>
@endsection
