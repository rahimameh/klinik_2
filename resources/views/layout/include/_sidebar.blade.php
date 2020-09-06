<div id="sidebar-nav" class="sidebar">
	<div class="sidebar-scroll">
		<nav>
			<ul class="nav">				
			<li><a href="/" class=""><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
			
			
		
					@if(auth()->user()->role == 'admin')
						<li>
							<a href="#subPages" data-toggle="collapse"  aria-expanded="true"><i class="lnr  lnr-users"></i> <span>Master</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
								<div id="subPages" class="collapse in" aria-expanded="true" style="">
									<ul class="nav">
									<li><a href="/pasien" class=""><i class="lnr lnr-user"></i> <span>Master Pasien</span></a></li>
									<li><a href="/dokter" class=""><i class="lnr lnr-user"></i> <span>Master Dokter</span></a></li>
									<li><a href="/user" class=""><i class="lnr lnr-user"></i> <span>Master User</span></a></li>
									</ul>
								</div>
						</li>
						<li><a href="/antrian" class=""><i class="lnr lnr-list"></i> <span>Antrian</span></a></li>
						<li><a href="/laporan" class=""><i class="lnr lnr-printer"></i> <span>Laporan</span></a></li>
					@endif
					@if(auth()->user()->role == 'dokter')

					<li><a href="/pasien" class=""><i class="lnr lnr-user"></i> <span>Master Pasien</span></a></li>

					@endif
				
			</ul>
		</nav>
	</div>
</div>