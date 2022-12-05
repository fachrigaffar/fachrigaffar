<?php
include "connection.php";
$sql = mysqli_query($conn, "Select * from tugas_fachri where 
id_tugas='$_GET[id_tugas]'");
$data = mysqli_fetch_array($sql);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post">
        <table>
            <tr>
                <td width="100">Nama Tugas</td>
                <td><input type="text" name="nama_tugas" value="<?php echo $data['nama_tugas']; ?>"></td>
            </tr>
            <tr>
                <td>Deadline</td>
                <td><input type="date" name="deadline" size="30" value="<?php echo $data['deadline']; ?>"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Update" name="proses"></td>
            </tr>
        </table>
    </form>
</body>

</html>
<?php

if (isset($_POST['proses'])) {

    mysqli_query($conn, "update tugas_fachri set
    nama_tugas = '$_POST[nama_tugas]',
    deadline = '$_POST[deadline]' where id_tugas='$_GET[id_tugas]'") or die(mysqli_error($conn));

    echo "<script>document.location='index.php'</script>";
}

?>