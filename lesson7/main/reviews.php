<?php
function index(){
    $del = (int)$_GET['del'];
    if (! empty($del)) {
        $sql = "DELETE FROM reviews WHERE id = $del";
        mysqli_query(connect(), $sql);
        header('Location: ?page=reviews');
        exit;
    }
    $title = 'Отзывы';

    $sql = "SELECT id, name, userID, date, review
        FROM reviews";
    $res = mysqli_query(connect(), $sql);
    $content = '<a href="?page=reviews&func=addReview">Добавить</a>';

    while($row = mysqli_fetch_assoc($res)) {
        $content .= <<<php
    <div class="review" data-id="{$row['id']}">
    <h5>{$row['name']}</h5>
    <p>{$row['review']}</p>
    <p><span>{$row['date']}</span><a href="?page=reviews&del={$row['id']}">del</a></p>
    </div>
php;
    }
    return $content;
}

function addReview(){
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $userID = clearStr($_POST['userID']);
        $name = clearStr($_POST['name']);
        $review = clearStr($_POST['review']);
        $date = date("Y-m-d H:i:s");
        $sql = "INSERT INTO reviews(name, userID, review, date) 
            VALUES ('$name', '$userID', '$review', '$date')";
        mysqli_query(connect(), $sql);
//    header('Location: '. $_SERVER['REQUEST_URI']);
        header('Location: ?page=reviews');
        exit;
    }

    $content = <<<php
<div class="form-wrap">
  <div class="form-group col-md-4">
    <form class="my-form review-box" method="post">
      <label for="name">Name:</label>
      <input type="text" name="name" class="form-control" placeholder="name" autofocus required>
      <input type="text" name="userID" class="form-control" placeholder="userID" value="123" hidden>
      <label for="review">Review:</label>
      <textarea name="review" class="form-control" rows="5"
                id="userReview" placeholder="Review" required></textarea>
      <button type="submit" class="btn btn-primary my-btn form-btn addBtn">Отправить</button>
    </form>
  </div>
</div>
php;
    return $content;
}



