<?php
include '_db.php';

$noteInsert=false;
$noteInsertError=false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $title = $_POST["title"];
    $description = $_POST["description"];

    if ($title != NULL) {
       
        $sql="INSERT INTO `inotes` ( `title`, `description`, `date`) VALUES ( '$title', '$description', current_timestamp());";
        $result=mysqli_query($conn,$sql);
    
        if ($result) {
            $noteInsert=true;
        }
    }

    else {
        $noteInsertError=true;
    }

   

}



?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">

    <title>iNotes</title>
</head>

<body>
       <?php  include '_navbar.html'; ?>

<?php

if($noteInsert)
{
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success..!</strong> Your note has been saved
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>' ;
}
if($noteInsertError)
{
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error..!</strong> "Note title" field can not be empty
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>' ;
}

?>




    <div class="container">
        <form action="index.php" method="POST">
            <h1 class="my-4">Add notes to iNotes</h1>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Note Title</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="title" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Note Description</label>
                <textarea class="form-control" name="description" id="exampleInputPassword1" cols="30" rows="5"></textarea>
            </div>

            <button type="submit" class="btn btn-primary my-3">Submit</button>
        </form>
    </div>
    <div class="container">
        <table class="table" id="myTable">
            <thead>
        <?php include '_editmodal.html'; ?>
        <?php include '_deletemodal.html'; ?>

                <tr>
                    <th scope="col">S.no</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">    Actions</th>
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
                            <td> <button type='button' class='btn btn-primary mx-2' data-bs-toggle='modal' data-bs-target='#editmodal'>Edit</button><button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#deletemodal'>Delete</button></td>
                            </tr>";

                    $sno = $sno + 1;
                }


                ?>

            </tbody>


        </table>
    </div>

                <!-- not working jquery -->


    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script> 
    


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
      
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>


    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->

    <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>


 <script>

$(document).ready( function () {
    $('#myTable').DataTable();
} );

 </script>
</body>

</html>