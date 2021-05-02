


@extends('user')

@section('title')
    @lang('Verify Account')
@stop


@section('content')


    @include('user.breadcrumb')



    <div class="row">
        <div class="col-12">
            <form action="{{route('userKyc2.submit')}}" class="card" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="card-header">
                    <h3 class="card-title">Upload ID</h3>
                </div>
                <div class=" card-body">
                    <div class="row">

                        <div class="col-lg-12 col-sm-12">
                            <input type="file" name="photo" class="dropify" data-height="180">
                        </div>


                    </div>
                    <br>
                    <div class="form-group">
                        <div class="custom-file">
                            <label class="form-label">Select Upload Type</label>
                            <select name="name" class="form-control select2">

                                <option value="Voters' Card">Voters' Card</option>
                                <option value="Identity Card">Identity Card</option>
                                <option value="INternational Passport">International Passort</option>
                                <option value="Drivers' Licence'">Drivers' License</option>

                            </select>
                        </div>

                    </div>


                    <br>
                    <div class="wd-200 mg-b-30">
                        <label class="form-label">Enter ID Number</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fa fa-barcode tx-16 lh-0 op-6"></i>
                                </div>
                            </div><input class="form-control fc-datepicker" name="number" type="text" placeholder="ID Number" type="text">
                        </div>
                    </div>


                    <div class="wd-200 mg-b-30">
                        <label class="form-label">Enter Expiry Date</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fa fa-calendar tx-16 lh-0 op-6"></i>
                                </div>
                            </div><input class="form-control fc-datepicker" placeholder="MM/DD/YYYY" tname="dob" type="date" >
                        </div>
                    </div>



                    <div class="form-group">
                        <br>

                        <button type="submit" class="btn btn-primary pull-right">Verify My Account</button>
                        <a href="{{route('userDashboard')}}"><button type="submit" class="btn btn-secondary">Cancel Verification</button></a>



                    </div>
                </div>
            </form>

        </div>
    </div>
    </div>
@endsection


@section('script')

@stop
