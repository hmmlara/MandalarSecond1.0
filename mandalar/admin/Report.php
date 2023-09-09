<?php
include_once "layouts/header.php"
    ?>
<div>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1 class="header">Toal Posts in Each Category</h1>
                <canvas id="BarChart"></canvas>

            </div>
            <div class="col-md-6">
            <h1 class="header">Toal  Posts in Each Sub Category</h1>

            <canvas id="SubChart2"></canvas>
            </div>
        </div>
        <div class="row">

            <div class="col-md-6">
                <h2>Pie chart of sold posts in each category</h2>
            <canvas id="PieChart"></canvas>

            </div>
            <div class="col-md-6">
                <h2>Pie chart of sold posts in each Sub category</h2>
            <canvas id="PieChart2"></canvas>
                
            </div>
        </div>
        <div class="row">
            <h2>line chart in each day</h2>
            <canvas id="LineChart"></canvas>

        </div>
    </div>

</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="js/jquery-3.7.0.min.js"></script>
<script src="js/Report.js"></script>
</body>

</html>