<?php
if (isset($_GET['delete'])) {
    $id_instructors = isset($_GET['delete']) ? $_GET['delete'] : '';
    $queryDelete = mysqli_query($config, "UPDATE instructors SET deleted_at = 1 WHERE id ='$id_instructors'");
    if ($queryDelete) {
        header("location:?page=instructors&hapus=berhasil");
    } else {
        header("location:?page=instructors&hapus=gagal");
    }
}

if (isset($_POST['name'])) {
    //ada tidak parameter bernama edit, kalo ada jalankan perintah edit/update
    //kalo tidak ada tambah data baru / insert
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $education = $_POST['education'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $id_instructors = isset($_GET['edit']) ? $_GET['edit'] : '';
    if (!isset($_GET['edit'])) {
        $insert = mysqli_query($config, "INSERT INTO instructors (name,gender,education,phone,email,address) VALUES('$name','$gender','$education','$phone','$email','$address')");
        header("location:?page=instructors&tambah=berhasil");
    } else {
        $update = mysqli_query($config, "UPDATE instructors SET name='$name', gender='$gender', education='$education', phone='$phone', email='$email', address='address'  WHERE id='$id_instructors'");
        header("location:?page=instructors&ubah=berhasil");
    }
}
?>

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><?php echo isset($id_instructors) ? 'Edit' : 'Add' ?>Instructors</h5>

                <form action="" method="post">
                    <div class="mb-3">
                        <label for="">FullName *</label>
                        <input value="<?php echo isset($rowEdit['name']) ? $rowEdit['name'] : '' ?>" type="text" class="form-control" name="name" placeholder="Enter your name" required>                    </div>
                    <div class="mb-3">
                        <label for="">Gender *</label>
                        <input class="form-check-input" type="radio" name="gender" id="men" value="1" <?= isset($_GET['edit']) && $id_instructors['gender'] == '1' ? 'checked' : '' ?>>
                        <label class="form-check-label" for="men">Men</label>

                        <input class="form-check-input" type="radio" name="gender" id="female" value="0" <?= isset($_GET['edit']) && $id_instructors['gender'] == '1' ? 'checked' : '' ?>>
                        <label class="form-check-label" for="female">Female</label>
                    </div>
                    <div class="mb-3">
                        <label for="">Education *</label>
                        <input type="text" class="form-control" name="education" placeholder="Enter your education" required>
                    </div>
                    <div class="mb-3">
                        <label for="">Phone *</label>
                        <input type="text" class="form-control" name="phone" placeholder="Enter your phone" required>
                    </div>
                    <div class="mb-3">
                        <label for="">Email *</label>
                        <input type="email" class="form-control" name="email" placeholder="Enter your email" required>
                    </div>
                    <div class="mb-3">
                        <label for="">Address *</label>
                        <textarea name="address" class="form-control" cols="30" rows="5"></textarea>
                    </div>
                    <div class="mb-3">
                        <input type="submit" class="btn btn-success" name="save" value="save">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>