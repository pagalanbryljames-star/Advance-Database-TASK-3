<?php
include '../db.php';

$sql = "SELECT fname,  LTRIM(fname) AS LtrimmedString FROM customers WHERE userID = 11";
$result = $conn->query($sql);
?>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<div class='container mt-5'>
<div class= d-flex justify-content-between align-items-center mb-4>
<h2>Output for LTRIM() Function</h2>
<div class=ms-auto><a class='btn btn-outline-success' href='../index.php'>Back to Home</a></div>
</div>


<div class="p-4 rounded-3 mb-4 shadow-sm" style="background-color: #f8f9fa;">
    <p class="mb-0"><strong>SQL QUERY:</strong>
    <br><code><?php echo $sql?></code></p>
</div>

<table class='table table-striped table-hover rounded-3 overflow-hidden shadow-sm'>
    <thead style='background-color:#04AA6D; color:white'>
        <tr>
            <th class=text-start>Name</th>
            <th class=text-center>Results</th>
        </tr>
    </thead>

<?php
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        // $highlight = ($row["indexed"]>0)? "style ='background-color:yellow;'":"";
        
        echo "<tr>";
        echo "<td class='text-start'>" . htmlspecialchars($row["fname"]) . "</td>";
        echo "<td class='text-center'>" . $row["LtrimmedString"] . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='2'>0 results found or query failed.</td></tr>";
}
echo "</table>";
echo "</div>";


$conn->close();

?>
</body>
