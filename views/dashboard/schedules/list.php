<?php ob_start() ?>
    <div class="container noto-sans fw-bold mb-5">
        <div class="row justify-content-center align-items-center">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Jour</th>
                        <th scope="col">Update</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $count=1;
                    foreach ($schedules as $schedule) {?>
                        <tr>
                            <td class="<?=($count % 2 != 0) ? 'bg-yellow' : ''?>" scope="row"><?=$schedule->week_day?></td>
                            <td class="<?=($count % 2 != 0) ? 'bg-yellow' : ''?>"><a href="index.php?page=dashboard/schedules/update&id=<?=$schedule->id_schedule?>"><i class="text-primary fa-xl fa-solid fa-pen-to-square"></i></a></td>
                        </tr>
                        <?php $count++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
<?php $main = ob_get_clean() ?>