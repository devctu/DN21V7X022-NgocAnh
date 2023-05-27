<?php

define('TITLE', 'Xem tất cả các Trích dẫn');
include '../partials/header.php';

echo '<h2>Tất cả các Trích dẫn</h2>';

include '../partials/check_admin.php';

//echo '<p>Trang đang được Phạm văn Á xây dựng...</p>';

include '../partials/db_connect.php';
$query = 'select id, quote, source, favorite from quotes order by date_entered desc';

try {
    $statement = $pdo->query($query);

    while($row = $statement->fetch()){
        $htmlspecialchars = 'htmlspecialchars';
        echo "<div><blockquote>{$htmlspecialchars($row['quote'])}</blockquote>{$htmlspecialchars($row['source'])}<br>";
        

        if($row['favorite'] == 1){
            echo '<strong>Yêu thích!</strong>';
        }

        echo "<p><b>Quản trị trích dẫn: </b>
        <a href=\"edit_quote.php?id={$row['id']}\">Sửa</a>
        <a href=\"delete_quote.php?id={$row['id']}\">Xoá</a></p></div><br>";
    }

} catch (PDOException $e){
    $error_message = 'Không thể lấy dữ liệu';
    $reason = $e->getMessage();
    include '../partials/show_error.php';
}
include '../partials/footer.php';
?>
