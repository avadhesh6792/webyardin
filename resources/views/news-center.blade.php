@extends('layouts.app')

@section('content')
<div id="wrapper">

    @include('layouts.left-sidebar')
    <div id="page-wrapper">
        <div id="page-inner">
            <div class="row">
                <div class="col-lg-12">
                    <h2 >{{ $pageTitle }} <div class="pull-right"><button class="btn btn-primary" data-toggle='modal' data-target='#add-news-modal'>Add News</button></div></h2> 

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
                                <th width="2%">S.No</th>
                                <th width="7%">Title</th>
                                <th width="15%">Description</th>
                                <th width="3%">Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th width="2%">S.No</th>
                                <th width="7%">Title</th>
                                <th width="15%">Description</th>
                                <th width="3%">Action</th>

                            </tr>
                        </tfoot>
                        <tbody>

                            @if( count($news) > 0)

                            @foreach($news as $key=>$n)
                            <tr>
                                <td>{{ $key + 1 }} </td>
                                <td>{{ $n->title }}</td>
                                <td>{{ $n->description }}</td>
                                <td>
                                    <a href="#" data-target="" data-toggle="modal"  class="btn btn-danger btn-xs">Delete</a>
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

<!-- Add News Modal -->

<div style="display: none" class="modal fade" id="add-news-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="exampleModalLabel">Add News</h4>
            </div>
            <div class="modal-body">
                <form id="add-news-form" action="{{ route('add-news-center') }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="title" class="form-control-label">Title:</label>
                        <span id="title-error" style="display: none" class="yarding-error-alert">This field is required</span>
                        <input required="" type="text" class="form-control" id="title" name="title">
                    </div>
                    <div class="form-group">
                        <label for="description" class="form-control-label">Description:</label>
                        <span id="description-error" style="display: none" class="yarding-error-alert">This field is required</span>
                        <textarea required="" class="form-control" id="description" name="description"></textarea>
                    </div>
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button id="send-news-btn" type="button" class="btn btn-primary">Send news</button>
            </div>

        </div>
    </div>
</div>

@endsection
