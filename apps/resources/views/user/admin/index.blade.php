@extends("user.layout")

@section("content")


<div class="panel-header panel-header-lg">
	{{-- <canvas id="bigDashboardChart"></canvas> --}}
</div>
<div class="content">

	<div class="row">
		<div class="col-md-12">
			<div class="card  card-tasks">
				<div class="card-header ">
					<h5 class="card-category"></h5>
					<h4 class="card-title">Cetak Surat</h4>
				</div>
				<div class="card-body ">
					<!-- <div class="table-full-width table-responsive"> -->
						<table class="table table-hover datatable">
							<thead>
								<tr>
									<th width="15%">Tanggal</th>
									<th width="25%">Surat</th>
									<th width="25%">Pemohon</th>
									<th width="15%">Status</th>
									<th width="15%">Usia Surat (Hari)</th>
									<th width="5%">Cetak</th>
								</tr>
							</thead>
							<tbody>
								@foreach($permohonan_surat as $permohonan_surat)
									<tr>
										<td>
											{{ $permohonan_surat->created_at }}
										</td>
										<td class="text-left"><a href="{{ url($permohonan_surat->layanan_surat->kode_layanan."/".$permohonan_surat->id) }}" target="_blank">{{ $permohonan_surat->layanan_surat->judul }}</a> </td>
										<td>
											{{ $permohonan_surat->mahasiswa->nama }}
										</td>
										<td>
											{{ $permohonan_surat->status }}
										</td>
										<td>
											{{ usia_surat($permohonan_surat->created_at) }}
										</td>
										<td>
											@if($permohonan_surat->siap_cetak)
												<a href="{{ url($permohonan_surat->layanan_surat->kode_layanan."/".$permohonan_surat->id."/print") }}" class="btn btn-success btn-round btn-icon btn-icon-mini btn-neutral">
												<i class="now-ui-icons arrows-1_cloud-download-93"></i>
											</a>
											@else
												<button class="btn btn-success btn-round btn-icon btn-icon-mini btn-neutral" disabled=""><i class="now-ui-icons arrows-1_cloud-download-93"></i></button>
											@endif
											
										</td>
									</tr>
								@endforeach
							</tbody>
							<tfoot>
								<tr>
									<th></th>
									<th></th>
									<th></th>
									<th></th>
									<th></th>
									<th></th>
								</tr>
							</tfoot>
						</table>
						<!-- </div> -->
					</div>
					<div class="card-footer ">
						{{-- <hr> --}}
						{{-- <div class="stats">
							<button class="btn btn-success">Cetak (1 Surat)</button>
						</div> --}}
					</div>
			</div>
		</div>
		<div class="col-md-12">
			<div class="card  card-tasks">
				<div class="card-header ">
					<h5 class="card-category"></h5>
					{{-- <h4 class="card-title">Grafik Permohonan surat {{ date("Y") }}</h4> --}}
				</div>
				<div class="card-body " id="chart_grafik">
				</div>
				<div class="card-footer ">
						{{-- <hr> --}}
						{{-- <div class="stats">
							<button class="btn btn-success">Verifikasi (2 Surat)</button>
						</div> --}}
				</div>
			</div>
		</div>

		

	</div>
</div>


@endsection

@push("js")
<script type="text/javascript" src="{{ asset("/plugin/highchart/highcharts.js") }}"></script>
<script type="text/javascript" src="{{ asset("/plugin/highchart/exporting.js") }}"></script>
<script type="text/javascript" src="{{ asset("/plugin/highchart/export-data.js") }}"></script>

<script type="text/javascript">
	
Highcharts.chart('chart_grafik', {
    chart: {
        type: 'spline'
    },
    title: {
        text: 'Permohonan Surat'
    },
    subtitle: {
        text: 'Dari Januari s/d Desember {{ date("Y") }}'
    },
    xAxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    },
    yAxis: {
        title: {
            text: 'Jumlah Permohonan'
        }
    },
    plotOptions: {
        line: {
            dataLabels: {
                enabled: true
            },
            enableMouseTracking: true
        }
    },
    tooltip: {
        split: true
    }, 
    series: {!! $statistik !!}
});

Highcharts.chart('chart_status', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Monthly Average Rainfall'
    },
    subtitle: {
        text: 'Source: WorldClimate.com'
    },
    xAxis: {
        categories: [
            'Jan',
            'Feb',
            'Mar',
            'Apr',
            'May',
            'Jun',
            'Jul',
            'Aug',
            'Sep',
            'Oct',
            'Nov',
            'Dec'
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Rainfall (mm)'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Tokyo',
        data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]

    }, {
        name: 'New York',
        data: [83.6, 78.8, 98.5, 93.4, 106.0, 84.5, 105.0, 104.3, 91.2, 83.5, 106.6, 92.3]

    }, {
        name: 'London',
        data: [48.9, 38.8, 39.3, 41.4, 47.0, 48.3, 59.0, 59.6, 52.4, 65.2, 59.3, 51.2]

    }, {
        name: 'Berlin',
        data: [42.4, 33.2, 34.5, 39.7, 52.6, 75.5, 57.4, 60.4, 47.6, 39.1, 46.8, 51.1]

    }]
});
</script>
@endpush