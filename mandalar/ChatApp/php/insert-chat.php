<?php 
    session_start();
    if(isset($_SESSION['user_id'])){
        include_once "config.php";
        $outgoing_id = $_SESSION['user_id'];
        $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
        $message = mysqli_real_escape_string($conn, $_POST['message']);
        if(!empty($message)){
            $sql = mysqli_query($conn, "INSERT INTO messages (incoming_msg_id, outgoing_msg_id, msg)
                                        VALUES ({$incoming_id}, {$outgoing_id}, '{$message}')") or die();
        }
    }else{
        header("location: ../login.php");
    }


    

<<<<<<< HEAD
?> <?php 
    session_start();
    if(isset($_SESSION['unique_id'])){
        include_once "config.php";
        $outgoing_id = $_SESSION['unique_id'];
        $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
        $message = mysqli_real_escape_string($conn, $_POST['message']);
        if(!empty($message)){
            $sql = mysqli_query($conn, "INSERT INTO messages (incoming_msg_id, outgoing_msg_id, msg)
                                        VALUES ({$incoming_id}, {$outgoing_id}, '{$message}')") or die();
        }
    }else{
        header("location: ../login.php");
    }
=======
// ?> <?php 
//     session_start();
//     if(isset($_SESSION['unique_id'])){
//         include_once "config.php";
//         $outgoing_id = $_SESSION['unique_id'];
//         $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
//         $message = mysqli_real_escape_string($conn, $_POST['message']);
//         if(!empty($message)){
//             $sql = mysqli_query($conn, "INSERT INTO messages (incoming_msg_id, outgoing_msg_id, msg)
//                                         VALUES ({$incoming_id}, {$outgoing_id}, '{$message}')") or die();
//         }
//     }else{
//         header("location: ../login.php");
//     }
>>>>>>> df26456bd2a8628790be8054f80832e950691e77


    

<<<<<<< HEAD
?>
=======
// ?>
>>>>>>> df26456bd2a8628790be8054f80832e950691e77
