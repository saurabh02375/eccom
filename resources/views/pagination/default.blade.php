<div class="row">
	<div class="col-sm-12 col-md-5">
		<div class="dataTables_info">
			Showing {{ $products->firstItem() }} to {{ $products->lastItem() }} of {{$products->total()}} entries
		</div>
	</div>
	<div class="col-sm-12 col-md-7">
		<div class="d-flex justify-content-end align-items-center">
			<div class="dataTables_length mr-4">
				<label class="mb-0">
					Show
					<select name="per_page" class="class' => 'custom-select custom-select-sm form-control form-control-sm" onchange='page_limit()' id="per_page">
						<option Value="10" selected>Default</option>
						<option Value="15">15</option>
						<option Value="20">20</option>
						<option Value="30">30</option>
						<option Value="50">50</option>
						<option Value="100">100</option>
					</select>
				</label>
			</div>
			<?php
			$link_limit = 6;
			?>
			@if ($products->lastPage() > 1)
			<div class="dataTables_paginate paging_full_numbers">
				<ul class="pagination">
					@if ($products->onFirstPage())
					<li class="paginate_button page-item previous disabled">
						<a href="javascript:void(0);" class="page-link">
							<i class="ki ki-arrow-back"></i>
						</a>
					</li>
					@else
					<li class="paginate_button page-item first">
						<a href="{{ $products->url(1)  }}" class="page-link">
							<i class="ki ki-double-arrow-back"></i>
						</a>
					</li>
					<li class="paginate_button page-item previous">
						<a href="{{ $products->previousPageUrl() }}" class="page-link">
							<i class="ki ki-arrow-back"></i>
						</a>
					</li>
					@endif
					@for ($i = 1; $i <= $products->lastPage(); $i++)
						<?php
						$half_total_links = floor($link_limit / 2);
						$from = $products->currentPage() - $half_total_links;
						$to = $products->currentPage() + $half_total_links;
						if ($products->currentPage() < $half_total_links) {
							$to += $half_total_links - $products->currentPage();
						}
						if ($products->lastPage() - $products->currentPage() < $half_total_links) {
							$from -= $half_total_links - ($products->lastPage() - $products->currentPage()) - 1;
						}
						?>
						@if ($from < $i && $i < $to) <li class="paginate_button page-item {{ ($products->currentPage() == $i) ? ' active' : '' }}">
							<a href='{{ $products->url("$i") }}' class="page-link">{{ $i }}</a>
							</li>
							@endif
							@endfor
							@if ($products->hasMorePages())
							<li class="paginate_button page-item next ">
								<a href="{{ $products->nextPageUrl() }}" class="page-link">
									<i class="ki ki-arrow-next"></i>
								</a>
							</li>
							<li class="paginate_button page-item last">
								<a href="{{ $products->url($products->lastPage()) }}" class="page-link">
									<i class="ki ki-double-arrow-next"></i>
								</a>
							</li>
							@else
							<li class="paginate_button page-item next disabled">
								<a href="#" class="page-link">
									<i class="ki ki-arrow-next"></i>
								</a>
							</li>
							@endif
				</ul>
			</div>
			@endif
		</div>
	</div>
</div>
