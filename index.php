<?php
session_start();

    include('./config/db.php');
    include('./functions.php');
    
    $userData = check_login($con);
    $query = "SELECT * FROM "
    
?>
    
<!-- Header -->
<?php
    include('./partials/header.php');
    include('./partials/navbar.php')
?>

<!-- Body -->
    
    <div class="w-full flex justify-center mt-7 p-8">
        <div class=" w-full max-w-9xl bg-indigo-100 flex felx-col justify-center items-center p-4 text-center">
            <h1 class="text-5xl w-full text-center">Find A Job</h1>
            <select>
                <option value="">Select Category</option>
                

                
                <option value="">Something</option>
            </select>
        </div>
    </div>
    
    






<!-- Footer -->
<?php
    include('./partials/footer.php')
?>

