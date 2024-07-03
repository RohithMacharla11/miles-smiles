<?php
require 'dbconfig.php';

// Function to retrieve the activity log entries
function getActivityLog($connection) {
    // Prepare the SQL statement
    $stmt = $connection->prepare("SELECT * FROM activity_log ORDER BY timestamp DESC");
    
    // Execute the statement
    $stmt->execute();
    
    // Get the result set
    $result = $stmt->get_result();
    
    // Fetch all rows as an associative array
    $log_entries = $result->fetch_all(MYSQLI_ASSOC);
    
    // Close the statement
    $stmt->close();
    
    // Return the log entries
    return $log_entries;
}

// Retrieve the log entries
$log_entries = getActivityLog($connection);

// Display the activity log entries
echo '<table>';
echo '<thead><tr><th>User Name</th><th>Activity</th><th>Description</th><th>Timestamp</th></tr></thead>';
echo '<tbody>';
foreach ($log_entries as $entry) {
    echo "<tr>";
    echo "<td>" . htmlspecialchars($entry['username']) . "</td>";
    echo "<td>" . htmlspecialchars($entry['activity']) . "</td>";
    echo "<td>" . htmlspecialchars($entry['description']) . "</td>";
    echo "<td>" . htmlspecialchars($entry['timestamp']) . "</td>";
    echo "</tr>";
}
echo '</tbody>';
echo '</table>';

// Close the database connection
$connection->close();
?>
