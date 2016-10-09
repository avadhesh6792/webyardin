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
                                    <a href="#" class="label label-danger">Delete</a>
                                    <a href="#" class="label label-warning">Block</a>
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
