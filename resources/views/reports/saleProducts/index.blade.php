@extends('layout.app')
@section('content')
    <div class="row d-flex justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h3>View Products Sales Report</h3>
                </div>
                <div class="card-body">
                    <div class="form-group mt-2">
                        <label for="from">From</label>
                        <input type="date" name="from" id="from" value="{{firstDayOfMonth()}}" class="form-control">
                    </div>
                    <div class="form-group mt-2">
                        <label for="to">To</label>
                                <input type="date" name="to" id="to" value="{{lastDayOfMonth()}}" class="form-control">
                    </div>
                    <div class="form-group mt-2">
                        <label for="customer">Customer</label>
                        <select name="customer" id="customer" class="form-control">
                            <option value="0">All</option>
                            @foreach ($customers as $customer)
                                <option value="{{ $customer->id }}">{{ $customer->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mt-2">
                        <label for="category">Product Category</label>
                        <select name="category" id="category" class="form-control">
                            <option value="All">All</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mt-2">
                        <button class="btn btn-success w-100" id="viewBtn">View Report</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
@section('page-js')

    <script>

        $("#viewBtn").on("click", function (){
            var from = $("#from").val();
            var to = $("#to").val();
            var customer = $("#customer").find(":selected").val();
            var category = $("#category").find(":selected").val();
            var url = "{{ route('reportSaleProductsData', ['from' => ':from', 'to' => ':to', 'customer' => ':customer', 'category' => ':category']) }}"
        .replace(':from', from)
        .replace(':to', to)
        .replace(':customer', customer)
        .replace(':category', category);
            window.open(url, "_blank", "width=1000,height=800");
        });
    </script>
@endsection
