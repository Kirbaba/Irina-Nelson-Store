<div class="admin-wrap">
    <form action="" method="post">
        <p><b>Выберите изображение:</b><br>
        <p><img class="custom_media_image" src="" alt="" style="width: 80px;"></p>
        <p><button class="custom_media_upload">Выбрать изображение</button></p>
        <p><input id="image" class="custom_media_url" type="text" name="attachment_url" value=""></p>
        <p><button class="save_slider">Добавить</button></p>
    </form>

    <hr/>

    <table class="table table-responsive">
        <captiom>Существующие слайды</captiom>
        <tr>
            <th>ID</th>
            <th>Изображение</th>
            <th>Удалить</th>
        </tr>
        <?php
        foreach($slids as $s){ ?>
            <tr>
                <td><?= $s['id'] ?></td>
                <td><img src="<?= $s['link'] ?>" alt="" width="150px"/></td>
                <td><a href="/wp-admin/admin.php?page=slider_top&del=<?= $s['id'] ?>">Удалить</a></td>
            </tr>
        <?php
        }
        ?>
    </table>
</div>
