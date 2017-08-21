@extends('layouts.app')
@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script type="text/javascript">
    $(function () {
        $('.add').click(function () {
            var n = ($('.resultbody tr').length - 0) + 1;
            var tr = '<tr><td class="no">' + n + '</td>' +
                    '<td><input type="text" class="Question form-control" name="Question[]" value="{{ old('Question') }}"></td>'+
                    '<td><input type="text" class="choice1 form-control" name="choice1[]" value="{{ old('choice1') }}"></td>'+
                    '<td><input type="text" class="choice2 form-control" name="choice2[]" value="{{ old('choice2') }}"></td>'+
                    '<td><input type="text" class="choice3 form-control" name="choice3[]" value="{{ old('choice3') }}"></td>'+
                    '<td><input type="text" class="choice4 form-control" name="choice4[]" value="{{ old('choice4') }}"></td>'+
                    '<td><input type="button" class="btn btn-danger delete" value="x"></td></tr>';
            $('.resultbody').append(tr);
        });
        $('.resultbody').delegate('.delete', 'click', function () {
            $(this).parent().parent().remove();
        });
    });
</script>
 <div class="container">
        <h1>Add MCQ</h1><hr>
        </div>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Add Results</div>

                <div class="panel-body">
                   <form class="form-horizontal" role="form" method="POST" action="store">
                        {!! csrf_field() !!}
                    <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Question</th>
                                    <th>Choice1</th>
                                    <th>Choice2</th>
                                    <th>Choice3</th>
                                    <th>Choice4</th>
                                    
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody class="resultbody">
                                <tr>
                                    <td class="no">1</td>
                                    <td>
                                        <input type="text" class="Question form-control" name="Question[]" value="{{ old('Question') }}">
                                    </td>
                                    <td>
                                        <input type="text" class="choice1 form-control" name="choice1[]" value="{{ old('choice1') }}">
                                    </td>
                                    <td>
                                        <input type="text" class="choice2 form-control" name="choice2[]" value="{{ old('choice2') }}">
                                    </td>
                                    <td>
                                        <input type="text" class="choice3 form-control" name="choice3[]" value="{{ old('choice3') }}">
                                    </td>
                                    <td>
                                        <input type="text" class="choice4 form-control" name="choice4[]" value="{{ old('choice4') }}">
                                    </td>
                                   
                                    <td>
                                        <input type="button" class="btn btn-danger delete" value="x">
                                    </td>
                                </tr>

                            </tbody>
                        </table>    
                        <center><input type="button" class="btn btn-lg btn-primary add" value="Add New Item">   
                        <input type="submit" class="btn btn-lg btn-default" value="Submit"></center>
                        </form>
                </div>
            </div>
        </div>

    </div><!-- First Row End -->
</div> <!-- Container End -->

@endsection 