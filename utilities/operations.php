<?php 
require_once("database.php");
require_once("createElement.php");

$connection = createDB(); 

//create button click, related to button to create with id create
if(isset($_POST['createClient'])) {
    createClient();
}

if(isset($_POST['updateClient'])) {
    updateClient();
}

if(isset($_POST['deleteClient'])) {
    deleteClient();
}

function createClient() {
    //if we have valid data
    $ssn = textboxValue('member_ssn');
    $fname = textboxValue('member_fname');
    $lname = textboxValue('member_lname');
    $gender = textboxValue('member_gender');
    $dob = textboxValue('member_dob');
    $dependents = textboxValue('member_dependents');
    $policy = textboxValue('member_policy');
    $medical = textboxValue('member_medical');
    $dental = textboxValue('member_dental');
    $vision = textboxValue('member_vision');

    if($ssn && $fname && $lname && $dob && $policy && ($medical || $dental || $vision)) {

        $sql = "INSERT INTO insurancepolicies(policy_num, med_id, dent_id, eye_id) 
        VALUES('$policy', '$medical', '$dental', '$vision');";

        $sql .= "INSERT INTO members(memb_ssn, fname, lname, gender, dob, dependents, policy_num)
        VALUES('$ssn', '$fname', '$lname', '$gender', '$dob', '$dependents', '$policy');";

        if(mysqli_multi_query($GLOBALS['connection'], $sql)) {
            createMessage("success", "Record added");
        }
        else {
            createMessage("error", "Error, could not add client to database");
        }      
    }
    else {
        createMessage("error", "Provide valid data please");
    }
}

function updateClient() {
    $id = textboxValue('member_id');
    $ssn = textboxValue('member_ssn');
    $fname = textboxValue('member_fname');
    $lname = textboxValue('member_lname');
    $gender = textboxValue('member_gender');
    $dob = textboxValue('member_dob');
    $dependents = textboxValue('member_dependents');
    $policy = textboxValue('member_policy');
    $medical = textboxValue('member_medical');
    $dental = textboxValue('member_dental');
    $vision = textboxValue('member_vision');

    if($ssn && $fname && $lname && $dob && $policy && ($medical || $dental || $vision)) {
        $sql = "UPDATE insurancepolicies SET eye_id='$vision', med_id='$medical', dent_id='$dental' WHERE policy_num='$policy';";

        $sql .= "UPDATE members SET memb_ssn='$ssn', fname='$fname', lname='$lname', gender='$gender', dob='$dob', dependents='$dependents' WHERE memb_id='$id';";
        if(mysqli_multi_query($GLOBALS['connection'], $sql)) {
            createMessage("success", "Data updated");
        }
        else {
            createMessage("error", "Unable to update");
        }
    }
    else {
        createMessage("error", "Must provide data");
    }
}


function deleteClient() {
    $id = (int)textboxValue("member_id");

    $sql = "DELETE FROM members WHERE memb_id='$id';";
    if(mysqli_query($GLOBALS['connection'], $sql)) {
        createMessage("success", "Client deleted");
    }
    else {
        createMessage("error", "Unable to delete record");
    }
}

//get data from mysql database
function getData() {
    $sql = "SELECT m.memb_id, m.memb_ssn, m.fname, m.lname, m.gender, m.dob, m.dependents, m.policy_num,
    p.med_id, p.dent_id, p.eye_id FROM members m
   inner join insurancepolicies p on m.policy_num = p.policy_num;";

    $result = mysqli_query($GLOBALS['connection'], $sql);

    if(mysqli_num_rows($result) > 0) {
        return $result;

    }
}

//input validation function
function textboxValue($value) {
    //security/input validation. escapes special characters
    // trim supposedly protects against sql injection
    $textbox = mysqli_real_escape_string($GLOBALS['connection'], trim($_POST[$value]));
    if(empty($textbox)) {
        return false;
    }
    else {
        return $textbox;
    }
}

//messages
function createMessage($classname, $msg) {
    $element = "<h6 class='$classname'>$msg</h6>";
    echo $element;
}

?>