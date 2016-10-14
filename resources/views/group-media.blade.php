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
                                <td>{{ $key + 1 }}</td>
                                @if($media->type === 'image'  )
                                <td> {{ Html::image($base_url.'/yardin/chat_pic/'.$media->message, $media->message, array('class' => 'thumbnail', 'width' => 80, 'height'=> 80, 'title' => $media->message)) }}</td>
                                @elseif( $media->type == 'video' )
                                <td>
                                    <video width="80" controls>
                                        <source src= "<?php echo $base_url . '/yardin/chat_video/' . $media->message ?>" type="video/mov">
                                        Your browser does not support HTML5 video.
                                    </video>
                                </td>

                                @endif
                                <td>{{ $media->type }}</td>
                                <td>{{ $media->group->chat_name }}</td>
                                <td>{{ $media->group->chat_type }}</td>
                                <td>

                                    <!--                                    <a href="#" class="label label-info"> Members</a>-->


                                    <a href="#" data-target="#confirmDelete_{{ $media->chat_id }}" data-toggle="modal"  class="btn btn-danger btn-xs">Delete</a>



                                    <div id="confirmDelete_{{ $media->chat_id }}" class="modal fade" tabindex="-1" role="dialog">
                                        <div class="modal-dialog modal-sm" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title">Delete Media Permanently</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Are you Sure to Delete this media?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    {!! Form::open(['route' => ['delete-group-media', $media->chat_id, $media->message, $media->type], 'method' => 'delete']) !!}
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
