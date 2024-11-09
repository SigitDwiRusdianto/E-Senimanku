@extends('layouts.sidebar')

@section('content')
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12">
                <!-- small box -->
                <div class="small-box bg-info" style="height: 133px">
                    <div class="inner">
                        <h3><i class="fas fa-mobile-alt"></i> &nbsp;{{$total_mobile}}</h3>

                        <p>Total Pesanan Mobile Design</p>
                    </div>

                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-md-4 col-sm-12">
                <!-- small box -->
                <div class="small-box bg-secondary" style="height: 133px">
                    <div class="inner">
                        <h3><i class="fas fa-globe"></i> &nbsp;{{$total_logo}}</h3>

                        <p>Total Pesanan Logo </p>
                    </div>

                </div>
            </div>
            <!-- ./col -->
            <!-- ./col -->
            <div class="col-lg-4 col-md-4 col-sm-12">
                <!-- small box -->
                <div class="small-box bg-secondary" style="height: 133px">
                    <div class="inner">
                        <h3><i class="fas fa-laptop"></i> &nbsp;{{$total_website}}</h3>

                        <p>Total Pesanan Website </p>
                    </div>

                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-md-4 col-sm-12">
                <!-- small box -->
                <div class="small-box bg-danger" style="height: 133px">
                    <div class="inner">
                        <h3>Rp. {{number_format($total_penjualan, 0, ",", ".")}}</h3>
                        <p>Total Penjualan</p>
                    </div>

                </div>
            </div>
        </div>
        <div class="chart">
            <div style="min-height: 230px; height: 300px; max-height: 300px; max-width: 100%; background-color:#ffff;">
                <canvas id="myChart2" style="min-height: 230px; height: 300px; max-height: 300px; max-width: 100%; background-color:#ffff;"></canvas>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<script>
    var ctx = document.getElementById("myChart2").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [
                <?php
                $data = null;

                if (count($penjualan_mobile) >= count($penjualan_logo) && count($penjualan_mobile) >= count($penjualan_website)) {
                    $data = $penjualan_mobile;
                } elseif (count($penjualan_logo) >= count($penjualan_mobile) && count($penjualan_logo) >= count($penjualan_website)) {
                    $data = $penjualan_logo;
                } else {
                    $data = $penjualan_website;
                }
                
                foreach ($data as $bulan) {
                    $date = null;
                    if ($bulan->bulan == 1) {
                        $date = "Januari";
                    } else if ($bulan->bulan == 2) {
                        $date = "February";
                    } else if ($bulan->bulan == 3) {
                        $date = "Maret";
                    } else if ($bulan->bulan == 4) {
                        $date = "April";
                    } else if ($bulan->bulan == 5) {
                        $date = "Mei";
                    } else if ($bulan->bulan == 6) {
                        $date = "Juni";
                    } else if ($bulan->bulan == 7) {
                        $date = "Juli";
                    } else if ($bulan->bulan == 8) {
                        $date = "Agustus";
                    } else if ($bulan->bulan == 9) {
                        $date = "September";
                    } else if ($bulan->bulan == 10) {
                        $date = "Oktober";
                    } else if ($bulan->bulan == 11) {
                        $date = "November";
                    } else if ($bulan->bulan == 12) {
                        $date = "Desember";
                    }
                ?> '<?= $date ?> ',
                <?php } ?>
            ],
            datasets: [{
                label: 'Total Penjualan Mobile',
                data: [<?php foreach ($penjualan_mobile as $dm) { ?> <?= $dm->mobile  ?>,
                    <?php } ?>
                ],
                backgroundColor: [
                    'rgba(60,141,188,1)'
                ],
                borderColor: [
                    'rgba(60,141,188, 1)',
                ],
                borderWidth: 1
            }, {
                label: 'Total Penjualan Logo',
                data: [<?php foreach ($penjualan_logo as $dmn) { ?> <?= $dmn->logo ?>,
                    <?php } ?>
                ],
                backgroundColor: [
                    'rgba(214, 19, 76, 1)'
                ],
                borderColor: [
                    'rgba(214, 19, 76, 1)'
                ],
                borderWidth: 1
            },{
                label: 'Total Penjualan Website',
                data: [<?php foreach ($penjualan_website as $dmn) { ?> <?= $dmn->website ?>,
                    <?php } ?>
                ],
                backgroundColor: [
                    'rgba(210, 214, 222, 1)'
                ],
                borderColor: [
                    'rgba(210, 214, 222, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>
@endsection