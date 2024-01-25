<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    // Load google charts
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    // Draw the chart and set the chart values
    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Danh mục', 'Số lượng sản phẩm'],
            <?php
            if(!empty($tk)){
                foreach($tk as $temp){
                    echo "['" . $temp['ten_dm'] . "', " . $temp['countsp'] . "],";
                }
            }
            ?>
        ]);

        // Optional; add a title and set the width and height of the chart
        var options = {'title':'Thống kê sản phẩm theo danh mục', 'width':1100, 'height':800};

        // Display the chart inside the <div> element with id="piechart"
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
    }
</script>

<div class="row headerdm mb">
    <h1>BIỂU ĐỒ THỐNG KÊ</h1>
</div>


<div id="piechart"></div>
