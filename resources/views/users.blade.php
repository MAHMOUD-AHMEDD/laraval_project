<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <form method="GET" class="m-auto pt-5">
        <div class="row justify-content-center">
            <input type="text" name="username" style="height: fit-content;width: fit-content;">
            <button type="submit" class="btn btn-sm btn-outline-success mb-3 col-3" style="width: fit-content;">
                Search User
            </button>
        </div>
    </form>
    <br>
    <br>
    <table class="table table-bordered table-striped table-hover">
        <thead>
        <td>Username</td>
        <td>Email</td>
        <?php
            $user_access=['username','email','type'];
            ?>
{{--        <td>Password</td>--}}
        <td>Type</td>
{{--        <td>Control</td>--}}
        </thead>
        <tbody>
        @foreach($result as $user)
           <tr>
               @foreach($user_access as $data)
               <td>{{$user[$data]}}</td>
               @endforeach
           </tr>
        @endforeach
        </tbody>
    </table>
</div>
