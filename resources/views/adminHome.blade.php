@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="en">
    

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <scrip src="js/bootstrap.js">
    
        </script>
        
        <title>Navbar</title>
</head>
<style type="text/css">
#navcolor{
  background-color: #f7c76a;
}
#navlink{ 
    color: #307689;
}
#navlink a:visited { 
    color: #ffffff;
}
#box{
    border-radius: 60px;
    padding-right: 80px;
}
#box2{
    position: abstract;
	border-radius: 25px;
}

</style>




</html>
<br>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    {{ __('You are logged in!') }}
                    You are admin.
                </div>
            </div>
        </div>
    </div>
</div>

@endsection