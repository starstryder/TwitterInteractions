<?php
/**
 * @param $conn
 */
function test_conn($conn) {
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
}

/**
 * @param $obj
 */
function test_twshow($obj) {
    // does it return a data structure
    if (!is_array($obj)) {
        die("An array was not returned. Response was: $obj");
    }

    // is the response an error message?
    if (isset($obj['errors'])) {
        if (strncmp("Sorry, that page does not exist.", $obj['errors'][0]['message'], 20) != 0)
            die("There was an error message sent:" . $obj['errors'][0]['message'] . "\n");
    }

    // make sure it has the expected id that indicates everything *should be* ok
    if (!isset($obj['id'])) {
        die("Malformed response: id wasn't set.");
    }

}

function test_twlist($obj) {
    // does it return a data structure
    if (!is_array($obj)) {
        die("An array was not returned. Response was: $obj");
    }

    // is the response an error message?
    if (isset($obj['errors'])) {
        if (strncmp("Sorry, that page does not exist.", $obj['errors'][0]['message'], 20) != 0)
            die("There was an error message sent:" . $obj['errors'][0]['message'] . "\n");
    }
}

/**
 * @return bool|mysqli_result
 */
function test_mysql_q($query, $conn) {
    $result = mysqli_query($conn, $query);
    if ($result==FALSE) {
        $error = mysqli_error($conn);
        if (strncmp('Duplicate',$error,5)!=0) echo "Error: " . $query . " " . mysqli_error($conn)."\n";
    } else {
        return $result;
    }
}