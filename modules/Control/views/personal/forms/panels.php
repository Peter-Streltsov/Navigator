<div class="row">
    <div class="col-xs-12 col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <b>
                    Научные показатели за <?= date('Y') ?> год:
                </b>
            </div>
            <div class="panel-body">
                <br>
                <b style="color: red;">
                    Индекс ПНРД за <?= date('Y') ?> год: <?= $indexes['articles'] ?>
                </b>
                (Средний индекс ПНРД - <b><?= $meanindex ?></b>)
                <br>
                <br>
                <b>
                    Публикаций в текущем году: <?= count($currentarticles) ?>
                </b>
                <br>
                <br>

                <table class="table">
                    <thead>
                    <th>Категория</th>
                    <th>Опубликовано</th>
                    <th>Индекс</th>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            Статьи
                        </td>
                        <td>
                            <?= count($currentarticles) ?>
                        </td>
                        <td>

                        </td>
                    </tr>
                    <tr>
                        <td>
                            Монографии
                        </td>
                        <td>

                        </td>
                        <td>

                        </td>
                    </tr>
                    <tr>
                        <td>
                            Участие в научных конференциях
                        </td>
                        <td>
                            0
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>