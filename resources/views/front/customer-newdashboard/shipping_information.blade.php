@extends('front.customer-newdashboard.layouts.template')
@section('content')
    <section class="container-fluid p-3 nav-small-txt border-bottom">
        <ul class="list-unstyled list-inline">
            <li class="list-inline-item text-primary">Dashboard</li>>
            <li class="list-inline-item mx-2">Car and Shipping Information</li>
        </ul>
        <h3 class="fw-medium">Car and Shipping Information</h3>

    </section>
    <div class="col-12 p-4">
        <form id="search_filter" method="post" action="{{ route('shipping_request_search_filter') }}" class="w-100">
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
                {{-- <div class="col-md-4">
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
                </div> --}}
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
                        <option value="roro" {{ $request->input('service_plan') == 'roro' ? 'selected' : '' }}>
                            Roro
                        </option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="shipping_id" class="form-label">Stock Number</label>
                    <input type="text" id="shipping_id" name="shipping_id" class="form-control"
                        placeholder="Enter Stock Number" value="{{ $request->input('shipping_id') }}">
                </div>
                {{-- <div class="col-md-4">
                    <label for="shipping_id" class="form-label">Chassis Number</label>
                    <input type="text" id="chassis_no" name="chassis_no" class="form-control"
                        placeholder="Enter Chassis Number" value="{{ $request->input('chassis_no') }}">
                </div> --}}
                <div class="col-md-4">
                    <label for="order_date" class="form-label">Order Date</label>
                    <input type="date" id="order_date" name="order_date" class="form-control"
                        value="{{ $request->input('order_date') }}">
                </div>

                <div class="col-md-4">
                    <label for="consignee_name" class="form-label">Consignee Name</label>
                    <input type="text" id="consignee_name" name="consignee_name" class="form-control"
                        placeholder="Enter Consignee Name" value="{{ $request->input('consignee_name') }}">
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Search</button>
                    <button type="button" class="btn btn-secondary" id="reset_filter">Reset</button>
                </div>
            </div>
        </form>
    </div>

    <div class="col-12">
        <div class="table-responsive table-bordered">
            <table class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>Country</th>
                        <th>Order Date</th>
                        <th>SS NO.</th>
                        <th>Photo</th>
                        <th>Car Name/ Chassis No</th>
                        <th>VESSEL</th>

                        {{-- <th>City</th> --}}
                        <th>Port</th>

                        <th>ETD/ETA</th>
                        <th>TT/Copy</th>
                        <th>Consignee Name</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($shippingOrders as $shippingOrder)
                        <tr>
                            <td>{{ $shippingOrder->country_selected->listing_location_name }}</td>
                            <td>{{ $shippingOrder->created_at }}</td>
                            <td>{{ $shippingOrder->shipping_id }}</td>
                            <td> @php
                                $photoUrl = '';

                                // if (!empty($shippingOrder->offers[0])) {
                                //     dd('if');
                                // } else {
                                //     // dd('else');
                                //     dd($shippingOrder->offers);
                                // }

                                if (!empty($shippingOrder->offers[0])) {
                                    // dd($shippingOrder->offers[0]->car->listing_featured_photo);
                                    $photoUrl = asset(
                                        'uploads/listing_featured_photos/' .
                                            $shippingOrder->offers[0]->car->listing_featured_photo,
                                    );
                                }
                            @endphp

                                <img src="{{ $photoUrl }}" class="w-100 mt-2" height="40px"
                                    style="object-fit: cover; height:40px" alt="">
                            </td>
                            <td>
                                <ul>
                                    @foreach ($shippingOrder->offers as $offer)
                                        <li>
                                            <a class="text-primary text-decoration-underline"
                                                href="{{ route('customer.shipment.view', ['id' => $shippingOrder->id]) }}"
                                                title="View Shipment">
                                                {{ $offer->car_name }} / {{ $offer->car->listing_vin }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </td>


                            {{-- <td>{{ $shippingOrder->city_selected->name }}</td> --}}


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
                            <td>{{ $shippingOrder->port_selected->name }}</td>
                            <td>
                                @if (in_array('etd_eta', $documents))
                                    Uploaded
                                @else
                                    -
                                @endif
                            </td>
                            {{-- <td>
                                @if (in_array('pol_pod', $documents))
                                    Uploaded
                                @else
                                    -
                                @endif
                            </td> --}}
                            <td>
                                @if (in_array('tt_copy', $documents))
                                    Uploaded
                                @else
                                    -
                                @endif
                            </td>
                            <td>{{ $shippingOrder->default_name }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script src="{{ asset('jquery.js') }}"></script>
    <script>
        document.getElementById('reset_filter').addEventListener('click', function() {
            document.getElementById('country').selectedIndex = 0;
            document.getElementById('city').selectedIndex = 0;
            document.getElementById('port').selectedIndex = 0;
            document.getEle + mentById('service_plan').selectedIndex = 0;
            document.getElementById('shipping_id').value = '';
            document.getElementById('chassis_no').value = '';
            document.getElementById('consignee_name').value = '';
        });
    </script>
@endsection
