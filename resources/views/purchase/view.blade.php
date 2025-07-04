@extends('layout.popups')
@section('content')
        <div class="row justify-content-center">
            <div class="col-xxl-9">
                <div class="card" id="demo">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="hstack gap-2 justify-content-end d-print-none p-2 mt-4">
                                <a href="https://web.whatsapp.com/" target="_blank" class="btn btn-success ml-4"><i class="ri-whatsapp-line mr-4"></i> Whatsapp</a>
                                <a href="javascript:window.print()" class="btn btn-success ml-4"><i class="ri-printer-line mr-4"></i> Print</a>
                            </div>
                            <div class="card-header border-bottom-dashed p-4">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <h1>{{projectNameHeader()}}</h1>

                                        {{-- <div class="mt-sm-5 mt-4">
                                            <h6 class="text-muted text-uppercase fw-semibold">Address</h6>
                                            <p class="text-muted mb-1" id="address-details">Quetta, Pakistan</p>
                                            <p class="text-muted mb-0" id="zip-code"><span>Zip-code:</span> 87300</p>
                                        </div> --}}
                                    </div>
                                    <div class="flex-shrink-0 mt-sm-0 mt-3">
                                        <h3>Purchase Vouchar</h3>
                                    </div>
                                </div>
                            </div>
                            <!--end card-header-->
                        </div><!--end col-->
                        <div class="col-lg-12 ">

                            <div class="card-body p-4">
                                <div class="row g-3">
                                    <div class="col-lg-3 col-6">
                                        <p class="text-muted mb-2 text-uppercase fw-semibold">Vouchar #</p>
                                        <h5 class="fs-14 mb-0">{{$purchase->id}}</h5>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-3 col-6">
                                        <p class="text-muted mb-2 text-uppercase fw-semibold">Date</p>
                                        <h5 class="fs-14 mb-0">{{date("d M Y" ,strtotime($purchase->date))}}</h5>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-3 col-6">
                                        <p class="text-muted mb-2 text-uppercase fw-semibold">Vendor</p>
                                        <h5 class="fs-14 mb-0">{{$purchase->vendor->title}}</h5>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-3 col-6">
                                        <p class="text-muted mb-2 text-uppercase fw-semibold">Printed On</p>
                                        <h5 class="fs-14 mb-0"><span id="total-amount">{{ date("d M Y") }}</span></h5>
                                        {{-- <h5 class="fs-14 mb-0"><span id="total-amount">{{ \Carbon\Carbon::now()->format('h:i A') }}</span></h5> --}}
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->
                            </div>
                            <!--end card-body-->
                        </div><!--end col-->
                        <div class="col-lg-12">
                            <div class="card-body p-4">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="table-responsive">
                                            <table class="table table-borderless text-center table-nowrap align-middle mb-0">
                                                <thead>
                                                    <tr class="table-active">
                                                        <th scope="col" style="width: 50px;">#</th>
                                                        <th scope="col" class="text-start">Product</th>
                                                        <th scope="col" class="text-start">Unit</th>
                                                        <th scope="col" class="text-end">CTN</th>
                                                        <th scope="col" class="text-end">T-Qty</th>
                                                        <th scope="col" class="text-end">P-Price</th>
                                                        <th scope="col" class="text-end">S-Price</th>
                                                        <th scope="col" class="text-end">WS-Price</th>
                                                        <th scope="col" class="text-end">Bonus</th>
                                                        <th scope="col" class="text-end">RT Price</th>
                                                        <th scope="col" class="text-end">GST 18%</th>
                                                        <th scope="col" class="text-end">Amount</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="products-list">
                                                    @php
                                                        $totalQty = 0;
                                                    @endphp
                                                   @foreach ($purchase->details as $key => $product)
                                                   @php
                                                   $totalQty += $product->qty / $product->unitValue;
                                                    @endphp
                                                       <tr>
                                                        <td class="p-1 m-1">{{$key+1}}</td>
                                                        <td class="text-start p-1 m-1">{{$product->product->code}} | {{$product->product->name}}</td>
                                                        <td class="text-start m-1 p-1">{{$product->unit->name}}</td>
                                                        <td class="text-end m-1 p-1">{{number_format($product->qty / $product->unitValue)}}</td>
                                                        <td class="text-end p-1 m-1">{{number_format($product->qty)}}</td>
                                                        <td class="text-end p-1 m-1">{{number_format($product->pprice,2)}}</td>
                                                        <td class="text-end p-1 m-1">{{number_format($product->price,2)}}</td>
                                                        <td class="text-end p-1 m-1">{{number_format($product->wsprice,2)}}</td>
                                                        <td class="text-end p-1 m-1">{{number_format($product->bonus)}}</td>
                                                        <td class="text-end p-1 m-1">{{number_format($product->tp,2)}}</td>
                                                        <td class="text-end p-1 m-1">{{number_format($product->gstValue, 2)}}</td>
                                                        <td class="text-end p-1 m-1">{{number_format($product->amount,2)}}</td>
                                                       </tr>
                                                   @endforeach
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th colspan="3" class="text-end">Total</th>
                                                        <th class="text-end">{{number_format($totalQty)}}</th>
                                                        <th class="text-end">{{number_format($purchase->details->sum('qty'))}}</th>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th class="text-end">{{number_format($purchase->details->sum('gstValue'), 2)}}</th>
                                                        <th class="text-end">{{number_format($purchase->details->sum('amount'), 2)}}</th>
                                                    </tr>
                                                </tfoot>
                                            </table><!--end table-->
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-8"></div>
                                    <div class="col-4">
                                        @php
                                            $amount = $purchase->details->sum('amount');
                                            $gst = $purchase->details->sum('gstValue');
                                            $te = $amount - $gst;
                                            $whTax = $purchase->whValue;
                                            $discount = $purchase->discount;
                                            $fright = $purchase->fright;
                                            $fright1 = $purchase->fright1;
                                            $gross = ($amount + $whTax) - $discount;
                                            $net = $purchase->net;
                                        @endphp
                                        <table class="table">
                                            <tr>
                                                <th class="text-end p-1 m-1">Tax Exclusive</th>
                                                <th class="text-end p-1 m-1">{{number_format($te, 2)}}</th>
                                            </tr>
                                            <tr>
                                                <th class="text-end p-1 m-1">GST {{$purchase->gst}}%</th>
                                                <th class="text-end p-1 m-1">{{number_format($gst, 2)}}</th>
                                            </tr>
                                            <tr>
                                                <th class="text-end p-1 m-1">Tax Inclusive </th>
                                                <th class="text-end p-1 m-1">{{number_format($amount, 2)}}</th>
                                            </tr>
                                            <tr>
                                                <th class="text-end p-1 m-1">WH Tax {{$purchase->wh}}% (+) </th>
                                                <th class="text-end p-1 m-1">{{number_format($whTax, 2)}}</th>
                                            </tr>
                                            <tr>
                                                <th class="text-end p-1 m-1">Discount (-) </th>
                                                <th class="text-end p-1 m-1">{{number_format($discount, 2)}}</th>
                                            </tr>
                                            <tr>
                                                <th class="text-end p-1 m-1">Fright (-) </th>
                                                <th class="text-end p-1 m-1">{{number_format($fright, 2)}}</th>
                                            </tr>
                                            <tr>
                                                <th class="text-end p-1 m-1">Fright (+) </th>
                                                <th class="text-end p-1 m-1">{{number_format($fright1, 2)}}</th>
                                            </tr>
                                            <tr>
                                                <th class="text-end p-1 m-1">Net Bill </th>
                                                <th class="text-end p-1 m-1">{{number_format($net, 2)}}</th>
                                            </tr>
                                        </table>
                                    </div>
                                </div>


                            </div>
                            <div class="card-footer">
                                <p><strong>Notes: </strong>{{$purchase->notes}}</p>
                            </div>
                            <!--end card-body-->
                        </div><!--end col-->

                    </div><!--end row-->
                </div>
                <!--end card-->
            </div>
            <!--end col-->
        </div>
        <!--end row-->

@endsection

@section('page-css')
<link rel="stylesheet" href="{{ asset('assets/libs/datatable/datatable.bootstrap5.min.css') }}" />
<!--datatable responsive css-->
<link rel="stylesheet" href="{{ asset('assets/libs/datatable/responsive.bootstrap.min.css') }}" />

<link rel="stylesheet" href="{{ asset('assets/libs/datatable/buttons.dataTables.min.css') }}">
@endsection
@section('page-js')
    <script src="{{ asset('assets/libs/datatable/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('assets/libs/datatable/dataTables.bootstrap5.min.js')}}"></script>
    <script src="{{ asset('assets/libs/datatable/dataTables.responsive.min.js')}}"></script>
    <script src="{{ asset('assets/libs/datatable/dataTables.buttons.min.js')}}"></script>
    <script src="{{ asset('assets/libs/datatable/buttons.print.min.js')}}"></script>
    <script src="{{ asset('assets/libs/datatable/buttons.html5.min.js')}}"></script>
    <script src="{{ asset('assets/libs/datatable/vfs_fonts.js')}}"></script>
    <script src="{{ asset('assets/libs/datatable/pdfmake.min.js')}}"></script>
    <script src="{{ asset('assets/libs/datatable/jszip.min.js')}}"></script>

    <script src="{{ asset('assets/js/pages/datatables.init.js') }}"></script>
@endsection

