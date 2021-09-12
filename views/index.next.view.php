<?php $title = "Planning Evenement" ?>
<?php require_once("includes/constants.php"); ?>
<?php require_once("partials/_header.php"); ?>
<div id="main">
    <?php
    $date = new Date();
    $year = date('Y');
    $events = $date->getEvents($year);
    $dates = $date->getAll($year);
    ?>
    <div class="periods">
        <!--Pour afficher l'année-->
        <div class="year"><?= $year; ?></div>
        <!--Pour afficher la liste des mois-->
        <div class="months">
            <ul>
                <?php foreach ($date->months as $id => $m): ?>
                    <li><a href="#" id="linkMonth<?= $id + 1; ?>"><?= utf8_encode(substr(utf8_decode($m), 0, 3)); ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="clear"></div>
        <?php $dates = current($dates); ?>
        <?php foreach ($dates as $m => $days): ?>
            <div class="month relative" id="month<?= $m; ?>">
                <table>
                    <thead>
                    <tr>
                        <!--Pour afficher les jours de la semaine-->
                        <?php foreach ($date->days as $d): ?>
                            <th><?= substr($d, 0, 3); ?></th>
                        <?php endforeach; ?>
                    </tr>
                    </thead>
                    <!--Pour parcourrir le tableau-->
                    <tbody>
                    <tr>
                        <?php $end = end($days);
                        foreach ($days as $d => $w): ?>
                        <?php $time = strtotime("$year-$m-$d"); ?>
                        <?php if ($d == 1 and $w != 1): ?>
                            <td colspan="<?= $w - 1; ?>" class="padding"></td>
                        <?php endif; ?>
                        <td <?php if ($time == strtotime(date("Y-m-d"))): ?> class="today" <?php endif; ?>>
                            <div class="relative">
                                <div class="day"><?= $d; ?></div>
                            </div>
                            <!--Afficher jour events-->
                            <div class="daytitle">
                                <?= $date->days[$w - 1]; ?> <?= $d; ?> <?= $date->months[$m - 1]; ?>
                            </div>
                            <!--Afficher les evènements-->
                            <ul class="events">
                                <?php if (isset($events[$time])):foreach ($events[$time] as $e): ?>
                                    <li><?= $e; ?></li>
                                <?php endforeach; endif; ?>
                            </ul>
                        </td>
                        <?php if ($w == 7): ?>
                    </tr>
                    <tr>
                        <?php endif; ?>
                        <?php endforeach; ?>
                        <?php if ($end != 7): ?>
                            <td colspan="<?= 7 - $end; ?>" class="padding"></td>
                        <?php endif; ?>
                    </tr>
                    </tbody>
                </table>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="clear"></div>
</div>
</div>
<script src="libraries/jquery/jquery-3.4.1.min.js"></script>
<script src="assets/js/_index.next.js"></script>
<?php require_once("partials/_footer.php"); ?>
