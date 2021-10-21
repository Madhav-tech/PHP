<div class="row mt-3">
    <div class="col-lg-3 col-md-6 ">
        <div class="card bg-primary mb-3">
            <div class="card-heading">
                <div class="row text-light p-2">
                    <div class="col-lg-3 h1">
                        <svg xmlns=" http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-file-earmark-text" viewBox="0 0 16 16">
                            <path d="M5.5 7a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5z" />
                            <path d="M9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.5L9.5 0zm0 1v2A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z" />
                        </svg>
                    </div>
                    <div class="col-lg-9 text-end ">
                        <div class='h1'>
                            <?php
                            $query = "Select COUNT(post_id) as count from posts";
                            $result = mysqli_query($connection, $query);
                            $post_count = mysqli_fetch_assoc($result);
                            echo $post_count['count'];
                            ?>

                        </div>
                        <div><strong>Posts</strong></div>
                    </div>
                </div>
            </div>
            <a href="post.php" class="btn p-0">
                <div class="card-footer bg-light">
                    <span class="pull-left ">View Details</span>
                    <span class="text-end"><i class="bi bi-arrow-right-circle-fill"></i></span>

                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="card bg-success mb-3">
            <div class="card-heading">
                <div class="row text-light p-2">
                    <div class="col-lg-3 h1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-chat" viewBox="0 0 16 16">
                            <path d="M2.678 11.894a1 1 0 0 1 .287.801 10.97 10.97 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8.06 8.06 0 0 0 8 14c3.996 0 7-2.807 7-6 0-3.192-3.004-6-7-6S1 4.808 1 8c0 1.468.617 2.83 1.678 3.894zm-.493 3.905a21.682 21.682 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a9.68 9.68 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105z" />
                        </svg>
                    </div>
                    <div class="col-lg-9 text-end">
                        <div class='h1'>
                            <?php
                            $query = "Select COUNT(comment_id) as count from comments";
                            $result = mysqli_query($connection, $query);
                            $count = mysqli_fetch_assoc($result);
                            echo $count['count'];
                            ?>
                        </div>
                        <div><strong>Comments</strong></div>
                    </div>
                </div>
            </div>
            <a href="comments.php" class="btn p-0">
                <div class="card-footer bg-light ">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="bi bi-arrow-right-circle-fill"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="card bg-warning mb-3">
            <div class="card-heading">
                <div class="row text-light p-2">
                    <div class="col-lg-3 h1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                        </svg>
                    </div>
                    <div class="col-lg-9 text-end">
                        <div class='h1'>
                            <?php
                            $query = "Select COUNT(user_id) as count from users";
                            $result = mysqli_query($connection, $query);
                            $count = mysqli_fetch_assoc($result);
                            echo $count['count'];
                            ?>
                        </div>
                        <div><strong> Users</strong></div>
                    </div>
                </div>
            </div>
            <a href="users.php" class="btn p-0">
                <div class="card-footer bg-light">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="bi bi-arrow-right-circle-fill"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="card bg-danger mb-3">
            <div class="card-heading text-light p-2">
                <div class="row">
                    <div class="col-lg-3 h1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-list-ul" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm-3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                        </svg>
                    </div>
                    <div class="col-lg-9 text-end">
                        <div class='h1'>
                            <?php
                            $query = "Select COUNT(cat_id) as count from categories";
                            $result = mysqli_query($connection, $query);
                            $count = mysqli_fetch_assoc($result);
                            echo $count['count'];
                            ?>
                        </div>
                        <div><strong>Categories</strong></div>
                    </div>
                </div>
            </div>
            <a href="categories.php" class="btn p-0">
                <div class="card-footer bg-light">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="bi bi-arrow-right-circle-fill"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>

<div class="row ">
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['bar']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Data', 'Count'],
                ['post', 1000],
                ['Comment', 1900],
                ['Users', 1900],
                ['Categories', 1900]

            ]);

            var options = {
                chart: {
                    title: 'Company Performance',
                    subtitle: 'Sales, Expenses, and Profit: 2014-2017',
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