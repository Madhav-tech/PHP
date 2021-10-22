<div class="row ">
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['bar']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Data', 'Count'],
                <?php
                $element_text = ['post', 'Comment', 'Users', 'Categories'];
                $element_count = [$post_count, $comments_count, $users_count, $cat_count];

                for ($i = 0; $i < 4; $i++) {
                    echo "['{$element_text[$i]}' " . "," . "{$element_count[$i]}], ";
                }
                ?>

            ]);

            var options = {
                chart: {
                    title: '',
                    subtitle: '',
                }
            };

            var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

            chart.draw(data, google.charts.Bar.convertOptions(options));
        }
    </script>

    <div class="p-3 bg-light rounded">
        <div id="columnchart_material" style="width: 100%; height: 500px;"></div>
    </div>

</div>