<?php
session_start();
include 'config/connect.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <style media="screen">
  .container{
    margin-left: -25px !important;
    margin-right: -25px !important;
  }
  .feedback{
    background: #0d6efd !important;
    color: white;
    text-decoration: none;
  }
  .home{
    color:white;
  }
  </style>
  <body>
    <div class="row container">
      <div class="col-3">
        <?php
        include 'adminsidebar.php';
        ?>
      </div>
      <div class="col-9 mt-5">
        <h1>Admin's Dashboard</h1>
        <br>
        <div class="card">
          <div class="card-header bg-success">
            <div class="row">
              <div class="col">
                <h3 class="text-light">List of your feedbacks</h3>
              </div>
              <div class="col">

              </div>
            </div>
          </div>
          <?php
          $stmt = $pdo->prepare("SELECT * FROM feedback");
          $stmt->execute();
          $datas = $stmt->fetchall();
          ?>
          <div class="card-body">
            <table class="table table-success">
              <thead>
                <tr>
                  <th>Username</th>
                  <th>Message</th>
                  <th>Admin Replay</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                foreach ($datas as $data) {
                ?>
                <tr>
                  <?php
                  $id = $data['user'];
                  $userstmt = $pdo->prepare("SELECT * FROM users WHERE id=$id");
                  $userstmt->execute();
                  $userdata = $userstmt->fetch(PDO::FETCH_ASSOC);
                  ?>
                  <th><?php echo $userdata['username']; ?></th>
                  <th><?php echo $data['comment']; ?></th>
                  <th><?php if(empty($data['responce'])){echo "no replay yet";}else{echo $data['responce'];} ?></th>
                  <th>
                    <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#exampleModa<?php echo $data['id']; ?>">
                      Replay The Message
                    </button>
                  </th>
                </tr>
                <div class="modal fade" id="exampleModa<?php echo $data['id']; ?>" tabindex="-1" role="dialog" aria-bs-labelledby="exampleModalLabel" aria-bs-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="replayfeedback.php?id=<?php echo $data['id']; ?>" method="post">
                          <label>Your Replay</label>
                          <textarea name="reply" rows="8" cols="80" class="form-control"></textarea>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary">Reply Feedback</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <?php
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>
