<?php
include_once("connect.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css" integrity="sha384-QYIZto+st3yW+o8+5OHfT6S482Zsvz2WfOzpFSXMF9zqeLcFV0/wlZpMtyFcZALm" crossorigin="anonymous">
  <title>List questions</title>
</head>

<body>
  <div class="container">
    <h2 class="text-center">LIST QUESTIONS</h2>
    <div class="row">
    <div class="col-sm-8">
    <div class="input-group rounded">
    <input id="search_question" type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
</div>
      </div>
      <div class="col-sm-4 text-end">
        <button id="btn_model" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#model_question">+</button>
      </div>
    </div>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>Questions</th>
          <th class="text-end">Action</th>
        </tr>
      </thead>
      <tbody id="result_question">
        <?php
        $sql = $conn->prepare("SELECT * FROM tbl_question");
        $sql->execute();
        $index = 1;
        while ($result = $sql->fetch(PDO::FETCH_ASSOC)) {
        ?>
          <tr id="<?= $result['id'] ?>">
            <td><?php echo $index++ ?></td>
            <td class="text-primary"><?php echo $result['question'] ?></td>
            <td class="text-end">
              <input class="btn btn-xs btn-info" type="button" value="Xem" id="<?= $result['id'] ?>" name="view" data-bs-toggle="modal" data-bs-target="#model_question">
              <input class="btn btn-xs btn-warning" type="button" value="Sửa" id="<?= $result['id'] ?>" name="update" data-bs-toggle="modal" data-bs-target="#model_question">
              <input class="btn btn-xs btn-danger" type="button" value="Xóa" id="<?= $result['id'] ?>" name="delete">
            </td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
    <ul class="pagination d-flex justify-content-center" id="pagination">
    
    </ul>
    </div>
</nav>
  </div>
</body>
<?php
include_once("model.php");
?>
<script src="app.js">
  
</script>
        
</html>