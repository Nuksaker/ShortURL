<?php
// require_once '../Config/db.php';

$data = $conn->prepare("SELECT * FROM `url` ORDER BY `url`.`id` ASC");
$data->execute();
$rowData = $data->fetchAll();
$servername = $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
if (empty($rowData)) {
?>
    <tr>
        <td colspan="5">ยังไม่มีข้อมูล</td>
    </tr>
    <?php
} else {
    foreach ($rowData as $key => $rowURL) {
        $key++;
        $QR_Code = "https://chart.googleapis.com/chart?chs=100x100&cht=qr&chl=".'url?u='.$rowURL['full_url'];
    ?>
        <tr>
            <td><?php echo $key; ?></td>
            <td>
                <span><?php echo $rowURL['full_url']; ?></span>
            </td>
            <td>
                <span><?php echo $rowURL['click']; ?></span>
            </td>
            <td>
                <a href="<?php echo 'url?u='.$rowURL['short_url']; ?>" target="_blank" id="clickURL"><?php echo $servername.'url?u='.$rowURL['short_url']; ?></a>
            </td>
            <td>
                <img src="<?php echo $QR_Code ?>" title="Link to my Website" />
            </td>
        </tr>
<?php
    }
}
