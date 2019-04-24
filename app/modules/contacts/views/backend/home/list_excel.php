<table style="font-family:'Times New Roman'; font-size:14pt" width="100%" border="1"
       class="table table-striped table-bordered">

    <thead>
    <tr>
        <td colspan="7" style="font-weight: bold; font-size: 16px; text-align: center;"><h2>Danh sách đăng ký tuyển sinh</h2></td>
    </tr>
    <tr>
        <td colspan="7"></td>
    </tr>
    </thead>

</table>

<table style="font-family:'Times New Roman'; font-size:12pt" width="100%" border="1"
       class="table table-striped table-bordered">
    <tbody>
    <tr style="font-weight:bold; text-align:center">
        <td width="3%">STT</td>
        <td width="20%">Họ và tên</td>
        <td width="7%">Ngày sinh</td>
        <td width="20%">Nghề đào tạo</td>
        <td width="20%">Hệ đào tạo</td>
        <td width="20%">Ngày đăng ký</td>

    </tr>
    <?php $stt = 1; foreach ($listsemail as $key => $v) { ?>
        <tr>
            <td align="center" width="3%"><?php echo $stt++; ?></td>
            <td align="center" width="20%"><?php echo $v['fullname']; ?></td>
            <td align="center" width="7%"><?php echo $v['ngaysinh']; ?></td>
            <td align="center" width="20%"><?php echo $v['nganhdangky']; ?></td>
            <td align="center" width="20%"><?php echo $v['hedaotao']; ?></td>
            <td align="center" width="20%"><?php echo $v['created']; ?></td>
        </tr>
        <?php } ?>
    </tbody>
</table>

