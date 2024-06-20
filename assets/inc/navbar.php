<?php
$aid = $_SESSION['pass_id'];
$ret = "SELECT * FROM orrs_passenger WHERE pass_id=?";
$stmt = $mysqli->prepare($ret);
$stmt->bind_param('i', $aid);
$stmt->execute();
$res = $stmt->get_result();

while ($row = $res->fetch_object()) {
?>
    <nav class="navbar navbar-expand fixed-top be-top-header">
        <div class="container-fluid">
            <div class="page-title"><span>
			<center>
			<?php
                    $welcome_string = "Hello";
                    $numeric_date = date("G");
                    if ($numeric_date >= 0 && $numeric_date <= 11)
                        $welcome_string = "Good Morning!";
                    else if ($numeric_date >= 12 && $numeric_date <= 17)
                        $welcome_string = "Good Afternoon!";
                    else if ($numeric_date >= 18 && $numeric_date <= 23)
                        $welcome_string = "Good Evening!";
                    echo "$welcome_string";
                    ?>
			</center>
			</div>
        </div>
    </nav>
<?php } ?>
