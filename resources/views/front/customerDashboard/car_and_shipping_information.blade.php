@extends('front.customerDashboard.customer_main')

@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h2 class="text-center mb-4">Car and Shipping Information</h2>
                </div>
                <div class="col-12">
                    <div class="card p-4 shadow">

                        <form id="search_filter" method="post" action="{{ route('shipping_request_search_filter') }}"
                            class="w-100">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <label for="country" class="form-label">Select Country</label>
                                    <select id="country" name="country" class="form-select">
                                        <option disabled selected>Select Country</option>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->id }}"
                                                {{ $request->input('country') == $country->id ? 'selected' : '' }}>
                                                {{ $country->listing_location_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="city" class="form-label">Select City</label>
                                    <select id="city" name="city" class="form-select">
                                        <option disabled selected>Select City</option>
                                        @foreach ($cities as $city)
                                            <option value="{{ $city->id }}"
                                                {{ $request->input('city') == $city->id ? 'selected' : '' }}>
                                                {{ $city->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="port" class="form-label">Select Port</label>
                                    <select id="port" name="port" class="form-select">
                                        <option disabled selected>Select Port</option>
                                        @foreach ($ports as $port)
                                            <option value="{{ $port->id }}"
                                                {{ $request->input('port') == $port->id ? 'selected' : '' }}>
                                                {{ $port->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="service_plan" class="form-label">Select Service Plan</label>
                                    <select id="service_plan" name="service_plan" class="form-select">
                                        <option disabled selected>Select Service Plan</option>
                                        <option value="container_plan"
                                            {{ $request->input('service_plan') == 'container_plan' ? 'selected' : '' }}>
                                            Container Plan
                                        </option>
                                        <option value="roro"
                                            {{ $request->input('service_plan') == 'roro' ? 'selected' : '' }}>
                                            Roro
                                        </option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="shipping_id" class="form-label">Shopping Order ID</label>
                                    <input type="text" id="shipping_id" name="shipping_id" class="form-control"
                                        placeholder="Enter Shopping Order ID" value="{{ $request->input('shipping_id') }}">
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Search</button>
                                    <button type="button" class="btn btn-secondary" id="reset_filter">Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card shadow">
                        <div class="card-body">
                            <table id="data-table" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Shopping Order ID</th>
                                        <th>Car</th>
                                        <th>Order Date</th>
                                        <th>Country</th>
                                        <th>City</th>
                                        <th>Port</th>
                                        <th>VESSEL</th>
                                        <th>ETD/ETA</th>
                                        <th>POL/POD</th>
                                        <th>TT/Copy</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($shippingOrders as $shippingOrder)
                                        <tr>
                                            <td>{{ $shippingOrder->shipping_id }}</td>
                                            <td>
                                                <a href="{{ route('customer.shipment.view', ['id' => $shippingOrder->id]) }}"
                                                    title="View Shipment">
                                                    {{ $shippingOrder->offer->car_name }}
                                                </a>
                                            </td>
                                            <td>{{ $shippingOrder->created_at }}</td>
                                            <td>{{ $shippingOrder->country_selected->listing_location_name }}</td>
                                            <td>{{ $shippingOrder->city_selected->name }}</td>
                                            <td>{{ $shippingOrder->port_selected->name }}</td>

                                            @php
                                                $documents = $shippingOrder->documents->pluck('status')->toArray();
                                            @endphp
                                            <td>
                                                @if (in_array('vessel', $documents))
                                                    Uploaded
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td>
                                                @if (in_array('etd_eta', $documents))
                                                    Uploaded
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td>
                                                @if (in_array('pol_pod', $documents))
                                                    Uploaded
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td>
                                                @if (in_array('tt_copy', $documents))
                                                    Uploaded
                                                @else
                                                    -
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="{{ asset('jquery.js') }}"></script>
    <script>
        document.getElementById('reset_filter').addEventListener('click', function() {
            document.getElementById('country').selectedIndex = 0;
            document.getElementById('city').selectedIndex = 0;
            document.getElementById('port').selectedIndex = 0;
            document.getElementById('service_plan').selectedIndex = 0;
            document.getElementById('shipping_id').value = '';
        });
    </script>
@endsection
