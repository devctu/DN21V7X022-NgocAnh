<?php

define('TITLE', 'Xóa một Trích dẫn');
include '../partials/header.php';

echo '<h2>Xóa một Trích dẫn</h2>';

include '../partials/check_admin.php';

echo '<p>Trang đang được Phạm Văn Á xây dựng...</p>';
include('../partials/db_connect.php');
if(isset($_GET['id']) && is_numeric($_GET['id']) && ($_GET['id'] >0)){
    $query = "SELECT quote, source, favorite FROM quotes WHERE id={$_GET['id']}";

    try{
        $statement = $pdo->query($query);
        $row = $statement->fetch();
    }catch(PDOException $e){
        $pdo_error = $e->getMessage();
    }

    if(!empty($row)){
        echo '<form action="delete_quote.php" method="post">
              <p>Bạn có chắc xoá trích dẫn này?</p>
              <div><blockquote>' . htmlspecialchars($row['quote']) .
              '</blockquote> ' . htmlspecialchars($row['source']);
        if($row['favorite'] == 1){
            echo '<strong> Yêu thích!</strong> ';
        }
        echo '</div> <br><input type="hidden" name="id" value="' . $_GET['id'] .'">
        <p><input type="submit" name="submit" value="Xoá trích dẫn này"></p>
        </form>';
    }else{
        $error_message='Không tìm thấy trích dẫn này';
        $reason = $pdo_error ?? 'Không rõ nguyên nhân';
        include('../partials/show_error.php');
    }
}elseif(isset($_POST['id']) && is_numeric($_POST['id']) && ($_POST['id']>0)){
    $query = "DELETE From quotes WHERE id={$_POST['id']} LIMIT 1";

    try{
        $statement = $pdo->query($query);
    } catch(PDOException $e){
        $pdo_error = $e->getMessage();
    }
    if($statement && $statement->rowCount()==1){
        echo '<p> Trích dẫn đã bị xoá. </p>';
    }else{
        $error_message ='Không thể xoá trích dẫn này';
        $reason = $pdo_error ?? "Không rõ nguyên nhân";
        include('../partials/show_error.php');
    }
}
include '../partials/footer.php';
?>
