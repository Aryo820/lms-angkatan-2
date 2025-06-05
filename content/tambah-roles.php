<?php
if (isset($_GET['delete'])) {
    $id_roles = isset($_GET['delete']) ? $_GET['delete'] : '';
    $queryDelete = mysqli_query($config, "UPDATE roles SET deleted_at = 1 WHERE id ='$id_roles'");
    if ($queryDelete) {
        header("location:?page=roles&hapus=berhasil");
    } else {
        header("location:?page=roles&hapus=gagal");
    }
}

if (isset($_POST['name'])) {
    //ada tidak parameter bernama edit, kalo ada jalankan perintah edit/update
    //kalo tidak ada tambah data baru / insert
    $name = $_POST['name'];
    $id_instructors = isset($_GET['edit']) ? $_GET['edit'] : '';
    if (!isset($_GET['edit'])) {
        $insert = mysqli_query($config, "INSERT INTO roles (name) VALUES('$name')");
        header("location:?page=roles&tambah=berhasil");
    } else {
        $update = mysqli_query($config, "UPDATE roles SET name='$name' WHERE id='$id_roles'");
        header("location:?page=roles&ubah=berhasil");
    }
}
?>

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><?php echo isset($id_roles) ? 'Edit' : 'Add' ?>Majors</h5>

                <form action="" method="post">
                    <div class="mb-3">
                        <label for="">Roles *</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter your roles" required>
                        <div class="mb-3">
                            <input type="submit" class="btn btn-success" name="save" value="Save">
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>