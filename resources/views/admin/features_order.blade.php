@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        <span><i class="fa fa-align-center"></i></span>
                        <span>Update Subscription Plan Features List Order</span>
                    </h3>
                </div>

                <div class="box-body">

                    <div class="well well-sm well-toolbar" id="nestable-menu">
                        <a href="javascript:window.history.back();" class="btn btn-labeled btn-default">
                            <span class="btn-label"><i class="fa fa-fw fa-chevron-left"></i></span>Back
                        </a>
                    </div>

                    <div class="row">
                        <div class="col-xs-12">
                            <div class="dd" id="dd-navigation" style="max-width: 100%">
                                {!! $itemsHtml !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('admin.partials.nestable')
@endsection

@section('scripts')
    @parent
    <script type="text/javascript" charset="utf-8">
        $(function ()
        {
            initNestableMenu(1, "{{ Request::url() }}");
        })
    </script>
@endsection