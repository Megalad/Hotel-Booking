<?php
function registerUser($con, $name, $email, $phone, $password, $repassword) 
{
    if($password==$repassword)
    {
        $password=password_hash($password,PASSWORD_DEFAULT);
        $q="insert into users(userName,email,phone,password,created_at) values(?,?,?,?,curdate())";
        $stmt = $con->prepare($q);

        if ($stmt) 
        {
            $stmt->bind_param("ssss",$name,$email,$phone,$password);
            if($stmt->execute())
            {
                echo "<div class='alert alert-success'>Success! Account created.</div>";
            }
            else
            {
                echo "<div class='alert alert-danger'>Not Success!!</div>";
            }
            $stmt->close();
        } 
        else 
        {
            echo "DBError";
        }
    }
    else 
    {
        echo "<div class='alert alert-warning'>Passwords do not match.</div>";
    }
}
function loginUser($con, $email, $password) {
    $sql = "select * from users where email = ?";
    
    if ($stmt = $con->prepare($sql)) {
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($row = $result->fetch_assoc()) {
            $hashedPassword = $row['password'];
            
            if (password_verify($password, $hashedPassword)) 
            {
                return $row;
            } else {
                return "INVALID_PASS";
            }
        } else {
            return "USER_NOT_FOUND";
        }
        $stmt->close();
    } else {
        return "DB_ERROR";
    }
}
function getRooms($con)
{
    $sql = "SELECT 
                rt.roomTypeID,
                rt.roomTypeName,
                rt.price,
                rt.description,
                rt.maxAdults,
                rt.maxChildren,
                rt.maxOccupancy,
                ri.url AS image_url
            FROM RoomType rt
            LEFT JOIN RoomImage ri ON rt.roomTypeID = ri.roomType_ID
            GROUP BY rt.roomTypeID";

    
    $result = $con->query($sql);

    $rooms = array(); 

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $rooms[] = $row; 
        }
        return $rooms; 
    } else {
        return []; 
    }
}

function getRoomType($con)
{
    $sql = "SELECT 
                rt.roomTypeID,
                rt.roomTypeName,
                rt.price,
                rt.description,
                rt.maxAdults,
                rt.maxChildren,
                rt.maxOccupancy,
                ri.url AS image_url
            FROM RoomType rt
            LEFT JOIN RoomImage ri ON rt.roomTypeID = ri.roomType_ID
            GROUP BY rt.roomTypeID";

    
    $result = $con->query($sql);

    $rooms = array(); 

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $rooms[] = $row; 
        }
        return $rooms; 
    } else {
        return []; 
    }
}
function getRoomTypeById($con, $id) {
    $query = "SELECT * FROM RoomType WHERE roomTypeID = ?";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    return mysqli_fetch_assoc($result);
}

function getRoomImages($con, $id) {
    $query = "SELECT url FROM RoomImage WHERE roomType_ID = ?";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    $images = [];
    while($row = mysqli_fetch_assoc($result)) {
        $images[] = $row['url'];
    }
    return $images;
}

function getSimilarRooms($con, $currentId) {
    $query = "SELECT * FROM RoomType WHERE roomTypeID != ? LIMIT 3";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "i", $currentId);
    mysqli_stmt_execute($stmt);
    return mysqli_stmt_get_result($stmt);
}
?>