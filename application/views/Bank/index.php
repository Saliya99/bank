<html>
	<head>
	<title>Bank Details</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js'></script>
		<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
		<style>
			 @import url(http://fonts.googleapis.com/css?family=Calibri:400,300,700);

			body {
				background-color: #673AB7;
				font-family: 'Calibri', sans-serif !important
			}

			.container {
				margin-top: 100px
			}

			.card {
				position: relative;
				display: -webkit-box;
				display: -ms-flexbox;
				display: flex;
				-webkit-box-orient: vertical;
				-webkit-box-direction: normal;
				-ms-flex-direction: column;
				flex-direction: column;
				min-width: 0;
				word-wrap: break-word;
				background-color: #fff;
				background-clip: border-box;
				border: 0px solid transparent;
				border-radius: 0px
			}
			}

			.card-body {
				-webkit-box-flex: 1;
				-ms-flex: 1 1 auto;
				flex: 1 1 auto;
				padding: 1.25rem
			}

			.card .card-title {
				position: relative;
				font-weight: 600;
				margin-bottom: 10px
			}

			.table {
				width: 100%;
				max-width: 100%;
				margin-bottom: 1rem;
				background-color: transparent
			}

			* {
				outline: none
			}

			.table th,
			.table thead th {
				font-weight: 500
			}

			.table thead th {
				vertical-align: bottom;
				border-bottom: 2px solid #dee2e6
			}

			.table th {
				padding: 1rem;
				vertical-align: top;
				border-top: 1px solid #dee2e6
			}

			.table th,
			.table thead th {
				font-weight: 500
			}

			th {
				text-align: inherit
			}
		</style>
	</head>
	<body>
		<div class="container">
			<div class="row">
			<div class="col-12 mb-3 text-right">
				<a href="<?=base_url('Bank/create')?>" class="btn btn-primary">Create An Account</a>
			</div>
				<div class="col-12">
					<div class="card">
						<div class="card-body text-center">
							<h5 class="card-title m-b-0"><?=$title?></h5>
						
						</div>
						<table class="table">
							<thead>
								<tr>
									<th scope="col">Id</th>
									<th scope="col">Bank Name</th>
									<th scope="col">Branch Name</th>
									<th scope="col">Account Number</th>
								</tr>
							</thead>
							<tbody>

								<?php 
								if(count($bankdetails)>0){
									foreach($bankdetails as $bankdetail){ ?>
									<tr>
										<th scope="row"><?=$bankdetail->id?></th>
										<td><?=$bankdetail->BankName?></td>
										<td><?=$bankdetail->BranchName?></td>
										<td><?=$bankdetail->BankAccNo?></td>
										<td><a href="<?=base_url('Bank/edit/'.$bankdetail->id)?>">Edit</a></td>
										<td><a onclick="confirm('Are you sure want to delete?')" href="<?=base_url('Bank/delete/'.$bankdetail->id)?>">Delete</a></td>
									</tr>
									<?php 
									}
								}else{ ?>
								<tr><td>No Accounts</td></tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
