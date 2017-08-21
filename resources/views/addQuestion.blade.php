<!DOCTYPE html>
<html lang="en">
<head>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    Laravel
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li ><a href="{{ url('/home') }}">Home</a></li>
                    <li><a href="{{ url('/Questionair') }}">Questionair</a></li>
                    <li><a href="{{ url('/Result') }}">Result</a></li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
   <div class="container">

<h2>Select Type</h2>
<hr>
<div class="container"> 
<div class="col-md-6 " >

<label>Question Type</label>
<select class="form-control " onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
    <option value="">Select...</option>
    <option value="{{url('Text')}}">Add Question</option>
    <option value="{{url('MCQ')}}">Multiple Choice</option>
</select>

<div id="div1"></div>
 <div class="input_fields_container"></div>
      <div>
        <!--    <button class="btn btn-sm btn-primary add_more_button">Add More Fields</button> -->
     
    </div>
    @yield('content')

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
<script type="text/javascript">

    function showfield(name){

  if(name=='text')document.getElementById('div1').innerHTML='<label>Question</label>: <input class="form-control" name="Question" id="div1" type="text" placeholder="Enter Question"><label>Answer</label>: <input class="form-control" name="Answer" id="div1" type="text" placeholder="Enter Answer"><br><button class="btn btn-sm btn-primary add_more_button">Add More Fields</button>';
  else if(name=='MCQ')document.getElementById('div1').innerHTML='<label>Question</label>: <input class="form-control" name="Question" id="div1" type="text" placeholder="Enter Question"><label>Choice1</label>: <input class="form-control" name="Choice1" id="div1" type="text" placeholder="Enter Choice1"><label>Choice2</label>: <input class="form-control" name="Choice2" id="div1" type="text" placeholder="Enter Choice2"><label>Choice3</label>: <input class="form-control" name="Choice3" id="div1" type="text" placeholder="Enter Choice3"><label>Choice4</label>: <input class="form-control" name="Choice4" id="div1" type="text" placeholder="Enter Choice4"><br>';
  else document.getElementById('div1').innerHTML='';
}  
</script>
<script>
    $(document).ready(function() {
    var max_fields_limit      = 10; //set limit for maximum input fields
    var x = 1; //initialize counter for text box
    $('.add_more_button').click(function(e){ //click event on add more fields button having class add_more_button
        e.preventDefault();
        if(x < max_fields_limit){ //check conditions
            x++; //counter increment
            $('.input_fields_container').append('<div><label>Question</label>: <input class="form-control" name="Question" id="div1" type="text" placeholder="Enter Question"><label>Answer</label>: <input class="form-control" name="Answer" id="div1" type="text" placeholder="Enter Answer"><a href="#" class="remove_field" style="margin-left:10px;">Remove</a></div>'); //add input field
        }
    });  
    $('.input_fields_container').on("click",".remove_field", function(e){ //user click on remove text links
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});
</script>