<?php

$conn = mysqli_connect('localhost', 'root', '', 'res');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert a new category
function insertCategory($c_name) {
    global $conn;

    $c_name = $conn->real_escape_string($c_name);

    $sql = "INSERT INTO Category (c_name) VALUES ('$c_name')";

    if ($conn->query($sql)) {
        return "Category inserted successfully.";
    } else {
        return "Error inserting category: " . $conn->error;
    }
}

// Insert a new restaurant
function insertRestaurant($category_id, $title, $o_hr, $c_hr, $o_days, $phone, $email, $address) {
    global $conn;

    $title = $conn->real_escape_string($title);
    $o_days = $conn->real_escape_string($o_days);
    $phone = $conn->real_escape_string($phone);
    $email = $conn->real_escape_string($email);
    $address = $conn->real_escape_string($address);

    $sql = "INSERT INTO Restaurants ( title, o_hr, c_hr, o_days, phone, email, address)
            VALUES ( '$title', '$o_hr', '$c_hr', '$o_days', '$phone', '$email', '$address')";

    if ($conn->query($sql)) {
        return "Restaurant inserted successfully.";
    } else {
        return "Error inserting restaurant: " . $conn->error;
    }
}

// Get all categories
function getCategories() {
    global $conn;

    $sql = "SELECT * FROM Category";
    return $conn->query($sql);
}

// Get all restaurants by category


// Close the database connection
function closeCon() {
    global $conn;
    $conn->close();
}

?>
