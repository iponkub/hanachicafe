    <?php 
    session_start();
            if(isset($_POST['email'])){
                    //connection
                    include_once 'connect.php';
                    //รับค่า user & password
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    //query 
                    $sql="SELECT * FROM member Where email='".$email."' and password='".$password."' ";

                    $result = mysqli_query($db,$sql);
                    
                    if(mysqli_num_rows($result)==1){

                        $row = mysqli_fetch_array($result);

                        $_SESSION["email"] = $row["email"];
                        $_SESSION["UserID"] = $row["id"];
                        $_SESSION["User"] = $row["name"];
                        $_SESSION["user_level"] = $row["user_level"];

                        if($_SESSION["user_level"]=="A"){ //ถ้าเป็น admin ให้กระโดดไปหน้า admin_page.php

                            Header("refresh:3;url=admin.php");

                        }

                        if ($_SESSION["user_level"]=="M"){  //ถ้าเป็น member ให้กระโดดไปหน้า user_page.php

                            Header("refresh:3;url=index.php");

                        }
                        
                        if ($_SESSION["user_level"]=="R"){  //ถ้าเป็น member ให้กระโดดไปหน้า user_page.php

                            Header("refresh:3;url=restaurant.php");

                        }

                    }else{
                            echo "alert(\" user หรือ  password ไม่ถูกต้อง\");"; 

                    }

            }else{


                Header("refresh:3;url=index.php"); //user & password incorrect back to login again

            }
    ?>