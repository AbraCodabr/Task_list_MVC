<?php
if ($check_tasks->num_rows == 0):
    echo '<p>' . "У вас нет введеных задач" . '</p>';
endif;
?>

<!-- Цикл по ответу из БД -->
<? foreach ($check_tasks as $array): ?>

<div class="content">
    <!-- Вывод круга в зависимости от статуса -->
    <?php
        if ($array['status']) {
            echo '<div class="circle_green"></div>';
        } else {
            echo '<div class="circle_red"></div>';
        }
    ?>
    <!-- Текст заметки -->
    <p class="text"><?php echo $array['description'] ?></p>

    <!-- Вывод кнопок. Текст в кнопке меняется в зависимости от статуса -->
    <div class="button">
        <form action="/profile/<? echo ($array['status']) ? 'ready/': 'unready/';?>" method="post">
            <button class="button_content" name="<? echo $array['id'] ?>" type="">
                <?php 
                    if ($array['status']) {
                        echo 'UNREADY';
                    } else {
                        echo 'READY';
                    }
                ?>
            </button>
        </form>

        <!-- Удаление заметки -->
        <form action="/profile/delete/" method="post">
            <button class="button_content" name="<? echo $array['id'] ?>" type="">DELETE</button>
        </form> 

    </div>
</div>

<?php endforeach ?>