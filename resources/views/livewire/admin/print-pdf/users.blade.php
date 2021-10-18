<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Foodie</title>
    <style>
        .container{
            width: 100%;
            margin: auto;
        }
        .row{
            width: 90%;
            margin: 0 auto;
        }
        .col-12{
            width: 100%;
        }
        .text-success{
            color: rgb(18, 102, 18);
        }
        .font-weight-bold{
            font-weight: bolder;
        }
        .text-dark{
            color: #333;
        }
        .my-2{
            margin: 10px 0;
        }
        .table{
            width: 100%;
        }
        .table-bordered tr,td,th{
            border: 1px solid #333;
        }
        .table th,
        .table td{
            padding: 10px 20px;
            text-align: center;
        }
        .table th{
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-success font-weight-bold">Foodie</h1>
                <p class="my-2 text-dark">Printed User Data</p>
            </div>
            <div class="col-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NAME</th>
                            <th>EMAIL</th>
                            <th>PHONE</th>
                            <th>ADDRESS</th>
                            <th>CREATE_AT</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>$user->id</td>
                                <td>$user->name</td>
                                <td>$user->email</td>
                                <td>$user->phone</td>
                                <td>$user->address</td>
                                <td>$user->created_at->format('dd/mm/Y')</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
