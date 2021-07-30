<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "projectdb";

$noteInsert=false;

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// echo "Connected successfully";


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $title = $_POST["title"];
    $description = $_POST["description"];

    $sql="INSERT INTO `inotes` ( `title`, `description`, `date`) VALUES ( '$title', '$description', current_timestamp());";
    $result=mysqli_query($conn,$sql);

    if ($result) {
        $noteInsert=true;
    }
   

}



?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css.css">

    <title>iNotes</title>
  </head>
  <body>


  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">iNotes</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>


                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

<?php

if($noteInsert)
{
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success..!</strong> Your note has been saved
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>' ;
}

?>




    <div class="container">
        <form action="sample.php" method="POST">
            <h1 class="my-4">Add notes to iNotes</h1>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Note Title</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="title" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Note Description</label>
                <textarea class="form-control" name="description" id="exampleInputPassword1" cols="30" rows="5"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">S.no</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>

                <?php


                $sql = "SELECT * FROM `inotes`";
                $result = mysqli_query($conn, $sql);

                $sno = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                      echo "<tr>
                            <th scope='row'>" . $sno . "</th>
                            <td>" . $row['title'] . "</td>
                            <td>" . $row["description"] . "</td>
                            <td>Action</td>
                            </tr>";

                    $sno = $sno + 1;
                }


                ?>

            </tbody>


        </table>
    </div>

    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <script src="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css"></script>
    <script>
        $(document).ready( function () {
    $('#myTable').DataTable();
} );
    </script>
  </body>
</html>