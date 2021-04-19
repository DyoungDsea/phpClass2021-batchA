<?php 
session_start();
include 'head.php';

?>


<body>


    <div class="container mt-5">
        <div class="box">
            <div class="card">
                <div class="card-header">
                    <h2>Login to your account</h2>
                </div>
                <div class="card-body">
                    <form action="login-process" method="POST">


                        <div class="form-group">
                            <input type="text" required name="email" class="form-control" placeholder="Email OR Username">
                        </div>

                        <div class="form-group">
                            <input type="text" required name="pass" class="form-control" placeholder="Password">
                        </div>


                        <button type="submit" name="save" class="btn btn-outline-primary">Submit</button>

                    </form>
                    <div class="text-center">
                        <p>Need an account? <a href="index">Sign up</a> </p>
                    </div>
                </div>
                <?php if (isset($_SESSION['error'])) { ?>
                    <div class="card-footer">
                        <?php if (isset($_SESSION['error'])) {
                            echo $_SESSION['error'];
                        } ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>



    <div class="mt-5">
        <ul>
            <?php
            for($i=1; $i<=5; $i++){
                $j = 42;
                echo "<li> <a href='user/sea$i/$j'> Sea $i </a></li>";
            }
            ?>

        </ul>
    </div>
    <?php unset($_SESSION['error']); ?>
</body>

</html>