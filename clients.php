<?php require_once(".\\utilities\\createElement.php");?>
<?php require_once(".\\utilities\\header.php"); ?>
<?php require_once(".\\utilities\\operations.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ClientMngr</title>
</head>
<body>
    <div class="container text-center">
        <h2 class="py-4 text-dark">Client Manager</h2>

        <div class="d-flex justify-content-center"> 
            <form id="client-form" action="" method="POST" class="w-50">
                <div class="py-2 row">
                <!-- Generates input fields, jquery in scripts file applied here -->
                    <div class="col">
                        <?php createInput("<i>ID</i>","ID", "member_id", ""); ?>
                    </div>
                    <div class="col">
                        <?php createInput("<i>1</i>","SSN", "member_ssn", ""); ?>
                    </div>   
                </div>
                <div class="pt-2">
                    <?php createInput("<i>2</i>", "First Name", "member_fname", "" ); ?>
                </div>
                <div class="pt-2">
                    <?php createInput("<i>3</i>", "Last Name", "member_lname", "" ); ?>
                </div>
                <div class="row pt-2">
                    <div class="col">
                        <?php createInput("<i>4</i>", "Gender", "member_gender", "" ); ?>
                    </div>
                    <div class="col">
                        <?php createInput("<i>5</i>", "BirthDate", "member_dob", "" ); ?>
                    </div>
                    <div class="col">
                        <?php createInput("<i>6</i>", "Dependents", "member_dependents", "" ); ?>
                    </div>
                </div>
                <div class="pt-2">
                    <?php createInput("<i>7</i>", "Policy  Number", "member_policy", "" ); ?>
                </div>
                <div class="row pt-2">
                    <div class="col">
                        <?php createInput("<i>8</i>", "Medical Plan", "member_medical", "" ); ?>
                    </div>
                    <div class="col">
                        <?php createInput("<i>9</i>", "Dental Plan", "member_dental", "" ); ?>
                    </div>
                    <div class="col">
                        <?php createInput("<i>10</i>", "Vision Plan", "member_vision", "" ); ?>
                    </div>
                </div>

                <!-- Create another set of buttons -->
                <div class="d-flex justify-content-center">
                    <?php createButton("btn-create", "btn btn-success my-2 mx-2", "Create Client", "createClient", "dat-toggle='tooltip' data-placement='bottom' title='create'"); ?>
                    <?php createButton("btn-read", "btn btn-primary my-2 mx-2", "<i>View Clients</i>", "readClient", "dat-toggle='tooltip' data-placement='bottom' title='read'"); ?>
                    <?php createButton("btn-update", "btn btn-light border my-2 mx-2", "<i>Update</i>", "updateClient", "dat-toggle='tooltip' data-placement='bottom' title='update'"); ?>
                    <?php createButton("btn-delete", "btn btn-danger my-2 mx-2", '<i>Delete</i>', "deleteClient", "dat-toggle='tooltip' data-placement='bottom' title='delete'"); ?>
                </div>
            </form>>
        </div>

        <!-- Bootstrap table --> 
        <div class="table-data">
            <table class="table table-striped table-dark" >
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>SSN</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Gender</th>
                        <th>Date of Birth</th>
                        <th>Dependents</th>
                        <th>Policy #</th>
                        <th>Medical Plan</th>
                        <th>Dental Plan</th>
                        <th>Vision Plan</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id="tbody">
                    <?php 
                    if(isset($_POST['readClient'])) {
                        $result = getData();
                        if($result) {
                            while($row = mysqli_fetch_assoc($result)) { 
                                ?>
                                <tr>
                                    <td data-id="<?php echo $row['memb_id']; ?>"><?php echo $row['memb_id']; ?></td>
                                    <td data-id="<?php echo $row['memb_id']; ?>"><?php echo $row['memb_ssn']; ?></td>
                                    <td data-id="<?php echo $row['memb_id']; ?>"><?php echo $row['fname']; ?></td>
                                    <td data-id="<?php echo $row['memb_id']; ?>"><?php echo $row['lname']; ?></td>
                                    <td data-id="<?php echo $row['memb_id']; ?>"><?php echo $row['gender']; ?></td>
                                    <td data-id="<?php echo $row['memb_id']; ?>"><?php echo $row['dob']; ?></td>
                                    <td data-id="<?php echo $row['memb_id']; ?>"><?php echo $row['dependents']; ?></td>
                                    <td data-id="<?php echo $row['memb_id']; ?>"><?php echo $row['policy_num']; ?></td>
                                    <td data-id="<?php echo $row['memb_id']; ?>"><?php echo $row['med_id']; ?></td>
                                    <td data-id="<?php echo $row['memb_id']; ?>"><?php echo $row['dent_id']; ?></td>
                                    <td data-id="<?php echo $row['memb_id']; ?>"><?php echo $row['eye_id']; ?></td>
                                    <td><i class="btnedit" data-id="<?php echo $row['memb_id']; ?>">Edit</i></td>
                                </tr>
                            <?php
                            }
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>




    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src='scripts.js'> </script>
</body>
</html>