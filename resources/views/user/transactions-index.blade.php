@extends('layouts.main')
@section('title', $title)

@section('content')
<!--begin::Post-->
<div class="post d-flex flex-column-fluid" id="kt_post">
<!--begin::Container-->
<div id="kt_content_container" class="container-xxl">
<!--begin::Basic info-->
<div class="card mb-5 mb-xl-10">
    <!--begin::Content-->
    <div id="kt_account_profile_details" class="collapse show">

        <!--begin::Card body-->
        <div class="card-body pt-0">

            <br>

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

            <table>
                <form id="" class="form" action="{{route('order')}}" method="POST">
                @csrf
                <select id="market" name="market" class="form-control" required="required">
                    <option value="btcusd" selected="selected">BTC / USD</option>
                </select>

                <br>

                <!-- TradingView Widget BEGIN -->
                <div class="tradingview-widget-desktop">
                  <div id="tradingview_04a74"></div>
                  <script type="text/javascript" src="//s3.tradingview.com/tv.js"></script>
                  <script type="text/javascript">
                  new TradingView.widget(
                  {
                  "width": 850,
                  "height": 600,
                  "symbol": "COINBASE:BTCUSD",
                  "interval": "1",
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
                <br>

                <!-- TradingView Widget BEGIN -->
                <div class="tradingview-widget-mobile">
                  <div id="tradingview_04a75"></div>
                  <script type="text/javascript" src="//s3.tradingview.com/tv.js"></script>
                  <script type="text/javascript">
                  new TradingView.widget(
                  {
                  "width": 300,
                  "height": 350,
                  "symbol": "COINBASE:BTCUSD",
                  "interval": "1",
                  "timezone": "Asia/Jakarta",
                  "theme": "light",
                  "style": "1",
                  "locale": "en",
                  "toolbar_bg": "#f1f3f6",
                  "enable_publishing": false,
                  "container_id": "tradingview_04a75"
                }
                  );
                  </script>
                </div>
                <!-- TradingView Widget END -->
                <br>

                <th class="min-w-10px">
                    <input type="number" id="amount" name="amount" class="form-control" placeholder="$1" value="" required/>
                </th>
                <th class="min-w-50px">
                    <select id="time" name="time" class="form-control" required="required">
                        <option value="" selected="selected">- Select -</option>
                        <option value="30">30 Seconds</option>
                        <option value="60">1 Minute</option>
                        <option value="180">3 Minutes</option>
                        <option value="300">5 Minutes</option>
                        <option value="1800">30 Minutes</option>
                        <option value="3600">1 Hour</option>
                    </select>
                </th>
                <th class="min-w-10px"><button type="submit" class="btn btn-success" id="buy" name="buttonSubmit" value="buy">BUY 180%</button></th>
                <th class="min-w-10px"><button type="submit" class="btn btn-danger" id="sell" name="buttonSubmit" value="sell">SELL 180%</button></th>
                </form>
            </table>

            <br><br>
            <h3>History</h3>

            <!--begin::Table container-->
            <div class="table-responsive">
                <!--begin::Table-->
                <table id="kt_profile_overview_table" class="table table-row-bordered table-row-dashed gy-4 align-middle fw-bolder">
                    <!--begin::Head-->
                    <thead class="fs-7 text-gray-400 text-uppercase">
                        <tr>
                            <th class="min-w-100px">Trx ID</th>
                            <th class="min-w-50px">Market</th>
                            <th class="min-w-50px">Type</th>
                            <th class="min-w-50px">Rate Stake</th>
                            <th class="min-w-50px">Amount</th>
                            <th class="min-w-50px">Rate End</th>
                            <th class="min-w-50px">Status</th>
                        </tr>
                    </thead>
                    <!--end::Head-->
                    <!--begin::Body-->
                    <tbody class="fs-6">
                        @forelse ($data as $d)
                        <tr>
                            <td>{{ $d->trx_id }}</td>
                            <td>{{ strtoupper($d->market) }}</td>
                            <td>
                                @if ($d->type == 'buy 30 seconds')
                                    <span class="badge badge-success fw-bolder px-4 py-3">{{ strtoupper('buy 30 seconds') }}</span>
                                @elseif ($d->type == 'buy 60 seconds')
                                    <span class="badge badge-success fw-bolder px-4 py-3">{{ strtoupper('buy 1 minute') }}</span>
                                @elseif ($d->type == 'buy 180 seconds')
                                    <span class="badge badge-success fw-bolder px-4 py-3">{{ strtoupper('buy 3 minutes') }}</span>
                                @elseif ($d->type == 'buy 300 seconds')
                                    <span class="badge badge-success fw-bolder px-4 py-3">{{ strtoupper('buy 5 minutes') }}</span>
                                @elseif ($d->type == 'buy 1800 seconds')
                                    <span class="badge badge-success fw-bolder px-4 py-3">{{ strtoupper('buy 30 minutes') }}</span>
                                @elseif ($d->type == 'buy 3600 seconds')
                                    <span class="badge badge-success fw-bolder px-4 py-3">{{ strtoupper('buy 1 hour') }}</span>
                                @elseif ($d->type == 'sell 30 seconds')
                                    <span class="badge badge-danger fw-bolder px-4 py-3">{{ strtoupper('sell 30 seconds') }}</span>
                                @elseif ($d->type == 'sell 60 seconds')
                                    <span class="badge badge-danger fw-bolder px-4 py-3">{{ strtoupper('sell 1 minute') }}</span>
                                @elseif ($d->type == 'sell 180 seconds')
                                    <span class="badge badge-danger fw-bolder px-4 py-3">{{ strtoupper('sell 3 minutes') }}</span>
                                @elseif ($d->type == 'sell 300 seconds')
                                    <span class="badge badge-danger fw-bolder px-4 py-3">{{ strtoupper('sell 5 minutes') }}</span>
                                @elseif ($d->type == 'sell 1800 seconds')
                                    <span class="badge badge-danger fw-bolder px-4 py-3">{{ strtoupper('sell 30 minutes') }}</span>
                                @elseif ($d->type == 'sell 3600 seconds')
                                    <span class="badge badge-danger fw-bolder px-4 py-3">{{ strtoupper('sell 1 hour') }}</span>
                                @endif
                            </td>
                            <td>{{ $d->rate_stake }}</td>
                            <td>${{ $d->amount }}</td>
                            <td>
                                @if ($d->rate_end == '')
                                    -
                                @else
                                    {{ $d->rate_end }}
                                @endif
                            </td>
                            <td>
                                @if ($d->status == 0)
                                    <span class="badge badge-warning fw-bolder px-4 py-3">WAIT</span>
                                @elseif ($d->status == 1)
                                   <span class="badge badge-success fw-bolder px-4 py-3">W I N</span>
                                @elseif ($d->status == 2)
                                   <span class="badge badge-danger fw-bolder px-4 py-3">LOSE</span>
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
            </div>
            <!--end::Table container-->

            <div class="d-flex justify-content-start">
                {{ $data->links() }}
            </div>

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

<style>
    .hidden.sm\:flex-1.sm\:flex.sm\:items-center.sm\:justify-between {
        display: none !important;
    }

    

    @media (min-width: 900px) {
        .tradingview-widget-desktop {
            display: block;
        }
        .tradingview-widget-mobile {
            display: none !important;
        }
    }

    @media screen and (max-width: 767px) {
        .tradingview-widget-desktop {
            display: none !important;
        }
        .tradingview-widget-mobile {
            display: block;
        }
    }
</style>

@stop