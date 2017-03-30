
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>

@if(Session::has('message'))
    <p class="alert {{ Session::get('alert-class', 'alert-info') }}"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>{{ Session::get('message') }}</p>
@endif

<div class="container">
    <div class="row">
        <div class="col-lg-12">
