<script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script> 
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script> 
<script src="<?php echo base_url('js/scripts.js') ?>"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script> 
<script src="<?php echo base_url('assets/demo/chart-area-demo.js') ?>"></script> 
<script src="<?php echo base_url('assets/demo/chart-bar-demo.js') ?>"></script> 
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script> 
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script> 
<script src="<?php echo base_url('assets/demo/datatables-demo.js') ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>

<script> $(document).ready(function() 
{ 
	$('table.display').DataTable(); 
}); 
</script>

<script> 
	function startCalc() 
	{ 
		interval = setInterval("calc()", 1); 
	} 

	function calc()
	{ 
		one = document.autoSumForm.Uang_Pembayaran.value; 
		document.autoSumForm.Kembalian.value = one - <?= $this->cartt->total(); ?>; 
	} 
	function stopCalc() { clearInterval(interval); } 
</script>

<script type="text/javascript"> 
	$(document).ready(function() { 
		$('.add_cartt').click(function() { 
			var product_id = $(this).data("productid"); 
			var product_name = $(this).data("productname"); 
			var product_price = document.getElementById("product_price" + product_id).value;
			var quantity = $('#' + product_id).val(); 
			$.ajax({ 
				url: "<?php echo site_url('admin/pembelian/add_to_cartt'); ?>", 
				method: "POST", data: { 
					product_id: product_id, 
					product_name: product_name, 
					product_price: product_price, 
					quantity: quantity 
				}, 
				success: function(data) { 
					$('#detail_cartt').html(data); 
				} 
			}); 
		});

		$('#detail_cartt').load("<?php echo site_url('admin/pembelian/load_cartt'); ?>");

		$(document).on('click', '.remove_cartt', function() { 
			var row_id = $(this).attr("id"); 
			$.ajax({ 
				url: "<?php echo site_url('admin/pembelian/delete_cartt'); ?>", 
				method: "POST", 
				data: { 
					row_id: row_id 
				}, 
				success: function(data) { 
					$('#detail_cartt').html(data); 
				} 
			}); 
		});
	});
</script>

<script>
	var table = document.getElementById('table');
	for (var i = 0; i < table.rows.length; i++) {
		table.rows[i].onclick = function() {
			rIndex = this.rowIndex;
			document.getElementById('name').value = this.cells[0].innerHTML;
			document.getElementById('supplier_id').value = this.cells[1].innerHTML;
			$('#showSupplier').modal('hide');
		};
	}
</script>

<script>
	$(document).ready(function() {
		$('.process_payment').click(function() {
			var kode_beli = $(this).data("kode_beli");
			var supplier = document.getElementById('supplier_id').value;
			$.ajax({
				url: "<?php echo site_url('admin/pembelian/add_pembelian'); ?>",
				method: "POST",
				data: {
					kode_beli: kode_beli,
					supplier: supplier
				},
				success: function(data) {
					$('#name').html(data);
				}
			});
		});
	});
</script>

<!-- Grafik Garis pembelian  Bulan Ini-->

<script>
$(function() {
Chart.defaults.global.defaultFontFamily = 'Segoe UI'; // Mengatur default seluruh font (style) pada chart
Chart.defaults.global.defaultFontSize = 14; // Mengatur default seluruh size font pada chart
//Get the Line chart canvas
var cData = JSON.parse(`<?php echo $chart_data2; ?>`); // JSON.parse = fungsi untuk mengurai data menjadi objek JavaScript
var ctx = $("#pmbLines"); // Target canvas id dari v_chart.php
//Line chart data
var data = {
labels: cData.label_tanggal,
datasets: [{
label: 'Buku Terjual',
data: cData.data_jml2,

 lineTension: 0.3, // Mengatur tingkat ketegangan garis, jika di set ke 0 maka garis semakin lurus.
borderWidth: 3, // Mengatur lebar garis (pixels)
backgroundColor: "rgba(2,117,216,0.2)", // Mengatur warna backgroun d pada isi grafik
borderColor: "rgba(2,117,216,1)", // Mengatur warna garis
pointStyle: 'circle', // Mengatur style point (triangle, star, cros s, dash, rect, rectRounded, etc)
pointRadius: 3, // Mengatur besarnya point pada garis
pointBackgroundColor: "rgba(2,117,216,1)", // Mengatur warna point
pointBorderColor: "rgba(255,255,255,0.8)", // Mengatur warna border point
pointHoverRadius: 5, // Mengatur besarnya point pada garis saat dis entuh pointer mouse
pointHoverBackgroundColor: "rgba(2,117,216,1)", // Mengatur warna b ackground point saat disentuh pointer mouse
pointHitRadius: 50, // Mengatur radius hit point di garis saat dis entuh pointer mouse
pointBorderWidth: 2, // Mengatur besar border untuk point
}]
};

 //options
var options = {
responsive: true,
title: {
display: true,
position: "top",
text: cData.label_bulan,
fontSize: 18,
fontColor: "#111"
},
legend: {
display: true,
position: "right",
labels: {
fontColor: "#333",
fontSize: 16,

 }
},
scales: {
xAxes: [{
time: {
unit: 'month',
},
gridLines: {
display: false
},
scaleLabel: {
display: true,
fontStyle: 'bold',
labelString: 'BULAN'
}
}],
yAxes: [{
ticks: {
min: 0,
max: 30,
maxTicksLimit: 15
},
gridLines: {
color: "rgba(0, 0, 0, .150)",
},
scaleLabel: {
display: true,
fontStyle: 'bold',
labelString: 'JUMLAH PEMBELIAN'
}
}],
},
};

 //Create Line Chart class object
 var chart2 = new Chart(ctx, {
type: "line", // Mengatur tipe chart yang digunakan
data: data,
options: options
});
});
</script>

<!-- Grafik Garis pembelian -->
<script>
	$(function()
	{
 Chart.defaults.global.defaultFontFamily = 'Segoe UI'; // Mengatur default s eluruh font (style) pada chart
 Chart.defaults.global.defaultFontSize = 14; // Mengatur default seluruh siz e font pada chart

 //Get the Line chart canvas
 var cData = JSON.parse(`<?php echo $chart_data; ?>`); // JSON.parse = fungs i untuk mengurai data menjadi objek JavaScript
 var ctx = $("#pmbLine"); // Target canvas id dari v_chartt.php

 //Line chart data
 var data = {
 	labels: cData.label_bulan,
 	datasets: [{
 		label: 'Buku Terjual',
 		data: cData.data_jml,
 lineTension: 0.3, // Mengatur tingkat ketegangan garis, jika di set ke 0 maka garis semakin lurus.
 borderWidth: 3, // Mengatur lebar garis (pixels)
 backgroundColor: "rgba(2,117,216,0.2)", // Mengatur warna backgroun d pada isi grafik
 borderColor: "rgba(2,117,216,1)", // Mengatur warna garis
 pointStyle: 'circle', // Mengatur style point (triangle, star, cros s, dash, rect, rectRounded,etc)
 pointRadius: 3, // Mengatur besarnya point pada garis
 pointBackgroundColor: "rgba(2,117,216,1)", // Mengatur warna point
 pointBorderColor: "rgba(255,255,255,0.8)", // Mengatur warna border point
 pointHoverRadius: 5, // Mengatur besarnya point pada garis saat dis entuh pointer mouse
 pointHoverBackgroundColor: "rgba(2,117,216,1)", // Mengatur warna b ackground point saat disentuh pointer mouse
 pointHitRadius: 50, // Mengatur radius hit point di garis saat dis entuh pointer mouse
 pointBorderWidth: 2, // Mengatur besar border untuk point
}]
};

 //options
 var options = {
 	responsive: true,
 	title: {
 		display: true,
 		position: "top",
 		text: "Grafik pembelian Tahun " + cData.label_tahun,
 		fontSize: 18,
 		fontColor: "#111"
 	},
 	legend: {
 		display: true,
 		position: "right",
 		labels: {
 			fontColor: "#333",
 			fontSize: 16,

 		}
 	},
 	scales: {
 		xAxes: [{
 			time: {
 				unit: 'month',
 			},
 			gridLines: {
 				display: false
 			},
 			scaleLabel: {
 				display: true,
 				fontStyle: 'bold',
 				labelString: 'BULAN'
 			}
 		}],
 		yAxes: [{
 			ticks: {
 				min: 0,
 				max: 30,
 				maxTicksLimit: 15
 			},
 			gridLines: {
 				color: "rgba(0, 0, 0, .150)",
 			},
 			scaleLabel: {
 				display: true,
 				fontStyle: 'bold',
 				labelString: 'JUMLAH pembelian'
 			}
 		}],
 	},
 };
 //Create Line Chart class object
 var chart1 = new Chart(ctx, {
 type: "line", // Mengatur tipe chart yang digunakan
 data: data,
 options: options
});
});
</script>

<!-- Grafik Batang pembelian -->
<script>
	$(function() {
		Chart.defaults.global.defaultFontFamily = 'Segoe UI';
		Chart.defaults.global.defaultFontSize = 14;

 //get the bar chart canvas
 var cData = JSON.parse(`<?php echo $chart_data; ?>`);
 var ctx = $("#pmbBar");

 //bar chart data
 var data = {
 	labels: cData.label_bulan,
 	datasets: [{
 		label: 'Buku Terjual',
 		data: cData.data_jml,
 backgroundColor: [ // Warna background pada batang grafik
 "#DEB887",
 "#A9A9A9",
 "#DC143C",
 "#F4A460",
 "#2E8B57",
 "#1D7A46",
 "#CDA776",
 "#CDA776",
 "#989898",
 "#CB252B",
 "#E39371",
 ],
 borderColor: [ // Warna border pada batang grafik
 "#CDA776",
 "#989898",
 "#CB252B",
 "#E39371",
 "#1D7A46",
 "#F4A460",
 "#CDA776",
 "#DEB887",
 "#A9A9A9",
 "#DC143C",
 "#F4A460",
 "#2E8B57", ],
 borderWidth: [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1] // Lebar border pada batang grafik
}]
}
//options
var options = {
	responsive: true,
	title: {
		display: true,
		position: "top",
		text: "Grafik pembelian Tahun " + cData.label_tahun,
		fontSize: 18,
		fontColor: "#111"
	},
	legend: {
		display: false,
		position: "right",
		labels: {
			fontColor: "#333",
			fontSize: 16
		}
	},
	scales: {
		xAxes: [{
			time: {
				unit: 'month'
			},
			gridLines: {
				display: false
			},
			scaleLabel: {
				display: true,
				fontStyle: 'bold',
				labelString: 'Bulan'
			}
		}],
		yAxes: [{
			ticks: {
				min: 0,
				max: 30,
				maxTicksLimit: 10
			},
			gridLines: {
				color: "rgba(0, 0, 0, .150)",
			},
			scaleLabel: {
				display: true,
				fontStyle: 'bold',
				labelString: 'Jumlah pembelian'
			}
		}],
	}, 

};

 //Create Bar Chart class object
 var chart1 = new Chart(ctx, {
 	type: "bar",
 	data: data,
 	options: options
 });
});
</script>

<!-- Download as Image - Line Chart -->
<script>
 function downloadLines() {
     var download = document.getElementById("download0");
     var image = document.getElementById("pmbLines").toDataURL("image/jpg")
     .replace("image/jpg", "image/octet-stream");
     download.setAttribute("href", image);
 }
</script>

<script>
 function downloadLine() {
     var download = document.getElementById("download");
     var image = document.getElementById("pmbLine").toDataURL("image/jpg")
     .replace("image/jpg", "image/octet-stream");
     download.setAttribute("href", image);
 }
</script>
<!-- Download as Image - Bar Chart -->
<script>
 function downloadBar() {
     var download = document.getElementById("download1");
     var image = document.getElementById("pmbBar").toDataURL("image/jpg", 1.0)
     .replace("image/jpg", "image/octet-stream");
     download.setAttribute("href", image);
 }
</script>

<!-- Download as PDF - Line Chart -->
<script type="text/javascript">
    function LinePDFS()
    {
        html2canvas(document.getElementById("pmbLines"), {
            onrendered: function(canvas) {
 var img = canvas.toDataURL("image/png", 1.0); // mengkonversi grafik di canvas menjadi image (png)
 var doc = new jsPDF('p', 'pt', 'a4'); // membuat dokumen pdf dengan jsPDF('orientationp = portrait', 'size unit', 'format kertas')
 // Mengatur size image agar sesuai format kertas a4[595.28,841.89] dalam size unit points (pt)
 var lebarKonten = canvas.width;
 var tinggiKonten = canvas.height;
 var tinggiPage = lebarKonten / 592.28 * 841.89;
 var leftHeight = tinggiKonten;
 var position = 0;
 var imgWidth = 595.28;
 var imgHeight = 592.28 / lebarKonten * tinggiKonten;
 if (leftHeight < tinggiPage) {
    doc.addImage(img, 'PNG', 0, 0, imgWidth, imgHeight);
} else {
    while (leftHeight > 0) {
        doc.addImage(img, 'PNG', 0, position, imgWidth, imgHeight)
        leftHeight -= tinggiPage;
        position -= 841.89;
 //Avoid adding blank pages
 if (leftHeight > 0) {
    pdf.addPage();
}
}
}
 doc.save('LineChart_pembelian.pdf'); //Download the rendered PDF.
}
});
    }
</script>

<!-- Download as PDF - Line Chart -->
<script type="text/javascript">
    function LinePDF()
    {
        html2canvas(document.getElementById("pmbLine"), {
            onrendered: function(canvas) {
 var img = canvas.toDataURL("image/png", 1.0); // mengkonversi grafik di canvas menjadi image (png)
 var doc = new jsPDF('p', 'pt', 'a4'); // membuat dokumen pdf dengan jsPDF('orientationp = portrait', 'size unit', 'format kertas')
 // Mengatur size image agar sesuai format kertas a4[595.28,841.89] dalam size unit points (pt)
 var lebarKonten = canvas.width;
 var tinggiKonten = canvas.height;
 var tinggiPage = lebarKonten / 592.28 * 841.89;
 var leftHeight = tinggiKonten;
 var position = 0;
 var imgWidth = 595.28;
 var imgHeight = 592.28 / lebarKonten * tinggiKonten;
 if (leftHeight < tinggiPage) {
    doc.addImage(img, 'PNG', 0, 0, imgWidth, imgHeight);
} else {
    while (leftHeight > 0) {
        doc.addImage(img, 'PNG', 0, position, imgWidth, imgHeight)
        leftHeight -= tinggiPage;
        position -= 841.89;
 //Avoid adding blank pages
 if (leftHeight > 0) {
    pdf.addPage();
}
}
}
 doc.save('LineChart_pembelian.pdf'); //Download the rendered PDF.
}
});
    }
</script>

<!-- Download as PDF - Bar Chart -->
<script type="text/javascript">
    function BarPDF()
    {
        html2canvas(document.getElementById("pmbBar"), {
            onrendered: function(canvas) {
 var img = canvas.toDataURL("image/png", 1.0); // mengkonversi grafik di canvas menjadi image (png)
 var doc = new jsPDF('p', 'pt', 'a4'); // membuat dokumen pdf dengan jsPDF('orientationp = portrait', 'size unit', 'format kertas')
 // Mengatur size image agar sesuai format kertas a4[595.28,841.89] dalam size unit points (pt)
 var lebarKonten = canvas.width;
 var tinggiKonten = canvas.height;
 var tinggiPage = lebarKonten / 592.28 * 841.89;
 var leftHeight = tinggiKonten;
 var position = 0;
 var imgWidth = 595.28;
 var imgHeight = 592.28 / lebarKonten * tinggiKonten;
 if (leftHeight < tinggiPage) {
    doc.addImage(img, 'PNG', 0, 0, imgWidth, imgHeight);
} else {
    while (leftHeight > 0) {
        doc.addImage(img, 'PNG', 0, position, imgWidth, imgHeight)
        leftHeight -= tinggiPage;
        position -= 841.89;
 //Avoid adding blank pages
 if (leftHeight > 0) {
    pdf.addPage();
}
}
}
 doc.save('BarChart_pembelian.pdf'); //Download the rendered PDF.
}
});
    }
</script>