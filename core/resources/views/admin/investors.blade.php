@extends('admin')

@section('title', 'All Investors')

@section('content')
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1> All Investors </h1>
            </div>
       <button type="button" data-toggle="modal"  data-target="#add-modal"  class="btn btn-info"><i class="fa fa-plus"></i> Add new</button>


        </div>
        <div class="tile">

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    @if(count($data) == 0)
                        <tr>
                            <td class="text-center">
                                <h2>No data found </h2>
                            </td>
                        </tr>
                    @else
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Designation</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $data)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$data->name}}</td>
                            <td>

                            <img style="max-width: 150px; max-height: 150px;" class="img-fluid" src="{{asset('assets/image/investor/'.$data->image)}}">
                            </td>
                            <td>{{$data->designation}}</td>

                            <td>
                              <button type="button" data-toggle="modal"
                                      data-name="{{$data->name}}" data-gate="{{$data->id}}" data-designation="{{$data->designation}}" data-fb_link="{{$data->fb_link}}"

                                      data-tw_link="{{$data->tw_link}}" data-linkedin="{{$data->linkedin}}" data-pint_link="{{$data->pint_link}}"

                                      data-target="#edi-modal" class="btn btn-info edit"><i class="fa fa-edit"></i>  </button>

                                <button type="button" class="btn btn-danger delete" data-toggle="modal" data-name="{{$data->name}}" data-gate="{{$data->id}}" data-target="#exampleModalCenter">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </td>
                        </tr>

                    @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
            <div class="d-flex flex-row-reverse">

            </div>
        </div>



    </main>


  {{--add modal--}}

    <div class="modal fade bd-example-modal-lg" id="add-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered  modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add new Investor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="row" method="post" action="{{route('admin.investor.add')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group col-md-6">
                            <h4>  <label class="control-label">Name</label></h4>
                            <input class="form-control form-control-lg" name="name" type="text" >
                        </div>
                        <div class="form-group col-md-6">
                            <h4>  <label class="control-label">Designation</label></h4>
                            <input class="form-control form-control-lg" name="designation" type="text">
                        </div>

                        <div class="form-group  col-md-6">
                            <h4> <label >Image</label> </h4>
                            <input class="form-control form-control-lg" name="image" type="file">

                        </div>


                        <div class="form-group col-md-6">
                            <h4> <label >fb link</label> </h4>
                            <input class="form-control form-control-lg" name="fb_link" type="text">

                        </div>

                        <div class="form-group col-md-6">
                            <h4> <label >tw link</label> </h4>
                            <input class="form-control form-control-lg" name="tw_link" type="text">

                        </div>
                        <div class="form-group col-md-6">
                            <h4> <label >linkedin link</label> </h4>
                            <input class="form-control form-control-lg" name="linkedin" type="text">

                        </div>
                        <div class="form-group col-md-6">
                            <h4> <label >Pinterest link </label> </h4>
                            <input class="form-control form-control-lg" name="pint_link" type="text">

                        </div>


                        <div class="modal-footer col-md-12">
                            <button type="submit" class="btn btn-danger">Yes</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>


{{--edit modal--}}

    <div class="modal fade bd-example-modal-lg" id="edi-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered  modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Edit Investor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="row" method="post" action="{{route('admin.investor.update')}}" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="id" id="investor"/>

                        <div class="form-group col-md-6">
                            <h4>  <label class="control-label">Name</label></h4>
                            <input class="form-control form-control-lg" name="name" id="name" type="text" >
                        </div>
                        <div class="form-group col-md-6">
                            <h4>  <label class="control-label">Designation</label></h4>
                            <input class="form-control form-control-lg" name="designation" id="designation" type="text">
                        </div>

                        <div class="form-group  col-md-6">
                            <h4> <label >Image</label> </h4>
                            <input class="form-control form-control-lg" name="image" type="file">

                        </div>


                        <div class="form-group col-md-6">
                            <h4> <label >fb link</label> </h4>
                            <input class="form-control form-control-lg" name="fb_link" id="fb_link" type="text">

                        </div>

                        <div class="form-group col-md-6">
                            <h4> <label >tw link</label> </h4>
                            <input class="form-control form-control-lg" name="tw_link" id="tw_link" type="text">

                        </div>
                        <div class="form-group col-md-6">
                            <h4> <label >linkedin link</label> </h4>
                            <input class="form-control form-control-lg" name="linkedin" id="linkedin" type="text">

                        </div>
                        <div class="form-group col-md-6">
                            <h4> <label >Pinterest link </label> </h4>
                            <input class="form-control form-control-lg" name="pint_link"  id="pint_link" type="text">

                        </div>


                        <div class="modal-footer col-md-12">
                            <button type="submit" class="btn btn-danger">Yes</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>




    {{--//delete modal ////--}}
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Are you sure, you want to delete this?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-right">
                    <form action="{{route('admin.investor.delete')}}" method="POST">
                        @csrf
                        <input type="hidden" name="id" id="id"/>

                        <div class="modal-gorup">
                            <button type="submit" class="btn btn-danger">Yes</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>

                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>


@endsection

@section('script')
    <script>
        $(document).ready(function(){

            $(document).on('click','.delete', function(){

                $('#id').val($(this).data('gate'));
            });

            $(document).on('click','.edit', function(){

                $('#investor').val($(this).data('gate'));
                $('#name').val($(this).data('name'));
                $('#designation').val($(this).data('designation'));
                $('#fb_link').val($(this).data('fb_link'));
                $('#tw_link').val($(this).data('tw_link'));
                $('#linkedin').val($(this).data('linkedin'));
                $('#pint_link').val($(this).data('pint_link'));
            });
        });
    </script>

@endsection

