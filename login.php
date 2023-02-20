<?php
session_start();

include("./config/db.php");
include("./functions.php");


if($_SERVER['REQUEST_METHOD'] == 'POST') {

    $userName = $_POST["userName"];
    $password = $_POST["password"];
    $errors = "";

    if(!empty($userName) && !empty($password) && !is_numeric($userName)){

        // Read database
        $query = "select * from user where userName = '$userName' limit 1";
        $res = mysqli_query($con, $query);

        if ($res) {

            if($res && mysqli_num_rows($res) > 0) {

                $userData = mysqli_fetch_assoc($res);

                if($userData['password'] == $password) {

                    $_SESSION['userId'] = $userData['userId'];
                    header("Location: index.php");
                    die;
                }
            } else {
                $error = 'Invalid Username or Password';
            }
        } 
        
    } elseif(empty($userName)) {

       $error = "Please enter username!";

    } elseif(empty($password)) {

        $error = "Please enter password!";
    }
}


?>

    <?php
        include('./partials/header.php')
    ?>
    <div class=" w-full h-screen bg-center bg-cover" style="background-image: url('./Images//damian-zaleski-RYyr-k3Ysqg-unsplash.jpg');">
        <div class="fixed inset-0 bg-gradient-to-br from-[#6675df] to-transparent flex justify-center items-center ">

            <div class="flex flex-col justify-center items-center p-4 w-[500px] rounded-sm bg-[#fff] space-y-6 rounded-md">
                <h3>WELCOME BACK</h3>
                <h1 class="text-3xl text-[#333] ">LOG IN TO YOUR ACCOUNT</h1>
                <form method="post" action="" class=" flex flex-col justify-center items-center p-4 space-y-5  w-full">
                    <?php if (isset($error)) { ?>
                            <p class="text-red-900 text-light"><?php echo $error; ?></p>
                        
                    <?php }?>
                    <label for="userName" class="w-full"><i class="fa-solid fa-user mr-2"></i>Username:</label>
                    <input type="text" name="userName" placeholder="Username" class="w-full p-4 rounded-md border-2 border-gray-300">
                    <label for="password" class="w-full"><i class="fa-solid fa-lock mr-2"></i>Password:</label>
                    <input type="password" name='password' placeholder="Password" class="w-full p-4 rounded-md border-2 border-gray-300">
                    
                    <button type="submit" value="Login" class="w-full py-3 text-md text-[#fff]  font-semibold bg-[#6675df] hover:bg-[#464f93] ease-linear duration-100 rounded-md">LOGIN</button>
                </form>
                <p class="text-sm mt-[90px] text-[#999] font-light ">
                    Don't have an account? 
                    <a href="signup.php" class=" font-base text-[#6675df]">Sign Up</a>
                </p>
            </div>

        </div>
    </div>
<?php
    include('./partials/footer.php')
?>