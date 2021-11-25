@extends('layouts.main')
@section('title', $title)

@section('content')
<!--begin::Post-->
<div class="post d-flex flex-column-fluid" id="kt_post">
<!--begin::Container-->
<div id="kt_content_container" class="container-xxl">
<!--begin::Basic info-->
<div class="card mb-5 mb-xl-10">
    <!--begin::Card header-->
    <div class="card-header border-0">
        <!--begin::Card title-->
        <div class="card-title m-0">
            <h3 class="fw-bolder m-0">{{$title}}</h3>
        </div>
        <!--end::Card title-->
    </div>
    <!--begin::Card header-->
    <!--begin::Content-->
    <div id="kt_account_profile_details" class="collapse show">

        <!--begin::Card body-->
        <div class="card-body pt-0">

            @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
            </div>
            @endif
            @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
            </div>
            @endif

            <!--begin::Table container-->
            <div class="table-responsive">
                <!--begin::Table-->
                <table id="kt_profile_overview_table" class="table table-row-bordered table-row-dashed gy-4 align-middle fw-bolder">
                    <!--begin::Head-->
                    <thead class="fs-7 text-gray-400 text-uppercase">
                        <tr>
                            <th class="min-w-150px">Timestamp</th>
                            <th class="min-w-100px">Trx ID</th>
                            <th class="min-w-50px">Type</th>
                            <th class="min-w-50px">Market</th>
                            <th class="min-w-50px">Amount</th>
                            <th class="min-w-50px">Status</th>
                        </tr>
                    </thead>
                    <!--end::Head-->
                    <!--begin::Body-->
                    <tbody class="fs-6">
                        @forelse ($data as $d)
                        <tr>
                            <td>{{ $d->created_at }}</td>
                            <td>{{ $d->trx_id }}</td>
                            <td>
                                @if ($d->type == 'buy')
                                    <span class="badge badge-light-success fw-bolder px-4 py-3">Buy</span>
                                @elseif ($d->type == 'sell')
                                   <span class="badge badge-light-danger fw-bolder px-4 py-3">Sell</span>
                                @endif
                            </td>
                            <td>{{ strtoupper($d->market) }}</td>
                            <td>{{ $d->amount }}</td>
                            <td>
                                @if ($d->status == 0)
                                    <span class="badge badge-light-warning fw-bolder px-4 py-3">Pending</span>
                                @elseif ($d->status == 1)
                                   <span class="badge badge-light-success fw-bolder px-4 py-3">Success</span>
                                @elseif ($d->status == 2)
                                   <span class="badge badge-light-danger fw-bolder px-4 py-3">Failed</span>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6">
                                <div class="fs-6 text-gray-700 pe-7" style="font-style: italic;">Data not available...</div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    <!--end::Body-->
                </table>
                <!--end::Table-->

                <a href="{{url('user/order/2000')}}" class="btn btn-primary btn-active-light-dark">Order Now</a>

            </div>
            <!--end::Table container-->

            <div class="d-flex justify-content-start">
                {{ $data->links() }}
            </div>

            <table>
                <th class="min-w-50px"><a href="{{url('user/order/2000')}}" class="btn btn-success">BUY 180%</a></th>
                <th class="min-w-50px"><a href="{{url('user/order/2000')}}" class="btn btn-danger">SELL 180%</a></th>
            </table>
            
            <br><br>
            <!-- TradingView Widget BEGIN -->
            <div class="tradingview-widget-container">
              <div id="tradingview_04a74"></div>
              <script type="text/javascript" src="//s3.tradingview.com/tv.js"></script>
              <script type="text/javascript">
              new TradingView.widget(
              {
              "width": 850,
              "height": 600,
              "symbol": "COINBASE:BTCUSD",
              "interval": "D",
              "timezone": "Asia/Jakarta",
              "theme": "light",
              "style": "1",
              "locale": "en",
              "toolbar_bg": "#f1f3f6",
              "enable_publishing": false,
              "container_id": "tradingview_04a74"
            }
              );
              </script>
            </div>
            <!-- TradingView Widget END -->

        </div>
        <!--end::Card body-->

    </div>
    <!--end::Content-->
</div>
<!--end::Basic info-->

</div>
<!--end::Container-->
</div>
<!--end::Post-->
@stop