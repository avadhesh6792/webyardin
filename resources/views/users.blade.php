@extends('layouts.app')

@section('content')
<div id="wrapper">

    @include('layouts.left-sidebar')
    <div id="page-wrapper">
        <div id="page-inner">
            <div class="row">
                <div class="col-lg-12">
                    <h2>{{ $pageTitle }} </h2>   
                </div>
            </div>              
            <!-- /. ROW  -->
            <hr>
            <div class="row">
                <div class="col-lg-12">
                    @if($flash_data['status'] === 1)
                    <div class="alert alert-success">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
                        {{ $flash_data['message'] }}
                    </div>
                    @elseif($flash_data['status'] === 0)
                    <div class="alert alert-danger">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
                       {{ $flash_data['message'] }}
                    </div>
                    @endif

                </div>
            </div>
            <!-- /. ROW  --> 
            <div class="row text-center pad-top">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                    <table id="users-table" class="display" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Image</th>
                                <th>Username</th>
                                <th>College</th>
                                <th>Online Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>S.No</th>
                                <th>Image</th>
                                <th>Username</th>
                                <th>College</th>
                                <th>Online Status</th>
                                <th>Action</th>

                            </tr>
                        </tfoot>
                        <tbody>
                            @if( count($users) > 0)

                            @foreach($users as $key=>$user)
                            <tr>
                                <td>{{ $key + 1 }} </td>
                                <td> {{ Html::image($base_url.'/yardin/'.$user->image, $user->image, array('class' => 'thumbnail', 'width' => 80, 'height'=> 80, 'title' => $user->username)) }} </td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->college }}</td>
                                <td>{{ $user->online_status ? 'Online' : 'Offline' }}</td>
                                <td>
                                    <!-- <a href="#" class="label label-primary">View</a> -->
                                    <a href="#" data-target="#confirmDelete_{{ $user->id }}" data-toggle="modal"  class="btn btn-danger btn-xs">Delete</a>
                                    <a href="#" class="btn btn-warning btn-xs">Block</a>
                                    
                                    
                                    <div id="confirmDelete_{{ $user->id }}" class="modal fade" tabindex="-1" role="dialog">
                                        <div class="modal-dialog modal-sm" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title">Delete user Permanently</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Are you Sure to Delete this user?</p>
                                                </div>
                                                <div class="modal-footer">
                                                   
                                                    {!! Form::open(['route' => ['delete-user', $user->id, $user->image or ' ', $user->bg_image or ' '], 'method' => 'delete']) !!}
                                                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    {!!  Form::submit('Delete', ['class'=> 'btn btn-danger']) !!}
                                                    {!! Form::close() !!}
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
                               
                                </td>

                                
                            </tr>
                            @endforeach
                            @endif

                        </tbody>
                    </table>

                </div> 
            </div>
            <!-- /. ROW  --> 

        </div>
        <!-- /. PAGE INNER  -->
    </div>
    <!-- /. PAGE WRAPPER  -->
</div>


@endsection
