<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $pageTitle or config('app.name') }}</title>

    <!-- Styles -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" href=" //cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">
   

    <link rel="stylesheet" href="{{ URL::asset('css/custom.css') }}" />


    <!-- Scripts -->
    <script>
        window.Laravel = <?php
echo json_encode([
    'csrfToken' => csrf_token(),
]);
?>
    </script>
</head>
