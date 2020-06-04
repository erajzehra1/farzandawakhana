<?php
include_once 'inlcudes/dbconnect.php';
session_start();
$_SESSION['admin']['username'];
$username = $_SESSION['admin']['username'];

$id = $_POST['rowid'];

$query1 = "SELECT * FROM `user` WHERE id= '$id'";
$result1 = mysqli_query($con,$query1);
$rows = mysqli_fetch_array($result1);




?>
<style>
    @media screen and (max-width: 767px) {
        .table-responsive {
            width: 100%;
            margin-bottom: 15px;
            overflow-y: hidden;
            -ms-overflow-style: -ms-autohiding-scrollbar;
            border: 1px solid #ddd;
        }
        .table-responsive > .table {
            margin-bottom: 0;
        }
        .table-responsive > .table > thead > tr > th,
        .table-responsive > .table > tbody > tr > th,
        .table-responsive > .table > tfoot > tr > th,
        .table-responsive > .table > thead > tr > td,
        .table-responsive > .table > tbody > tr > td,
        .table-responsive > .table > tfoot > tr > td {
            white-space: nowrap;
        }
        .table-responsive > .table-bordered {
            border: 0;
        }
        .table-responsive > .table-bordered > thead > tr > th:first-child,
        .table-responsive > .table-bordered > tbody > tr > th:first-child,
        .table-responsive > .table-bordered > tfoot > tr > th:first-child,
        .table-responsive > .table-bordered > thead > tr > td:first-child,
        .table-responsive > .table-bordered > tbody > tr > td:first-child,
        .table-responsive > .table-bordered > tfoot > tr > td:first-child {
            border-left: 0;
        }
        .table-responsive > .table-bordered > thead > tr > th:last-child,
        .table-responsive > .table-bordered > tbody > tr > th:last-child,
        .table-responsive > .table-bordered > tfoot > tr > th:last-child,
        .table-responsive > .table-bordered > thead > tr > td:last-child,
        .table-responsive > .table-bordered > tbody > tr > td:last-child,
        .table-responsive > .table-bordered > tfoot > tr > td:last-child {
            border-right: 0;
        }
        .table-responsive > .table-bordered > tbody > tr:last-child > th,
        .table-responsive > .table-bordered > tfoot > tr:last-child > th,
        .table-responsive > .table-bordered > tbody > tr:last-child > td,
        .table-responsive > .table-bordered > tfoot > tr:last-child > td {
            border-bottom: 0;
        }
    }
</style>
<table id="zero_config" class="table m-t-30 no-wrap table-hover contact-list table-striped  table-bordered table-responsive" data-page-size="10">
    <thead>
    <tr>
        <th>Full Name : <?php
            echo $rows['firstname']?><?php echo $rows['lastname'] ?></th>



    </tr>
    <tr>

        <th>Email :</th>


    </tr>
    <tr>

        <th>Mobile no : <?php echo $rows['mobile'] ?></th>


    </tr>
    <tr>

        <th>Adress : <?php echo $rows['address'] ?></th>


    </tr>
    <tr>

        <th>City :  <?php echo $rows['city'] ?> </th>

    </tr>
    </thead>



    <tfoot>
    <tr>

        <td colspan="7">
            <div class="">
                <nav aria-label="Page navigation example">
                    <ul class="pagination float-right"></ul>
                </nav>
            </div>
        </td>
    </tr>
    </tfoot>
</table>
