<?php
session_start();
require 'dbcon.php';

if(isset($_POST['delete_employee']))
{
    $employee_id = mysqli_real_escape_string($con, $_POST['delete_employee']);

    $query = "DELETE FROM new_employee WHERE id='$employee_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Employee Deleted Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Employee Not Deleted";
        header("Location: index.php");
        exit(0);
    }
}

if(isset($_POST['update_employee']))
{
    $employee_id = mysqli_real_escape_string($con, $_POST['employee_id']);

    $name = mysqli_real_escape_string($con, $_POST['name']);
    $surname = mysqli_real_escape_string($con, $_POST['surname']);
    $task = mysqli_real_escape_string($con, $_POST['task']);


    $query = "UPDATE new_employee SET name='$name', surname='$surname', task='$task', WHERE id='$employee_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Employee Updated Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Employee Not Updated";
        header("Location: index.php");
        exit(0);
    }

}


if(isset($_POST['save_employee']))
{
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $surname = mysqli_real_escape_string($con, $_POST['surname']);
    

    $query = "INSERT INTO new_employee (name,surname) VALUES ('$name','$surname')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Employee Created Successfully";
        header("Location: employee-create.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Employee Not Created";
        header("Location: employee-create.php");
        exit(0);
    }
}

?>