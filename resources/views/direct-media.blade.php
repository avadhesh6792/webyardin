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
                <div class="col-lg-12" style="display: none;">
                    <div class="alert alert-info">
                        <strong>Welcome Jhon Doe ! </strong> You Have No pending Task For Today.
                    </div>

                    <div class="alert alert-danger">
                        <strong>Want More Icons Free ? </strong> Checkout fontawesome website and use any icon <a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank">Click Here</a>.
                    </div>

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
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>S.No</th>
                                <th>Media</th>
                                <th>Media Type</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @if( count($directMedia) > 0)

                            @foreach($directMedia as $key=>$media)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $media->text }}</td>
                                <td>{{ $media->type }}</td>
                                <td>
<!--                                    <a href="#" class="label label-info"> Members</a>-->
                                    <a href="#" class="label label-danger">Delete</a>
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
