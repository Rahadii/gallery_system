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
                // $sql = "SELECT * FROM users WHERE id=1";
                // $result = $db->query($sql); // mengambil dari function query

                // instansiasi User
                // $user = new Users();

                // $result_set = Users::findAllUsers();

                // while($row = mysqli_fetch_assoc($result_set)){
                // // $user_found = mysqli_fetch_assoc($result);

                //     echo $row['username'] . '<br />';   
                // }

                // $found_user = Users::findUserById(3);

                // $user = new Users();
                
                // assigning array values to object properties
                // $user->id = $found_user['id'];
                // $user->username = $found_user['username'];
                // $user->first_name = $found_user['first_name'];
                // $user->last_name = $found_user['last_name'];

                // $user = Users::auto_instantiation($found_user);
                
                // echo $user->id . '<br />';
                // echo $user->first_name . ' ' . $user->last_name;  // cara pemanggilannya
                

                // menggunakan method/fungsi findAllUsers() untuk menemukan semua user
                // $users = Users::findAllUsers();

                // foreach ($users as $user) {
                    
                //     echo 'ID : ' . $user->id . ', Username : '. $user->username . '<br />' ;
                //     // echo  . '<br />';
                // }

                // query insert
                $user = new Users();

                $user->username = "iman22";
                $user->password = "eaeaea";
                $user->first_name = "Iman";
                $user->last_name = "Udin";

                $user->create();
  
                // query update
                // $user = Users::findUserById(5);
                
                // $user->username = "chibaykuytensei";
                // $user->password = "chibu123";

                // $user->update();

                // query delete
                // $user = Users::findById(8);
                
                // $user->password = "askjdjfhdk";
                // $user->first_name = "Rifqy";
                // $user->last_name = "Alkha";

                // $user->save();
                
                // $user = new Users();
                // $user->username = "Rifqy";
                // // $user->last_name = "Meidiliana";

                // $user->save();

                // show data Photos
                // $photo = Photos::find_all();

                // foreach ($photo as $p) {
                    
                //     echo $p->title . '<br />';
                //     echo $p->description;

                // }

                // insert Photo
                // $photos = new Photos();
                // $photos->photos_id = 2;
                // $photos->title = "Testing";
                // $photos->description = "Lorem Ipsum apalah gitu";
                // $photos->size = 20;

                // $photos->create();
            ?>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i> <a href="index.php">Dashboard</a>
                </li>
                <li class="active">
                    <i class="fa fa-file"></i> Blank Page
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->