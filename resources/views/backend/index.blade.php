<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>PayPal Payment</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha256-YLGeXaapI0/5IgZopewRJcFXomhRMlYYjugPLSyNjTY=" crossorigin="anonymous" />

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>

</head>

<body>

    <div class="container mt-2">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">

                    <div class="panel-body">

                        <table class="table" id="table_id" class="display">
                            <thead>
                            <tr>
                                <th>Payment ID</th>
                                <th>Amount </th>
                                <th>Currency</th>
                                <th>created At</th>
                                <th>status</th>
                            </tr>
                            </thead>
                            <tbody>
                      
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready( function () {
          $('#table_id').DataTable({
            'ajax' : "{{ route('backend.index') }}",
            'columns' :[
                {'data' : 'payment_id'},
                {'data' : 'amount'},
                {'data' : 'currency'},
                {'data' : 'created_at'},
                {'data' : 'status'}
            ]
          });
       } );
    </script>

</body>

</html>
