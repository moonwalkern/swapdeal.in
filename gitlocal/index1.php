<?php
/*
	@! Creating perfect tables using jQuery
-----------------------------------------------------------------------------	
	# author: @akshitsethi
	# web: http://www.akshitsethi.me
	# email: ping@akshitsethi.me
	# mobile: (91)9871084893
-----------------------------------------------------------------------------
	@@ The biggest failure is failing to try.
*/
?>
<!doctype html>
<html lang="en">
<head>
<title>Creating perfect tables with jQuery - A tutorial by akshitsethi.me</title>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="Description" content="Learn to create paginated, editable, and sortable tables in jQuery." />
<meta name="Keywords" content="jquery, datatables, jeditable, paginated tables, table sorting, akshitsethi" />
<meta name="Owner" content="Akshit Sethi" />
<link rel="shortcut icon" href="img/favicon.ico">
<link href="css/style.css" media="screen" rel="stylesheet" type="text/css" />
<link href="css/table.css" media="screen" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.datatables.js"></script>
<script type="text/javascript" src="js/jquery.jeditable.js"></script>
<script type="text/javascript" src="js/jquery.blockui.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	var table = $("#celebs");
	var oTable = table.dataTable({"sPaginationType": "full_numbers", "bStateSave": true});

	$(".editable", oTable.fnGetNodes()).editable("php/ajax.php?r=edit_celeb", {
		"callback": function(sValue, y) {
			var fetch = sValue.split(",");
			var aPos = oTable.fnGetPosition(this);
			oTable.fnUpdate(fetch[1], aPos[0], aPos[1]);
		},
		"submitdata": function(value, settings) {
			return {
				"row_id": this.parentNode.getAttribute("id"),
				"column": oTable.fnGetPosition(this)[2]
			};
		},
		"height": "14px"
	});

	$(document).on("click", ".delete", function() {
		var celeb_id = $(this).attr("id").replace("delete-", "");
		var parent = $("#"+celeb_id);
		$.ajax({
			type: "get",
			url: "php/ajax.php?r=delete_celeb&id="+celeb_id,
			data: "",
			beforeSend: function() {
				table.block({
					message: "",
					css: {
						border: "none",
						backgroundColor: "none"
					},
					overlayCSS: {
						backgroundColor: "#fff",
						opacity: "0.5",
						cursor: "wait"
					}
				});
			},
			success: function(response) {
				table.unblock();
				var get = response.split(",");
				if(get[0] == "success") {
					$(parent).fadeOut(200,function() {
						$(parent).remove();
					});
				}
			}
		});
	});
});
</script>
</head>
<body>
	<div class="header">
		<div class="header-inner clearfix">
			<div class="pull-left">
				<a href="http://www.akshitsethi.me" target="_blank"><img src="img/logo.png" class="logo"></a>
			</div>

			<div class="pull-right">
				<p class="small-text no-margin"><span class="highlight">Creating perfect tables with <strong>jQuery</strong></p>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="page-header">
			<h1>Creating perfect tables with jQuery</h1>
			<p>With the help of jQuery, we can create paginated, editable, and sortable tables that not only look great but also provides AJAX updation of data. Have a look at the example below.</p>
		</div>

		<table class="table" id="celebs">
			<thead>
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Slug</th>
					<th>Updated</th>
					<th></th>
				</tr>
			</thead>

			<tbody>
				<tr id="1">
					<td class="hidden-phone">1</td>
					<td class="editable">Lindsay Lohan</td>
					<td class="editable hidden-phone">lindsay_lohan</td>
					<td class="hidden-phone">2013-08-29T11:49:32+02:00</td>
					<td><a href="javascript:;" id="delete-1" class="delete no-underline">x</a></td>
				</tr>
				<tr id="2">
					<td class="hidden-phone">2</td>
					<td class="editable">Hilary Duff</td>
					<td class="editable hidden-phone">hilary_duff</td>
					<td class="hidden-phone">2013-08-29T11:49:16+02:00</td>
					<td><a href="javascript:;" id="delete-2" class="delete no-underline">x</a></td>
				</tr>
				<tr id="3">
					<td class="hidden-phone">3</td>
					<td class="editable">Olivia Munn</td>
					<td class="editable hidden-phone">olivia_munn</td>
					<td class="hidden-phone">2013-08-28T23:53:00+02:00</td>
					<td><a href="javascript:;" id="delete-3" class="delete no-underline">x</a></td>
				</tr>
				<tr id="4">
					<td class="hidden-phone">4</td>
					<td class="editable">Joanna Krupa</td>
					<td class="editable hidden-phone">joanna_krupa</td>
					<td class="hidden-phone">2013-08-28T23:46:13+02:00</td>
					<td><a href="javascript:;" id="delete-4" class="delete no-underline">x</a></td>
				</tr>
				<tr id="5">
					<td class="hidden-phone">5</td>
					<td class="editable">Selena Gomez</td>
					<td class="editable hidden-phone">selena_gomez</td>
					<td class="hidden-phone">2013-08-28T23:00:26+02:00</td>
					<td><a href="javascript:;" id="delete-5" class="delete no-underline">x</a></td>
				</tr>
				<tr id="6">
					<td class="hidden-phone">6</td>
					<td class="editable">Miley Cyrus</td>
					<td class="editable hidden-phone">miley_cyrus</td>
					<td class="hidden-phone">2013-08-28T23:00:18+02:00</td>
					<td><a href="javascript:;" id="delete-6" class="delete no-underline">x</a></td>
				</tr>
				<tr id="7">
					<td class="hidden-phone">7</td>
					<td class="editable">Kareena Kapoor</td>
					<td class="editable hidden-phone">kareena_kapoor</td>
					<td class="hidden-phone">2013-08-28T11:41:37+02:00</td>
					<td><a href="javascript:;" id="delete-7" class="delete no-underline">x</a></td>
				</tr>
				<tr id="8">
					<td class="hidden-phone">8</td>
					<td class="editable">Preity Zinta</td>
					<td class="editable hidden-phone">preity_zinta</td>
					<td class="hidden-phone">2013-08-28T11:14:21+02:00</td>
					<td><a href="javascript:;" id="delete-8" class="delete no-underline">x</a></td>
				</tr>
				<tr id="9">
					<td class="hidden-phone">9</td>
					<td class="editable">Jessica Jaymes</td>
					<td class="editable hidden-phone">jessica_jaymes</td>
					<td class="hidden-phone">2013-08-28T10:47:05+02:00</td>
					<td><a href="javascript:;" id="delete-9" class="delete no-underline">x</a></td>
				</tr>
				<tr id="10">
					<td class="hidden-phone">10</td>
					<td class="editable">Nicole Kidman</td>
					<td class="editable hidden-phone">nicole_kidman</td>
					<td class="hidden-phone">2013-08-28T11:49:14+02:00</td>
					<td><a href="javascript:;" id="delete-10" class="delete no-underline">x</a></td>
				</tr>
				<tr id="11">
					<td class="hidden-phone">11</td>
					<td class="editable">Deepika Padukone</td>
					<td class="editable hidden-phone">deepika_padukone</td>
					<td class="hidden-phone">2013-08-28T11:45:41+02:00</td>
					<td><a href="javascript:;" id="delete-11" class="delete no-underline">x</a></td>
				</tr>
				<tr id="12">
					<td class="hidden-phone">12</td>
					<td class="editable">Katrina Kaif</td>
					<td class="editable hidden-phone">katrina_kaif</td>
					<td class="hidden-phone">2013-08-28T01:34:05+02:00</td>
					<td><a href="javascript:;" id="delete-12" class="delete no-underline">x</a></td>
				</tr>
				<tr id="13">
					<td class="hidden-phone">13</td>
					<td class="editable">Elisha</td>
					<td class="editable hidden-phone">elisha_cuthbert</td>
					<td class="hidden-phone">2013-08-28T11:48:49+02:00</td>
					<td><a href="javascript:;" id="delete-13" class="delete no-underline">x</a></td>
				</tr>
				<tr id="14">
					<td class="hidden-phone">14</td>
					<td class="editable">Kate Winslet</td>
					<td class="editable hidden-phone">kate_winslet</td>
					<td class="hidden-phone">2013-08-28T00:23:44+02:00</td>
					<td><a href="javascript:;" id="delete-14" class="delete no-underline">x</a></td>
				</tr>
				<tr id="15">
					<td class="hidden-phone">15</td>
					<td class="editable">Jessica Alba</td>
					<td class="editable hidden-phone">jessica_alba</td>
					<td class="hidden-phone">2013-08-27T23:56:32+02:00</td>
					<td><a href="javascript:;" id="delete-15" class="delete no-underline">x</a></td>
				</tr>
				<tr id="16">
					<td class="hidden-phone">16</td>
					<td class="editable">Kim Kardashian</td>
					<td class="editable hidden-phone">kim_kardashian</td>
					<td class="hidden-phone">2013-08-27T23:48:44+02:00</td>
					<td><a href="javascript:;" id="delete-16" class="delete no-underline">x</a></td>
				</tr>
				<tr id="17">
					<td class="hidden-phone">17</td>
					<td class="editable">Mallika Sherawat</td>
					<td class="editable hidden-phone">mallika_sherawat</td>
					<td class="hidden-phone">2013-08-27T23:47:24+02:00</td>
					<td><a href="javascript:;" id="delete-17" class="delete no-underline">x</a></td>
				</tr>
				<tr id="18">
					<td class="hidden-phone">18</td>
					<td class="editable">Sherlyn Chopra</td>
					<td class="editable hidden-phone">sherlyn_chopra</td>
					<td class="hidden-phone">2013-08-27T22:21:14+02:00</td>
					<td><a href="javascript:;" id="delete-18" class="delete no-underline">x</a></td>
				</tr>
				<tr id="19">
					<td class="hidden-phone">19</td>
					<td class="editable">Rihanna</td>
					<td class="editable hidden-phone">rihanna</td>
					<td class="hidden-phone">2013-08-27T22:14:55+02:00</td>
					<td><a href="javascript:;" id="delete-19" class="delete no-underline">x</a></td>
				</tr>
				<tr id="20">
					<td class="hidden-phone">20</td>
					<td class="editable">Jesse Jane</td>
					<td class="editable hidden-phone">jesse_jane</td>
					<td class="hidden-phone">2013-08-28T11:49:06+02:00</td>
					<td><a href="javascript:;" id="delete-20" class="delete no-underline">x</a></td>
				</tr>
				<tr id="21">
					<td class="hidden-phone">21</td>
					<td class="editable">Paris Hilton</td>
					<td class="editable hidden-phone">paris_hilton</td>
					<td class="hidden-phone">2013-08-27T22:13:37+02:00</td>
					<td><a href="javascript:;" id="delete-21" class="delete no-underline">x</a></td>
				</tr>
				<tr id="22">
					<td class="hidden-phone">22</td>
					<td class="editable">Pamela Anderson</td>
					<td class="editable hidden-phone">pamela_anderson</td>
					<td class="hidden-phone">2013-08-27T22:13:23+02:00</td>
					<td><a href="javascript:;" id="delete-22" class="delete no-underline">x</a></td>
				</tr>
				<tr id="23">
					<td class="hidden-phone">23</td>
					<td class="editable">Anna Nicole Smith</td>
					<td class="editable hidden-phone">anna_nicole_smith</td>
					<td class="hidden-phone">2013-08-27T22:07:44+02:00</td>
					<td><a href="javascript:;" id="delete-23" class="delete no-underline">x</a></td>
				</tr>
				<tr id="24">
					<td class="hidden-phone">24</td>
					<td class="editable">Behati Prinsloo</td>
					<td class="editable hidden-phone">behati_prinsloo</td>
					<td class="hidden-phone">2013-08-28T12:50:01+02:00</td>
					<td><a href="javascript:;" id="delete-24" class="delete no-underline">x</a></td>
				</tr>
			</tbody>
		</table>

		<div class="page-footer">
			<p>A small piece of code by <strong><a href="http://www.akshitsethi.me" target="_blank">Akshit Sethi</a></strong></p>
		</div>
	</div>
</body>
</html>