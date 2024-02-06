<?php
 $name=$roll=$email=$phone='';
 
if(isset($_POST['btn_sub']))
    {
        $err=[];
       if(isset($_POST['name']) && !empty($_POST['name']) && trim($_POST['name']))
       {
         $name=$_POST['name'];
       }else{
            $err['name'] = 'enter your name';
       }
       if(isset($_POST['email']) && !empty($_POST['email']) && trim($_POST['email']))
       {
        $email=$_POST['email'];
       }else{
            $err['email'] = 'enter your email';
       }
       if(isset($_POST['rollno']) && !empty($_POST['rollno']) && trim($_POST['rollno']))
       {
        $rollno=$_POST['rollno'];
       }else{
            $err['rollno'] = 'enter your rollno';
       }
       if(isset($_POST['phone']) && !empty($_POST['phone']) && trim($_POST['phone']))
       {
        $phone=$_POST['phone'];
       }else{
            $err['phone'] = 'enter your phone';
       }   

       $pro = $_POST['pro_select'];
       if($pro == ''){
        $err['pro_select'] = 'select your program';
       }else{
        $pro_select=$_POST['pro_select'];
       }


       $sem = $_POST['sem_select'];
       if($sem == ''){
        $err['sem_select'] = 'select your sem';
       }else{
        $sem_select=$_POST['sem_select'];
       }
       
    
    if(count($err) == 0){
        try {
            $connect = mysqli_connect('localhost', 'root', '', 'db_21_Nabin_lab');
            if (!$connect) {
                die("Connection failed: " . mysqli_connect_error());
            }
            
            // table creation
            $insert = "INSERT INTO tbl_students_21 (Name, Email, RollNO, Phone, program, Semester)
                VALUES ('$name', '$email', $rollno, $phone, '$pro_select', '$sem_select')";
        
            if (mysqli_query($connect, $insert)) {
                echo "Insert successfully";
            } else {
                echo "Error inserting: " . mysqli_error($connect);
            }
        



    
            mysqli_close($connect);
        } catch (Exception $e) {
            die('DB error: ' . $e->getMessage());
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>add to</h1>
    <form action="" method="post">
        name:<input type="text" name="name" value="<?php echo $name ?>">
        <?php echo isset($err['name'])?$err['name']:''; ?><br />
        Email:<input type="email" name="email" value="<?php echo $email ?>">
        <?php echo isset($err['email'])?$err['email']:''; ?><br />
        Rollno:<input type="number" name="rollno" value="<?php echo $rollno ?>">
        <?php echo isset($err['rollno'])?$err['rollno']:''; ?><br />
        phone:<input type="number" name="phone" value="<?php echo $phone ?>">
        <?php echo isset($err['phone'])?$err['phone']:''; ?><br />
        select program:
        <select name="pro_select" id="" value="<?php echo $pro_select ?>">
            <option value=" " disabled selected>select porgram</option>
            <option value="bca">BCA</option>
            <option value="bba">BBA</option>
            <option value="bbs">BBS</option>
            <option value="bit">bit</option>
        </select>
        <?php echo isset($err['pro_select'])?$err['pro_select']:''; ?>
        <br />
        select semester:
        <select name="sem_select" id="" value="<?php echo $sem_select ?>">
            <option value=" " disabled selected>select sem</option>
            <option value="sem1" > sem 1</option>
            <option value="sem2">sem 2</option>
            <option value="sem3">sem3 </option>
            <option value="sem4">sem 4</option>
        </select>
        <?php echo isset($err['sem_select'])?$err['sem_select']:''; ?>
        <br />
        <br />
        <input type="submit" name="btn_sub" value="send data"><br />
    </form>
</body>
</html>
<?php
error_reporting(E_ALL);

try {
    $connect = mysqli_connect('localhost', 'root', '', 'db_21_Nabin_lab');
    if (!$connect) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Fetch data
    $select = "SELECT * FROM tbl_students_21";
    $result = mysqli_query($connect, $select);

    if (mysqli_num_rows($result) > 0) {
        echo '<table border="1" border-collaspe="collaspe">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>RollNo</th>
                    <th>Phone</th>
                    <th>Program</th>
                    <th>Semester</th>
                </tr>';

        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>
                    <td>' . $row['Name'] . '</td>
                    <td>' . $row['Email'] . '</td>
                    <td>' . $row['RollNO'] . '</td>
                    <td>' . $row['Phone'] . '</td>
                    <td>' . $row['program'] . '</td>
                    <td>' . $row['Semester'] . '</td>
                </tr>';
        }
        echo '</table>';
    } else {
        echo 'Data not found';
    }

    mysqli_close($connect);
} catch (Exception $e) {
    die('DB error: ' . $e->getMessage());
}
?>
