<div class="card card-body">
                <table id="tablePreview" class="table table-hover">
                <thead>
                    <tr>
                    <th>#</th>
                    <th>ผู้ใช้งาน</th>
                    <th>พาสเวิร์ด</th>
                    <th>อีเมล</th>
                    <th>คำนำหน้า</th>
                    <th>ชื่อจริง</th>
                    <th>นามสกุล</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>ระดับชั้น</th>
                    <th>ห้อง</th>
                    <th>Last Name</th>
                    <th>Username</th>
                    <th>Visits</th>
                    <th>Age</th>
                    <th>Country</th>
                    </tr>
                </thead>
                <tbody>
<?php
    $query = "SELECT * FROM `user`";
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        echo "<tr><th scope='row'>" . $row['id'] . "</th>" . "<td>" . $row['username']. "</td>". "<td>" . $row['password']. "</td>". "<td>" . $row['email'] . "</td>". "<td>" . $row['prefix']. "</td>" . "<td>" . $row['firstname'] . "</td>" . "<td>" . $row['lastname'] . "</td>" . "<td>" . $row['firstname_en'] . "</td>" . "<td>" . $row['lastname_en'] . "</td>" . "<td>" . $row['grade'] . "</td>". "<td>" . $row['class'] . "</td>". "</tr>";
    }
?>
                </tbody>
            </table>
                </div>