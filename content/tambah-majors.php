<?php
if (isset($_GET['delete'])) {
    $id_majors = isset($_GET['delete']) ? $_GET['delete'] : '';
    $queryDelete = mysqli_query($config, "UPDATE majors SET deleted_at = 1 WHERE id ='$id_majors'");
    if ($queryDelete) {
        header("location:?page=majors&hapus=berhasil");
    } else {
        header("location:?page=majors&hapus=gagal");
    }
}

if (isset($_POST['name'])) {
    //ada tidak parameter bernama edit, kalo ada jalankan perintah edit/update
    //kalo tidak ada tambah data baru / insert
    $name = $_POST['name'];
    $id_majors = isset($_GET['edit']) ? $_GET['edit'] : '';
    if (!isset($_GET['edit'])) {
        $insert = mysqli_query($config, "INSERT INTO majors (name) VALUES('$name')");
        header("location:?page=majors&tambah=berhasil");
    } else {
        $update = mysqli_query($config, "UPDATE majors SET name='$name' WHERE id='$id_majors'");
        header("location:?page=majors&ubah=berhasil");
    }
}
?>

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><?php echo isset($id_majors) ? 'Edit' : 'Add' ?>Majors</h5>

                <form action="" method="post">
                    <div class="mb-3">
                        <label for="">Majors *</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter your majors" required>
                        <div class="mb-3">
                            <input type="submit" class="btn btn-success" name="save" value="save">
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>