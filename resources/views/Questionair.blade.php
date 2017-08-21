<!DOCTYPE html>
<html lang="en">
<head>
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
    table {
      counter-reset: tableCount;     
    }
    .counterCell:before {              
      content: counter(tableCount); 
      counter-increment: tableCount; 
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
          <li><a href="{{ url('/home') }}">Home</a></li>
          <li class="active"><a href="{{ url('/Questionair') }}">Questionair</a></li>
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
    <h2>Questionair</h2><a data-toggle="modal" data-target="#Add">Add</a>
    <hr>  

    <table class="table table-striped">
      <thead>
        <tr>
          <th>Id</th>
          <th>Name</th>
          <th>No. of Question</th>
          <th>Duration</th>
          <th>Resumeable</th>
          <th>Published</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($user as $users)
        <tr>

          <td class="counterCell"></td>
          <td>{{$users->name}}</td>
          <td> <a href="{{url('/showCount/'.$users->id.'/show')}}">count</a>| <a href="{{url('/addQuestion/'.$users->id.'/Add')}}">Add</a></td>
          <td>{{$users->Time}}</td>
          <td>{{$users->option}}</td>
          <td>{{$users->publish}}</td>
          <td><a href="{{ url('/Questionair/'.$users->id.'/edit') }}" data-toggle="modal" data-target="#edit">Edit</a> | <a data-toggle="modal"  id="submit-button" data-target="#Delete">Delete</a></td>
          
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

<div id="edit" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content"  style="width: 900px; margin-left: -150px;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit</h4>
      </div>
      <div class="modal-body">
        <p>
          <!-- Edit -->
          @foreach($user as $users)
          <form method="post" action="{{ url('/Questionair/'.$users->id.'/update')}}">
            {{ method_field('PUT')}}
            <div class="container">
              <div class="col-md-6 col-md-offset-1" >
                <div class="form-group row">
                  <label class="form-control-label" for="inputSuccess1">Enter Question name</label>
                  <input type="text" value="{{$users->name}}" name="name" class="form-control form-control-success" placeholder="Enter Question">
                </div>
                <div class="form-group row" style="margin-left: -30px;"> 
                  <div class="col-md-4">
                    <label for="example-search-input" class="col-2 col-form-label">Time</label>

                    <input class="form-control"  name="Time" type="Time" value="{{$users->Time}}" id="example-search-input">
                  </div>
                </div>
            
                @endforeach
                <br>
                <div class="form-group row">
                  <label class="form-control-label" for="inputSuccess1" >Can Resume</label>
                  <div class="custom-controls-stacked">
                   <input type="radio" name="option" value="Yes" checked> Yes<br>
                   <input type="radio" name="option" value="No"> No<br>  
                 </div>
               </div>
               <br>
               <div class="form-group row">
                  <label class="form-control-label" for="inputSuccess1" >Pulish</label>
                  <div class="custom-controls-stacked" >
                   <input type="radio" name="publish" value="Yes" checked> Yes<br>
                   <input type="radio" name="publish" value="No"> No<br>  
                 </div>
               </div>
              
              
               
               <br>
               <input class="btn btn-primary" type="submit" name="submit">
             </div>
           </div>
         </form>










       </p>
     </div>
     <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
  </div>

</div>
</div>

<!-- Delete Model -->
<div id="Delete" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Are You Sure?</h4>
      </div>
      <div class="modal-body">
        <p> Data Will Be Deleted. </p>
      </div>
      
      <div class="modal-footer">
        @foreach($user as $users)
        <a href="{{ url('/Questionair/'.$users->id.'/delete') }}" class="btn btn-danger" >Delete</a>
        @endforeach
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<div id="Add" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content" style="width: 1080px; margin-left: -250px;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h2 class="modal-title">Create</h2>
      </div>
      <div class="modal-body">
        <p>
          <form method="post" action="store">
            <div class="container">
              <div class="col-md-6 col-md-offset-1" >
                <div class="form-group row">
                  <label class="form-control-label" for="inputSuccess1">Enter Question name</label>
                  <input type="text" name="name" class="form-control form-control-success" placeholder="Enter Question">
                </div>
                <div class="form-group row" style="margin-left: -30px;"> 
                  <div class="col-md-4">
                    <label for="example-search-input" class="col-2 col-form-label">Duration</label>

                    <input class="form-control" name="Time" type="Time" value="How do I shoot web" id="example-search-input">
                  </div>
                </div>
                <br>
                <div class="form-group row">
                  <label class="form-control-label" for="inputSuccess1" >Can Resume</label>
                  <div class="custom-controls-stacked">
                   <input type="radio" name="option" value="Yes" checked> Yes<br>
                   <input type="radio" name="option" value="No"> No<br>  
                 </div>
               </div>
               <br>
               <div class="form-group row" id="productextra0">
                <label class="form-control-label" for="inputSuccess1" >Publish</label>

                <input type="radio" name="publish" value="Yes" checked> Yes<br>
                <input type="radio" name="publish" value="No"> No<br>  
              </div>
               <input class="btn btn-primary" type="submit" name="submit">
             </div>
           </div>
         </form>

       </p>



     </div>
     <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
  </div>

</div>
</div>

















@yield('content')

<!-- JavaScripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
{{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
<script type="text/javascript">

</script>
<script type="text/javascript">window.onload=function()
{
    document.getElementById("productextra0").onchange=function()
    {
        if(this.options[this.selectedIndex].value==1)
        {
            document.getElementById("submit-button").disabled=true;
        }
        else
        {
            document.getElementById("submit-button").disabled=false;
        }
    }
}</script>>