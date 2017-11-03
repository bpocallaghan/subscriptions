@extends('layouts.website')

@section('content')
    <section class="content">
        @include('website.partials.page_header', ['column' => 12])

        <div class="row">
            <div class="body col-sm-12">
                @include('website.partials.breadcrumb')

                <div class="row card-deck">
                    @foreach($subscriptionPlans as $item)
                        <div class="card {{ ($item->is_featured? 'bg-primary text-white':'bg-light') }}  text-center">
                            <div class="card-header">
                                <h3 class="card-title">
                                    {{ $item->title }}
                                    @if($item->is_featured)
                                        <span class="badge badge-success">Best Value</span>
                                    @endif
                                </h3>
                            </div>
                            <div class="card-body">
                                <span class="price"><sup>$</sup>{{ $item->cost }}</span>
                                <span class="period">per month</span>
                                @if($item->summary && strlen($item->summary) > 2)
                                    <p style="margin: 5px 0px 0px 0px;">
                                        <i>{{ $item->summary }}</i></p>
                                @endif
                            </div>
                            <ul class="list-group list-group-flush text-black">
                                @foreach($item->features as $feature)
                                    <li class="list-group-item">{!! $feature->title !!}</li>
                                @endforeach
                            </ul>
                            <div class="card-footer">
                                <a href="#" class="btn btn-primary">Sign Up!</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection