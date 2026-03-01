<?php
// TEST TEST TEST TEST TEST PHP TEST TEST TEST TEST TEST 
// ---------------------------
// CONFIGURATION
// ---------------------------

declare(strict_types=1); // More C-like strictness

// ---------------------------
// DATA STRUCTURE
// ---------------------------

$users = [
    [
        "name" => "Alice",
        "age" => 22,
        "score" => 85
    ],
    [
        "name" => "Bob",
        "age" => 17,
        "score" => 72
    ],
    [
        "name" => "Charlie",
        "age" => 30,
        "score" => 91
    ]
];

// ---------------------------
// FUNCTIONS
// ---------------------------

function isAdult(int $age): bool {
    return $age >= 18;
}

function gradeFromScore(int $score): string {
    if ($score >= 90) return "A";
    if ($score >= 80) return "B";
    if ($score >= 70) return "C";
    if ($score >= 60) return "D";
    return "F";
}

function averageScore(array $users): float {
    $total = 0;
    $count = count($users);

    foreach ($users as $user) {
        $total += $user["score"];
    }

    return $count > 0 ? $total / $count : 0;
}

// ---------------------------
// PROCESSING
// ---------------------------

$avg = averageScore($users);

?>
<!DOCTYPE html>
<html>
<head>
    <title>User Score Dashboard</title>
    <style>
        body { font-family: Arial; }
        table { border-collapse: collapse; width: 600px; }
        th, td { border: 1px solid black; padding: 8px; text-align: center; }
        .adult { background-color: #d4ffd4; }
        .minor { background-color: #ffd4d4; }
    </style>
</head>
<body>

<h1>User Score Dashboard</h1>

<table>
    <tr>
        <th>Name</th>
        <th>Age</th>
        <th>Status</th>
        <th>Score</th>
        <th>Grade</th>
    </tr>

<?php foreach ($users as $user): ?>
    <?php $adult = isAdult($user["age"]); ?>
    <tr class="<?= $adult ? 'adult' : 'minor' ?>">
        <td><?= htmlspecialchars($user["name"]) ?></td>
        <td><?= $user["age"] ?></td>
        <td><?= $adult ? "Adult" : "Minor" ?></td>
        <td><?= $user["score"] ?></td>
        <td><?= gradeFromScore($user["score"]) ?></td>
    </tr>
<?php endforeach; ?>

</table>

<h2>Average Score: <?= number_format($avg, 2) ?></h2>

<!-- Simple Form -->
<h2>Add New User</h2>
<form method="POST">
    Name: <input type="text" name="name"><br><br>
    Age: <input type="number" name="age"><br><br>
    Score: <input type="number" name="score"><br><br>
    <button type="submit">Submit</button>
</form>

<?php
// ---------------------------
// FORM HANDLING
// ---------------------------

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $name  = $_POST["name"] ?? "";
    $age   = (int) ($_POST["age"] ?? 0);
    $score = (int) ($_POST["score"] ?? 0);

    if ($name !== "" && $age > 0) {
        echo "<h3>New User Submitted:</h3>";
        echo "<p>Name: " . htmlspecialchars($name) . "</p>";
        echo "<p>Age: $age</p>";
        echo "<p>Score: $score</p>";
        echo "<p>Grade: " . gradeFromScore($score) . "</p>";
    } else {
        echo "<p style='color:red;'>Invalid input!</p>";
    }
}
?>

</body>
</html>