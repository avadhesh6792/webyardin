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
                                <th>Media</th>
                                <th>Media Type</th>
                                <th>Group Name</th>
                                <th>Group Type</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>S.No</th>
                                <th>Media</th>
                                <th>Media Type</th>
                                <th>Group Name</th>
                                <th>Group Type</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @if( count($groupMedia) > 0)

                            @foreach($groupMedia as $key=>$media)
                            <tr>
                                <td>{{ $key + 1 }} {{ $media->chat_id }}</td>
                                <td>{{ $media->message }}</td>
                                <td>{{ $media->type }}</td>
                                <td>{{ $media->group->chat_name }}</td>
                                <td>{{ $media->group->chat_type }}</td>
                                <td>
                                    {!! Form::open(['route' => ['delete-group-media', $media->chat_id, $media->message, $media->type], 'method' => 'delete', 'onsubmit' => 'return confirm("Are You Sure to Delete?");']) !!}
                                    {!!  Form::submit('Delete', ['class'=> 'btn btn-danger btn-xs']) !!}
                                    {!! Form::close() !!}
                                    <!--                                    <a href="#" class="label label-info"> Members</a>-->
                                    
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
