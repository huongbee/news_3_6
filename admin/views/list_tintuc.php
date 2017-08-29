
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<?php
$tintuc = $data['tintuc'];
?>


<table id="example" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>STT</th>
            <th>Tiêu đề</th>
            <th>Nội dung tóm tắt</th>
            <th>Hình</th>
            <th>Nổi bật</th>
            <th>Số lượt xem</th>
            <th>Sửa/Xóa</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $stt = 1;
        foreach($tintuc as $tin):
        ?>
        <tr>
            <td><?=$stt;?></td>
            <td><?=$tin->title?></td>
            <td><?=$tin->summary?></td>
            <td>
                <img src="../public/images/tintuc/<?=$tin->image?>" width="120px">
            </td>
            <td style="text-align: center;">
                <input type="checkbox" <?=$tin->noibat==1 ? 'checked' : '' ?>>
            </td>
            <td style="text-align: center;"><?=$tin->views?></td>
            <td>
              <a href="#"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a>
                <a href="#" class="delete" dataAlias=""  data-toggle="modal" data-target="#myModal"><i class="fa fa-trash-o fa-2x" aria-hidden="true"></i></a>  
            </td>
        </tr>
        <?php 
        $stt++;
        endforeach 
        ?>
    </tbody>
</table>
