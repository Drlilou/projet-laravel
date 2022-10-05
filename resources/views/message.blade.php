




<!DOCTYPE html>
<html>
<head>
    <title>Ajax Dynamic Dependent Dropdown in Laravel</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style type="text/css">
        .box{
            width:600px;
            margin:0 auto;
            border:1px solid #ccc;
        }
    </style>
</head>
<body>
<br />
<div class="container box">
    <h3 align="center">Ajax Dynamic Dependent Dropdown in Laravel</h3><br />
    <div class="form-group">
        <select name="country" id="category"
                class="form-control input-lg dynamic" data-dependent="name">
            <option value="">Select category</option>

                @foreach($t as $row)
                    <option > {{$row['category']}}</option>

                @endforeach



        </select>


        <input type="number" value="0" id="nb">
    </div>
    <br />
    <div class="form-group">
        <form id="form">

            <input name="names" id="#names" type="hidden" value="222222222">


        </form>

    </div>



    <br />

    {{ csrf_field() }}
    <br />
    <br />
</div>
<div id="pp">zzzzzzzzzzzzzz</div>

</body>
</html>

<script>
    $(document).ready(function(){
        $('.dynamic').change(function(){
            if($(this).val() != '')
            {
                var select = $(this).attr("id");
                var value = $(this).val();
                var nb = $("#nb").val();
                var dependent = $(this).data('dependent');
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url:"{{ route('dynamicdependent.fetch') }}",
                    method:"POST",
                    data:{select:select, value:value, nb:nb, _token:_token, dependent:dependent},
                    success:function(result)
                    {
                        $('#form').html(result);
                    }
                })
            }
        });



        $('#country').change(function(){
            $('#state').val('');
            $('#city').val('');
        });

        $('#state').change(function(){
            $('#city').val('');
        });



   $('.p').change(function(){
            if($(this).val() != '')
            {
                var select = $(this).attr("id");
                var value = $(this).val();
                var nb = $("#names").val();
                var dependent = $(this).data('dependent');
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url:"{{ route('dynamicdependent.fetch') }}",
                    method:"POST",
                    data:{select:select, value:value, nb:nb, _token:_token, dependent:dependent},
                    success:function(result)
                    {
                        $('#pp').html(result);
                    }
                })
            }
   });




    });
</script>
