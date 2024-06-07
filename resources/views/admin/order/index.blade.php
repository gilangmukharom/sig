@extends('layouts.back')
@section('contents')
				<!--begin::Row-->
                    <div class="d-flex flex-column-fluid">
									<div class="container">
								<div class="row">
									<div class="col">
										<!--begin::Advance Table Widget 4-->
										<div class="card card-custom card-stretch gutter-b">
											<!--begin::Header-->
											<div class="card-header border-0 py-5">
												<h3 class="card-title align-items-start flex-column">
													<span class="card-label font-weight-bolder text-dark">Data Transaksi Pelanggan Terbaru</span>
													<span class="text-muted mt-3 font-weight-bold font-size-sm">Rincian Transaksi Hari Ini</span>
												</h3>
											</div>
											<!--end::Header-->
											<!--begin::Body-->
											<div class="card-body pt-0 pb-3">
												<div class="tab-content">
													<!--begin::Table-->
													<div class="table-responsive">
														<table class="table table-head-custom table-head-bg table-borderless table-vertical-center">
															<thead>
																<tr class="text-left text-uppercase">
																	<th style="min-width: 250px" class="pl-7">
																		<span class="text-dark-75">Nama</span>
																	</th>
																	<th style="min-width: 100px">Product</th>
																	<th style="min-width: 100px">Metode Pembayaran</th>
																	<th style="min-width: 100px">Status</th>
																	<th style="min-width: 130px">Total Harga</th>
																	<th style="min-width: 80px"></th>
																</tr>
															</thead>
															<tbody>
                                                            @foreach($orders as $item)
																<tr>
																	<td class="pl-0 py-8">
																		<div class="d-flex align-items-center">
																			<div class="symbol symbol-50 symbol-light mr-4">
																				<span class="symbol-label">
																					<img src="{{asset('assets/img/avatar/9720009.jpg')}}" class="h-75 align-self-end" alt="" />
																				</span>
																			</div>
																			<div>
																				<a href="#" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">{{$item -> user -> name}}</a>
																			</div>
																		</div>
																	</td>
																	<td>
																		<span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$item -> product -> product_name}}</span>
																	</td>
																	<td>
																	    @if($item->bank == "")
																	    <span class="text-muted font-weight-bold">{{$item -> payment_type}}</span>
																	    @else
																		<span class="text-muted font-weight-bold">{{$item -> bank}}</span>
																		<span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$item->va_number}}</span>
																		@endif
																	</td>
																	<td>
																		<span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$item->status}}</span>
																		<span class="text-muted font-weight-bold"></span>
																	</td>
																	<td>
																		<span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$item->total_harga}}</span>
																	</td>
																	<td class="pr-0 text-right">
																		<a href="#" class="btn btn-light-success font-weight-bolder font-size-sm">View Offer</a>
																	</td>
																</tr>
                                                                @endforeach
															</tbody>
														</table>
													</div>
													<!--end::Table-->
												</div>
											</div>
											<!--end::Body-->
										</div>
										<!--end::Advance Table Widget 4-->
									</div>
								</div>
							</div>
								<!--end::Row-->
								<!--end::Dashboard-->
							</div>
							<!--end::Container-->
						</div>
						<!--end::Entry-->
					</div>
@endsection