<?php
session_start();

include('./config/db.php');
include('./functions.php'); 
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $error = "";
        $email = $_POST['email'];
        $userName = $_POST['userName'];
        $password = $_POST['password'];
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];

        // Save to Database
        if(!empty($userName) && !empty($password) && !is_numeric($userName) && !empty($email)) {

            $userId = randomNumber(20);
            $query = "insert into user (userId,userName,password,email,firstname,lastname) values ('$userId','$userName','$password','$email','$firstName','$lastName')";
    
            mysqli_query($con, $query);
    
            header("Location: login.php");
            die;
        } elseif (empty($userName)) {
            $error = 'Please Enter Username!';
        } elseif (empty($password)) {
            $error = 'Please Enter Valid Password';
        } elseif ((empty($email)) || isValidEmail($email)) {
            $error = 'Please Enter Valid email';
        } elseif (empty($firstName)) {
            $error = 'Please Enter Your First Name!';
        } elseif (empty($lastName)) {
            $error = 'Please Enter Your Last Name';
        } 
    }
?>


<?php
    include('./partials/header.php')
?>
<div class=" w-full min-h-screen bg-cover" style="background-image: url('./Images//campaign-creators-gMsnXqILjp4-unsplash.jpg');">
    <div class="fixed inset-0 bg-gradient-to-br from-[#6675df] to-transparent flex justify-center items-center ">

        <div class="flex flex-col justify-center items-center p-4 w-[500px] rounded-sm bg-[#fff] space-y-6 rounded-md">
            <h3>WELCOME</h3>
            <h1 class="text-3xl text-[#333] ">Sign Up Now</h1>
            <form method="post" action="" class=" flex flex-col justify-center items-center p-4 space-y-5  w-full">
                <?php if (isset($error)) { ?>
                        <p class="text-red-900 text-light"><?php echo $error; ?></p>
                    
                <?php }?>
                <label for="firstName" class="w-full">First Name:</label>
                <input type="text" name="firstName" placeholder="First Name" class="w-full p-3 rounded-md border-2 border-gray-300">

                <label for="lastName" class="w-full">Last Name:</label>
                <input type="text" name="lastName" placeholder="First Name" class="w-full p-3 rounded-md border-2 border-gray-300">

                <label for="userName" class="w-full"><i class="fa-solid fa-envelope mr-2"></i>Email:</label>
                <input type="email" name="email" placeholder="Email" class="w-full p-3 rounded-md border-2 border-gray-300">

                <label for="userName" class="w-full"><i class="fa-solid fa-user mr-2"></i>Username:</label>
                <input type="text" name="userName" placeholder="Username" class="w-full p-3 rounded-md border-2 border-gray-300">

                <label for="password" class="w-full"><i class="fa-solid fa-lock mr-2"></i>Password:</label>
                <input type="password" name='password' placeholder="Password" class="w-full p-3 rounded-md border-2 border-gray-300">
                
                <button type="submit" value="Login" class="w-full py-3 text-md text-[#fff]  font-semibold bg-[#6675df] hover:bg-[#464f93] ease-linear duration-100 rounded-md">SUBMIT</button>
            </form>
            <p class="text-sm mt-[90px] text-[#999] font-light ">
                Already have an account? 
                <a href="signup.php" class=" font-base text-[#6675df]">Login In Here</a>
            </p>
        </div>

    </div>
</div>
    
<?php
    include('./partials/footer.php')
?>