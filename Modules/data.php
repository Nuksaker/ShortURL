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
        $QR_Code = "https://api.qrserver.com/v1/create-qr-code/?size=45x45&data=" . $rowURL['full_url'];;
    ?>
        <tr>
            <td class="text-center"><?php echo $key; ?></td>
            <td class="text-start ps-5">
                <span><?php echo $rowURL['full_url']; ?></span>
            </td>
            <td class="text-center">
                <span><?php echo $rowURL['click']; ?></span>
            </td>
            <td class="text-center">
                <span ><?php echo $rowURL['history']; ?></span>
            </td>
            <td class="text-start">
                <a href="<?php echo 'url?u=' . $rowURL['short_url']; ?>" target="_blank" id="shortURL" data-id="Copy_<?php echo $key ?>"><?php echo $servername . 'url?u=' . $rowURL['short_url']; ?></a>
            </td>
            <td class="text-center"> 
                <img src="<?php echo $QR_Code ?>" title="Link to Website" />
            </td>
            <td class="text-center"> 
                <button class="btn bg-danger text-white delete"  data-delete="<?php echo $rowURL['id']?>">ลบ</button>
            </td>
        </tr>
<?php
    }
}
?>