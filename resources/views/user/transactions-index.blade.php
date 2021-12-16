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
                <form id="" class="form" action="{{url('user/coba')}}" method="POST">
                @csrf
                <select id="market" name="market" class="form-control" required="required">
                    <option value="btcusd" selected="selected">BTC / USD</option>
                </select>

                <br>
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

                <th class="min-w-10px">
                    <input type="number" id="amount" name="amount" class="form-control" placeholder="USD 1" value="" required/>
                </th>
                <th class="min-w-10px">
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
                <!-- <th class="min-w-50px"><a href="{{url('user/trx/buy/btcusd/30/1')}}" class="btn btn-success">BUY 180%</a></th>
                <th class="min-w-50px"><a href="{{url('user/trx/sell/btcusd/30/1')}}" class="btn btn-danger">SELL 180%</a></th> -->
                <th class="min-w-50px"><button type="submit" class="btn btn-success" id="buy" name="buttonSubmit" value="buy">BUY 180%</button></th>
                <th class="min-w-50px"><button type="submit" class="btn btn-danger" id="sell" name="buttonSubmit" value="sell">SELL 180%</button></th>
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
                                <span class="badge badge-success fw-bolder px-4 py-3">{{ strtoupper($d->type) }}</span>
                            </td>
                            <td>{{ $d->rate_stake }}</td>
                            <td>USD {{ $d->amount }}</td>
                            <td>{{ $d->rate_end }}</td>
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
@stop