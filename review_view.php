<?php
    if (!function_exists('displayRatingStars')) {
    // Function to convert numerical rating to stars
    function displayRatingStars($rating) {
        $fullStars = intval($rating); // Get the integer part of the rating
        $halfStar = ($rating - $fullStars) >= 0.5 ? 1 : 0; // Check if there is a half star
        $emptyStars = 5 - $fullStars - $halfStar; // Calculate the empty stars

        $stars = str_repeat("★", $fullStars) . ($halfStar ? "½" : "") . str_repeat("☆", $emptyStars);
        return $stars;
    }
}
if (!function_exists('timeAgo')) {
    // Function to display time in a human-readable format
    function timeAgo($timestamp) {
        $current_time = time();
        $time_diff = $current_time - strtotime($timestamp);

        $seconds = $time_diff;
        $minutes = round($seconds / 60);
        $hours = round($seconds / 3600);
        $days = round($seconds / 86400);

        if ($seconds < 60) {
            return $seconds . " seconds ago";
        } elseif ($minutes < 60) {
            return $minutes . " minutes ago";
        } elseif ($hours < 24) {
            return $hours . " hours ago";
        } else {
            return $days . " days ago";
        }
    }
}


$sql = "SELECT * FROM review WHERE Magazine_Id = '" . $row['Magazine_Id'] . "' ORDER BY Submission_Date DESC";
$result = $cn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "Reviewer: " . $row["Reviewer_Name"] . "<br>";
        echo "Rating: " . displayRatingStars($row["Rating"]) . "<br>";
        echo "Review: " . $row["Review"] . "<br>";
        echo "Submission Date: " . timeAgo($row["Submission_Date"]) . "<br><br>";
    }
} else {
    echo "No reviews for this product yet.";
}
?>