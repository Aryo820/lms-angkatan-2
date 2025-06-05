<?php
if (isset($_GET['delete'])) {
    $id = isset($_GET['delete']) ? $_GET['delete'] : '';
    $id_instructors = $_GET['id_instructor'];

    $queryDelete = mysqli_query($config, "DELETE FROM instructor_majors WHERE id ='$id'");
    if ($queryDelete) {
        header("location:?page=tambah-instructors-major&id=" . $id_instructors . "&hapus-berhasil");
    } else {
        header("location:?page=tambah-instructors-major&id=" . $id_instructors . "&tambah-gagal");
    }
}
// $id = isset($_GET['edit']) ? $_GET['edit'] : '';
// $queryEdit = mysqli_query($config, "SELECT * FROM instructors WHERE id='$id'");
// $rowEdit = mysqli_fetch_assoc($queryEdit);
$id_instructors = isset($_GET['id']) ? $_GET['id'] : '';

if (isset($_POST['id_major'])) {
    //ada tidak parameter bernama edit, kalo ada jalankan perintah edit/update
    //kalo tidak ada tambah data baru / insert
    $id_major = $_POST['id_major'];
    if (isset($_GET['edit'])) {
        $update = mysqli_query($config, "UPDATE instructor_majors SET id_major='$id_major' WHERE id='$edit'");
        header("location:?page=tambah-instructors-major&id=" . $id_instructors . "&ubah-berhasil");
    } else {
        $insert = mysqli_query($config, "INSERT INTO instructor_majors (id_major, id_instructor) VALUES('$id_major', '$id_instructors')");
        header("location:?page=tambah-instructors-major&id=" . $id_instructors . "&tambah-berhasil");
    }
}

$queryMajors = mysqli_query($config, "SELECT * FROM majors ORDER BY id DESC");
$rowMajors = mysqli_fetch_all($queryMajors, MYSQLI_ASSOC);


$queryInstructors = mysqli_query($config, "SELECT * FROM instructors WHERE id='$id_instructors'");
$rowInstructors = mysqli_fetch_assoc($queryInstructors);

$queryInstructorsMajors = mysqli_query($config, "SELECT majors.name, instructor_majors.id, id_instructor FROM instructor_majors
 LEFT JOIN majors ON majors.id = instructor_majors.id_major 
 LEFT JOIN instructors ON instructors.id = instructor_majors.id_instructor
 WHERE id_instructor='$id_instructors' AND instructors.deleted_at = 0 ORDER BY instructor_majors.id DESC");
$rowInstructorsMajors = mysqli_fetch_all($queryInstructorsMajors, MYSQLI_ASSOC);

$edit = isset($_GET['edit']) ? $_GET['edit'] : '';
$queryEdit = mysqli_query($config, "SELECT * FROM instructor_majors WHERE id='$edit'");
$rowEdit = mysqli_fetch_assoc($queryEdit);


?>

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><?php echo isset($_GET['edit']) ? 'Edit' : 'Add' ?> Instructors Major : <?php echo $rowInstructors['name'] ?></h5>
                <!-- form edit -->
                <?php if (isset($_GET['edit'])): ?>
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="" class="form-label">Major Name</label>
                            <select name="id_major" id="" class="form-control">
                                <option value="">Select One</option>
                                <?php foreach ($rowMajors as $rowMajor): ?>
                                <option <?php echo ($rowMajor['id'] == $rowEdit['id_major']) ? 'selected' : '' ?>value="<?php echo $rowMajor['id']; ?>"> <?php echo $rowMajor['name']; ?></option> 
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary" type="submit">Save Changes</button>
                        </div>
                    </form>
                    <!-- end form edit -->
                <?php else: ?>
                    <!-- listing table -->
                    <div align="right">
                        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Add Instructors Major
                        </button>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Major Name</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($rowInstructorsMajors as $index => $rowInstructorsMajor): ?>
                                <tr>
                                    <td><?php echo $index += 1 ?></td>
                                    <td><?php echo isset($rowInstructorsMajor['name']) ? $rowInstructorsMajor['name'] : '' ?></td>
                                    <td>
                                        <a href="?page=tambah-instructors-major&id=<?php echo $rowInstructorsMajor['id_instructor'] ?>&edit=<?php echo $rowInstructorsMajor['id_instructor'] ?>" class="btn btn-primary">Edit</a>
                                        <a onclick="return confrim('Are you sure wanna delete this data??')"
                                            href="?page=tambah-instructors-major&delete=<?php echo $rowInstructorsMajor['id'] ?>&id_instructor=<?php echo $rowInstructorsMajor['id_instructor'] ?>" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                <?php endif ?>
            </div>
        </div>
    </div>
</div>
<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add New Instructor Major :</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="" class="form-label">Major Name</label>
                        <select name="id_major" id="" class="form-control">
                            <option value="">Select One</option>
                            <?php foreach ($rowMajors as $rowMajor): ?>
                                <option value="<?php echo $rowMajor['id']; ?>"> <?php echo $rowMajor['name']; ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>