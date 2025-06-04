<?php
$query = mysqli_query($config, "SELECT * FROM majors ORDER BY id DESC");
//Asc :12345
//Desc:54321
$rows = mysqli_fetch_all($query, MYSQLI_ASSOC);
?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Data Majors</h5>
                <div class="mb-3" align="right">
                    <a href="?page=tambah-majors" class="btn btn-primary">Add Majors</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($rows as $index => $row): ?>
                                <tr>
                                    <td><?php echo $index += 1; ?></td>
                                    <td><?php echo $row['name'] ?></td>
                                    <td>
                                        <a href="?page=tambah-majors&edit=<?php echo $row['id'] ?>" class="btn btn-primary">Edit</a>
                                        <a onclick="return confrim('Are you sure wanna delete this data??')"
                                            href="?page=tambah-majors&delete=<?php echo $row['id'] ?>" class="btn btn-danger">Delete</a>
                                    </td>
                                    <td></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>