<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form To do List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
        <?php
        require_once("connection.php");

        if (isset($_POST["submit"])) {
            $nama_tugas = $_POST["nama_tugas"];
            $deadline = $_POST["deadline"];

            $queryCreated = "INSERT INTO tugas_fachri(nama_tugas, deadline) VALUES ('$nama_tugas', '$deadline')";


            $created = mysqli_query($conn, $queryCreated);
        }

        if (isset($_GET['id_tugas'])) {
            $id = $_GET['id_tugas'];
            $delete = mysqli_query($conn, "DELETE FROM tugas_fachri WHERE id_tugas = $id");
        }


        ?>
    <!-- Form data -->
    <div class="container card mt-5 col-md-8">
        <div class="card-header mb-3 fw-bold">Tambah Todolist</div>
        <div class="card-body">
            <form action="" method="POST">
                <div class="mb-3">
                    <label for="task" class="form-label">Nama Tugas</label>
                    <input type="text" class="form-control" id="nama_tugas" name="nama_tugas" required>
                </div>
                <div class="mb-3">
                    <label for="date" class="form-label">Deadline</label>
                    <input type="date" class="form-control" id="deadline" name="deadline" required>
                </div>
                <button type="submit" name ="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
        <!-- End form data -->
        <!-- Table -->
        <div class="container">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Tugas</th>
                            <th scope="col">Deadline</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $queryShow = "SELECT * FROM tugas_fachri ORDER BY deadline ASC"; // menampilkan data
                        $show = mysqli_query($conn, $queryShow);

                        if (mysqli_num_rows($show) > 0) {
                            $number = 1;
                            while ($data = mysqli_fetch_assoc($show)) {

                        ?>
                                <tr>
                                    <td class="number"><?= $number; ?></td>
                                    <td><?= $data["nama_tugas"]; ?></td>
                                    <td><?= $data["deadline"]; ?></td>
                                    <td class="action">
                                        <a href="edit.php?id_tugas=<?php echo $data["id_tugas"] ?>" class="btn btn-link">Edit</a>
                                        <a href="index.php?id_tugas=<?php echo $data["id_tugas"] ?>" class="btn btn-link">Delete</a>
                                    </td>
                                </tr>
                            <?php
                                $number++;
                            }
                        } else {
                            ?>
                            <tr>
                                <td colspan="4">No Data Found</td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- End table -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        
</body>
</html>