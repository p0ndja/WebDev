<div class="card card-body">
    <table id="tablePreview" class="table table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>หัวข้อ</th>
                <th>ผู้เขียน</th>
                <th>#</th>
            </tr>
        </thead>
        <tbody>
            <?php
    $query = "SELECT id,title,writer FROM `post` WHERE";
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        echo "<tr><th scope='row'>" . $row['id'] . "</th>" . "<td>" . $row['title']. "</td>". "<td>" . $row['writer'] . "</td>". "</tr>";
    }
?>
        </tbody>
    </table>
</div>