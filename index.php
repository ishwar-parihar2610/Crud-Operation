//Connect To Database
<?php

// INSERT INTO `notes` (`sno`, `title`, `description`, `tstamp`) VALUES (NULL, 'Buy Books', 'Please Buy books From Store', current_timestamp());
$servername="localhost";
$username="root";
$password="";
$dbName="notes";

$connection=mysqli_connect($servername,$username,$password,$dbName);


if(!$connection){
    die("Sorry We Failed To connect : ". mysqli_connect_error());

}

echo $_SERVER['REQUEST_METHOD'];

if($_SERVER['REQUEST_METHOD']=='POST'){
  $title=$_POST['title'];
  $description=$_POST['description'];

  $sql="INSERT INTO notes(title,description)  VALUES ('$title','$description')";
  $result=mysqli_query($connection,$sql);
  if($result){
    echo "The record Has been Inserted Succesfully";
  }else{
    echo "The record has been Not inserted Succesfully because of this error --> ". mysqli_error($connection);
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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <title>Notes -Notes taking made Easy</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">I Notes</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
            <a class="nav-link" href="#">Contact Us</a>
          </li>



        </ul>
        <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>

  <div class="container my-5">
    <h2>Add a Note</h2>
    <form action="/crud/index.php" method="post">
      <div class="mb-4">
        <label for="exampleInputEmail1" class="form-label">Note Title</label>
        <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">


        <div class="mb-4">
          <label for="desc" class="form-label">Note Description</label>
          <textarea class="form-control" id="description" name="description" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Add Note</button>
    </form>
  </div>

  <div class="container">
    




    <table class="table">
      <thead>
        <tr>
          <th scope="col">S.NO</th>
          <th scope="col">Title</th>
          <th scope="col">Description</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>

      <?php
$sql="SELECT * FROM `notes`";
$result=mysqli_query($connection,$sql);
while($row=mysqli_fetch_assoc($result)){
  echo " <tr>
  <th scope='row'>" .$row['sno'] . "</th>
  <td>" .$row['title'] . "</td>
  <td>" .$row['description'] . "</td>
  <td>  Actions</td>
</tr>";
  
}
?>
       
        
      </tbody>
    </table>

  </div>
  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>