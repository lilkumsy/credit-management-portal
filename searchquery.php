<div class="mu-gallery-top">
    <?php include 'connection.php'; ?>
	<center>
    <form method='post' id="queryForm">
        <table>
            <tr>
                <td>APPLICATION TRACKING NUMBER</td>
                <td><input type="text" id='appid' name="appid" required pattern="[A-Za-z0-9]+" /></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="submit" value="Make Query"></td>
            </tr>
        </table>
    </form>

    <table border="1" cellpadding="5" id="resultTable" style="display: none;">
        <tr>
            <th>Application Tracking Number</th>
            <th>Amount Requested</th>
            <th>Status</th>
        </tr>

        <?php
        include 'connection.php';
        if (isset($_POST['submit'])) {
            $appidd = mysqli_real_escape_string($conn, $_POST['appid']);
            $query = "SELECT * FROM application WHERE appid='$appidd'";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                echo '<td>' . $row["appid"] . '</td>';
                echo '<td>' . $row["loanAmount"] . '</td>';
                echo '<td>' . $row["rid"] . '</td>';
                echo '</tr>';
            }

            // Show the table after the query is executed
            echo '<script>document.getElementById("resultTable").style.display = "table";</script>';
        }
        ?>
    </table>
	</center>
</div>
