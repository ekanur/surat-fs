<ul class="nav">
	<li class="">
		<a href="{{ url("/admin") }}">
			<i class="now-ui-icons design_app"></i>
			<p style="font-weight:bolder"> Dashboard <span class="pull-right">(1)</span></p>
		</a>
	</li>
	<li class="">
		<a href="{{ url("admin/surat-masuk") }}">
			<i class="now-ui-icons ui-1_email-85"></i>
			<p style="font-weight:bolder"> Surat Masuk <span class="pull-right">(1)</span></p>
		</a>
	</li>
	<li class="">
		<a href="{{ url("/admin/mahasiswa") }}">
			<i class="now-ui-icons users_single-02"></i>
			<p>Mahasiswa</p>
		</a>
	</li>
	<li class="">
		<a href="{{ url("admin/dosen") }}">
			<i class="now-ui-icons files_single-copy-04"></i>
			<p>Dosen</p>
		</a>
	</li>
	<li>         
		<a data-toggle="collapse" href="#pagesExamples" class="collapsed" aria-expanded="false">
		  
			<i class="now-ui-icons loader_gear"></i>
		  
			<p>
			  Setting <b class="caret"></b>
			</p>
		</a>

		<div class="collapse" id="pagesExamples" style="">
			<ul class="nav">
				<li class="">
					<a href="{{ url("admin/pejabat") }}">
						<i class="now-ui-icons users_circle-08"></i>
						<p>Pejabat</p>
					</a>
				</li>
			
			  <li>
				  <a href="{{ url("admin/layanan") }}">
					  <i class="now-ui-icons design_app"></i>		
					  <span class="sidebar-normal"> Layanan Surat </span>
				  </a>
			  </li>
			
			  <li>
				  <a href="#" class="disabled">
					<i class="now-ui-icons ui-2_like"></i>
					  <span class="sidebar-normal"> Verifikator<br/>(Under Development) </span>
				  </a>
			  </li>
		  </ul>
	  </div>

	  
  </li>
  <li>
	<a href="{{ url("admin/aspirasi") }}">
		<i class="now-ui-icons ui-2_chat-round"></i>
		<p> Aspirasi </p>
	</a>
  </li>

</ul>
