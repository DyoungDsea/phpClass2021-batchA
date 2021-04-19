<?php
$phone='';
include 'index-process.php';
include 'head.php';
?>

<body>


    <div class="container mt-5">
        <div class="box">
            <div class="card">
                <div class="card-header">
                    <h2> <?php if(isset($success)){ echo $success; }else{?> PHP Class <?php } ?></h2>
                </div>
                <div class="card-body">
                    <form action="index" method="POST">
                        <div class="form-group">
                            <input type="text" name="dfname" class="form-control" placeholder="Full Name">
                            <!-- <span class="text-danger"><?php //echo $fnameErr; ?></span> -->
                        </div>

                        <div class="form-group">
                            <input type="text" name="phone" value="<?php echo $phone; ?>" class="form-control" placeholder="Phone">
                        </div>

                        <div class="form-group">
                            <input type="text" name="email" class="form-control" placeholder="Email">
                        </div>

                        <div class="form-group">
                            <textarea name="add" id="" cols="30" rows="3" placeholder="Address" class="form-control"></textarea>
                        </div>

                        <div class="form-group">
                            <input type="text" name="pass" class="form-control" placeholder="Password">
                        </div>

                        <div class="form-group">
                            <input type="text" name="cpass" class="form-control" placeholder="Comfirm Password">
                        </div>

                        <button type="submit" name="save" class="btn btn-outline-primary btn-block btn-lg">Submit</button>

                    </form>
                    <div class="text-center">
                        <p>Have an account? <a href="login">Login</a> </p>
                    </div>
                </div>
                <?php if(isset($error)){ ?>
                    <div class="card-footer text-danger">
                        <?php if(isset($error)){ echo $error;}  ?>
                    </div>
                <?php }  ?>
            </div>
        </div>
    </div>

</body>

</html>