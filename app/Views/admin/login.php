<?= $this->extend('/admin/template') ?>

<?= $this->section('content') ?>

<body class="hold-transition login-page">
	<div class="login-box">
		<div class="login-logo">
			<a href="<?= base_url() ?>/adminlte/index2.html"><b>Admin</b>PSB</a>
		</div>
		<!-- /.login-logo -->
		<div class="card">
			<div class="card-body login-card-body">
				<?php if (session()->getFlashdata('msg') == TRUE) : ?>
					<div class="alert alert-success" role="alert">
						<?= session()->getFlashdata('msg') ?>
					</div>
				<?php endif; ?>

				<?php if (session()->getFlashdata('errlog') == TRUE) : ?>
					<div class="alert alert-danger" role="alert">
						<?= session()->getFlashdata('errlog') ?>
					</div>
				<?php endif; ?>

				<form action="<?= base_url() ?>/admin/authLogin" method="post">
					<div class="input-group mb-3">
						<input type="username" class="form-control" placeholder="Username" name="username">
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-envelope"></span>
							</div>
						</div>
					</div>
					<div class="input-group mb-3">
						<input type="password" class="form-control" placeholder="Password" name="password">
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-lock"></span>
							</div>
						</div>
					</div>
					<div class="row">
						<button type="submit" class="btn btn-primary btn-block">Sign In</button>
					</div>
				</form>
			</div>
			<!-- /.login-card-body -->
		</div>
	</div>
	<!-- /.login-box -->
</body>

<?= $this->endSection() ?>