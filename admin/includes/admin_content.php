<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Admin
                <small>Subheading</small>
            </h1>
            <?php
                // show data 
                $sql = "SELECT * FROM users WHERE id=1";
                $result = $db->query($sql); // mengambil dari function query

                $user_found = mysqli_fetch_assoc($result);

                echo $user_found['username'] . '<br />';
            ?>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i> <a href="index.html">Dashboard</a>
                </li>
                <li class="active">
                    <i class="fa fa-file"></i> Blank Page
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->